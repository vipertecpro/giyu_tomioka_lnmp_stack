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
                // const isConfirmed = confirm('Are you sure you want to delete?');
                // Here we need to use the alert.js to show the confirmation modal
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
        // const filterInputs = document.querySelectorAll('input[name^="dataTable[filter]"]');
        //
        // filterInputs.forEach(input => {
        //     const nameParts = input.getAttribute('name').match(/dataTable\[filter\]\[([^\]]+)\]/);
        //     if (nameParts && nameParts[1]) {
        //         const column = nameParts[1];
        //         let value = input.value;
        //         if (input.type === 'checkbox' || input.type === 'radio') {
        //             value = input.checked ? input.value : '';
        //         }
        //         if (value !== null && value !== '') {
        //             if (!filters[column]) {
        //                 filters[column] = [];
        //             }
        //             filters[column].push(value);
        //         }
        //     }
        // });
        //
        // const searchInput = document.querySelector('input[name="dataTable[search]"]');
        // if (searchInput) {
        //     filters.search = searchInput.value;
        // }
        // // this filters should return an object like this:
        //         // {
        //         //     search: 'search value',
        //         //     filters : [
        //         //      {
        //         //        'status' : 'value1,
        //         //        'create_at': 'value2,
        //         //        .....
        //         //      }
        //         //    ]
        //         // }
        //         //

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
}
