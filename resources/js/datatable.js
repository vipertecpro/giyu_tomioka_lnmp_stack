import {initFlowbite} from "flowbite";

const dataTables = document.getElementById('dataTables');
const loadingSpinner = document.getElementById('loadingSpinner');

if (dataTables) {
    const tableSource = dataTables.getAttribute('data-source-api');

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
    /**
     * Pagination link click render table
     * */
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('page-link') || e.target.closest('.page-link')) {
            e.preventDefault();
            const getActionUrl = e.target.closest('.page-link').getAttribute('data-action-url');
            renderTableOnPage(getActionUrl);
        }
    });
    /**
     * Table row actions
     * */
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
                const isConfirmed = confirm('Are you sure you want to delete?');
                if (isConfirmed) {
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
}
