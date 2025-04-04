/*!
 Rundiz template for admin v 2.4.0 
License: MIT
*/
/**
 * RDTA Accordion
 */


class RDTAAccordion {


    /**
     * Initialize RDTA accordion.
     * 
     * @param {string} selector
     * @returns {undefined}
     */
    static init(selector) {
        if (!selector) {
            return false;
        }

        let thisClass = new this();

        thisClass.listenOnClickHeader(selector);
    }// init


    /**
     * Listen on click accordion header.
     * 
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
                } else if (target.matches(selector + ' details')) {
                    accordionGroup = target.closest('.rd-accordion-group');
                }// endif; matched selector

                if (target.matches(selector) && target.dataset.accordionOne === 'true') {
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