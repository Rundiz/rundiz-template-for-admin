/*!
 Rundiz template for admin v 2.4.6 
License: MIT
*/
/**
 * RDTA page options
 * 
 * @since 2.4.1
 */


class RDTAPageOptions {


    /**
     * @type String The HTML `aria-controls` attribute.
     */
    #ariaControlsName = 'aria-controls';


    /**
     * @type String The HTML `aria-expanded` attribute.
     */
    #ariaExpandedName = 'aria-expanded';


    /**
     * @type String Page options buttons row class name.
     */
    #pageOptionsButtonsRowClassName = 'rd-page-options-buttons-row';


    /**
     * @type String Page options container class name.
     */
    #pageOptionsContainerClassName = 'rd-page-options-container';


    /**
     * @type String Page options contents row class name.
     */
    #pageOptionsContentsRowClassName = 'rd-page-options-contents-row';


    /**
     * @type String Page options toggler button class name.
     */
    #pageOptionsTogglerButtonClassName = 'rd-page-options-button';


    /**
     * Slide up the main `.rd-page-content` and then mark page options content row as closed.
     * 
     * This method was called from `#listenOnClickButtons()`.
     * 
     * @async
     * @param {object} button A page option button element.
     * @param {object} contentRow The page options content row element.
     * @returns {Promise}
     */
    async #closeContentRow(button, contentRow) {
        if (!contentRow.classList.contains('opened')) {
            // if already closed page options content row.
            // do not work here.
            return Promise.resolve();
        }

