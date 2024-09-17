import { initFlowbite } from "flowbite";
import Alert from "./alert.js";
class DataTable {
    constructor(dataTablesId) {
        this.dataTables = document.querySelector(dataTablesId);
        this.tableSource = this.dataTables ? this.dataTables.getAttribute('data-source-api') : '';
        this.loadingElement = this.createLoadingElement();
        this.init();
    }

    init() {
        if (this.dataTables) {
            this.dataTables.appendChild(this.loadingElement);
            this.renderTableOnPage(this.tableSource);
            const reflectedForm = document.querySelector('main #reflectedForm');
            if(reflectedForm){
                const formTitle = reflectedForm.querySelector('.formTitle');
                if (formTitle) {
                    formTitle.textContent = formTitle.getAttribute('data-form-title');
                }
            }
            this.setupEventListeners();
        }
    }

    debounce(func, wait) {
        let timeout;
        return (...args) => {
            const context = this;
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(context, args), wait);
        };
    }

    renderTableOnPage(getActionUrl, data = {}) {
        this.toggleLoading(true);
        axios.post(getActionUrl, data, {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            this.dataTables.innerHTML = response.data.html;
            initFlowbite();
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        })
        .finally(() => {
            this.toggleLoading(false);
        });
    }

    setupEventListeners() {
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('tableRowAction') || e.target.closest('.tableRowAction')) {
                e.preventDefault();
                const actionElement = e.target.classList.contains('tableRowAction') ? e.target : e.target.closest('.tableRowAction');
                const action = actionElement.getAttribute('data-row-action');
                const url = actionElement.getAttribute('data-table-row-url');
                const method = actionElement.getAttribute('data-row-method') || 'GET';
                const rowId = actionElement.getAttribute('data-table-row-id');
                const reflectedForm = document.querySelector('main #reflectedForm');
                if(reflectedForm){
                    this.handleAction(action, url, method, actionElement, rowId, reflectedForm);
                }else{
                    this.handleAction(action, url, method, actionElement, rowId);
                }
            }
        });

        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('page-link') || e.target.closest('.page-link')) {
                e.preventDefault();
                const getActionUrl = e.target.closest('.page-link').getAttribute('data-action-url');
                const tableData = this.gatherTableData();
                this.renderTableOnPage(getActionUrl, tableData);
            }
        });

        const searchInput = document.querySelector('input[name="dataTable[search]"]');
        if (searchInput) {
            const debouncedSearchHandler = this.debounce(() => {
                const tableData = this.gatherTableData();
                this.renderTableOnPage(this.tableSource, tableData);
            }, 300);
            searchInput.addEventListener('input', debouncedSearchHandler);
        }

        const filterInputs = document.querySelectorAll('input[name^="dataTable[filter]"]');
        filterInputs.forEach(input => {
            input.addEventListener('change', () => {
                const tableData = this.gatherTableData();
                this.renderTableOnPage(this.tableSource, tableData);
            });
        });

        const sortInputs = document.querySelectorAll('input[name^="dataTable[sort]"]');
        sortInputs.forEach(input => {
            input.addEventListener('change', () => {
                const tableData = this.gatherTableData();
                this.renderTableOnPage(this.tableSource, tableData);
            });
        });
    }

    handleAction(action, url, method, actionElement, rowId, reflectedForm) {
        if (action === 'redirect') {
            window.location.href = url;
        } else if (action === 'delete') {
            new Alert({
                message: 'Are you sure you want to delete?',
                onConfirm: () => {
                    axios({
                        method: method,
                        url: url,
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => {
                        if (response.data.status === 'success') {
                            actionElement.closest('tr').remove();
                        }
                    })
                    .catch(error => {
                        console.error('Error deleting data:', error);
                    });
                }
            }, 'confirm');
        } else if (action === 'submit') {
            axios({
                method: method,
                url: url,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (response.data.success) {
                    this.renderTableOnPage(this.tableSource);
                }
            })
            .catch(error => {
                console.error('Error submitting data:', error);
            });
        }else if(action === 'reflect'){

            axios({
                method: method,
                url: url,
                data : {
                  'id' : rowId
                },
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                const resetButton = reflectedForm.querySelector('[data-form-action="resetForm"]');
                resetButton.classList.add('flex');
                resetButton.classList.remove('hidden');
                if (response.data.status === 'success') {
                    const formFieldsData = response.data.data;
                    const moduleTitle = response.data.module;
                    if(reflectedForm){
                        const formTitle = reflectedForm.querySelector('.formTitle');
                        if (formTitle) {
                            formTitle.textContent = `Edit ${moduleTitle}`;
                        }
                    }
                    for (const formField of reflectedForm.querySelectorAll('input, select, textarea')) {
                        formField.value = '';
                    }
                    reflectedForm.querySelectorAll('.field-error').forEach(error => error.remove());
                    for (const [key, value] of Object.entries(formFieldsData)) {
                        const formField = reflectedForm.querySelector(`[name="${key}"]`);
                        if (formField) {
                            formField.value = value;
                        }
                    }
                }
            })
            .catch(error => {
                console.error('Error reflecting data:', error);
            });
        }
    }

    gatherTableData() {
        const filters = {};

        const searchInput = document.querySelector('input[name="dataTable[search]"]');
        if (searchInput) {
            filters.search = searchInput.value;
        }
        const filterInputs = document.querySelectorAll('input[name^="dataTable[filter]"]');
        filterInputs.forEach(input => {
            const nameParts = input.getAttribute('name').match(/dataTable\[filter\]\[([^\]]+)\]/);
            if (nameParts && nameParts[1]) {
                const column = nameParts[1];
                let value = input.value;
                if (input.type === 'checkbox' || input.type === 'radio') {
                    value = input.checked ? input.value : '';
                }
                if (value !== null && value !== '') {
                    if (!filters.filters) {
                        filters.filters = [];
                    }
                    filters.filters.push({
                        [column]: value
                    });
                }
            }
        });
        return filters;
    }

    toggleLoading(show) {
        if (show) {
            this.loadingElement.style.display = 'flex';
        } else {
            this.loadingElement.style.display = 'none';
        }
    }

    createLoadingElement() {
        const loadingDiv = document.createElement('div');
        loadingDiv.className = 'flex items-center justify-center w-full h-full border border-gray-200 rounded bg-gray-50 dark:bg-gray-800 dark:border-gray-700 absolute top-0 left-0 right-0 bottom-0 z-50';
        loadingDiv.id = 'table-loading';
        loadingDiv.innerHTML = `
            <div role="status">
                <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        `;
        return loadingDiv;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new DataTable('.dataTables');
});
