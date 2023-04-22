/**
 * JS for document (preview) file.
 * View whole page source code.
 * 
 * @license http://opensource.org/licenses/MIT MIT
 */


class ViewSource {


    /**
     * @type String Selector for exclude element from preview.
     */
    excludePreviewSelector = '.exclude-preview';


    /**
     * @type object The HTML DOM document object.
     */
    htmlDoc;


    /**
     * @type String The preview source code placeholder selector.
     */
    previewSrcPlaceholderSelector = '.preview-source';


    /**
     * @type object The object for `ViewTargetSource` class.
     */
    viewTargetSourceObj = {};


    /**
     * Escape HTML
     * 
     * @link https://stackoverflow.com/a/6234804/128761 Original source code.
     * @param {string} unsafe HTML string
     * @returns {unresolved}
     */
    #escapeHTML(unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }// escapeHTML


    /**
     * Check if preview source placeholder is for selected target only or not.
     * 
     * @returns {Boolean} Return `true` if it is for selected target only, `false` for otherwise.
     */
    #isPreviewForTarget() {
        const previewE = document.querySelector(this.previewSrcPlaceholderSelector);
        const targetSrc = previewE.dataset?.targetSrc;

        if (typeof(targetSrc) === 'string' && targetSrc) {
            return true;
        }
        return false;
    }// isPreviewForTarget


    /**
     * Remove everything that contain `.exclude-preview` HTML class attribute.
     * 
     * @returns {undefined}
     */
    #removeExcludePreview() {
        if (this.#isPreviewForTarget()) {
            this.viewTargetSourceObj.removeExcludePreview();
        } else {
            const allExclude = this.htmlDoc.querySelectorAll(this.excludePreviewSelector);

            if (allExclude) {
                allExclude.forEach((item) => {
                    item.remove();
                });
            }

            // also remove preview source placeholder itself.
            this.htmlDoc.querySelectorAll(this.previewSrcPlaceholderSelector)?.forEach((item) => {
                item.remove();
            });
        }
    }// removeExcludePreview


    /**
     * Render preview source code.
     * 
     * @returns {undefined}
     */
    #renderPreview() {
        if (this.#isPreviewForTarget()) {
            this.viewTargetSourceObj.renderPreview();
        } else {
            const previewE = document.querySelector(this.previewSrcPlaceholderSelector);
            const node = this.htmlDoc.doctype;
            const htmlDoctype = "<!DOCTYPE "
                + node.name
                + (node.publicId ? ' PUBLIC "' + node.publicId + '"' : '')
                + (!node.publicId && node.systemId ? ' SYSTEM' : '') 
                + (node.systemId ? ' "' + node.systemId + '"' : '')
                + '>';

            previewE.insertAdjacentHTML('beforebegin', '<h3>HTML source</h3>');
            previewE.insertAdjacentHTML('beforeend', this.#escapeHTML(htmlDoctype));
            previewE.insertAdjacentHTML('beforeend', this.#escapeHTML(this.htmlDoc.documentElement.outerHTML));
        }
    }// renderPreview


    /**
     * Setup HTML DOM document object to `htmlDoc` property.
     * 
     * @returns {undefined}
     */
    #setupHTMLDoc() {
        if (this.#isPreviewForTarget()) {
            this.viewTargetSourceObj.setupHTMLDoc();
        } else {
            this.htmlDoc = document.cloneNode(true);
        }
    }// setupHTMLDoc


    /**
     * Initialize the class.
     */
    init() {
        if (!document.querySelector(this.previewSrcPlaceholderSelector)) {
            // if there is no preview source placeholder on this page.
            // no need to work here.
            return ;
        }

        this.viewTargetSourceObj = new ViewTargetSource({
            'excludePreviewSelector': this.excludePreviewSelector,
            'previewSrcPlaceholderSelector': this.previewSrcPlaceholderSelector,
        });

        this.#setupHTMLDoc();

        this.#removeExcludePreview();

        this.#renderPreview();
    }// init


}


// run on DOM document loaded. ------------------------------------------------------------------------------------------
document.addEventListener('DOMContentLoaded',function() {
    const viewSourceObj = new ViewSource();
    viewSourceObj.init();
});