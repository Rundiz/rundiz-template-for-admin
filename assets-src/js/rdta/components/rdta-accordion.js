/**
 * RDTA Accordion
 */


class RDTAAccordion {


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
     * @param {string} selector
     * @returns {undefined}
     */
    static init(selector) {
        if (!selector || typeof(selector) !== 'string') {
            return false;
        }

        let thisClass = new this();

        thisClass.#setupDetailsElement(selector);

        thisClass.listenOnClickHeader(selector);
    }// init


    /**
     * Listen on click accordion header.
     * 
     * @link https://developer.mozilla.org/en-US/docs/Web/CSS/::details-content For future use where we can transition content of `details` element.
     * @todo [rdta] Make sure `details` transition work when `::details-content` available on all major browsers.
     * @private This method was called from `init()`.
     * @param {string} selector
     * @returns {undefined}
     */
    listenOnClickHeader(selector) {
        document.addEventListener('click', function(event) {
            // match selector.
            // @link https://stackoverflow.com/a/25248515/128761 Original source code.
            let accordionGroup;
            for (let target= event.target; target && target != this; target = target.parentNode) {
                // loop parent nodes from the target to the delegation node
                if (target.matches(selector + ' [data-toggle="accordion"]')) {
                    // if found `data-toggle="accordion"`. the basic accordion HTML element.
                    event.preventDefault();
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
                } else if (target.matches(selector + ' summary')) {
                    // if found accordion that use `<summary>`.
                    accordionGroup = target.closest('.rd-accordion-group');
                    const accordionBody = accordionGroup.querySelector('.rd-accordion-body');
                    if (accordionGroup.open) {
                        accordionGroup.querySelector('.rd-accordion-header').classList.remove('active');
                        accordionBody.classList.remove('expanded');
                    } else {
                        accordionGroup.querySelector('.rd-accordion-header').classList.add('active');
                        accordionBody.classList.add('expanded');
                    }
                }// endif; matched selector

                if (target.matches(selector) && target.dataset.accordionOne === 'true') {
                    // if accordion has mark to open only one.
                    target.querySelectorAll('.rd-accordion-group').forEach(function(item, index) {
                        if (item !== accordionGroup && typeof(accordionGroup) !== 'undefined') {
                            item.querySelector('.rd-accordion-header').classList.remove('active');
                            item.querySelector('.rd-accordion-header [data-toggle="accordion"]')?.setAttribute('aria-expanded', false);
                            item.querySelector('.rd-accordion-body').classList.remove('expanded');
                            if (item.nodeName.toLowerCase() === 'details') {
                                item.removeAttribute('open');
                            }
                        }
                    });
                    break;
                }
            }// endfor; loop parent nodes
            accordionGroup = undefined;
        });
    }// listenOnClickHeader


}