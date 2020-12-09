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
            }// endfor;

            // set active class
            if (item.querySelector('.rd-tabs-nav')) {
                let tabNavElement = item.querySelector('.rd-tabs-nav');
                for (let i = 0; i < tabNavElement.children.length; i++) {
                    // loop each li.
                    if (i === options.activeTabs) {
                        let targetTab = '';
                        if (tabNavElement.children[i].querySelector('a').dataset.targettab) {
                            targetTab = tabNavElement.children[i].querySelector('a').dataset.targettab;
                        } else if (tabNavElement.children[i].querySelector('a').hash) {
                            targetTab = tabNavElement.children[i].querySelector('a').hash;
                        }
                        if (targetTab) {
                            thisClass.activateTabContent(item, targetTab);
                        }
                        break;
                    }
                }// endfor;
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
        if (!targetTabContent || !selector) {
            return false;
        }
        let thisClass = this;

        // set active on tab nav.
        let countTabNav = 0;
        let activeTabNav = 0;
        /// get selector's first tab nav that were found.
        let selectorTabNav = selector.querySelector('.rd-tabs-nav');
        if (selectorTabNav) {
            let allLinks = selectorTabNav.querySelectorAll('a');
            if (allLinks) {
                allLinks.forEach(function(item, index) {
                    if (item.hash === targetTabContent || item.dataset.targettab === targetTabContent) {
                        item.parentElement.classList.add('active');
                        activeTabNav = countTabNav;
                    } else {
                        item.parentElement.classList.remove('active');
                    }
                    countTabNav++;
                });
            }// endif; allLinks
        }// endif; selectorTabNav

        // ------------------------------------------

        for (let i = 0, max = selector.children.length; i < max; i++) {
            if (!selector.children[i].classList.contains('rd-tabs-nav')) {
                // if children of item is not tab nav.
                selector.children[i].classList.remove('active');
            }
        }

        // set active on tab content.
        if (selector.querySelector(targetTabContent)) {
            // if tab content exists.
            // add active class to it.
            selector.querySelector(targetTabContent).classList.add('active');
            if (thisClass.options.rememberLastTab === true && window.localStorage) {
                // if remember last tab.
                window.localStorage.setItem('rdtaTabsLast-' + thisClass.selector, activeTabNav);
            }
            // trigger event.
            let eventDetail = {
                'tabsElement': selector,
                'tabsSelector': thisClass.selector,
                'targetTab': targetTabContent,
                'targetTabNumber': activeTabNav
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
            'rememberLastTab': false,
        };
        if (typeof(options) === 'object') {
            options = Object.assign(defaultOptions, options);
        } else {
            options = defaultOptions;
        }

        if (options.rememberLastTab === true && window.localStorage) {
            // if option was set to remember last tab.
            let lastTab = window.localStorage.getItem('rdtaTabsLast-' + selector);
            if (!isNaN(lastTab) && lastTab !== '' && lastTab !== null) {
                options.activeTabs = parseInt(lastTab);
            }
        }

        let thisClass = new this({'selector': selector, 'options': options});
        thisClass.addRequiredClasses(selector, options);
        thisClass.listenOnTabNav(selector, options);
    }// init


    /**
     * Listen on tab nav click and activate tab content.
     * 
     * @link https://stackoverflow.com/a/25248515/128761 Method 1 for delegation selection.
     * @private Do not call this, just call `init()`.
     * @param {type} selector
     * @param {type} options
     * @returns {undefined}
     */
    listenOnTabNav(selector, options) {
        let thisClass = this;
        let tabElement = document.querySelector(selector);

        document.addEventListener('click', function(event) {
            let target;
            if (event.currentTarget && event.currentTarget.activeElement) {
                target = event.currentTarget.activeElement;
            }
            if (!target) {
                return ;
            }

            let mainTabsElement = target.closest('.rd-tabs');
            if (!mainTabsElement) {
                // if not click inside main tabs element.
                return ;
            }

            let tabsNav = target.closest('.rd-tabs-nav');
            if (!tabsNav) {
                // if not click inside tabs nav.
                return ;
            }

            if (mainTabsElement === target.closest(selector)) {
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
            }
        });
    }// listenOnTabNav


}