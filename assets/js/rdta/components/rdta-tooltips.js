/*!
 Rundiz template for admin v 2.4.10 
License: MIT
*/
/**
 * RDTA Tooltips
 */


class RDTATooltips {


    /**
     * Class constructor.
     * 
     * @returns {undefined}
     */
    constructor() {
        this.tooltipInstances = [];
    }// constructor


    /**
     * Bind show and hide event listeners to a trigger element.
     * 
     * Attaches `mouseenter`, `mouseleave`, `focus`, and `blur` listeners so the
     * tooltip appears and disappears at the appropriate times. Each call to `show`
     * also re-runs the position calculation to account for any layout changes.
     * 
     * @since 2.4.10
     * @private
     * @param {Element}      trigger   The element that triggers the tooltip on hover/focus.
     * @param {HTMLElement}  tooltipEl The tooltip element to show or hide.
     * @param {Element|null} arrowEl   The arrow element inside the tooltip, or `null` if none.
     * @param {string}       placement The preferred tooltip placement.
     * @returns {{ 
     *   show: Function, 
     *   hide: Function, 
     *   cleanup: Function 
     * }} An object containing the `show` and `hide` callbacks, and a `cleanup`
     *    function that removes all event listeners and deletes the tooltip element from the DOM.
     */
    #bindTrigger(trigger, tooltipEl, arrowEl, placement) {
        const show = () => {
            tooltipEl.style.display = 'block';
            this.#updatePosition(trigger, tooltipEl, arrowEl, placement);
        };

        const hide = () => {
            tooltipEl.style.display = 'none';
        };

        trigger.addEventListener('mouseenter', show);
        trigger.addEventListener('mouseleave', hide);
        trigger.addEventListener('focus', show);
        trigger.addEventListener('blur', hide);

