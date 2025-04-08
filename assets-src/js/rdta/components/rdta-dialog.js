/**
 * RDTA dialog
 */


class RDTADialog {


    /**
     * @type String The body class name for use when dialog open with modal (backdrop).
     */
    #bodyModalClassName = 'rd-modal-open';


    /**
     * @type String The CSS selector for HTML attribute that will be dismiss (close) the dialog.  
     * Example HTML `data-dismiss="dialog"`.  
     * Example CSS selector `[data-dismiss="dialog"]`.
     */
    #dataDismissSelector = '[data-dismiss="dialog"]';


    /**
     * @type String The dialog class name.
     */
    #dialogClassName = 'rd-dialog';


    /**
     * @type String The dialog and modal showing class name.
     */
    #dialogAndModalShowClassName = 'show';


    /**
     * @type String The modal (backdrop) class name.
     */
    #modalClassName = 'rd-dialog-modal';


    /**
     * Do close the dialog.
     * 
     * @since 2.4.1
     * @param {object|undefined|null} dialogElement The dialog element.
     * @param {object|undefined|null} modalElement The modal element.
     * @throws {Error} Throw the error on invalid argument.
     */
    #doClose(dialogElement, modalElement) {
        if (
            typeof(dialogElement) !== 'object' && 
            typeof(dialogElement) !== 'undefined' &&
            dialogElement !== null
        ) {
            throw new Error('The argument dialogElement must be an object.');
        }
        if (
            typeof(modalElement) !== 'object' && 
            typeof(modalElement) !== 'undefined' &&
            modalElement !== null
        ) {
            throw new Error('The argument modalElement must be an object.');
        }

