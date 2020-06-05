/*! Rundiz template for admin v 2.1.2 
License: MIT*//**
 * RDTA Tooltips
 */


class RDTATooltips {


    constructor() {
        this.tippyInstance;
        this.tippyInstances = [];
    }// constructor


    /**
     * Get latest tippy.js instance.
     */
    getInstance() {
        return this.tippyInstance;
    }// getInstance


    /**
     * Get all tippy.js instances.
     */
    getInstances() {
        return this.tippyInstances;
    }// getInstances


    /**
     * Initialize the tooltip.
     * 
     * @param {string} selector
     * @param {object} options
     * @returns {object} Return this class instance.
     */
    static init(selector, options) {
        let thisClass = new this();
        let originalOptions = options;

        document.querySelectorAll(selector).forEach(function(item, index) {
            let tooltipOptions = {};
            tooltipOptions.content = item.title;
            item.removeAttribute('title');
            tooltipOptions.template = '<div class="tooltip rd-tooltips" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>';

            if (item.dataset.placement) {
                tooltipOptions.placement = item.dataset.placement;
            }

            if (typeof(originalOptions) === 'object') {
                options = Object.assign(tooltipOptions, originalOptions);
            } else {
                options = tooltipOptions;
            }

            thisClass.tippyInstance = tippy(
                item, 
                options
            );
            thisClass.tippyInstances.push(thisClass.tippyInstance);
        });

        return thisClass;
    }// init


}