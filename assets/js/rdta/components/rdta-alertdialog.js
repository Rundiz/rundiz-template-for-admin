/*! Rundiz template for admin v 2.0.18 
License: MIT*//**
 * RDTA alert dialog
 */


class RDTAAlertDialog {


    /**
     * Class constructor.
     * 
     * @private Do not access this method directly, it was called from `alert()` method.
     * @param {object} options
     * @returns {RDTAAlertDialog}
     */
    constructor(options) {
        let defaultOptions = {
            'type': 'danger',
            'html': '',
            'text': '',
            'txtCloseButton': 'OK'
        };
        this.options = Object.assign(defaultOptions, options);
        defaultOptions = undefined;
    }// constructor


    /**
     * Display alert dialog.
     * 
     * @param {object} options
     * @returns {undefined}
     */
    static alert(options) {
        let thisClass = new this(options);

        // create HTML and put to body
        thisClass.createHtmlDialog();
        // listen on click ok (close) button
        thisClass.listenOnCloseButton();
        // listen on key press (esc) to close.
        thisClass.listenOnKeyPressClose();
    }// alert


    /**
     * Create HTML and put into body.
     * 
     * @returns {undefined}
     */
    createHtmlDialog() {
        let dialogMessage = '';
        if (this.options && this.options.text) {
            dialogMessage = '<p>' + this.options.text + '</p>';
        } else {
            dialogMessage = this.options.html;
        }

        let dialogIcon = '';
        let alertClass = '';
        if (this.options && this.options.type) {
            switch (this.options.type) {
                case 'info':
                    dialogIcon = '<span class="fa-stack fa-3x"><i class="far fa-circle fa-2x"></i><i class="fas fa-info fa-stack-1x"></i></span>';
                    alertClass = 'alert-info';
                    break;
                case 'warning':
                    dialogIcon = '<span class="fa-stack fa-3x"><i class="far fa-circle fa-2x"></i><i class="fas fa-exclamation fa-stack-1x"></i></span>';
                    alertClass = 'alert-warning';
                    break;
                case 'success':
                    dialogIcon = '<span class="fa-stack fa-3x"><i class="far fa-circle fa-2x"></i><i class="fas fa-check fa-stack-1x"></i></span>';
                    alertClass = 'alert-success';
                    break;
                case 'danger':
                default:
                    dialogIcon = '<span class="fa-stack fa-3x"><i class="far fa-circle fa-2x"></i><i class="fas fa-times fa-stack-1x"></i></span>';
                    alertClass = 'alert-danger';
                    break;
            }
        }

        let dialogHtml = '<div class="rd-alertdialog-modal show">' +
            '<div class="rd-alertdialog ' + alertClass + '" aria-describedby="rd-alertdialog-body" aria-modal="true">' +
                '<div id="rd-alertdialog-body" class="rd-dialog-body">' +
                    '<div class="rd-alertdialog-icon text-center">' + dialogIcon + '</div>' +
                    dialogMessage +
                '</div>' +
                '<div class="rd-dialog-buttons">' + 
                    '<button class="rd-button primary" type="button" data-dismiss="dialog" aria-label="' + (this.options ? this.options.txtCloseButton : 'OK') + '">' +
                        (this.options ? this.options.txtCloseButton : 'OK') +
                    '</button>' +
                '</div>' +
            '</div>' +
        '</div>';

        document.body.insertAdjacentHTML('beforeend', dialogHtml);
        document.body.classList.add('rd-alertdialog-modal-open');

        if (document.querySelector('.rd-alertdialog [data-dismiss="dialog"]')) {
            document.querySelector('.rd-alertdialog [data-dismiss="dialog"]').focus();
        }
    }// createHtmlDialog


    /**
     * Listen on click OK (close) button to close dialog.
     * 
     * @returns {undefined}
     */
    listenOnCloseButton() {
        let thisClass = this;

        document.body.addEventListener('click', function handler(event) {
            for (let target= event.target; target && target != this; target = target.parentNode) {
                // loop parent nodes from the target to the delegation node
                if (target.matches('[data-dismiss="dialog"]')) {
                    if (target.closest('.rd-alertdialog-modal')) {
                        target.closest('.rd-alertdialog-modal').remove();
                        document.body.classList.remove('rd-alertdialog-modal-open');
                        document.body.removeEventListener('click', handler);
                    }
                    break;
                }
            }
        });
    }// listenOnCloseButton


    /**
     * Listen on key press to close if no attribute specified.
     * 
     * @private
     */
    listenOnKeyPressClose() {
        document.body.addEventListener('keyup', function handler(event) {
            if (
                (event.key === 'Escape' || event.code === 'NumpadEnter' || event.key === 'Enter') &&
                event.altKey === false &&
                event.ctrlKey === false &&
                event.metaKey === false &&
                event.shiftKey === false
            ) {
                if (document.querySelector('.rd-alertdialog-modal.show')) {
                    if (
                        document.querySelector('.rd-alertdialog-modal.show .rd-alertdialog') &&
                        document.querySelector('.rd-alertdialog-modal.show .rd-alertdialog').dataset &&
                        document.querySelector('.rd-alertdialog-modal.show .rd-alertdialog').dataset.escKeyNotClose !== 'true'
                    ) {
                        if (document.querySelector('.rd-alertdialog-modal.show [data-dismiss="dialog"]')) {
                            document.querySelector('.rd-alertdialog-modal.show [data-dismiss="dialog"]').focus();
                            document.querySelector('.rd-alertdialog-modal.show [data-dismiss="dialog"]').click();
                        }
                    }
                }
            }
        });
    }// listenOnKeyPressClose


}// RDTAAlertDialog