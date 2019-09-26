/*! Rundiz template for admin v 2.0.6 
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

        if (!document.querySelector(selector).classList.contains('show')) {
            if (document.querySelector(selector).classList.contains('rd-dialog-modal')) {
                document.body.classList.add('rd-modal-open');
            }
            document.querySelector(selector).classList.add('show');
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
            if (event.currentTarget.activeElement.dataset.toggle === 'dialog') {
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
        if (
            (
                !document.querySelector(targetDialog).dataset.clickOutsideNotClose ||
                document.querySelector(targetDialog).dataset.clickOutsideNotClose !== 'true'
            ) &&
            document.querySelector(targetDialog).classList.contains('rd-dialog-modal')
        ) {
            // if no html attribute `data-click-outside-not-close="true"` and there is modal element then click outside to close the dialog.
            document.querySelector(targetDialog).addEventListener('click', function handler(event) {
                if (event.target.querySelector('[data-dismiss="dialog"]')) {
                    event.target.querySelector('[data-dismiss="dialog"]').click();
                }
                document.querySelector(targetDialog).removeEventListener('click', handler);
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
                        target.closest('.show').classList.remove('show');
                        document.querySelector(targetDialog).removeEventListener('click', handler);
                    }
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
        document.addEventListener('keyup', function handler(event) {
            if (
                event.key === 'Escape' &&
                event.altKey === false &&
                event.ctrlKey === false &&
                event.metaKey === false &&
                event.shiftKey === false
            ) {
                if (
                    document.querySelector('.rd-dialog.show') &&
                    document.querySelector('.rd-dialog.show').dataset.escKeyNotClose !== 'true'
                ) {
                    document.querySelector('.rd-dialog.show [data-dismiss="dialog"]').focus();
                    document.querySelector('.rd-dialog.show [data-dismiss="dialog"]').click();
                }
                if (document.querySelector('.rd-dialog-modal.show')) {
                    if (document.querySelector('.rd-dialog-modal.show .rd-dialog').dataset.escKeyNotClose !== 'true') {
                        document.querySelector('.rd-dialog-modal.show [data-dismiss="dialog"]').focus();
                        document.querySelector('.rd-dialog-modal.show [data-dismiss="dialog"]').click();
                    }
                }
            }
        });
    }// listenOnEscapeKeyPressClose


}