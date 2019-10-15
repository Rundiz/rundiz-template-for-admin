/*! Rundiz template for admin v 2.0.14 
License: MIT*//**
 * RDTA dialog
 */


class RDTADialog {


    /**
     * Activate (open) the dialog.
     * 
     * @param {string} selector
     * @returns {undefined}
     */
    activateDialog(selector) {
        let thisClass = this;
        let dialogOrModalElement = document.querySelector(selector);

        if (
            dialogOrModalElement &&
            dialogOrModalElement.classList &&
            !dialogOrModalElement.classList.contains('show')
        ) {
            if (dialogOrModalElement.classList.contains('rd-dialog-modal')) {
                document.body.classList.add('rd-modal-open');
            }
            // show dialog or modal dialog
            dialogOrModalElement.classList.add('show');
            // focus on dialog/modal.
            setTimeout(function() {
                dialogOrModalElement.tabIndex = '-1';
                dialogOrModalElement.focus();
                //console.log('changed focus', document.activeElement);
            }, 301);
            // fire event.
            let event = new Event('rdta.dialog.opened');
            dialogOrModalElement.dispatchEvent(event);
            thisClass.listenOnCloseButton(selector);
            thisClass.listenOnClickOutsideClose(selector);
        }
    }// activateDialog


    /**
     * Initialize the dialog by listening on button clicked.
     */
    static init() {
        let thisClass = new this();

        document.addEventListener('click', function(event) {
            if (
                event.currentTarget &&
                event.currentTarget.activeElement &&
                event.currentTarget.activeElement.dataset &&
                event.currentTarget.activeElement.dataset.toggle === 'dialog'
            ) {
                event.stopPropagation();
                let targetDialog = event.currentTarget.activeElement.dataset.target;
                if (targetDialog) {
                    thisClass.activateDialog(targetDialog);
                }
            }
        });

        thisClass.listenOnEscapeKeyPressClose();
    }// init



    /**
     * Listen on click outside dialog and then close if no attribute specified.
     * 
     * @private
     */
    listenOnClickOutsideClose(targetDialog) {
        let modalElement = document.querySelector(targetDialog);
        if (
            modalElement &&
            modalElement.dataset &&
            modalElement.classList &&
            (
                !modalElement.dataset.clickOutsideNotClose ||
                modalElement.dataset.clickOutsideNotClose !== 'true'
            ) &&
            modalElement.classList.contains('rd-dialog-modal')
        ) {
            // if no html attribute `data-click-outside-not-close="true"` and there is modal element then click outside to close the dialog.
            modalElement.addEventListener('click', function handler(event) {
                if (event.target === modalElement) {
                    // if clicking target is on the modal element.
                    if (event.target.querySelector('[data-dismiss="dialog"]')) {
                        event.target.querySelector('[data-dismiss="dialog"]').click();
                        modalElement.removeEventListener('click', handler);
                    }
                }
            });
        }
    }// listenOnClickOutsideClose


    /**
     * Listen on close button (`data-dismiss="dialog"`) and close the dialog that contain `show` class.
     * 
     * @private
     */
    listenOnCloseButton(targetDialog) {
        let thisClass = this;
        document.querySelector(targetDialog).addEventListener('click', function handler(event) {
            for (let target= event.target; target && target != this; target = target.parentNode) {
                // loop parent nodes from the target to the delegation node
                if (target.matches('[data-dismiss="dialog"]')) {
                    if (target.closest('.show')) {
                        document.body.classList.remove('rd-modal-open');
                        let dialogMainElement = target.closest('.show');
                        if (dialogMainElement) {
                            dialogMainElement.classList.remove('show');
                            let event = new Event('rdta.dialog.closed');
                            dialogMainElement.dispatchEvent(event);
                            document.querySelector(targetDialog).removeEventListener('click', handler);
                        }
                    }

                    break;
                }
            }
        });
    }// listenOnCloseButton


    /**
     * Listen on esc key press then close if no attribute specified.
     * 
     * @private
     */
    listenOnEscapeKeyPressClose() {
        document.body.addEventListener('keyup', function handler(event) {
            if (
                event.key === 'Escape' &&
                event.altKey === false &&
                event.ctrlKey === false &&
                event.metaKey === false &&
                event.shiftKey === false &&
                !document.querySelector('.rd-alertdialog-modal.show')// make sure that alert dialog is not opened. if opened, close it before close dialog.
            ) {
                // if target key press.
                // close dialog that without modal.
                if (
                    document.querySelector('.rd-dialog.show') &&
                    document.querySelector('.rd-dialog.show').dataset &&
                    document.querySelector('.rd-dialog.show').dataset.escKeyNotClose !== 'true'
                ) {
                    if (document.querySelector('.rd-dialog.show [data-dismiss="dialog"]')) {
                        document.querySelector('.rd-dialog.show [data-dismiss="dialog"]').focus();
                        document.querySelector('.rd-dialog.show [data-dismiss="dialog"]').click();
                    }
                }
                // close dialog with modal.
                if (document.querySelector('.rd-dialog-modal.show')) {
                    if (
                        document.querySelector('.rd-dialog-modal.show .rd-dialog') &&
                        document.querySelector('.rd-dialog-modal.show .rd-dialog').dataset &&
                        document.querySelector('.rd-dialog-modal.show .rd-dialog').dataset.escKeyNotClose !== 'true'
                    ) {
                        if (document.querySelector('.rd-dialog-modal.show [data-dismiss="dialog"]')) {
                            document.querySelector('.rd-dialog-modal.show [data-dismiss="dialog"]').focus();
                            document.querySelector('.rd-dialog-modal.show [data-dismiss="dialog"]').click();
                        }
                    }
                }
            }
        });
    }// listenOnEscapeKeyPressClose


}