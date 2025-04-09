/**
 * JS for document (preview) file.
 * 
 * View whole page source code.
 * 
 * This JS file is for document pages only. It is no need on your project.
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
     * Beautify HTML.
     * 
     * @param {string} html Input HTML string.
     * @returns {string} Return modified HTML string.
     */
    #beautifyHTML(html) {
        // add new line to `<head>`.
        html = html.replace(/><head/gi, '>' + "\n" + '    <head');
        // add new line to `</html>`.
        html = html.replace(/<\/body><\/html/gi, '    </body>' + "\n" + '</html');
        // remove empty new lines that have more than 2 lines.
        html = html.replace(/^([ ]*[\r\n]){2,}/gim, "\n");
        return html;
    }// beautifyHTML


    /**
     * Check if preview source placeholder is for selected target only or not.
     * 
     * Supported HTML attribute: `data-target-src=".class"`.
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

            // remove auto generated `resize-sensor`.
            this.htmlDoc.querySelectorAll('.resize-sensor')?.forEach((item) => {
                item.remove();
            });

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
            document.dispatchEvent(new CustomEvent('rdta.viewsource.renderpreview.done', {'bubbles': true}));
        } else {
            const previewE = document.querySelector(this.previewSrcPlaceholderSelector);
            const node = this.htmlDoc.doctype;
            const htmlDoctype = "<!DOCTYPE "
                + node.name
                + (node.publicId ? ' PUBLIC "' + node.publicId + '"' : '')
                + (!node.publicId && node.systemId ? ' SYSTEM' : '') 
                + (node.systemId ? ' "' + node.systemId + '"' : '')
                + '>';

            previewE.insertAdjacentHTML('beforebegin', '<h5>Source</h5>');
            previewE.insertAdjacentHTML('beforeend', this.escapeHTML(htmlDoctype) + "\n");
            previewE.insertAdjacentHTML('beforeend', this.escapeHTML(this.#beautifyHTML(this.htmlDoc.documentElement.outerHTML)));

            // wrap content inside `<pre>..</pre>` with `<code>..</code>`.
            const previewHTML = previewE.innerHTML;
            const wrapPreviewHTML = '<code class="language-html">' + previewHTML + '</code>';
            previewE.innerHTML = wrapPreviewHTML;
        }// endif;
    }// renderPreview


    /**
     * Setup HTML DOM document object to `htmlDoc` property.
     * 
     * @async
     * @returns {undefined}
     */
    async #setupHTMLDoc() {
        if (this.#isPreviewForTarget()) {
            await this.viewTargetSourceObj.setupHTMLDoc();
        } else {
            // old method, use `document.clodeNode()` but may cause copy altered HTML by other JS such as Smart menus.
            //this.htmlDoc = document.cloneNode(true);
            // new method, use AJAX, XMLHTTP, `fetch()` to retrieve the whole current page again without altered by JS then parse to DOM.
            const response = await fetch(document.location.href);
            const data = await response.text();
            const parser = new DOMParser();
            this.htmlDoc = parser.parseFromString(data, 'text/html');
        }
    }// setupHTMLDoc


    /**
     * Escape HTML
     * 
     * @link https://stackoverflow.com/a/6234804/128761 Original source code.
     * @param {string} unsafe HTML string
     * @returns {unresolved}
     */
    escapeHTML(unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }// escapeHTML


    /**
     * Initialize the class.
     */
    async init() {
        if (document.querySelector(this.previewSrcPlaceholderSelector)) {
            // if there is preview source placeholder on this page.
            // otherwise no need to work here.

            this.viewTargetSourceObj = new ViewTargetSource({
                'excludePreviewSelector': this.excludePreviewSelector,
                'previewSrcPlaceholderSelector': this.previewSrcPlaceholderSelector,
                'viewSourceClass': this,
            });

            await this.#setupHTMLDoc();

            this.#removeExcludePreview();

            this.#renderPreview();
        }

        // call Prism.js to highlight the code.
        Prism.highlightAll();
    }// init


}


// run on DOM document loaded. ------------------------------------------------------------------------------------------
document.addEventListener('DOMContentLoaded',function() {
    const viewSourceObj = new ViewSource();
    viewSourceObj.init();
});