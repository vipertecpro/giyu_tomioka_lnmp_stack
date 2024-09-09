import {initFlowbite} from "flowbite";
import Alert from "./alert.js";

const dataTables = document.getElementById('dataTables');
const loadingSpinner = document.getElementById('loadingSpinner');
function debounce(func, wait) {
    let timeout;
    return function(...args) {
        const context = this;
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(context, args), wait);
    };
}
const tableSource = dataTables ? dataTables.getAttribute('data-source-api') : '';
if (dataTables) {
    function renderTableOnPage(getActionUrl, data = {}) {
        dataTables.innerHTML = '';
        loadingSpinner.style.display = 'block';
        fetch(getActionUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(response => {
                dataTables.innerHTML = response.html;
                initFlowbite();
                loadingSpinner.style.display = 'none';
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                loadingSpinner.style.display = 'none';
            });
    }
    renderTableOnPage(tableSource);
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('tableRowAction') || e.target.closest('.tableRowAction')) {
            e.preventDefault();
            const parentRow = e.target.classList.contains('tableRowAction') ? e.target : e.target.closest('.tableRowAction');
            const actionElement = e.target.classList.contains('tableRowAction') ? e.target : e.target.closest('.tableRowAction');
            const action = actionElement.getAttribute('data-row-action');
            const url = actionElement.getAttribute('data-table-row-url');
            const method = actionElement.getAttribute('data-row-method') || 'GET';
            if (action === 'redirect') {
                window.location.href = url;
            } else if (action === 'delete') {
                new Alert({
                    message: 'Are you sure you want to delete?',
                    onConfirm: () => {
                        fetch(url, {
                            method: method,
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                            .then(response => response.json())
                            .then(response => {
                                if (response.status === 'success') {
                                    parentRow.closest('tr').remove();
                                }
                            })
                            .catch(error => {
                                console.error('Error deleting data:', error);
                            });
                    }
                }, 'confirm');
            } else if (action === 'submit') {
                fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => response.json())
                    .then(response => {
                        if (response.success) {
                            renderTableOnPage(tableSource);
                        }
                    })
                    .catch(error => {
                        console.error('Error submitting data:', error);
                    });
            }
        }
    });

    function gatherTableData() {
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
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('page-link') || e.target.closest('.page-link')) {
            e.preventDefault();
            const getActionUrl = e.target.closest('.page-link').getAttribute('data-action-url');
            const tableData = gatherTableData();
            renderTableOnPage(getActionUrl, tableData);
        }
    });

    const searchInput = document.querySelector('input[name="dataTable[search]"]');
    if (searchInput) {
        const debouncedSearchHandler = debounce(function() {
            const tableData = gatherTableData();
            renderTableOnPage(tableSource, tableData);
        }, 300);
        searchInput.addEventListener('input', debouncedSearchHandler);
    }

    const filterInputs = document.querySelectorAll('input[name^="dataTable[filter]"]');
    filterInputs.forEach(input => {
        input.addEventListener('change', function() {
            const tableData = gatherTableData();
            renderTableOnPage(tableSource, tableData);
        });
    });
    // Here i want to handle sort
    // @foreach($columns as $column)
    //                                 <li>
    //                                     <div class="flex items-center ps-2">
    //                                         <input id="filter-sort-{{ $column }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" value="1" name="dataTable[sort][{{ $column }}]">
    //                                         <label for="filter-sort-{{ $column }}" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $column }}</label>
    //                                     </div>
    //                                 </li>
    //                             @endforeach
    const sortInputs = document.querySelectorAll('input[name^="dataTable[sort]"]');
    sortInputs.forEach(input => {
        input.addEventListener('change', function() {
            const tableData = gatherTableData();
            renderTableOnPage(tableSource, tableData);
        });
    });
}
