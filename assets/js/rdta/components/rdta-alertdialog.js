/*!
 Rundiz template for admin v 2.4.4dev-20250415 
License: MIT
*/
/**
 * RDTA alert dialog
 */


class RDTAAlertDialog {


    /**
     * @type String The body class name for use when dialog open with modal (backdrop).
     */
    #bodyModalClassName = 'rd-alertdialog-modal-open';


    /**
     * @type undefined|object Current alert dialog modal element that has been activated.
     */
    #currentAlertDialogModal;


    /**
     * @type String The CSS selector for HTML attribute that will be dismiss (close) the alert dialog.  
     * Example HTML `data-dismiss="dialog"`.  
     * Example CSS selector `[data-dismiss="dialog"]`.
     */
    #dataDismissSelector = '[data-dismiss="dialog"]';


    /**
     * @type String The alert dialog class name.
     */
    #dialogClassName = 'rd-alertdialog';


    /**
     * @type String The modal (backdrop) class name.
     */
    #modalClassName = 'rd-alertdialog-modal';


    /**
     * @type undefined|object The active element for return as previous focus on dialog closed.
     */
    #previousFocus;


    /**
     * The options.
     * 
     * @since 2.4.1
     * @type Object The options.
     * @see `RDTAAlertDialog::alert()`
     */
    #options = {};


    /**
     * Class constructor.
     * 
     * @private Do not access this method directly, it was called from `alert()` method.
     * @see `RDTAAlertDialog::alert()` for more description about available options.
     * @param {object} options The options for alert dialog.
     * @returns {undefined}
     */
    constructor(options = {}) {
        if (typeof(options) !== 'object') {
            throw new Error('The argument options must be an object.');
        }

        let defaultOptions = {
            'type': 'danger',
            'html': '',
            'text': '',
            'txtCloseButton': 'OK'
        };
        this.#options = Object.assign(defaultOptions, options);
        defaultOptions = undefined;
    }// constructor


    /**
     * Create HTML and put into body.
     * 
     * @since 2.4.1 Renamed from `createHtmlDialog()`.
     * @returns {undefined}
     */
    #createHTMLDialog() {
        this.#previousFocus = document.activeElement;

        let dialogMessage = '';
        if (this.#options?.text) {
            dialogMessage = '<p>' + this.#escapeHTML(this.#options.text) + '</p>';
        } else {
            dialogMessage = this.#options.html;
        }

        let dialogIcon = '';
        let alertClass = '';
        if (this.#options.type) {
            switch (this.#options.type) {
                case 'alert-info':
                case 'info':
                    dialogIcon = '<span class="fa-stack fa-3x"><i class="far fa-circle fa-2x"></i><i class="fas fa-info fa-stack-1x"></i></span>';
                    alertClass = 'alert-info';
                    break;
                case 'alert-warning':
                case 'warning':
                    dialogIcon = '<span class="fa-stack fa-3x"><i class="far fa-circle fa-2x"></i><i class="fas fa-exclamation fa-stack-1x"></i></span>';
                    alertClass = 'alert-warning';
                    break;
                case 'alert-success':
                case 'success':
                    dialogIcon = '<span class="fa-stack fa-3x"><i class="far fa-circle fa-2x"></i><i class="fas fa-check fa-stack-1x"></i></span>';
                    alertClass = 'alert-success';
                    break;
                case 'alert-danger':
                case 'danger':
                default:
                    dialogIcon = '<span class="fa-stack fa-3x"><i class="far fa-circle fa-2x"></i><i class="fas fa-xmark fa-stack-1x"></i></span>';
                    alertClass = 'alert-danger';
                    break;
            }
        }

        let dialogHtml = '<div class="' + this.#modalClassName + ' show">' +
            '<div class="' + this.#dialogClassName + ' ' + alertClass + '" aria-describedby="rd-alertdialog-body" aria-modal="true">' +
                '<div id="rd-alertdialog-body" class="rd-dialog-body">' +
                    '<div class="rd-alertdialog-icon text-center">' + dialogIcon + '</div>' +
                    dialogMessage +
                '</div>' +
                '<div class="rd-dialog-buttons">' + 
                    '<button class="rd-button primary" type="button" data-dismiss="dialog" aria-label="' + this.#options.txtCloseButton + '">' +
                        this.#options.txtCloseButton +
                    '</button>' +
                '</div>' +
            '</div>' +
        '</div>';