        const buttonRow = document.querySelector('.' + this.#pageOptionsButtonsRowClassName);
        const buttonRowFloat = window.getComputedStyle(buttonRow)?.getPropertyValue('float');
        const pageContent = document.querySelector('.rd-page-content');
        const pageOptionsContainer = document.querySelector('.' + this.#pageOptionsContainerClassName);
        const pageOptionsContainerBottomSpace = window.getComputedStyle(pageOptionsContainer)?.getPropertyValue('margin-bottom');

        let topValue = 0;
        if (buttonRowFloat !== 'none') {
            // if user is not using small screen where button is floating on the right on larger screen.
            topValue = '-' + (button.offsetHeight + parseInt(pageOptionsContainerBottomSpace)) + 'px';
        }

        pageContent.style.transition = 'top 0.1s';
        pageContent.style.position = 'relative';
        pageContent.style.top = 0;
        await new Promise(r => setTimeout(r, 1));// delay to let transition work.
        pageContent.style.top = topValue;

        if (typeof(rdta_debug) !== 'undefined' && true === rdta_debug) {
            console.debug('[rdta][page options] closed content row');
        }

        return new Promise((resolve) => {
            setTimeout(() => {
                contentRow.classList.remove('opened');
                pageContent.style.transition = '';
                pageContent.style.position = '';
                pageContent.style.top = '';
                resolve();
            }, 100);// 0.1s of transition is 100 milliseconds.
        });
    }// #closeContentRow


    /**
     * Close other content row wraps except selected ID.
     * 
     * This method was called from `#listenOnClickButtons()`.
     * 
     * @param {string} exceptID The HTML ID.
     * @returns {undefined}
     */
    #closeOtherContentRowWrap(exceptID) {
        if (typeof(exceptID) !== 'string') {
            throw new Error('The argument exceptID must be string.');
        }

        const buttons = document.querySelectorAll('.' + this.#pageOptionsTogglerButtonClassName);
        const contentRow = document.querySelector('.' + this.#pageOptionsContentsRowClassName);
        let closed = 0;

        buttons?.forEach((button) => {
            const targetElementID = button.getAttribute(this.#ariaControlsName);
            if (targetElementID !== '' && exceptID !== targetElementID) {
                if (button.classList.contains('active')) {
                    ++closed;
                }
                this.#doCloseContentRowWrap(button, contentRow.querySelector('#' + targetElementID), false);
            }
        });

        if (typeof(rdta_debug) !== 'undefined' && true === rdta_debug) {
            console.debug('[rdta][page options] closed other content row wrap');
        }

        if (closed > 0) {
            // fire event.
            let event = new CustomEvent('rdta.pageoptions.closed.other', {
                'detail': {
                    'exceptID': exceptID,
                }
            });
            document.body.dispatchEvent(event);
        }
    }// #closeOtherContentRowWrap


    /**
     * Do close page option content row wrap and remove button active.
     * 
     * This method was called from `#listenOnClickButtons()`, `#closeOtherContentRowWrap()`.
     * 
     * @param {object} button A page option button.
     * @param {object} contentRowWrap The page option content row wrap.
     * @param {boolean} delay Set to `false` to do not delay before remove inline style. This cause element disappear immediately. Default is `true`. 
     * @returns {undefined}
     */
    async #doCloseContentRowWrap(button, contentRowWrap, delay = true) {
        button.classList.remove('active');
        button.setAttribute(this.#ariaExpandedName, 'false');
        contentRowWrap?.classList?.remove('active');

        if (typeof(rdta_debug) !== 'undefined' && true === rdta_debug) {
            console.debug('[rdta][page options] closed content row wrap');
        }
        if (true === delay) {
            await new Promise(r => setTimeout(r, 240));// delay before remove style. time must related to CSS transition of `.rd-page-options-contents-row > *`.
        }
        contentRowWrap.style.display = '';
    }// #doCloseContentRowWraps


    /**
     * Do open page option content row wrap and mark button active.
     * 
     * This method was called from `#listenOnClickButtons()`.
     * 
     * @param {object} button A page option button.
     * @param {object} contentRowWrap The page option content row wrap.
     * @returns {undefined}
     */
    async #doOpenContentRowWrap(button, contentRowWrap) {
        button.classList.add('active');
        button.setAttribute(this.#ariaExpandedName, 'true');
        contentRowWrap.style.display = 'block';
        await new Promise(r => setTimeout(r, 5));// delay before add class.
        contentRowWrap?.classList?.add('active');

        if (typeof(rdta_debug) !== 'undefined' && true === rdta_debug) {
            console.debug('[rdta][page options] opened content row wrap');
        }
    }// #doOpenContentRowWrap


    /**
     * Listen on click page options buttons and show or hide the contents.
     * 
     * This method was called from `init()`.
     * 
     * @returns {undefined}
     */
    #listenOnClickButtons() {
        if (typeof(rdta_debug) !== 'undefined' && true === rdta_debug) {
            console.debug('[rdta][page options] listening click buttons');
        }

        const buttons = document.querySelectorAll('.' + this.#pageOptionsTogglerButtonClassName);
        if (buttons) {
            buttons.forEach((button) => {
                const targetElementID = button.getAttribute(this.#ariaControlsName);
                if (!targetElementID) {
                    return ;
                }
                const contentRow = document.querySelector('.' + this.#pageOptionsContentsRowClassName);
                if (!contentRow) {
                    return ;
                }

                button.addEventListener('click', async (event) => {
                    event.preventDefault();
                    if (typeof(rdta_debug) !== 'undefined' && true === rdta_debug) {
                        console.debug('[rdta][page options] click on page options button');
                    }

                    const isExpanded = button.getAttribute(this.#ariaExpandedName);
                    const contentRowWrap = contentRow.querySelector('#' + targetElementID);
                    if ('true' === isExpanded) {
                        // if button is currently active.
                        // what to do is mark button in-active and close content row wrap.
                        await this.#doCloseContentRowWrap(button, contentRowWrap);
                        this.#closeContentRow(button, contentRow);

                        // fire event.
                        let event = new CustomEvent('rdta.pageoptions.closed', {
                            'detail': {
                                'contentRowWrap': contentRowWrap,
                            }
                        });
                        document.body.dispatchEvent(event);
                    } else {
                        // if button is not currently active.
                        // what to do is mark button active and open content row wrap.
                        await this.#openContentRow(button, contentRow);
                        this.#closeOtherContentRowWrap(targetElementID);
                        this.#doOpenContentRowWrap(button, contentRowWrap);

                        // fire event.
                        let event = new CustomEvent('rdta.pageoptions.opened', {
                            'detail': {
                                'contentRowWrap': contentRowWrap,
                            }
                        });
                        document.body.dispatchEvent(event);
                    }
                });
            });
        }
    }// #listenOnClickButtons


    /**
     * Slide down the main `.rd-page-content` and then mark page options content row as opened.
     * 
     * This method was called from `#listenOnClickButtons()`.
     * 
     * @async
     * @param {object} button A page option button element.
     * @param {object} contentRow The page options content row element.
     * @returns {Promise}
     */
    async #openContentRow(button, contentRow) {
        if (contentRow.classList.contains('opened')) {
            // if already opened page options content row.
            // do not work here.
            return Promise.resolve();
        }

        const buttonRow = document.querySelector('.' + this.#pageOptionsButtonsRowClassName);
        const buttonRowFloat = window.getComputedStyle(buttonRow)?.getPropertyValue('float');
        const pageContent = document.querySelector('.rd-page-content');
        const pageOptionsContainer = document.querySelector('.' + this.#pageOptionsContainerClassName);
        const pageOptionsContainerBottomSpace = window.getComputedStyle(pageOptionsContainer)?.getPropertyValue('margin-bottom');

        let topValue = 0;
        if (buttonRowFloat !== 'none') {
            // if user is not using small screen where button is floating on the right on larger screen.
            topValue = (button.offsetHeight + parseInt(pageOptionsContainerBottomSpace)) + 'px';
        }

        pageContent.style.transition = 'top 0.1s';
        pageContent.style.position = 'relative';
        pageContent.style.top = 0;
        await new Promise(r => setTimeout(r, 1));// delay to let transition work.
        pageContent.style.top = topValue;

        if (typeof(rdta_debug) !== 'undefined' && true === rdta_debug) {
            console.debug('[rdta][page options] opened content row');
        }

        return new Promise((resolve) => {
            setTimeout(() => {
                contentRow.classList.add('opened');
                pageContent.style.transition = '';
                pageContent.style.position = '';
                pageContent.style.top = '';
                resolve();
            }, 100);// 0.1s of transition is 100 milliseconds.
        });
    }// #openContentRow


    /**
     * Initialize RDTA page options.
     * 
     * @returns {undefined}
     */
    static init() {
        const thisClass = new this();

        thisClass.#listenOnClickButtons();
    }// init


}// RDTAPageOptions