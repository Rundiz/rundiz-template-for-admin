/*!
 Rundiz template for admin v 2.4.9dev-20250526 
License: MIT
*/
/*! Rundiz template for admin
 * https://rundiz.com
 * @license MIT
 */


class RundizTemplateAdmin {


    /**
     * @type {Boolean} Mark that is the input range already listened for `input` event or not. Default is `false` not listened.
     */
    #isListenedInputRangeEvent = false;


    /**
     * Check if jQuery is loaded or not.
     * 
     * @returns {Boolean} Return `true` if it is loaded, `false` for otherwise.
     */
    #isjQueryLoaded() {
        if (typeof(window.jQuery) === 'function' && window.jQuery) {
            return true;
        }
        return false;
    }// isjQueryLoaded


    /**
     * Listen to button dropdown or button group with dropdown.
     * 
     * This method can work on dynamically insert/update elements.
     * 
     * @return {undefined}
     */
    buttonDropdown() {
        // listen on click anywhere/outside to hide dropdown.
        document.addEventListener('click', function(event) {
            // on click anywhere in document.
            // just hide dropdown (including click in dropdown and link worked).
            // to hide only if click outside dropdown, add `if (!event.target.closest('.rd-dropdown')) {...}` condition.
            let dropdownElements = document.querySelectorAll('.rd-dropdown');
            let index = 0, length = dropdownElements.length;
            for ( ; index < length; index++) {
                dropdownElements[index].style.display = 'none';
            }
            //console.log('hide dropdown');
        });

        // listen on click dropdown toggler to activate it.
        document.addEventListener('click', function(event) {
            let thisTarget = event.currentTarget.activeElement;
            let thisParent = (typeof(thisTarget.parentElement) !== 'undefined' ? thisTarget.parentElement : {});
            if (
                thisTarget &&
                thisParent.classList.contains('rd-button-group') &&
                thisTarget.classList.contains('dropdown-toggler')
            ) {
                event.preventDefault();
                // if parent of clicking button contain `.rd-button-group` class.
                // and the clicking button contain `.dropdown-toggler` class.
                let popperPlacement;
                if (typeof(thisTarget.dataset.placement) !== 'undefined' && thisTarget.dataset.placement) {
                    popperPlacement = thisTarget.dataset.placement;
                    popperPlacement = popperPlacement.replace('top left', 'top start');
                    popperPlacement = popperPlacement.replace('top right', 'top end');
                    popperPlacement = popperPlacement.replace('bottom left', 'bottom start');
                    popperPlacement = popperPlacement.replace('bottom right', 'bottom end');
                    popperPlacement = popperPlacement.replace('left top', 'left start');
                    popperPlacement = popperPlacement.replace('left bottom', 'left end');
                    popperPlacement = popperPlacement.replace('right top', 'right start');
                    popperPlacement = popperPlacement.replace('right bottom', 'right end');
                    popperPlacement = popperPlacement.replace('auto left', 'auto start');
                    popperPlacement = popperPlacement.replace('auto right', 'auto end');
                    popperPlacement = popperPlacement.replace(' ', '-');
                } else {
                    popperPlacement = 'bottom-start';
                }

                let dropdownElement = thisParent.querySelector('.rd-dropdown');
                if (dropdownElement !== null) {
                    //console.log('activating dropdown');
                    dropdownElement.style.display = 'block';
                    Popper.createPopper(
                        thisTarget,
                        dropdownElement,
                        {
                            'placement': popperPlacement
                        }
                    );
                }
            }
        });
    }// buttonDropdown


    /**
     * Close alertbox.
     * 
     * Example:
     * <pre>
     * &lt;button type=&quot;button&quot; onclick=&quot;return RundizTemplateAdmin.closeAlertbox(jQuery(this));&quot;&gt;x&lt;/button&gt;
     * </pre>
     * Or you can use JS `this` object instead.
     * <pre>
     * &lt;button type=&quot;button&quot; onclick=&quot;return RundizTemplateAdmin.closeAlertbox(this);&quot;&gt;x&lt;/button&gt;
     * </pre>
     * 
     * @param {object} thisObj `jQuery(this)` or `this`.
     * @returns {Boolean}
     */
    static closeAlertbox(thisObj) {
        if (thisObj instanceof jQuery) {
            thisObj = thisObj[0];
        }

        if (typeof(thisObj) !== 'undefined') {
            let alertBox = thisObj.closest('.rd-alertbox');
            if (alertBox) {
                alertBox.classList.add('rd-animation', 'fade', 'fade-out');
                setTimeout(function() {
                    alertBox.parentNode.removeChild(alertBox);
                }, 400);
            }
        }

        return false;
    }// closeAlertbox


    /**
     * Activate custom input file.
     * 
     * This method can work on dynamically insert/update elements.
     * 
     * @returns {undefined}
     */
    customInputFile() {
        // reset form cached after reload. this always happen in Firefox.
        document.querySelectorAll('.rd-inputfile input[type="file"]').forEach(function(item, index) {
            // wrap with <form>
            // @link https://stackoverflow.com/a/25488670/128761 Original source code.
            let parent = item.parentElement;
            let wrap = document.createElement('form');
            wrap.appendChild(item);
            parent.appendChild(wrap);
            // reset form.
            item.closest('form').reset();
            // unwrap <form>
            item.parentNode.replaceWith(item);
        });

        // for navigate thru web page using keyboard.
        // (press tab to custom input file and then press enter for browse file.)
        document.addEventListener('keyup', function(event) {
            if (
                typeof(event.key) !== 'undefined' &&
                event.key.toLowerCase() === 'enter' &&
                event.currentTarget &&
                event.currentTarget.activeElement &&
                event.currentTarget.activeElement.classList.contains('rd-inputfile')
            ) {
                let thisTarget = event.currentTarget.activeElement;
                let itsInputFile = thisTarget.querySelector('input[type="file"]');
                if (typeof(itsInputFile) !== 'undefined' && itsInputFile) {
                    itsInputFile.focus();
                    itsInputFile.click();// this maybe stuck at popup blocked in Firefox. allowed popup for certain site and this will be working fine.
                }
            }
        });

        // display selected file name and remove button.
        document.addEventListener('change', function(event) {
            if (
                event.target.attributes &&
                event.target.attributes.type &&
                event.target.attributes.type.nodeValue === 'file' &&
                event.target.parentElement.classList.contains('rd-inputfile')
            ) {
                let inputFileElement = event.target;
                let thisParent = inputFileElement.parentElement;
                let names = [];
                for (let i = 0; i < inputFileElement.files.length; ++i) {
                    names.push(inputFileElement.files[i].name);
                }

                // get input files queue element.
                // get reset button template.
                let elementSiblings = thisParent.parentNode.children;
                for (let i = 0; i < elementSiblings.length; i++) {
                    if (elementSiblings[i].classList.contains('rd-input-files-queue') && typeof(thisFilesQueue) === 'undefined') {
                        var thisFilesQueue = elementSiblings[i];
                    }
                    if (elementSiblings[i].classList.contains('rd-inputfile-reset-button') && typeof(thisResetButton) === 'undefined') {
                        var thisResetButton = elementSiblings[i].innerHTML;
                    }
                }

                if (typeof(thisFilesQueue) !== 'undefined') {
                    thisFilesQueue.innerText = names.join(', ');
                    if (typeof(thisResetButton) !== 'undefined' && thisResetButton) {
                        thisFilesQueue.insertAdjacentHTML('beforeend', ' ' + thisResetButton);
                        inputFileElement.dispatchEvent(new CustomEvent('rdta.custominputfile.addedfilesqueue', {bubbles: true, detail: event.target}));
                    }
                }

                inputFileElement.dispatchEvent(new CustomEvent('rdta.custominputfile.change', {bubbles: true, detail: event.target}));

                inputFileElement = undefined;
                thisFilesQueue = undefined;
                thisResetButton = undefined;
                elementSiblings = undefined;
            }
        });
    }// customInputFile


    /**
     * Activate custom input range with `datalist`.
     * 
     * @since 2.4.7
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/range#validation Document reference for default `max` value.
     * @returns {undefined}
     */
    customInputRangeWithDatalist() {
        const customIRWDClass = 'rd-input-range-with-datalist';
        const customTicksContainerClass = 'rd-input-range-custom-ticks-container';
        const customTickClass = 'rd-input-range-custom-tick';

        // setup tick marks.
        document.querySelectorAll('.' + customIRWDClass)?.forEach((eachCustomRange) => {
            const eachDatalist = eachCustomRange.querySelector('datalist');
            // get input `max` attribute value. default is 100.
            let inputRangeMax = 100;
            const inputRange = eachCustomRange.querySelector('input[type="range"]');
            if (inputRange.hasAttribute('max')) {
                inputRangeMax = inputRange.getAttribute('max');
            }

            if (eachCustomRange.querySelector('.' + customTicksContainerClass)) {
                // if there is already generated ticks.
                // remove because we will re-generate.
                eachCustomRange.querySelector('.' + customTicksContainerClass).remove();
            }

            // generate custom ticks.
            // this is for fix that `<option>` tag can't position with CSS.
            let customTicksHTML = '<div class="' + customTicksContainerClass + '">';
            for (let i = 0; i < eachDatalist.options.length; i++) {
                const optionValue = parseFloat(eachDatalist?.options[i]?.value);
                customTicksHTML += '<div class="' + customTickClass + '"';
                customTicksHTML += ' data-value="' + (eachDatalist?.options[i]?.value ? optionValue : '') + '"';
                customTicksHTML += ' data-label="' + (eachDatalist?.options[i]?.label ? eachDatalist.options[i].label : '') + '"';
                customTicksHTML += ' style="';
                if (optionValue <= inputRangeMax) {
                    // if this option is not more than input range's max value.
                    customTicksHTML += 'left: ' + ((100 * parseFloat(optionValue)) / parseFloat(inputRangeMax))  + '%;';
                } else {
                    // if this option is more than input range's max value.
                    // hide it.
                    customTicksHTML += 'display: none;';
                }
                customTicksHTML += '"';// close style attribute.
                customTicksHTML += '>';// close opened tag.
                if (eachDatalist?.options[i]?.label) {
                    customTicksHTML += eachDatalist.options[i].label;
                }
                customTicksHTML += '</div>';// close each custom tick.
            }// endfor; loop datalist's options.
            customTicksHTML += '</div>';
            eachDatalist.insertAdjacentHTML('afterend', customTicksHTML);

            // get max height of each tick and set the heighest number to the container.
            // this is for fixing position absolute cause the container has height zero.
            let maxHeightTick = 0;
            eachCustomRange.querySelectorAll('.' + customTickClass)?.forEach((eachTick) => {
                const eachTickRect = eachTick.getBoundingClientRect();
                if (eachTickRect.height > maxHeightTick) {
                    maxHeightTick = eachTickRect.height;
                }
            });
            eachCustomRange.querySelector('.' + customTicksContainerClass).style.height = maxHeightTick + 'px';
            // do not automatically append the `output` HTML element to let dev design their style.
        });
        // end setup tick marks.

        if (false === this.#isListenedInputRangeEvent) {
            // if not listened the input range event yet.
            // listen on slide the input range and show its value to `output` HTML element.
            document.addEventListener('input', (event) => {
                this.#isListenedInputRangeEvent = true;
                let thisInput = event.target;
                if (!thisInput.closest('.' + customIRWDClass)) {
                    return ;
                }
                const customIRWDContainer = thisInput.closest('.' + customIRWDClass);
                const outputHTML = customIRWDContainer.querySelector('output');
                if (outputHTML) {
                    // if there is `output` HTML in the custom input range.
                    outputHTML.value = thisInput.value;
                }
            });
        }
    }// customInputRangeWithDatalist


    /**
     * Toggle all checkbox in a table.
     * 
     * Example:
     * <pre>
     * &lt;input type=&quot;checkbox&quot; onclick=&quot;RundizTemplateAdmin.dataTableCheckboxToggler(jQuery(this));&quot;&gt;
     * </pre>
     * Or you can use JS `this` object instead.
     * <pre>
     * &lt;input type=&quot;checkbox&quot; onclick=&quot;RundizTemplateAdmin.dataTableCheckboxToggler(this);&quot;&gt;
     * </pre>
     * 
     * @param {object} thisObj `jQuery(this)` or `this`.
     * @returns {undefined}
     */
    static dataTableCheckboxToggler(thisObj) {
        if (thisObj instanceof jQuery) {
            thisObj = thisObj[0];
        }

        if (typeof(thisObj) !== 'undefined') {
            let table = thisObj.closest('table');
            let thisChecked = thisObj.checked;
            table.querySelectorAll('input[type="checkbox"]').forEach(function(item, index) {
                item.checked = thisChecked;
            });
        }
    }// dataTableCheckboxToggler


    /**
     * For data table responsive to toggle collapse/expand in mini screen.
     * 
     * This method can work on dynamically insert/update elements.
     * 
     * @returns {Boolean}
     */
    dataTableToggleRow() {
        if (!this.#isjQueryLoaded()) {
            // if jQuery is not loaded.
            console.warn('jQuery is not loaded.');
            return ;
        }
        let $ = jQuery.noConflict();

        document.addEventListener('click', function(event) {
            if (
                event.currentTarget.activeElement &&
                event.currentTarget.activeElement.classList.contains('toggle-row')
            ) {
                let thisElement = event.currentTarget.activeElement;
                let toggleIcons = (thisElement ? thisElement.querySelector('.faicon').dataset.toggleIcon : '');
                if (toggleIcons) {
                    $(thisElement.querySelectorAll('.faicon')).toggleClass(toggleIcons);// non jQuery cannot toggle multiple class names.
                    thisElement.closest('tr').classList.toggle('is-expanded');
                }
            }
        });

        return false;
    }// dataTableToggleRow


    /**
     * Hot fix long sidebar submenus is under top navbar.
     * 
     * @link https://github.com/vadikom/smartmenus/issues/95
     * @return {undefined}
     */
    hotfixLongSidebarSubmenus() {
        if (!this.#isjQueryLoaded()) {
            // if jQuery is not loaded.
            console.warn('jQuery is not loaded.');
            return ;
        }
        let $ = jQuery.noConflict();

        let $navbar = $('.rd-navbar');
        if (!$navbar || $('.rd-sidebar-item-list').length <= 0) {
            // if not found sidebar.
            return ;
        }

        $('.rd-sidebar-item-list').on({
            'show.smapi': function (e, menu) {
                let obj = $(this).data('smartmenus');
                if (!obj.isCollapsible()) {
                    if ($(menu).offset().top - $(window).scrollTop() < $navbar.outerHeight()) {
                        $navbar.stop(true).animate({top: -100}, 250);
                    }
                }
            },
            'hideAll.smapi': function (e, menu) {
                let obj = $(this).data('smartmenus');
                if (!obj.isCollapsible()) {
                    $navbar.stop(true).animate({top: 0}, 250);
                }
            }
        });
    }// hotfixLongSidebarSubmenus


    /**
     * Reset input file.
     * 
     * Example:
     * <pre>
     * &lt;button type=&quot;button&quot; onclick=&quot;return RundizTemplateAdmin.resetInputFile(jQuery(this));&quot;&gt;x&lt;/button&gt;
     * </pre>
     * Or you can use JS `this` object instead.
     * <pre>
     * &lt;button type=&quot;button&quot; onclick=&quot;return RundizTemplateAdmin.resetInputFile(this);&quot;&gt;x&lt;/button&gt;
     * </pre>
     * 
     * @param {object} thisObj `jQuery(this)` or `this`.
     * @returns {undefined}
     */
    static resetInputFile(thisObj) {
        if (thisObj instanceof jQuery) {
            thisObj = thisObj[0];
        }

        if (typeof(thisObj) !== 'undefined') {
            let thisFilesQueue = thisObj.closest('.rd-input-files-queue');
            let thisSiblings = (thisFilesQueue.parentElement ? thisFilesQueue.parentElement.children : []);
            let thisRdInputFile;
            for (let i = 0; i < thisSiblings.length; i++) {
                if (thisSiblings[i].classList.contains('rd-inputfile')) {
                    thisRdInputFile = thisSiblings[i];
                    break;
                }
            }

            if (thisRdInputFile) {
                let target = thisRdInputFile.querySelector('input[type="file"]');
                let parent = target.parentElement;
                let wrap = document.createElement('form');
                wrap.appendChild(target);
                parent.appendChild(wrap);
                // reset form.
                target.closest('form').reset();
                // unwrap <form>
                target.parentNode.replaceWith(target);
            }
        }

        thisObj.closest('.rd-input-files-queue').innerHTML = '';

        return false;
    }// resetInputFile


    /**
     * Listen to sidebar expand/collapse toggler button.
     * 
     * This method can work on dynamically insert/update elements.<br>
     * This till toggle expand & collapse, not push/pull (or show/hide).
     * 
     * @returns {Boolean}
     */
    sidebarExpandToggler() {
        if (!this.#isjQueryLoaded()) {
            // if jQuery is not loaded.
            console.warn('jQuery is not loaded.');
            return ;
        }
        let $ = jQuery.noConflict();

        let togglerButton = document.querySelector('.rd-sidebar-expand-collapse-controls a');
        let dataTarget = (togglerButton ? togglerButton.dataset.target : '');

        if (!dataTarget) {
            return false;
        }

        document.addEventListener('click', (event) => {
            let target = event.target;
            if (target.closest('.rd-sidebar-expand-collapse-controls a')) {
                target = target.closest('.rd-sidebar-expand-collapse-controls a');
                event.preventDefault();

                // grab toggle icons and toggle the icons.
                let toggleIcon = togglerButton.querySelector('.faicon').dataset.toggleIcon;
                $(togglerButton.querySelector('.faicon')).toggleClass(toggleIcon);// non jQuery cannot toggle multiple class names.
                // toggle `is-collapse` class.
                document.querySelector(dataTarget).classList.toggle('is-collapsed');
                // update sticky sidebar.
                setTimeout(function() {
                    $('.rd-sidebar').stickySidebar('updateSticky');// require jQuery.
                }, 100);
            }
        });

        return false;
    }// sidebarExpandToggler


    /**
     * Activate sidebar sticky menu on scroll.
     * 
     * @returns {undefined}
     */
    sidebarStickyMenu() {
        if (!this.#isjQueryLoaded()) {
            // if jQuery is not loaded.
            console.warn('jQuery is not loaded.');
            return ;
        }
        let $ = jQuery.noConflict();

        if ($('.rd-sidebar').length <= 0) {
            // if not found sidebar.
            return ;
        }

        $('.rd-sidebar').stickySidebar({
            bottomSpacing: 50,// fix Firefox scroll down and auto jump to top.
            containerSelector: '.rd-page-wrapper',
            innerWrapperSelector: '.rd-sidebar-inner',
            minWidth: 999,// minimum sidebar breakpoint.
            resizeSensor: true,
            topSpacing: 50,// should be header/navbar height that is not on small screen (small screen header height is 100).
        });
    }// sidebarStickyMenu


    /**
     * Listen to sidebar toggler button (small screen).
     * 
     * This method can work on dynamically insert/update elements.<br>
     * This will toggle push/pull (or show/hide) sidebar menu in the small screen, not expand/collapse (shorten).
     * 
     * @returns {Boolean}
     */
    sidebarToggler() {
        let togglerButton = document.querySelector('.rd-sidebar-toggler');
        let dataTarget = (togglerButton ? togglerButton.dataset.target : '');

        if (!dataTarget) {
            return false;
        }

        document.addEventListener('click', (event) => {
            let target = event.target;
            if (target.closest('.rd-sidebar-toggler')) {
                target = target.closest('.rd-sidebar-toggler');
                event.preventDefault();

                target.classList.toggle('is-active');
                document.querySelector(dataTarget).classList.toggle('mini-screen-sidebar-visible');
            }
        });
    }// sidebarToggler


    /**
     * Activate navbar smart menus
     * 
     * @returns {undefined}
     */
    smartMenusNavbar() {
        if (!this.#isjQueryLoaded()) {
            // if jQuery is not loaded.
            console.warn('jQuery is not loaded.');
            return ;
        }
        let $ = jQuery.noConflict();

        if ($('.sm-rdta.navbar').length <= 0) {
            // if not found navbar.
            return ;
        }

        // tweak to show only one menu at a time. ( https://www.smartmenus.org/forums/topic/accordion-failed/#post-2660 )
        // this problem occur on small screen navbar menu. so, this can fix it.
        $('.sm-rdta.navbar').bind('click.smapi', function (e, item) {
            let obj = $(this).data('smartmenus');
            if (obj.isCollapsible()) {
                let $item = $(item),
                    $sub = $item.dataSM('sub');
                if ($sub && !$sub.is(':visible')) {
                    obj.itemActivate($item, true);
                    return false;
                }
            }
        });

        // tweak to let sub menu dropdown works on small screen. (it doesn't work by default.)
        $('.sm-rdta.navbar').bind('show.smapi', function(e, item) {
            $(item).css('position', 'absolute');
            // do not align my submenu position.
            $(item).css('left', '');
            $(item).css('top', '');
        });
        $('.sm-rdta.navbar').bind('hide.smapi', function(e, item) {
            $(item).css('position', '');
        });

        // activate smartmenus on navbar.
        $('.sm-rdta.navbar').smartmenus({
            collapsibleHideDuration: 0,
            collapsibleHideFunction: null,
            collapsibleShowDuration: 0,
            collapsibleShowFunction: 0,
            hideDuration: 0,
            hideFunction: null,
            keepHighlighted: false,
            markCurrentItem: false,
            markCurrentTree: false,
            noMouseOver: true,
            showDuration: 0,
            showFunction: null,
            subIndicators: false,
        });

        $('.sm-rdta.navbar').on('show.smapi', function() {
            // navbar submenu on show
            // hide sidebar on small screen.
            // see reference on `rdtaSidebarToggler()` function.
            let $togglerButton = $('.rd-sidebar-toggler');
            let $target = $togglerButton.data('target');

            $togglerButton.removeClass('is-active');
            $($target).removeClass('mini-screen-sidebar-visible');
        });
    }// smartMenusNavbar


    /**
     * Activate sidebar smart menus.
     * 
     * @returns {undefined}
     */
    smartMenusSidebar() {
        if (!this.#isjQueryLoaded()) {
            // if jQuery is not loaded.
            console.warn('jQuery is not loaded.');
            return ;
        }
        let $ = jQuery.noConflict();

        if ($('.sm-vertical').length <= 0) {
            // if not found sidebar.
            return ;
        }

        $('.sm-vertical').smartmenus({
            markCurrentItem: true,
            markCurrentTree: true,
            noMouseOver: true,
            subIndicatorsPos: 'append',
            subMenusSubOffsetY: -1,// border top contain 1 px
        });
    }// smartMenusSidebar


}// RundizTemplateAdmin


// run on page loaded ----------------------------------------------------------------------
document.addEventListener('DOMContentLoaded',function() {
    let rdtaClass = new RundizTemplateAdmin();
    // activate navbar smart menus.
    rdtaClass.smartMenusNavbar();

    // sidebar functions -----------------------------------------------
    // activate sidebar smart menus.
    rdtaClass.smartMenusSidebar();
    // listen to sidebar menu toggler button for small screen.
    rdtaClass.sidebarToggler();
    // listen to sidebar expand/collapse toggler button.
    rdtaClass.sidebarExpandToggler();
    // activate sidebar sticky menu.
    rdtaClass.sidebarStickyMenu();
    // end sidebar functions ------------------------------------------

    // hotfix long sidebar sub menus.
    rdtaClass.hotfixLongSidebarSubmenus();

    // listen to button with dropdown.
    rdtaClass.buttonDropdown();

    // listen to data table responsive toggle collapse/expand.
    rdtaClass.dataTableToggleRow();

    // activate custom input file.
    rdtaClass.customInputFile();
    // activate custom input range WITH datalist.
    rdtaClass.customInputRangeWithDatalist();
    //rdtaInputFile();
});