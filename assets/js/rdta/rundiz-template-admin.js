/*! Rundiz template for admin
 * https://rundiz.com
 * @license MIT
 */


class RundizTemplateAdmin {


    /**
     * Listen to button dropdown or button group with dropdown.
     * 
     * @return {undefined}
     */
    buttonDropdown() {
        let $ = jQuery.noConflict();

        $(document).click(function () {
            // hide all dropdown menus when click outside.
            // @link https://stackoverflow.com/questions/6463486/jquery-drop-down-menu-closing-by-clicking-outside Reference.
            $('.rd-dropdown').hide();
        });

        $('.rd-button-group').each(function () {
            if (typeof ($(this).find('ul')[0]) !== 'undefined' && $(this).find('.dropdown-toggler').length === 1) {
                let $toggler = $(this).find('.dropdown-toggler');
                let $popper = $(this).find('.rd-dropdown');

                $toggler.on('click', function (e) {
                    e.stopPropagation();
                    // hide all other dropdown menus before activate current one.
                    $('.rd-dropdown').hide();
                    if (typeof ($(this).data('placement')) !== 'undefined') {
                        var $popperPlacement = $(this).data('placement');
                        $popperPlacement = $popperPlacement.replace('top left', 'top start');
                        $popperPlacement = $popperPlacement.replace('top right', 'top end');
                        $popperPlacement = $popperPlacement.replace('bottom left', 'bottom start');
                        $popperPlacement = $popperPlacement.replace('bottom right', 'bottom end');
                        $popperPlacement = $popperPlacement.replace('left top', 'left start');
                        $popperPlacement = $popperPlacement.replace('left bottom', 'left end');
                        $popperPlacement = $popperPlacement.replace('right top', 'right start');
                        $popperPlacement = $popperPlacement.replace('right bottom', 'right end');
                        $popperPlacement = $popperPlacement.replace('auto left', 'auto start');
                        $popperPlacement = $popperPlacement.replace('auto right', 'auto end');
                        $popperPlacement = $popperPlacement.replace(' ', '-');
                    } else {
                        var $popperPlacement = 'bottom-start';
                    }
                    $popper.show();
                    new Popper($toggler, $popper, {
                        placement: $popperPlacement,
                    });
                });
            }// endif;
        });
    }// buttonDropdown


    /**
     * Close alertbox.
     * 
     * Example:
     * <pre>
     * &lt;button type=&quot;button&quot; onclick=&quot;return RundizTemplateAdmin.closeAlertbox(jQuery(this));&quot;&gt;x&lt;/button&gt;
     * </pre>
     * 
     * @param {jQuery} thisObj The jQuery object `jQuery(this)`.
     * @returns {Boolean}
     */
    static closeAlertbox(thisObj) {
        let $ = jQuery.noConflict();

        thisObj.closest('.rd-alertbox').fadeOut(300, function() {
            $(this).remove();
        });

        return false;
    }// closeAlertbox


    /**
    * Activate custom input file.
    * 
    * @link http://demo.rundiz.com/nice-form-plugins/ Reference
    * @returns {undefined}
    */
    customInputFile() {
        let $ = jQuery.noConflict();

        // reset form cached after reload. this always happen in Firefox.
        $('.rd-inputfile input[type="file"]').each(function() {
            $(this).wrap('<form>').closest('form').get(0).reset();
            $(this).unwrap();
        });

        // for navigate thru web page using keyboard.
        $('.rd-inputfile').each(function() {
            $(this).on('keyup', function(e) {
                if (e.keyCode === 13) {
                    $(this).find('input[type="file"]').focus();
                    $(this).find('input[type="file"]').click();// this maybe stuck at popup blocked in Firefox. allowed popup for certain site and this will be working fine.
                }
            });
        });

        // display selected file name and remove button.
        $('.rd-inputfile input[type="file"]').change(function() {
            let names = [];
            for (let i = 0; i < $(this).get(0).files.length; ++i) {
                names.push($(this).get(0).files[i].name);
            }
            $(this).closest('.rd-inputfile').siblings('.rd-input-files-queue').text(names.join(', '));

            let resetButton = $(this).closest('.rd-inputfile').siblings('.rd-inputfile-reset-button').html();
            if (typeof(resetButton) !== 'undefined' && resetButton != '') {
                $(this).closest('.rd-inputfile').siblings('.rd-input-files-queue').append(' '+resetButton);
            }
        });
    }// customInputFile


