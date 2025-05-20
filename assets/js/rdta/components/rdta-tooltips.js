/*!
 Rundiz template for admin v 2.4.7dev-20250520 
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
        this.tippyInstance;
        this.tippyInstances = [];
    }// constructor


    /**
     * Listen dialog closed and hide tooltips that may be showed.
     * 
     * @since 2.4.1
     * @returns {undefined}
     */
    #listenDialogClosed() {
        document.addEventListener('rdta.dialog.closed', () => {
            tippy?.hideAll();
        }, true);
    }// #listenDialogClosed


    /**
     * Get latest tippy.js instance.
     */
    getInstance() {
        return this.tippyInstance;
    }// getInstance


    /**
     * Get all tippy.js instances.
     */
    getInstances() {
        return this.tippyInstances;
    }// getInstances


    /**
     * Initialize the tooltips.
     * 
     * @param {string} selector The JS selector. It can be CSS class or HTML ID.
     * @param {object} options The options.
     * @param {string} options.content Tooltip content.
     * @param {string} options.template Tooltip HTML template.
     * @param {string} options.placement Tooltip placement.
     * @returns {RDTATooltips} Return this class instance.
     */
    static init(selector, options = {}) {
        if (typeof(options) !== 'object') {
            throw new Error('The argument options must be an object.');
        }

        let thisClass = new this();
        let originalOptions = options;

        document.querySelectorAll(selector).forEach(function(item, index) {
            let defaultOptions = {
                'content': item.title,
                'template': '<div class="tooltip rd-tooltips" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
            };
            item.removeAttribute('title');

            if (item.dataset?.placement) {
                defaultOptions.placement = item.dataset.placement;
            }

            if (typeof(originalOptions) === 'object') {
                options = Object.assign(defaultOptions, originalOptions);
            } else {
                options = defaultOptions;
            }

            thisClass.tippyInstance = tippy(
                item, 
                options
            );
            thisClass.tippyInstances.push(thisClass.tippyInstance);
        });

        thisClass.#listenDialogClosed();

        return thisClass;
    }// init


}