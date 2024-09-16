import axios from 'axios';

class Categories {
    constructor() {
        this.widgetElement = document.querySelector('[data-render-widget="categories"]');
        this.checkboxState = {};
        this.checkedItemsCount = 0;
        this.checkAllState = false;
        this.init().then(r => {
            console.log('Categories widget initialized', r);
        });
    }

    async init() {
        if (this.widgetElement) {
            this.widgetApiSource = this.widgetElement.getAttribute('data-widget-source-api');
            await this.loadWidget(this.widgetApiSource);
            this.paginationators = this.widgetElement.querySelector('[data-widget-render-pagination]');
            this.widgetTable = this.widgetElement.querySelector('[id="widget-list"]');
            if (this.widgetTable) {
                this.widgetTbody = this.widgetTable.querySelector('tbody');
                this.checkAllInput = this.widgetTable.querySelector('[data-widget-action="check-all"]');
                this.widgetApiListSource = this.widgetTbody.getAttribute('data-render-widget-list-api');
                this.defaultValues = this.widgetElement.getAttribute('data-widget-default-values').split(',');
                this.searchInput = this.widgetElement.querySelector('[data-widget-action="search"]');
                this.searchQuery = '';
                await this.loadList(this.widgetApiListSource);
                this.handleTableEvents();
                this.restoreDefaultValues();
                this.handleSearchEvent();
            }
        }
    }

    async loadWidget(dataSource) {
        try {
            const response = await axios.post(dataSource, { widget: 'categories' });
            this.widgetElement.innerHTML = response.data.html;
        } catch (error) {
            console.error(error);
        }
    }

    async loadList(dataSource) {
        try {
            const response = await axios.post(dataSource);
            this.widgetTbody.innerHTML = response.data.html;
            this.paginationators.innerHTML = response.data.pagination;
            this.restoreCheckboxState();
            this.updateCheckedItemsCount();
        } catch (error) {
            console.error(error);
        }
    }

    handleTableEvents() {
        const selectedItemsElement = this.widgetTable.querySelector('[data-widget-action="selected-items-count"]');
        selectedItemsElement.innerHTML = this.checkedItemsCount;
        const checkboxes = this.widgetTbody.querySelectorAll('[data-widget-action="check"]');
        const pageLinks = this.paginationators.querySelectorAll('.page-link');

        pageLinks.forEach(pageLink => {
            pageLink.addEventListener('click', async (event) => {
                event.preventDefault();
                this.storeCheckboxState();
                const page = pageLink.getAttribute('data-action-url');
                await this.loadList(page + (this.searchQuery ? '?search=' + this.searchQuery : ''));
                this.handleTableEvents();
            });
        });

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                this.checkboxState[checkbox.getAttribute('data-checkbox-item-id')] = checkbox.checked;
                this.updateCheckedItemsCount();
                selectedItemsElement.innerHTML = this.checkedItemsCount;
                this.updateWidgetUpdatedValues();
            });
        });

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
            const totalItems = this.widgetElement.querySelector('[data-widget-pagination-total]')?.getAttribute('data-widget-pagination-total');
            selectedItemsElement.innerHTML = isChecked ? totalItems : 0;
            this.updateWidgetUpdatedValues();
        });
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
            checkbox.checked = this.checkAllState || (this.checkboxState.hasOwnProperty(checkbox.getAttribute('data-checkbox-item-id')) ? this.checkboxState[checkbox.getAttribute('data-checkbox-item-id')] : false);
        });
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
        this.checkedItemsCount = Object.values(this.checkboxState).filter(checked => checked).length;
        const selectedItemsElement = this.widgetTable.querySelector('[data-widget-action="selected-items-count"]');
        selectedItemsElement.innerHTML = this.checkedItemsCount;
    }

    updateWidgetUpdatedValues() {
        const updatedValues = Object.keys(this.checkboxState).filter(id => this.checkboxState[id]);
        this.widgetElement.setAttribute('data-widget-updated-values', this.checkAllState ? 'all' : updatedValues.join(','));
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
export default Categories;
