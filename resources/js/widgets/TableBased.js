import axios from 'axios';

function observeElement(selector) {
    return new Promise((resolve) => {
        const observer = new MutationObserver((mutations, obs) => {
            const element = document.querySelector(selector);
            if (element) {
                obs.disconnect();
                resolve(element);
            }
        });
        observer.observe(document, {
            childList: true,
            subtree: true
        });
    });
}
class TableBased {
    constructor(moduleName) {
        this.moduleName = moduleName;
        observeElement(`[data-render-widget="${moduleName}"]`).then((element) => {
            this.widgetElement = element;
            this.checkboxState = {};
            this.checkedItemsCount = 0;
            this.checkAllState = false;
            this.totalCount = 0;
            this.searchQuery = '';
            this.hiddenInput = null;
            this.init().then(() => {
                console.log(`${moduleName} widget initialized`);
            });
        }).catch((error) => {
            console.error(error);
        });
    }
    async init() {
        if (this.widgetElement) {
            this.widgetApiSource = this.widgetElement.getAttribute('data-widget-source-api');
            await this.loadWidget(this.widgetApiSource);
            this.widgetTable = this.widgetElement.querySelector('[id="widget-list"]');
            if (this.widgetTable) {
                this.widgetTbody = this.widgetTable.querySelector('tbody');
                this.selectedItemsElement = this.widgetTable.querySelector('[data-widget-action="selected-items-count"]');
                this.checkAllInput = this.widgetTable.querySelector('[data-widget-action="check-all"]');
                this.widgetApiListSource = this.widgetTbody.getAttribute('data-render-widget-list-api');
                this.defaultValues = this.widgetElement.getAttribute('data-widget-default-values').split(',');
                this.searchInput = this.widgetElement.querySelector('[data-widget-action="search"]');
                this.paginationators = this.widgetElement.querySelector('[data-widget-render-pagination]');
                this.createHiddenInput();
                await this.loadList(this.widgetApiListSource);
                this.handleTableEvents();
                this.restoreDefaultValues();
                this.handleSearchEvent();
                this.updateCheckedItemsCount();
            }
        }
    }
    createHiddenInput() {
        this.hiddenInput = document.createElement('input');
        this.hiddenInput.type = 'hidden';
        this.hiddenInput.name = this.moduleName;
        this.hiddenInput.value = this.widgetElement.getAttribute('data-widget-default-values');
        this.widgetElement.appendChild(this.hiddenInput);
    }
    async loadWidget(dataSource) {
        try {
            const response = await axios.post(dataSource, { widget: this.moduleName });
            this.widgetElement.innerHTML = response.data.html;
        } catch (error) {
            console.error('Error loading widget:', error);
        }
    }
    async loadList(dataSource) {
        try {
            const response = await axios.post(dataSource, { search: this.searchQuery });
            this.widgetTbody.innerHTML = response.data.html;
            this.paginationators.innerHTML = response.data.pagination;
            if (response.data.totalCount !== undefined) {
                this.totalCount = response.data.totalCount;
            }
        } catch (error) {
            console.error('Error loading list:', error);
        }
    }
    handleTableEvents() {
        const checkboxes = this.widgetTbody.querySelectorAll('[data-widget-action="check"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const itemId = checkbox.getAttribute('data-checkbox-item-id');
                if (itemId) {
                    if (checkbox.checked) {
                        this.checkboxState[itemId] = true;
                    } else {
                        delete this.checkboxState[itemId];
                    }
                    this.checkAllInput.checked = false;
                    this.checkAllState = false;
                    this.updateCheckedItemsCount();
                    this.updateWidgetUpdatedValues();
                } else {
                    console.error('Checkbox item ID is missing or invalid');
                }
            });
        });
        this.handleCheckAllInput();
        this.handlePaginationEvents();
    }
    handleCheckAllInput() {
        this.checkAllInput.addEventListener('change', (event) => {
            const checkboxes = this.widgetTbody.querySelectorAll('[data-widget-action="check"]');
            const isChecked = event.target.checked;
            this.checkAllState = isChecked;
            checkboxes.forEach(checkbox => {
                checkbox.checked = isChecked;
                this.checkboxState[checkbox.getAttribute('data-checkbox-item-id')] = isChecked;
            });
            if (!isChecked) {
                this.checkboxState = {};
            }
            this.updateCheckedItemsCount();
            this.updateWidgetUpdatedValues();
        });
    }
    handlePaginationEvents() {
        const pageLinks = this.paginationators.querySelectorAll('.page-link');

        pageLinks.forEach(pageLink => {
            pageLink.addEventListener('click', async (event) => {
                event.preventDefault();
                this.storeCheckboxState();
                const page = pageLink.getAttribute('data-action-url');
                await this.loadList(page + (this.searchQuery ? '?search=' + this.searchQuery : ''));
                this.handleTableEvents();
                this.restoreCheckboxState();
            });
        });
        if (this.checkAllInput.checked) {
            this.restoreCheckboxState();
        }
    }
    storeCheckboxState() {
        const checkboxes = this.widgetTbody.querySelectorAll('[data-widget-action="check"]');
        checkboxes.forEach(checkbox => {
            this.checkboxState[checkbox.getAttribute('data-checkbox-item-id')] = checkbox.checked;
        });
    }
    restoreCheckboxState() {
        const checkboxes = this.widgetTbody.querySelectorAll('[data-widget-action="check"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checkAllState || (this.checkboxState[checkbox.getAttribute('data-checkbox-item-id')] || false);
        });
        this.updateCheckedItemsCount();
    }
    restoreDefaultValues() {
        this.defaultValues.forEach(id => {
            this.checkboxState[id] = true;
        });
        this.restoreCheckboxState();
        this.updateCheckedItemsCount();
        this.updateWidgetUpdatedValues();
    }
    updateCheckedItemsCount() {
        const validKeys = Object.keys(this.checkboxState).filter(key => key && key !== "0");
        if (this.checkAllInput.checked) {
            this.checkedItemsCount = this.totalCount - validKeys.filter(key => !this.checkboxState[key]).length;
        } else {
            this.checkedItemsCount = validKeys.filter(key => this.checkboxState[key]).length;
        }
        this.selectedItemsElement.innerHTML = this.checkedItemsCount;
    }
    updateWidgetUpdatedValues() {
        const updatedValues = Object.keys(this.checkboxState).filter(id => this.checkboxState[id]);
        this.hiddenInput.value = this.checkAllState ? 'all' : updatedValues.join(',');
    }
    handleSearchEvent() {
        if (this.searchInput) {
            this.searchInput.addEventListener('input', debounce(async (event) => {
                this.searchQuery = event.target.value;
                await this.loadList(this.widgetApiListSource + '?search=' + this.searchQuery);
                this.handleTableEvents();
            }, 300));
        }
    }
}
function debounce(func, wait) {
    let timeout;
    return function(...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), wait);
    };
}
export default TableBased;
