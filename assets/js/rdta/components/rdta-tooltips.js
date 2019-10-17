/*! Rundiz template for admin v 2.0.15 
License: MIT*//**
 * RDTA Tooltips
 */


class RDTATooltips {


    /**
     * Initialize the tooltip.
     * 
     * @param {string} selector
     * @param {object} options
     * @returns {undefined}
     */
    static init(selector, options) {
        let originalOptions = options;

        document.querySelectorAll(selector).forEach(function(item, index) {
            let tooltipOptions = {};
            tooltipOptions.title = item.title;
            tooltipOptions.template = '<div class="tooltip rd-tooltips" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>';

            if (item.dataset.placement) {
                tooltipOptions.placement = item.dataset.placement;
            }

            if (typeof(originalOptions) === 'object') {
                options = Object.assign(tooltipOptions, originalOptions);
            } else {
                options = tooltipOptions;
            }

            new Tooltip(
                item, 
                options
            );
        });
    }// init


}