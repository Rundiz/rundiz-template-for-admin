/**
 * JS for page datatables-js.php
 */


class DataTablesJSPage {


    /**
     * @type {Object[]} All activated DataTable object.
     */
    #dataTablesObjs = [];


    /**
     * @type {object|null} DataTables custom style object.
     */
    #dtStylesTable = null;


    /**
     * @returns {String} Table ID for custom styles.
     */
    get #dtStylesNewTableId() {
        return 'rdta-datatables-sample-customstyles';// styles change
    }// #dtStylesNewTableId


    /**
     * @returns {String} Custom styles select box ID.
     */
    get #dtStylesSelectboxId() {
        return 'datatables-styles';
    }// #dtStylesSelectboxId


    /**
     * @returns {String} Table ID for individual column search or select.
     */
    get #indDtNewId() {
        return 'rdta-datatables-sample-individual-searchselect';
    }// #indDtNewId


    /**
     * @returns {String} Table ID for responsive table.
     */
    get #responsiveDtNewId() {
        return 'rdta-datatables-sample-responsive1';
    }// #responsiveDtNewId


    /**
     * Activate all data tables.
     */
    #activateDataTables() {
        // activate sample 1 data table.
        this.#dataTablesObjs.push(new DataTable('#rdta-datatables-sample1'));
        // trigger custom select box change to activate data table.
        document.getElementById(this.#dtStylesSelectboxId).dispatchEvent(new Event('change', {'bubbles': true}));

        // activate data tables for cell colors and row colors samples.
        this.#dataTablesObjs.push(
            new DataTable('#rdta-datatables-sample-rowcolors', {
                'ordering': false,
            })
        );
        this.#dataTablesObjs.push(
            new DataTable('#rdta-datatables-sample-cellcolors', {
                'ordering': false,
            })
        );
        // end activate cell/row colors table.

        this.#activateDataTableIndividualSearch();

        // activate responsive data table.
        this.#dataTablesObjs.push(
            new DataTable('#' + this.#responsiveDtNewId, {
                responsive: true
            })
        );
        // activate responsive data table full action.
        this.#activateDataTableResponsiveFullAction();
    }// #activateDataTables


    /**
     * Activate data table for individual search.
     */
    #activateDataTableIndividualSearch() {
        const $ = jQuery.noConflict();
        const options = {
            initComplete: function() {// can't use arrow function here, otherwise it will be unable to access the same `this`.
                // Apply the search
                this.api()
                    .columns()
                    .every(function() {// can't use arrow function here, otherwise it will be unable to access the same `this`.
                        const column = this;
                        const select = $('select', this.footer());
                        const collator = new Intl.Collator(undefined, {numeric: true, sensitivity: 'base'});

                        column
                        .data()
                        .unique()
                        .sort(collator.compare)
                        .each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>');
                        });

                        if (select.length > 0) {
                            select.on('change', (event) => {
                                const value = event.target.value;
                                column.search(value ? '^' + value + '$' : '', true, false).draw();
                            });
                        }

                        $('input', this.footer()).on('keyup change clear', function() {// can't use arrow function here, otherwise it will be unable to access the same `this`.
                            if (column.search() !== this.value) {
                                column.search(this.value).draw();
                            }
                        });
                    });
            },
        };
        this.#dataTablesObjs.push(new DataTable('#' + this.#indDtNewId, options));
    }// #activateDataTableIndividualSearch


    /**
     * Activate data table for responsive full action.
     */
    #activateDataTableResponsiveFullAction() {
        const responsive2DtIdSelector = '#rdta-datatables-sample-responsive2';
        const options = {
            'columnDefs': [
                {
                    'orderable': false,
                    'searchable': false,
                    'targets': [0, -1]
                },
                {
                    'className': 'column-checkbox',
                    'targets': 0,
                },
                {
                    'className': 'none',
                    'targets': 4,
                },
                {
                    'className': 'dtr-control',
                    'orderable': false,
                    'targets': -1,
                },
            ],
            'order': [[1, 'desc']],
            'processing': true,
            'responsive': {
                'details': {
                    'type': 'column',
                    'target': -1,
                },
            }
        };
        this.#dataTablesObjs.push(new DataTable(responsive2DtIdSelector, options));
    }// #activateDataTableResponsiveFullAction


    /**
     * Copy and paste table from sample 1 to placeholder and rename with new ID.
     * 
     * @param {string} placeholderId The HTML ID of placeholder for table.
     * @param {string} newTableId New table HTML ID.
     */
    #copyAndPasteTable(placeholderId, newTableId) {
        if (typeof(placeholderId) !== 'string') {
            throw new Error('The placeholderId must be string.');
        }
        if (typeof(newTableId) !== 'string') {
            throw new Error('The newTableId must be string.');
        }

        // copy and paste table from above.
        const tableSample1 = document.getElementById('rdta-datatables-sample1');
        let placeholderE = document.getElementById(placeholderId);
        placeholderE.innerHTML = '<div class="rd-datatable-wrapper">' + tableSample1.outerHTML + '</div>';

        // modify id attribute.
        placeholderE.querySelector('table')
            ?.setAttribute('id', newTableId)
        ;
    }// #copyAndPasteTable


    /**
     * Copy and paste multiple tables.
     * 
     * @param {Boolean} emptyBefore Set to `true` to empty placeholders before copy and paste. Default is `false`.
     */
    #copyAndPasteTables(emptyBefore = false) {
        if (true === emptyBefore) {
            document.getElementById('rdta-datatables-sample-dt-styles-placeholder').innerHTML = '';
            document.getElementById('rdta-datatables-sample-individual-searchselect-placeholder').innerHTML = '';
            document.getElementById('rdta-datatables-sample-responsive-placeholder').innerHTML = '';
        }

        this.#copyAndPasteTable('rdta-datatables-sample-dt-styles-placeholder', this.#dtStylesNewTableId);
        this.#copyAndPasteTable('rdta-datatables-sample-individual-searchselect-placeholder', this.#indDtNewId);
        this.#copyAndPasteTable('rdta-datatables-sample-responsive-placeholder', this.#responsiveDtNewId);
    }// #copyAndPasteTables


    /**
     * Listen on DataTables styles change.
     * 
     * @returns {undefined}
     */
    #listenDtStylesChange() {
        document.getElementById('datatables-styles').addEventListener('change', (event) => {
            const thisValue = event.target.value;
            const tableE = document.getElementById(this.#dtStylesNewTableId);
            tableE.className = '';
            if (thisValue !== '') {
                const selectClasses = thisValue.split(' ');
                for (const eachClass of selectClasses) {
                    if (eachClass.trim() === '') {
                        continue;
                    }
                    tableE.classList.add(eachClass.trim());
                }// endfor;
            }// endif; value is not empty.

            if (this.#dtStylesTable) {
                this.#dtStylesTable.destroy();
            }
            this.#dtStylesTable = new DataTable('#' + this.#dtStylesNewTableId);
            this.#dataTablesObjs.push(this.#dtStylesTable);
        });
    }// #listenDtStylesChange


    /**
     * Setup individual search filters.
     */
    #setupIndividualSearchFilters() {
        document.querySelectorAll('#' + this.#indDtNewId + ' tfoot th').forEach((item, index) => {
            if (index === 0) {
                // if first column.
                item.innerHTML = '<select><option value=""></option></select>';
                return;// skip
            }
            const title = item.innerText;
            item.innerHTML = '<input type="text" placeholder="Search ' + title + '" />';
        });
    }// #setupIndividualSearchFilters


    /**
     * Initialize the page's tasks.
     */
    init() {
        // copy and paste tables HTML.
        this.#copyAndPasteTables();

        // set class(es) for each table.
        document.getElementById(this.#dtStylesNewTableId).className = 'display';
        document.getElementById(this.#dtStylesSelectboxId).value = 'display';
        document.getElementById(this.#responsiveDtNewId)?.classList.add('display', 'nowrap');
        document.getElementById(this.#responsiveDtNewId).closest('.rd-datatable-wrapper').className = '';

        // listen custom styles select box change.
        this.#listenDtStylesChange();
        // setup individual search filters.
        this.#setupIndividualSearchFilters();
        // activate all data tables.
        this.#activateDataTables();
    }// init


}// DataTablesJSPage


document.addEventListener('DOMContentLoaded', (event) => {
    const dtJSPage = new DataTablesJSPage();
    dtJSPage.init();
});