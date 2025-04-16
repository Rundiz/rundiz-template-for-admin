/*!
 Rundiz template for admin v 2.4.5 
License: MIT
*/
/**
 * RDTA Accordion
 */


class RDTAAccordion {


    /**
     * Listen on click accordion header.
     * 
     * This method was called from `init()`.
     * 
     * @link https://developer.mozilla.org/en-US/docs/Web/CSS/::details-content For future use where we can transition content of `details` element.
     * @todo [rdta] Make sure `details` transition work when `::details-content` available on all major browsers.
     * @since 2.4.1
     * @param {string} selector The JS selector.
     * @returns {undefined}
     */
    #listenOnClickHeader(selector) {
        document.addEventListener('click', (event) => {
            if (event.target.closest(selector)) {
                const target = event.target;
                const selectedTarget = event.target.closest(selector);
                let accordionGroup;

                if (selectedTarget.querySelector('summary')) {
                    // if found child selector that use HTML `<summary>`.
                    accordionGroup = target.closest('.rd-accordion-group');
                    const accordionBody = accordionGroup.querySelector('.rd-accordion-body');
                    if (accordionGroup.open) {
                        accordionGroup.querySelector('.rd-accordion-header').classList.remove('active');
                        accordionBody.classList.remove('expanded');
                    } else {
                        accordionGroup.querySelector('.rd-accordion-header').classList.add('active');
                        accordionBody.classList.add('expanded');
                    }
                } else if (selectedTarget.querySelector('[data-toggle="accordion"]')) {
                    // if found child selector `data-toggle="accordion"`. the basic accordion HTML element.
                    event.preventDefault();// prevent default action for basic accordion only.
                    if (target.closest('.rd-accordion-group')) {
                        accordionGroup = target.closest('.rd-accordion-group');
                        let targetAccordionBody = accordionGroup.querySelector(target.dataset.target);
                        targetAccordionBody.classList.toggle('expanded');

                        if (targetAccordionBody.classList.contains('expanded')) {
                            target.closest('.rd-accordion-header').classList.add('active');
                            target.closest('.rd-accordion-header [data-toggle="accordion"]').setAttribute('aria-expanded', true);
                        } else {
                            target.closest('.rd-accordion-header').classList.remove('active');
                            target.closest('.rd-accordion-header [data-toggle="accordion"]').setAttribute('aria-expanded', false);
                        }
                    }
                }// endif; found child selector.

                if (selectedTarget.dataset.accordionOne === 'true') {
                    // if accordion has mark to open only one.
                    selectedTarget.querySelectorAll('.rd-accordion-group').forEach(function(item, index) {
                        if (item !== accordionGroup && typeof(accordionGroup) !== 'undefined') {
                            item.querySelector('.rd-accordion-header').classList.remove('active');
                            item.querySelector('.rd-accordion-header [data-toggle="accordion"]')?.setAttribute('aria-expanded', false);
                            item.querySelector('.rd-accordion-body').classList.remove('expanded');
                            if (item.nodeName.toLowerCase() === 'details') {
                                item.removeAttribute('open');
                            }
                        }
                    });
                }// endif;

                accordionGroup = undefined;
            }
        });
    }// #listenOnClickHeader


    /**
     * Setup accordion that using details element.
     * 
     * This method was called from `init()`.
     * 
     * @link https://developer.mozilla.org/en-US/docs/Web/CSS/::details-content For future use where we can transition content of `details` element.
     * @since 2.4.1
     * @param {string} selector
     * @returns {undefined}
     */
    #setupDetailsElement(selector) {
        document.querySelectorAll(selector + ' details')?.forEach((eachDoc) => {
            eachDoc.querySelector('.rd-accordion-body')?.classList?.add('collapse');
            if (eachDoc.open) {
                // if this accordion is active.
                eachDoc.querySelector('.rd-accordion-header')?.classList?.add('active');
                eachDoc.querySelector('.rd-accordion-body')?.classList?.add('expanded');
            } else {
                // if this accordion is NOT active.
                eachDoc.querySelector('.rd-accordion-header')?.classList?.remove('active');
                eachDoc.querySelector('.rd-accordion-body')?.classList?.remove('expanded');
            }
        });
    }// #setupDetailsElement


    /**
     * Initialize RDTA accordion.
     * 
     * @param {string} selector The JS selector.
     * @returns {undefined}
     */
    static init(selector) {
        if (!selector || typeof(selector) !== 'string') {
            return false;
        }

        let thisClass = new this();

        thisClass.#setupDetailsElement(selector);

        thisClass.#listenOnClickHeader(selector);
    }// init


}