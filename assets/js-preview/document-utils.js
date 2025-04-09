/* 
 * Document utilities and functional.
 * 
 * This JS file is for document pages only. It is no need on your project.
 * 
 * @license http://opensource.org/licenses/MIT MIT
 * @since 2.4.1
 */


class DocumentUtils {


    /**
     * Document utilities and functional class.
     */
    constructor() {
        this.#listenClickDemoLinkNoAction();
    }// constructor


    /**
     * Listen click on demo link (where `href` is '#') and prevent default action.
     * 
     * @returns {undefined}
     */
    #listenClickDemoLinkNoAction() {
        document.addEventListener('click', (event) => {
            let thisTarget = event.target;
            if (thisTarget.closest('[href="#"]')) {
                // if it is demo link.
                if (true === rdta_debug) {
                    console.log('[rdta] clicking on demo link. preventing default action.');
                }
                event.preventDefault();// just prevent link to '#'.
            }
        });
    }// #listenClickDemoLinkNoAction


}// DocumentUtils


// run on DOM document loaded. ------------------------------------------------------------------------------------------
document.addEventListener('DOMContentLoaded',function() {
    const documentUtils = new DocumentUtils();
});