        // append alert dialog HTML to `<body>` to show the alert dialog.
        document.body.insertAdjacentHTML('beforeend', dialogHtml);
        // add modal opened class to `<body>`.
        document.body.classList.add(this.#bodyModalClassName);

        if (document.querySelector('.' + this.#dialogClassName + ' ' + this.#dataDismissSelector + '')) {
            document.querySelector('.' + this.#dialogClassName + ' ' + this.#dataDismissSelector + '').focus();
        }
        if (document.querySelector('.' + this.#modalClassName)) {
            this.#currentAlertDialogModal = document.querySelector('.' + this.#modalClassName);
        }

        // fire event.
        let event = new Event('rdta.alertdialog.opened');
        document.body.dispatchEvent(event);
    }// #createHTMLDialog


    /**
     * Do close the alert dialog.
     * 
     * This method was called from `#listenOnClickButtonClose()`.
     * 
     * @since 2.4.1
     * @param {object|undefined|null} modalElement The modal element.
     * @throws {Error} Throw the error on invalid argument.
     */
    #doClose(modalElement) {
        if (
            typeof(modalElement) !== 'object' && 
            typeof(modalElement) !== 'undefined' &&
            modalElement !== null
        ) {
            throw new Error('The argument modalElement must be an object.');
        }

        modalElement?.remove();
        document.body.classList.remove(this.#bodyModalClassName);

        // fire event
        let event = new Event('rdta.alertdialog.closed');
        document.body.dispatchEvent(event);

        // back to previous focus.
        if (this.#previousFocus) {
            this.#previousFocus.focus();
        }

        // reset properties.
        this.#previousFocus = undefined;
        this.#currentAlertDialogModal = undefined;
    }// #doClose


    /**
     * Escape HTML. Also prevent double escape.
     * 
     * This method was called from `#createHTMLDialog()`.
     * 
     * @link https://stackoverflow.com/a/6234804/128761 Original source code.
     * @since 2.4.1
     * @param {string} text The text content wether it is HTML or not.
     * @returns {unresolved}
     */
    #escapeHTML(text) {
        const unescaped = text
                .replace(/&amp;/g, "&")
                .replace(/&lt;</g, "<")
                .replace(/&gt;/g, ">")
                .replace(/&quot;/g, "\"")
                .replace(/&#039;/g, "''");

        if (unescaped === text) {
            return text
                    .replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                    .replace(/"/g, "&quot;")
                    .replace(/'/g, "&#039;");
        }
        return text;
    }// #escapeHTML


    /**
     * Listen on click dismiss button to close alert dialog (and modal or backdrop).
     * 
     * This method was called from `alert()`.
     * 
     * @since 2.4.1
     * @returns {undefined}
     */
    #listenOnClickButtonClose() {
        if (!this.#currentAlertDialogModal) {
            return ;
        }

        let dismissBtn = this.#currentAlertDialogModal.querySelector(this.#dataDismissSelector);
        if (!dismissBtn) {
            return ;
        }

        dismissBtn.addEventListener('click', (event) => {
            this.#doClose(this.#currentAlertDialogModal);
            dismissBtn = null;
        });
    }// #listenOnClickButtonClose


    /**
     * Listen on hot key press to close alert dialog.
     * 
     * This method was called from `alert()`.
     * 
     * @since 2.4.1
     * @returns {undefined}
     */
    #listenOnHotKeyClose() {
        if (!this.#currentAlertDialogModal) {
            return ;
        }

        this.#currentAlertDialogModal.addEventListener('keydown', (event) => {
            if (
                (event.code === 'NumpadEnter' || event.key === 'Enter') &&
                event.altKey === false &&
                event.ctrlKey === false &&
                event.metaKey === false &&
                event.shiftKey === false
            ) {
                this.#doClose(this.#currentAlertDialogModal);
            }
        });

        this.#currentAlertDialogModal.addEventListener('keyup', (event) => {
            if (
                event.key === 'Escape' &&
                event.altKey === false &&
                event.ctrlKey === false &&
                event.metaKey === false &&
                event.shiftKey === false
            ) {
                this.#doClose(this.#currentAlertDialogModal);
            }
        });
    }// #listenOnHotKeyClose


    /**
     * Display alert dialog.
     * 
     * @param {object} options The options for alert dialog.
     * @param {string} options.type The alert type. Accept info, warning, success, danger.
     * @param {string} options.html The alert in HTML content if you want to use HTML in the alert.
     * @param {string} options.text The alert in text content. If both text & html were set, it will be use text by default.
     * @param {string} options.txtCloseButton Text on close button. Default is 'OK'.
     * @returns {undefined}
     */
    static alert(options = {}) {
        let thisClass = new this(options);

        // create HTML and put to body
        thisClass.#createHTMLDialog();

        thisClass.#listenOnClickButtonClose();
        thisClass.#listenOnHotKeyClose();
    }// alert


}// RDTAAlertDialog