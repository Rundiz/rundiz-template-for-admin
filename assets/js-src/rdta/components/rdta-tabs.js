/**
 * RDTA Tabs
 */


class RDTATabs {


    /**
     * Class constructor.
     * 
     * @private Do not access this method directly, it was called via `init()` method.
     * @param {object} options
     * @returns {RDTATabs}
     */
    constructor(options) {
        this.selector = (options.selector ? options.selector : '');
        this.options = (options.options ? options.options : {});
    }// constructor


    /**
     * Add required CSS classes.
     * 
     * @private Do not call this, just call `init()`.
     * @param {type} selector
     * @param {type} options
     * @returns {undefined}
     */
    addRequiredClasses(selector, options) {
        let thisClass = this;

        document.querySelectorAll(selector).forEach(function(item, index) {
            // start looping each selector.

            // add required class name.
            item.classList.add('rd-tabs');
            if (item.querySelector('ul')) {
                item.querySelector('ul').classList.add('rd-tabs-nav');
            } else if (item.querySelector('ol')) {
                item.querySelector('ol').classList.add('rd-tabs-nav');
            }
            for (let i = 0; i < item.children.length; i++) {
                // loop each children of selector.
                if (!item.children[i].classList.contains('rd-tabs-nav')) {
                    // if children of item is not tab nav.
                    // add tabs content class.
                    item.children[i].classList.add('rd-tabs-content');
                }
            }

            // set active class
            for (let i = 0; i < item.querySelector('ul').children.length; i++) {
                // loop each li.
                if (i === options.activeTabs) {
                    let targetTab = '';
                    if (item.querySelector('ul').children[i].querySelector('a').dataset.targettab) {
                        targetTab = item.querySelector('ul').children[i].querySelector('a').dataset.targettab;
                    } else if (item.querySelector('ul').children[i].querySelector('a').hash) {
                        targetTab = item.querySelector('ul').children[i].querySelector('a').hash;
                    }
                    if (targetTab) {
                        thisClass.activateTabContent(item, targetTab);
                    }
                    break;
                }
            }
        });
    }// addRequiredClasses


    /**
     * Activate tab content.
     * 
     * @private Do not call this, just call `init()`.
     * @param {object} selector Object of each tab main element.
     * @param {string} targetTabContent
     * @returns {undefined}
     */
    activateTabContent(selector, targetTabContent) {
        if (!targetTabContent) {
            return false;
        }
        let thisClass = this;

        for (let i = 0; i < selector.children.length; i++) {
            if (!selector.children[i].classList.contains('rd-tabs-nav')) {
                // if children of item is not tab nav.
                selector.children[i].classList.remove('active');
            }
        }

        selector.querySelectorAll('ul a').forEach(function(item, index) {
            if (item.hash === targetTabContent || item.dataset.targettab === targetTabContent) {
                item.parentElement.classList.add('active');
            } else {
                item.parentElement.classList.remove('active');
            }
        });
        // set active on tab content.
        if (selector.querySelector(targetTabContent)) {
            selector.querySelector(targetTabContent).classList.add('active');
            let eventDetail = {
                'tabsElement': selector,
                'targetTab': targetTabContent,
            };
            let event = new CustomEvent('rdta.tabs.activeTab', {'detail': eventDetail});
            document.querySelector(thisClass.selector).dispatchEvent(event);
        }
    }// activateTabContent


    /**
     * Ajax and set content to target. Did not activate the tab nav.
     * 
     * @private Do not call this, just call `init()`.
     * @param {string} url
     * @param {object} selector Object of each tab main element.
     * @param {string} targetTabContent
     * @returns {undefined}
     */
    ajaxTabContent(url, selector, targetTabContent) {
        let xhr = new XMLHttpRequest();
        let thisClass = this;

        xhr.addEventListener('error', function(e) {
            let event = new CustomEvent('rdta.tabs.ajaxFailed', {'detail': e});
            document.querySelector(thisClass.selector).dispatchEvent(event);
        });
        xhr.addEventListener('loadend', function(e) {
            let event = new CustomEvent('rdta.tabs.ajaxContentLoaded', {'detail': e});
            document.querySelector(thisClass.selector).dispatchEvent(event);

            if (selector.querySelector(targetTabContent)) {
                selector.querySelector(targetTabContent).innerHTML = this.responseText;
            }
        });

        xhr.open('GET', url);
        xhr.send();
    }// ajaxTabContent


    /**
     * Initialize RDTA tabs.
     * 
     * @param {string} selector
     * @param {object} options
     * @returns {undefined}
     */
    static init(selector, options) {
        let defaultOptions = {
            'activeTabs': 0,
        };
        if (typeof(options) === 'object') {
            options = Object.assign(defaultOptions, options);
        } else {
            options = defaultOptions;
        }

        let thisClass = new this({'selector': selector, 'options': options});
        thisClass.addRequiredClasses(selector, options);
        thisClass.listenOnTabNav(selector, options);
    }// init


    /**
     * Listen on tab nav click and activate tab content.
     * 
     * @private Do not call this, just call `init()`.
     * @param {type} selector
     * @param {type} options
     * @returns {undefined}
     */
    listenOnTabNav(selector, options) {
        let thisClass = this;
        let tabElement = document.querySelector(selector);

        document.addEventListener('click', function(event) {
            // match selector.
            // @link https://stackoverflow.com/a/25248515/128761 Original source code.
            for (let target= event.target; target && target != this; target = target.parentNode) {
                // loop parent nodes from the target to the delegation node
                if (target.matches(selector + ' .rd-tabs-nav a')) {
                    event.preventDefault();
                    let targetTab = '';
                    if (target.dataset.targettab) {
                        targetTab = target.dataset.targettab;
                    } else if (target.hash) {
                        targetTab = target.hash;
                    }

                    if (target.getAttribute('href') && target.getAttribute('href').charAt(0) !== '#' && !target.hash) {
                        thisClass.ajaxTabContent(target.getAttribute('href'), target.closest(selector), targetTab)
                    }

                    thisClass.activateTabContent(target.closest(selector), targetTab);
                    break;
                }
            }
        });
    }// listenOnTabNav


}