/* 
 * Document utilities and functional.
 * 
 * @license http://opensource.org/licenses/MIT MIT
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