    /**
     * Toggle all checkbox in a table.
     * 
     * Example:
     * <pre>
     * &lt;input type=&quot;checkbox&quot; onclick=&quot;RundizTemplateAdmin.dataTableCheckboxToggler(jQuery(this));&quot;&gt;
     * </pre>
     * 
     * @param {jQuery} thisObj
     * @returns {undefined}
     */
    static dataTableCheckboxToggler(thisObj) {
        let $table = thisObj.closest('table');
        $table.find('input[type="checkbox"]').prop('checked', thisObj.is(':checked'));
    }// dataTableCheckboxToggler


    /**
     * For data table responsive to toggle collapse/expand in mini screen.
     * 
     * @returns {Boolean}
     */
    dataTableToggleRow() {
        let $ = jQuery.noConflict();

        $('.toggle-row').click(function() {
            let toggleIcon = $(this).find('.faicon').data('toggle-icon');
            $(this).find('.faicon').toggleClass(toggleIcon);
            $(this).parents('tr').toggleClass('is-expanded');
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
        let $ = jQuery.noConflict();
        let $navbar = $('.rd-navbar');

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
     * 
     * @link http://demo.rundiz.com/nice-form-plugins/ Reference
     * @param {jQuery} thisObj
     * @returns {undefined}
     */
    static resetInputFile(thisObj) {
        let target = thisObj.closest('.rd-input-files-queue').siblings('.rd-inputfile').find('input[type="file"]');
        target.wrap('<form>').closest('form').get(0).reset();
        target.unwrap();

        thisObj.closest('.rd-input-files-queue').text('');

        return false;
    }// resetInputFile


    /**
     * Listen to sidebar expand/collapse toggler button.
     * 
     * This till toggle expand & collapse, not push/pull (or show/hide).
     * 
     * @returns {Boolean}
     */
    sidebarExpandToggler() {
        let $ = jQuery.noConflict();

        let $togglerButton = $('.rd-sidebar-expand-collapse-controls').find('a');
        let $target = $togglerButton.data('target');

        $togglerButton.on('click', function(e) {
            e.preventDefault();
            let toggleIcon = $(this).find('.faicon').data('toggle-icon');
            $(this).find('.faicon').toggleClass(toggleIcon);
            $($target).toggleClass('is-collapsed');
            setTimeout(function() {$('.rd-sidebar').stickySidebar('updateSticky');}, 100);
        });

        return false;
    }// sidebarExpandToggler


    /**
     * Activate sidebar sticky menu on scroll.
     * 
     * @returns {undefined}
     */
    sidebarStickyMenu() {
        let $ = jQuery.noConflict();

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
     * This will toggle push/pull (or show/hide) sidebar menu in the small screen, not expand/collapse (shorten).
     * 
     * @returns {undefined}
     */
    sidebarToggler() {
        let $ = jQuery.noConflict();

        let $togglerButton = $('.rd-sidebar-toggler');
        let $target = $togglerButton.data('target');

        $togglerButton.on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass('is-active');
            $($target).toggleClass('mini-screen-sidebar-visible');
        });
    }// sidebarToggler


    /**
     * Activate navbar smart menus
     * 
     * @returns {undefined}
     */
    smartMenusNavbar() {
        let $ = jQuery.noConflict();

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
        let $ = jQuery.noConflict();

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
jQuery(document).ready(function() {
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
    //rdtaInputFile();
});