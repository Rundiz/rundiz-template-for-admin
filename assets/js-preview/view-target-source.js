/* 
 * JS for document (preview) file.
 * 
 * View code based on selected target, not whole page.
 * 
 * This JS file is for document pages only. It is no need on your project.
 * 
 * @license http://opensource.org/licenses/MIT MIT
 */


/**
 * Setup and render source code based on selector on preview placeholder.
 * 
 * Supported attributes:<br>
 *      `data-target-src` (string) The selector of source code.<br>
 *      `data-target-src-remove-first-space` (int) Number of remove first space indent. This is optional.<br>
 *      `data-inner-html` (true|false) Use `innerHTML` if `true`. This is optional.<br>
 *      `data-remove-classes` (string) The class names of selected source that will be remove. Split with space. This is optional.<br>
 */
class ViewTargetSource {


    /**
     * @type String Selector for exclude element from preview.
     */
    excludePreviewSelector;


    /**
     * @type String The preview source code placeholder selector.
     */
    previewSrcPlaceholderSelector;


    /**
     * @type ViewSource The `ViewSource` class.
     */
    #viewSourceClass = {};


    /**
     * @type object Contain multiple sources. The key or property is the selector.
     */
    sources = {};


    /**
     * Class constructor.
     * 
     * @param {object} options
     * @param {string} options.previewSrcPlaceholderSelector
     */
    constructor(options = {}) {
        if (options.previewSrcPlaceholderSelector) {
            this.previewSrcPlaceholderSelector = options.previewSrcPlaceholderSelector;
        }
        if (options.excludePreviewSelector) {
            this.excludePreviewSelector = options.excludePreviewSelector;
        }
        if (options.viewSourceClass) {
            this.#viewSourceClass = options.viewSourceClass;
        }
    }// constructor


    /**
     * Remove everything that contain `.exclude-preview` HTML class attribute.
     * 
     * Supported HTML attribute: `data-remove-classes="class1 class2"`.
     * 
     * @returns {undefined}
     */
    removeExcludePreview() {
        for (const srcSelector in this.sources) {
            const thisSource = this.sources[srcSelector];
            const allExclude = thisSource.querySelectorAll(this.excludePreviewSelector);
            if (allExclude) {
                allExclude.forEach((item) => {
                    item.remove();
                });
            }

            // remove attribute value where it is source target selector.
            if (srcSelector.match(/^\#/)) {
                // if source target selector is ID (start with #).
                thisSource.removeAttribute('id');
            } else if (srcSelector.match(/^\./)) {
                // if source target selector is class (start with .).
                thisSource.classList.remove(srcSelector.replace(/^(\.)/, ''));
            }

            const previewPlaceholderE = document.querySelector(this.previewSrcPlaceholderSelector + '[data-target-src="' + srcSelector + '"]');
            if (previewPlaceholderE) {
                const removeClasses = previewPlaceholderE.dataset.removeClasses;
                if (removeClasses) {
                    const removeClassesArray = removeClasses.split(' ');
                    removeClassesArray.forEach((item) => {
                        thisSource.classList.remove(item);
                    });
                }
            }

            if (thisSource.classList.length <= 0) {
                thisSource.removeAttribute('class');
            }

            // also remove preview source placeholder itself.
            thisSource.querySelectorAll(this.previewSrcPlaceholderSelector)?.forEach((item) => {
                item.remove();
            });
        }// endfor;
    }// removeExcludePreview


    /**
     * Render preview source code.
     * 
     * Supported HTML attributes: `data-inner-html="true"`, `data-target-src-remove-first-space="nn"`, `data-source-language="xx"`.
     * 
     * @returns {undefined}
     */
    renderPreview() {
        for (const srcSelector in this.sources) {
            const previewPlaceholderE = document.querySelector(this.previewSrcPlaceholderSelector + '[data-target-src="' + srcSelector + '"]');
            if (previewPlaceholderE) {
                const isInnerHTML = previewPlaceholderE.dataset.innerHtml;
                let sourceHTMLString = this.sources[srcSelector].outerHTML;
                if (isInnerHTML === 'true') {
                    sourceHTMLString = this.sources[srcSelector].innerHTML;
                }
                sourceHTMLString = sourceHTMLString.trim();

                // remove line that begins with space and follow with new line.
                sourceHTMLString = sourceHTMLString.replace(/^(\s+[\r\n])/gm, '');

                const removeFirstSpace = previewPlaceholderE.dataset.targetSrcRemoveFirstSpace;
                if (removeFirstSpace) {
                    const newRegexp = new RegExp('^(\\s{' + removeFirstSpace + '})', 'gm');
                    sourceHTMLString = sourceHTMLString.replace(newRegexp, ``);
                }

                sourceHTMLString = this.#viewSourceClass.escapeHTML(sourceHTMLString);

                // wrap content inside `<pre>..</pre>` with `<code>..</code>`.
                const previewHTML = previewPlaceholderE.innerHTML;
                let sourceLanguage = previewPlaceholderE.dataset.sourceLanguage;
                if (typeof(sourceLanguage) !== 'string' || '' === sourceLanguage) {
                    sourceLanguage = 'html';
                }
                sourceHTMLString = '<code class="language-' + sourceLanguage + '">' + sourceHTMLString + '</code>';

                previewPlaceholderE.innerHTML = sourceHTMLString;
            }
        }// endfor;
    }// renderPreview


    /**
     * Setup HTML doc for all target.
     * 
     * Supported HTML attribute: `data-target-src=".class"`.
     * 
     * @async
     * @returns {undefined}
     */
    async setupHTMLDoc() {
        // previous: use `.cloneNode()` from current document may cause copy altered HTML by other JS such as Smart menus.
        // current: use AJAX, XMLHTTP, `fetch()` to retrieve the whole current page again without altered by JS then parse to DOM. (Also change `document.` to be `ajaxDoc.`.)
        const response = await fetch(document.location.href);
        const data = await response.text();
        const parser = new DOMParser();
        const ajaxDoc = parser.parseFromString(data, 'text/html');
        // select all preview placeholders as always.
        const allPreviewSrcPlaceholders = ajaxDoc.querySelectorAll(this.previewSrcPlaceholderSelector);

        if (allPreviewSrcPlaceholders) {
            allPreviewSrcPlaceholders.forEach((item) => {
                const targetSrcSelector = item.dataset?.targetSrc;
                if (!targetSrcSelector) {
                    return ;
                }

                this.sources[targetSrcSelector] = {};
                const sourceObj = ajaxDoc.querySelector(targetSrcSelector)?.cloneNode(true);
                if (sourceObj) {
                    this.sources[targetSrcSelector] = sourceObj;
                } else {
                    throw Error('Selected target source is not exists. (' + targetSrcSelector + ')');
                }
            });
        }
    }// setupHTMLDoc


}