        if (
            !dialogElement?.classList?.contains(this.#dialogAndModalShowClassName) && 
            !modalElement?.classList?.contains(this.#dialogAndModalShowClassName)
        ) {
            // if there is no opened dialog on where clicking dismiss button.
            // do not work here.
            return false;
        }

        document.body.classList.remove(this.#bodyModalClassName);

        // close by remove class `show`.
        dialogElement?.classList?.remove(this.#dialogAndModalShowClassName);
        modalElement?.classList?.remove(this.#dialogAndModalShowClassName);

        if (1 === dialogElement?.nodeType && 'dialog' === dialogElement?.tagName) {
            // if it is currently using HTML `<dialog>`.
            // close with JS.
            dialogElement.close();
        }

        // fire custom event.
        const customEvent = new Event('rdta.dialog.closed');
        if (modalElement) {
            modalElement.dispatchEvent(customEvent);
        } else if (dialogElement) {
            dialogElement.dispatchEvent(customEvent);
        }
    }// #doClose


    /**
     * Listen on click dismiss button to close dialog (and modal or backdrop).
     * 
     * This method was called from `init()`.
     * 
     * @since 2.4.1
     * @returns {undefined}
     */
    #listenOnClickButtonClose() {
        document.addEventListener('click', (event) => {
            let thisTarget = event.target;
            if (thisTarget.closest(this.#dataDismissSelector)) {
                thisTarget = thisTarget.closest(this.#dataDismissSelector);
            }

            if ('dialog' === thisTarget.dataset.dismiss) {
                // if clicking on button or link that contain HTML attribute to close dialog.
                event.preventDefault();

                const dialogElement = thisTarget.closest('.' + this.#dialogClassName);
                const modalElement = thisTarget.closest('.' + this.#modalClassName);

                return this.#doClose(dialogElement, modalElement);
            }// endif; clicking on dismiss dialog button.
        });
    }// #listenOnClickButtonClose


    /**
     * Listen on click outside dialog element (or clicking on modal element) to close dialog (and modal or backdrop).
     * 
     * This method was called from `init()`.
     * 
     * @since 2.4.1
     * @returns {undefined}
     */
    #listenOnClickOutsideClose() {
        document.addEventListener('click', (event) => {
            const thisTarget = event.target;
            if (!thisTarget.classList?.contains(this.#modalClassName)) {
                // if did not clicking on the modal element.
                return ;
            }

            const modalElement = thisTarget.closest('.' + this.#modalClassName);
            if (
                modalElement && 
                'true' !== modalElement?.dataset?.clickOutsideNotClose
            ) {
                // if there is no HTML attribute `data-click-outside-not-close="true"` on the modal element.
                event.preventDefault();

                this.#doClose(null, modalElement);
            }
        });
    }// #listenOnClickOutsideClose


    /**
     * Listen on escape key up to close dialog (and modal or backdrop).
     * 
     * This method was called from `init()`.
     * 
     * @since 2.4.1
     * @returns {undefined}
     */
    #listenOnEscapeKeyClose() {
        document.body.addEventListener('keyup', (event) => {
            if (
                'Escape' === event.key &&
                false === event.altKey &&
                false === event.ctrlKey &&
                false === event.metaKey &&
                false === event.shiftKey &&
                !document.querySelector('.rd-alertdialog-modal.show')// make sure that "alert dialog" is not opened. if opened, close it before close the dialog.
            ) {
                // if escape key pressed (up).
                let thisTarget = event.target;
                const dialogElement = thisTarget.closest('.' + this.#dialogClassName);
                const modalElement = thisTarget.closest('.' + this.#modalClassName);
                if (!dialogElement && !modalElement) {
                    // if not press esc key on the dialog.
                    // do not work here.
                    return false;
                }

                if (
                    dialogElement?.classList?.contains(this.#dialogAndModalShowClassName) &&
                    'true' !== dialogElement?.dataset?.escKeyNotClose
                ) {
                    // if dialog element is contain class `show` and did not set to no close on escape.
                    return this.#doClose(dialogElement, modalElement);
                }

                if (
                    modalElement?.classList?.contains(this.#dialogAndModalShowClassName) &&
                    modalElement?.querySelector('.' + this.#dialogClassName)?.dataset?.escKeyNotClose !== 'true'
                ) {
                    // if modal element is contain class `show` and dialog child element did not set to no close on escape.
                    return this.#doClose(dialogElement, modalElement);
                }
            }
        });
    }// #listenOnEscapeKeyClose


    /**
     * Activate (open) the dialog.
     * 
     * @param {string} selector
     * @param {object} options Options:<br>
     *                  'focusDialog' (bool) Set to `false` to do not focus on dialog. Default is `true`.
     * @returns {undefined}
     */
    activateDialog(selector, options) {
        let thisClass = this;
        let dialogOrModalElement = document.querySelector(selector);

        if (!dialogOrModalElement?.classList?.contains(thisClass.#dialogAndModalShowClassName)) {
            // if dialog is not showed.
            let htmlUse = 'basic';// values can be 'basic', 'dialog'.
            let dialogElement = null;
            if (dialogOrModalElement.closest('dialog')) {
                // if found HTML `<dialog>` as parent of selector.
                htmlUse = 'dialog';
                dialogElement = dialogOrModalElement.closest('dialog');
            } else if (dialogOrModalElement.querySelector('dialog')) {
                // if found HTML `<dialog>` as children of selector.
                htmlUse = 'dialog';
                dialogElement = dialogOrModalElement.querySelector('dialog');
            }

            let isModal = false;
            if (dialogOrModalElement.classList.contains(thisClass.#modalClassName)) {
                isModal = true;
                document.body.classList.add(thisClass.#bodyModalClassName);
            }

            // show dialog or modal dialog
            dialogOrModalElement.classList.add(thisClass.#dialogAndModalShowClassName);
            if ('basic' === htmlUse) {
                // if use basic HTML element (maybe `<div class="rd-dialog">`).
                dialogOrModalElement.tabIndex = '-1';
                if (!options || (options && options.focusDialog !== false)) {
                    // focus on dialog/modal.
                    setTimeout(function() {
                        dialogOrModalElement.focus();
                        //console.log('changed focus', document.activeElement);
                    }, 301);// 301 is from css transition 0.3s (300) + 1.
                }
            } else {
                // if use HTML `<dialog>`.
                // the method `showModal()` can't work here because it is conflicted with sanitize.css ( https://github.com/csstools/sanitize.css/issues/253 )
                dialogElement.show();
                if (!options || (options && options.focusDialog !== false)) {
                    const dismissBtn = dialogElement.querySelector(thisClass.#dataDismissSelector);
                    if (dismissBtn) {
                        dismissBtn.autofocus = true;
                        setTimeout(function() {
                            dismissBtn.focus();
                        }, 301);// 301 is from css transition 0.3s (300) + 1.
                    }
                }
            }

            // fire event.
            setTimeout(function() {
                let event = new Event('rdta.dialog.opened');
                dialogOrModalElement.dispatchEvent(event);
            }, 301);// 301 is from css transition 0.3s (300) + 1.
        }// endif; dialog is not showed.
    }// activateDialog


    /**
     * Manually close the dialog.
     * 
     * @since 2.4.1
     * @param {string} selector The CSS selector. It can be CSS class or HTML ID.
     * @throws {Error} Throw the error on invalid argument.
     */
    close(selector) {
        if (typeof(selector) !== 'string') {
            throw new Error('The argument selector must be string.');
        }

        let thisTarget = document.querySelector(selector);
        if (!thisTarget) {
            return false;
        }

        let dialogElement, modalElement;
        if (thisTarget.classList.contains(this.#dialogClassName)) {
            dialogElement = thisTarget;
        }
        if (thisTarget.classList.contains(this.#modalClassName)) {
            modalElement = thisTarget;
            dialogElement = modalElement.querySelector('.' + this.#dialogClassName);
        } else if (thisTarget.closest('.' + this.#modalClassName)) {
            modalElement = thisTarget.closest('.' + this.#modalClassName);
        }

        return this.#doClose(dialogElement, modalElement);
    }// close


    /**
     * Initialize the dialog by listening on button clicked.
     */
    static init() {
        let thisClass = new this();

        document.addEventListener('click', function(event) {
            if (
                'dialog' === event.currentTarget?.activeElement?.dataset?.toggle
            ) {
                event.stopPropagation();
                let targetDialog = event.currentTarget.activeElement.dataset.target;
                if (targetDialog) {
                    thisClass.activateDialog(targetDialog);
                }
            }
        });

        thisClass.#listenOnClickButtonClose();

        thisClass.#listenOnEscapeKeyClose();
        thisClass.#listenOnClickOutsideClose();
    }// init


}