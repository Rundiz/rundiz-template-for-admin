/**
 * Rundiz template for admin
 */


/**
 * Listen to button dropdown or button group with dropdown.
 * 
 * @returns {undefined}
 */
function rdtaButtonDropdown() {
    var $ = jQuery.noConflict();

    $(document).click(function(){
        // hide all dropdown menus when click outside.
        // @link https://stackoverflow.com/questions/6463486/jquery-drop-down-menu-closing-by-clicking-outside Reference.
        $('.rd-dropdown').hide();
    });

    $('.rd-button-group').each(function() {
        if (typeof($(this).find('ul')[0]) !== 'undefined' && $(this).find('.dropdown-toggler').length === 1) {
            var $toggler = $(this).find('.dropdown-toggler');
            var $content = $(this).find('ul')[0].outerHTML;

            var $popper = $(this).find('.rd-dropdown');

            $toggler.on('click', function(e) {
                e.stopPropagation();
                // hide all other dropdown menus before activate current one.
                $('.rd-dropdown').hide();
                if (typeof($(this).data('placement')) !== 'undefined') {
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
}// rdtaButtonDropdown


/**
 * Close alertbox.
 * 
 * Example:
 * <pre>
 * &lt;button type=&quot;button&quot; onclick=&quot;return rdtaCloseAlertbox(jQuery(this));&quot;&gt;&lt;/button&gt;
 * </pre>
 * 
 * @param {jQuery} thisObj The jQuery object `jQuery(this)`.
 * @returns {Boolean}
 */
function rdtaCloseAlertbox(thisObj) {
    thisObj.closest('.rd-alertbox').fadeOut(300, function() {
        $(this).remove();
    });

    return false;
}// rdtaCloseAlertbox


/**
 * Toggle all checkbox in a table.
 * 
 * Example:
 * <pre>
 * &lt;input type=&quot;checkbox&quot; onclick=&quot;rdtaDataTableCheckboxToggle(jQuery(this));&quot;&gt;
 * </pre>
 * 
 * @param {jQuery} thisObj
 * @returns {undefined}
 */
function rdtaDataTableCheckboxToggle(thisObj) {
    var $table = thisObj.closest('table');
    $table.find('input[type="checkbox"]').prop('checked', thisObj.is(':checked'));
}// rdtaDataTableCheckboxToggle


/**
 * For data table responsive to toggle collapse/expand in mini screen.
 * 
 * @returns {Boolean}
 */
function rdtaDataTableToggleRow() {
    var $ = jQuery.noConflict();

    $('.toggle-row').click(function() {
        var toggleIcon = $(this).find('.faicon').data('toggle-icon');
        $(this).find('.faicon').toggleClass(toggleIcon);
        $(this).parents('tr').toggleClass('is-expanded');
    });

    return false;
}// rdtaDataTableToggleRow


/**
 * Activate custom input file.
 * 
 * @link http://demo.rundiz.com/nice-form-plugins/ Reference
 * @returns {undefined}
 */
function rdtaInputFile() {
    var $ = jQuery.noConflict();

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

    $('.rd-inputfile input[type="file"]').change(function() {
        var names = [];
        for (var i = 0; i < $(this).get(0).files.length; ++i) {
            names.push($(this).get(0).files[i].name);
        }
        $(this).closest('.rd-inputfile').siblings('.rd-input-files-queue').text(names.join(', '));

        var resetButton = $(this).closest('.rd-inputfile').siblings('.rd-inputfile-reset-button').html();
        if (typeof(resetButton) !== 'undefined' && resetButton != '') {
            $(this).closest('.rd-inputfile').siblings('.rd-input-files-queue').append(' '+resetButton);
        }
    });
}// rdtaInputFile


/**
 * Activate navbar smart menus
 * 
 * @returns {undefined}
 */
function rdtaNavbarSmartMenus() {
    var $ = jQuery.noConflict();

    // tweak to show only one menu at a time. ( https://www.smartmenus.org/forums/topic/accordion-failed/#post-2660 )
    $('.sm-rdta.navbar').bind('click.smapi', function (e, item) {
        var obj = $(this).data('smartmenus');
        if (obj.isCollapsible()) {
            var $item = $(item),
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
}// rdtaNavbarSmartMenus


/**
 * Reset input file.
 * 
 * @link http://demo.rundiz.com/nice-form-plugins/ Reference
 * @param {jQuery} thisObj
 * @returns {undefined}
 */
function rdtaResetInputFile(thisObj) {
    var $ = jQuery.noConflict();

    var target = thisObj.closest('.rd-input-files-queue').siblings('.rd-inputfile').find('input[type="file"]');
    target.wrap('<form>').closest('form').get(0).reset();
    target.unwrap();

    thisObj.closest('.rd-input-files-queue').text('');

    return false;
}// rdtaResetInputFile


/**
 * Listen to sidebar expand/collapse toggler button.
 * 
 * This till toggle expand & collapse, not push/pull (or show/hide).
 * 
 * @returns {Boolean}
 */
function rdtaSidebarExpandToggler() {
    var $ = jQuery.noConflict();

    var $togglerButton = $('.rd-sidebar-expand-collapse-controls').find('a');
    var $target = $togglerButton.data('target');

    $togglerButton.on('click', function(e) {
        e.preventDefault();
        var toggleIcon = $(this).find('.faicon').data('toggle-icon');
        $(this).find('.faicon').toggleClass(toggleIcon);
        $($target).toggleClass('is-collapsed');
        setTimeout(function() {$('.rd-sidebar').stickySidebar('updateSticky');}, 100);
    });

    return false;
}// rdtaSidebarExpandToggler


/**
 * Activate sidebar menu sticky on scroll.
 * 
 * @todo [rundiz-template-for-admin] add scroll sticky menu.
 * @returns {undefined}
 */
function rdtaSidebarMenuSticky() {
    var $ = jQuery.noConflict();

    $('.rd-sidebar').stickySidebar({
        bottomSpacing: 50,// fix Firefox scroll down and auto jump to top.
        containerSelector: '.rd-page-wrapper',
        innerWrapperSelector: '.rd-sidebar-inner',
        minWidth: 999,// minimum sidebar breakpoint.
        resizeSensor: true,
        topSpacing: 50,// should be header/navbar height that is not on small screen (small screen header height is 100).
    });
}// rdtaSidebarMenuSticky


/**
 * Activate sidebar smart menus.
 * 
 * @returns {undefined}
 */
function rdtaSidebarSmartMenus() {
    var $ = jQuery.noConflict();

    $('.sm-vertical').smartmenus({
        markCurrentItem: true,
        markCurrentTree: true,
        noMouseOver: true,
        subIndicatorsPos: 'append',
        subMenusSubOffsetY: -1,// border top contain 1 px
    });
}// rdtaSidebarSmartMenus


/**
 * Listen to sidebar toggler button.
 * 
 * This will toggle push/pull (or show/hide) sidebar menu in the small screen, not expand/collapse (shorten).
 * 
 * @returns {undefined}
 */
function rdtaSidebarToggler() {
    var $ = jQuery.noConflict();

    var $togglerButton = $('.rd-sidebar-toggler');
    var $target = $togglerButton.data('target');

    $togglerButton.on('click', function(e) {
        e.preventDefault();
        $(this).toggleClass('is-active');
        $($target).toggleClass('mini-screen-sidebar-visible');
    });
}// rdtaSidebarToggler


// run on page loaded ----------------------------------------------------------------------
jQuery(document).ready(function($) {
    // activate navbar smart menus.
    rdtaNavbarSmartMenus();

    // listen to sidebar menu toggler button for small screen.
    rdtaSidebarToggler();
    // listen to sidebar expand/collapse toggler button.
    rdtaSidebarExpandToggler();
    // activate sidebar menu sticky.
    rdtaSidebarMenuSticky();
    // activate sidebar smart menus.
    rdtaSidebarSmartMenus();

    // listen to button with dropdown.
    rdtaButtonDropdown();

    // listen to data table responsive toggle collapse/expand.
    rdtaDataTableToggleRow();

    // activate custom input file.
    rdtaInputFile();
});