        return { show, hide, cleanup: () => {
            trigger.removeEventListener('mouseenter', show);
            trigger.removeEventListener('mouseleave', hide);
            trigger.removeEventListener('focus', show);
            trigger.removeEventListener('blur', hide);
            tooltipEl.remove();
        }};
    }// #bindTrigger


    /**
     * Create and append a tooltip DOM element to the document body.
     * 
     * Parses the given HTML template string, injects the content text into the
     * `.tooltip-inner` element (if present), sets required positioning styles,
     * and appends the resulting element to `document.body`.
     * 
     * @since 2.4.10
     * @private
     * @param {string} template HTML string used as the tooltip structure.
     * @param {string} content  Plain text content to display inside the tooltip.
     * @returns {HTMLElement} The created tooltip element, already appended to the DOM.
     */
    #createTooltipElement(template, content) {
        const wrapper = document.createElement('div');
        wrapper.innerHTML = template;
        const tooltipEl = wrapper.firstElementChild;

        const inner = tooltipEl.querySelector('.tooltip-inner');
        if (inner) {
            inner.textContent = content;
        }

        tooltipEl.style.position = 'absolute';
        tooltipEl.style.display = 'none';
        tooltipEl.style.zIndex = '9999';
        document.body.appendChild(tooltipEl);
        return tooltipEl;
    }// #createTooltipElement


    /**
     * Listen for the `rdta.dialog.closed` event and hide all active tooltips.
     * 
     * Prevents tooltips from remaining visible after a dialog that contained
     * their trigger elements has been closed.
     * 
     * @since 2.4.1
     * @private
     * @returns {undefined}
     */
    #listenDialogClosed() {
        document.addEventListener('rdta.dialog.closed', () => {
            this.hideAll();
        }, true);
    }// #listenDialogClosed


    /**
     * Compute and apply the tooltip position using FloatingUIDOM.
     * 
     * Uses the `offset`, `flip`, and `shift` middleware to keep the tooltip
     * visible within the viewport, and optionally positions an arrow element
     * using the `arrow` middleware.
     * 
     * @since 2.4.10
     * @private
     * @async
     * @param {Element} trigger   The element that triggered the tooltip.
     * @param {HTMLElement} tooltipEl The tooltip element to position.
     * @param {Element|null} arrowEl  The arrow element inside the tooltip, or `null` if none.
     * @param {string} placement The preferred placement (e.g. `'top'`, `'bottom-start'`).
     *              Falls back to `'top'` if not provided.
     * @returns {Promise<undefined>}
     */
    async #updatePosition(trigger, tooltipEl, arrowEl, placement) {
        // Destructure what we need from the UMD global.
        const { computePosition, arrow, flip, shift, offset } = FloatingUIDOM;

        const middleware = [
            offset(8),
            flip(),
            shift({ padding: 5 }),
        ];

        if (arrowEl) {
            middleware.push(arrow({ element: arrowEl }));
        }

        const { x, y, placement: finalPlacement, middlewareData } = await computePosition(
            trigger,
            tooltipEl,
            { placement: placement ?? 'top', middleware }
        );

        Object.assign(tooltipEl.style, {
            left: `${x}px`,
            top: `${y}px`,
        });

        if (arrowEl && middlewareData.arrow) {
            const { x: ax, y: ay } = middlewareData.arrow;
            const staticSide = {
                top: 'bottom',
                right: 'left',
                bottom: 'top',
                left: 'right',
            }[finalPlacement.split('-')[0]];

            Object.assign(arrowEl.style, {
                left: ax != null ? `${ax}px` : '',
                top: ay != null ? `${ay}px` : '',
                right: '',
                bottom: '',
                [staticSide]: '-4px',
            });
        }
    }// #updatePosition


    /**
     * Destroy all tooltip instances managed by this class.
     * 
     * Calls the `cleanup` callback for each instance, which removes all event
     * listeners from trigger elements and deletes tooltip elements from the DOM.
     * Resets `tooltipInstances` to an empty array afterwards.
     * 
     * @since 2.4.10
     * @returns {undefined}
     */
    destroyAll() {
        this.tooltipInstances.forEach(({ cleanup }) => cleanup?.());
        this.tooltipInstances = [];
    }


    /**
     * Hide all active tooltips managed by this instance.
     * 
     * Calls the `hide` callback for every tooltip instance without removing
     * event listeners or destroying the tooltip elements. Use {@link destroyAll}
     * if you also want to clean up listeners and remove elements from the DOM.
     * 
     * @since 2.4.10
     * @returns {undefined}
     */
    hideAll() {
        this.tooltipInstances.forEach(({ hide }) => hide?.());
    }


    /**
     * Get all tooltip instances managed by this class.
     * 
     * Each entry in the returned array is an object with the following shape:
     * - `trigger`   {Element}     The element that triggers the tooltip.
     * - `tooltipEl` {HTMLElement} The tooltip DOM element.
     * - `show`      {Function}    Shows the tooltip and recalculates its position.
     * - `hide`      {Function}    Hides the tooltip.
     * - `cleanup`   {Function}    Removes all listeners and deletes the tooltip from the DOM.
     * 
     * @since 2.4.10 Update from tippy to floating-ui.
     * @returns {Array<{trigger: Element, tooltipEl: HTMLElement, show: Function, hide: Function, cleanup: Function}>}
     */
    getInstances() {
        return this.tooltipInstances;
    }


    /**
     * Initialize tooltips on all elements matching the given selector.
     * 
     * For each matching element the method will:
     * 1. Read the `title` attribute as tooltip content (unless overridden via `options.content`).
     * 2. Remove the `title` attribute to prevent the native browser tooltip from appearing.
     * 3. Read `data-placement` on the element as the preferred placement (unless overridden via `options.placement`).
     * 4. Create a tooltip DOM element from the template and append it to `document.body`.
     * 5. Bind show/hide event listeners to the trigger element.
     * 
     * @static
     * @param {string} selector A CSS selector string used to find trigger elements (e.g. `'.has-tooltip'`).
     * @param {object} [options={}] Optional configuration object.
     * @param {string} [options.content] Override tooltip content for all matched elements.
     *                                     Defaults to each element's `title` attribute.
     * @param {string} [options.template] Override the tooltip HTML template.
     *                                     Must contain `.tooltip-inner` for text and optionally `.tooltip-arrow` for the arrow.
     *                                     Defaults to a Bootstrap-compatible tooltip structure.
     * @param {string} [options.placement] Override the preferred tooltip placement for all matched elements
     *                                     (e.g. `'top'`, `'bottom'`, `'left'`, `'right'`, `'top-start'`).
     *                                     Defaults to each element's `data-placement` attribute, or `'top'` if absent.
     * @throws {Error} If `options` is not an object.
     * @throws {Error} If `FloatingUIDOM` is not defined on the global scope (i.e. the UMD scripts are not loaded).
     * @returns {RDTATooltips} The current class instance, containing all created tooltip instances.
     */
    static init(selector, options = {}) {
        if (typeof options !== 'object') {
            throw new Error('The argument options must be an object.');
        }

        // Guard: FloatingUIDOM must be loaded before calling init().
        if (typeof FloatingUIDOM === 'undefined') {
            throw new Error('FloatingUIDOM is not loaded. Please include the floating-ui UMD scripts before using RDTATooltips.');
        }

        const thisClass = new this();

        document.querySelectorAll(selector).forEach((item) => {
            const defaultOptions = {
                content: item.title ?? '',
                template: '<div class="tooltip rdta-tooltips" role="tooltip"><div class="rdta-tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
                placement: item.dataset?.placement ?? options.placement ?? 'top',
            };
            item.removeAttribute('title');

            const resolvedOptions = Object.assign(defaultOptions, options);

            const tooltipEl = thisClass.#createTooltipElement(
                resolvedOptions.template,
                resolvedOptions.content
            );
            const arrowEl = tooltipEl.querySelector('.rdta-tooltip-arrow') ?? null;

            const { show, hide, cleanup } = thisClass.#bindTrigger(
                item,
                tooltipEl,
                arrowEl,
                resolvedOptions.placement
            );

            thisClass.tooltipInstances.push({ trigger: item, tooltipEl, show, hide, cleanup });
        });

        thisClass.#listenDialogClosed();

        return thisClass;
    }// init


}// RDTATooltips