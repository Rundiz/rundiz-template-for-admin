/*!
 Rundiz template for admin v 2.3.0 
License: MIT
*/
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
     * Activate tab content.
     * 
     * @private This method was called from `addRequiredClasses()`, `listenOnTabNav()`.
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
     * Add required CSS classes.
     * 
     * @private Do not call this, just call `init()`.
     * @param {object} options
     * @returns {undefined}
     */
    addRequiredClasses(options) {
        let thisClass = this;

        document.querySelectorAll(thisClass.selector).forEach(function(item, index) {
            // start looping each selector.

            // add required class name.
            item.classList.add('rd-tabs');
            if (item.querySelector('.rd-tabs > ul')) {
                item.querySelector('.rd-tabs > ul').classList.add('rd-tabs-nav');
            } else if (item.querySelector('.rd-tabs > ol')) {
                item.querySelector('.rd-tabs > ol').classList.add('rd-tabs-nav');
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
        thisClass.addRequiredClasses(options);
        thisClass.listenOnTabNav(options);

        // set tab navbar horizontal scroll if overflow. this must run after set activate tab content.
        thisClass.setTabNavHorizontalScroll();
        thisClass.listenWindowResize();
        thisClass.listenClickOnTabScroll();
    }// init


    /**
     * Listen click on tabs nav scroll. 
     * 
     * Tabs nav scroll will be visible on tabs size is overflow visible width.
     * 
     * @since 2.2.1
     * @private This method was called from `init()`.
     * @returns {undefined}
     */
    listenClickOnTabScroll() {
        let thisClass = this;

        document.addEventListener('click', (event) => {
            let thisLink;
            thisLink = event.currentTarget.activeElement;
            if (!thisLink) {
                thisLink = event.target;
            }

            let rdTabsNavScroll = thisLink.parentNode;
            let rdTabs = rdTabsNavScroll.closest('.rd-tabs');
            if (
                (
                    rdTabsNavScroll.classList.contains('rd-tabs-nav-hscroll-left') ||
                    rdTabsNavScroll.classList.contains('rd-tabs-nav-hscroll-right')
                ) &&
                rdTabs === rdTabsNavScroll.closest(thisClass.selector)
            ) {
                // if user is really clicked on tabs nav scroll (horizontal).
                // prevent follow link.
                event.preventDefault();

                let tabsNav = rdTabs.querySelector('.rd-tabs-nav');
                let tabsNavLeftPosition = tabsNav.style.transform.replace(/[^\-\d.]/g, '');
                if ('' === tabsNavLeftPosition) {
                    tabsNavLeftPosition = 0;
                } else {
                    tabsNavLeftPosition = parseInt(tabsNavLeftPosition);
                }

                if (rdTabsNavScroll.classList.contains('rd-tabs-nav-hscroll-left')) {
                    // if user clicked on tabs nav left (<).
                    let expectOffsetLeft = (tabsNavLeftPosition + parseInt(tabsNav.offsetWidth));
                    if (expectOffsetLeft > 0) {
                        expectOffsetLeft = 0;
                    }
                    let firstTabNavItem;
                    let totalVisibleTabsCounted = 1;
                    for (let i = (tabsNav.children.length - 1); i >= 0; i--) {
                        //console.log(tabsNav.children[i].innerText, tabsNav.children[i].offsetLeft);
                        if (parseInt(tabsNav.children[i].offsetLeft) > Math.abs(expectOffsetLeft)) {
                            firstTabNavItem = tabsNav.children[i];
                        } else {
                            break;
                        }
                        totalVisibleTabsCounted++;
                    }// endfor;
                    //console.log(firstTabNavItem.outerHTML, firstTabNavItem, firstTabNavItem.offsetLeft);

                    let newLeftPosition = firstTabNavItem.offsetLeft;
                    if (totalVisibleTabsCounted >= tabsNav.children.length) {
                        newLeftPosition = 0;
                    } else {
                        newLeftPosition = '-' + newLeftPosition;
                    }
                    tabsNav.style.transform = 'translateX(' + newLeftPosition + 'px)';
                } else if (rdTabsNavScroll.classList.contains('rd-tabs-nav-hscroll-right')) {
                    // if user clicked on tabs nav right (>).
                    let lastTabNavItem;
                    let totalVisibleTabsCounted = 1;
                    for (let i = 0; i < tabsNav.children.length; i++) {
                        //console.log('children offset left:', tabsNav.children[i], tabsNav.children[i].offsetLeft);
                        if ((tabsNav.children[i].offsetLeft + tabsNavLeftPosition) < tabsNav.offsetWidth === true) {
                            lastTabNavItem = tabsNav.children[i];
                        } else {
                            break;
                        }
                        totalVisibleTabsCounted++;
                    }// endfor;
                    //console.log('last visible: ', lastTabNavItem);

                    if (totalVisibleTabsCounted <= tabsNav.children.length) {
                        // if counted for visible tabs is less than all tabs. still be able to work, otherwise don't have to work anymore.
                        tabsNav.style.transform = 'translateX(-' + lastTabNavItem.offsetLeft + 'px)';
                    }
                }// endif user clicked on < or >.
            }// endif; user is really click on tabs nav scroll.
        });
    }// listenClickOnTabScroll


    /**
     * Listen on tab nav click and activate tab content.
     * 
     * @link https://stackoverflow.com/a/25248515/128761 Method 1 for delegation selection.
     * @private Do not call this, just call `init()`.
     * @param {object} options
     * @returns {undefined}
     */
    listenOnTabNav(options) {
        let thisClass = this;
        let tabElement = document.querySelector(this.selector);

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

            if (mainTabsElement === target.closest(thisClass.selector)) {
                event.preventDefault();
                let targetTab = '';
                if (target.dataset.targettab) {
                    targetTab = target.dataset.targettab;
                } else if (target.hash) {
                    targetTab = target.hash;
                }

                if (target.getAttribute('href') && target.getAttribute('href').charAt(0) !== '#' && !target.hash) {
                    thisClass.ajaxTabContent(target.getAttribute('href'), target.closest(thisClass.selector), targetTab)
                }

                thisClass.activateTabContent(target.closest(thisClass.selector), targetTab);
            }
        });
    }// listenOnTabNav


    /**
     * Listen on window resize and do the task.
     * 
     * @since 2.2.1
     * @private This method was called from `init()`.
     * @returns {undefined}
     */
    listenWindowResize() {
        let thisClass = this;
        window.addEventListener('resize', (event) => {
            thisClass.setTabNavHorizontalScroll();
        });
    }// listenWindowResize


    /**
     * Set tabs nav horizontal scroll.
     * 
     * @since 2.2.1
     * @private This method was called from `init()`, `listenWindowResize()`.
     * @returns {undefined}
     */
    setTabNavHorizontalScroll() {
        let thisClass = this;
        const navContainerClass = 'rd-tabs-nav-container';
        const navWrapperClass = 'rd-tabs-nav-wrapper';
        const navWrapperBottomLineClass = 'rd-tabs-nav-wrapper-bottomline';

        document.querySelectorAll(thisClass.selector).forEach((item, index) => {
            // loop each selector. `item` is now each `.rd-tabs` main element.
            if (!item.classList.contains('tabs-vertical')) {
                // if this main tab element is NOT vertical tabs.
                let tabsNav = item.querySelector('.rd-tabs-nav');
                let tabsNavVisibleWidth = tabsNav.offsetWidth;
                let totalTabsNavWIdth = 0;
                item.querySelectorAll('.rd-tabs-nav > *').forEach((listItem) => {
                    let computed = getComputedStyle(listItem);
                    let listItemWidth = (
                        parseInt(listItem.getBoundingClientRect().width)
                        + parseInt(computed.marginLeft)
                        + parseInt(computed.marginRight)
                    );
                    totalTabsNavWIdth = (
                        (parseInt(totalTabsNavWIdth) + listItemWidth)
                    );
                });

                if (totalTabsNavWIdth > tabsNavVisibleWidth) {
                    // if real nav width (included all items) is wider than visible width.
                    if (!item.querySelector('.' + navContainerClass)) {
                        // if tabs nav container is not exists.
                        // make tabs navbar inside container.
                        let tabsNavContainer = document.createElement('div');
                        tabsNavContainer.classList.add(navContainerClass);
                        tabsNav.parentNode.insertBefore(tabsNavContainer, tabsNav);
                        tabsNavContainer.appendChild(tabsNav);
                    }

                    if (!item.querySelector('.' + navWrapperClass)) {
                        // if tabs nav wrapper is not exists.
                        // wrap tabs navbar inside wrapper to hide overflow.
                        let tabsNavWrapperBottomLine = document.createElement('div');
                        tabsNavWrapperBottomLine.classList.add(navWrapperBottomLineClass);
                        tabsNav.parentNode.insertBefore(tabsNavWrapperBottomLine, tabsNav);
                        tabsNavWrapperBottomLine.appendChild(tabsNav);
                        let tabsNavWrapper = document.createElement('div');
                        tabsNavWrapper.classList.add(navWrapperClass);
                        tabsNavWrapperBottomLine.parentNode.insertBefore(tabsNavWrapper, tabsNavWrapperBottomLine);
                        tabsNavWrapper.appendChild(tabsNavWrapperBottomLine);
                    }

                    let tabsNavContainer = item.querySelector('.' + navContainerClass);

                    // add horizontal scroll buttons.
                    if (tabsNavContainer) {
                        if (!tabsNavContainer.querySelector('.rd-tabs-nav-hscroll-left')) {
                            let scrollLeftElement = '<div class="rd-tabs-nav-hscroll-left"><a href="#"><i class="fas fa-angle-left"></i></a></div>';
                            tabsNavContainer.insertAdjacentHTML('afterbegin', scrollLeftElement);
                        }
                        if (!tabsNavContainer.querySelector('.rd-tabs-nav-hscroll-right')) {
                            let scrollRightElement = '<div class="rd-tabs-nav-hscroll-right"><a href="#"><i class="fas fa-angle-right"></i></a></div>';
                            tabsNavContainer.insertAdjacentHTML('beforeend', scrollRightElement);
                        }
                    }
                    // end add horizontal scroll buttons.

                    tabsNav.classList.add('is-overflow-x');
                } else {
                    // if real nav width (included all items) is not wider than visible width.
                    let tabsNavContainer = item.querySelector('.' + navContainerClass);

                    // remove horizontal scroll buttons.
                    if (tabsNavContainer) {
                        if (tabsNavContainer.querySelector('.rd-tabs-nav-hscroll-left')) {
                            tabsNavContainer.querySelector('.rd-tabs-nav-hscroll-left').remove();
                        }
                        if (tabsNavContainer.querySelector('.rd-tabs-nav-hscroll-right')) {
                            tabsNavContainer.querySelector('.rd-tabs-nav-hscroll-right').remove();
                        }
                    }
                    // end remove horizontal scroll buttons.

                    if (item.querySelector('.' + navWrapperClass)) {
                        // if tabs nav wrapper is exists.
                        // unwrap it. ( https://stackoverflow.com/a/48573634/128761 )
                        let tabsNavWrapperBottomLine = item.querySelector('.' + navWrapperBottomLineClass);
                        tabsNavWrapperBottomLine.replaceWith(...tabsNavWrapperBottomLine.childNodes);
                        let tabsNavWrapper = item.querySelector('.' + navWrapperClass);
                        tabsNavWrapper.replaceWith(...tabsNavWrapper.childNodes);
                    }

                    if (item.querySelector('.' + navContainerClass)) {
                        // if tabs nav container is exists.
                        // unwrap it. ( https://stackoverflow.com/a/48573634/128761 )
                        let tabsNavContainer = item.querySelector('.' + navContainerClass);
                        tabsNavContainer.replaceWith(...tabsNavContainer.childNodes);
                    }

                    tabsNav.classList.remove('is-overflow-x');
                }// endif total nav tabs is wider than visible width
            } else {
                // if this main tab element is vertical tabs.
            }// endif .rd-tabs not contain vertical class.
        });
    }// setTabNavHorizontalScroll


}