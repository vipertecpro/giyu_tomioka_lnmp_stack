import "./assets/themeToggle-CfnEXkQY.js";
import { initFlowbite } from "flowbite";
import axios$1 from "axios";
import "jquery";
import "select2";
class ProgressBar {
  constructor(duration, interval) {
    this.duration = duration;
    this.interval = interval;
    this.steps = duration / interval;
    this.currentStep = 0;
    this.progressBar = null;
  }
  createProgressBar() {
    return `
            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4 dark:bg-gray-700">
                <div id="progress-bar" class="bg-green-600 h-2.5 rounded-full dark:bg-green-500" style="width: 0%; transition: width ${this.interval}ms;"></div>
            </div>
        `;
  }
  startProgress() {
    this.progressBar = document.getElementById("progress-bar");
    this.intervalId = setInterval(() => {
      this.currentStep++;
      const progress = this.currentStep / this.steps * 100;
      this.progressBar.style.width = `${progress}%`;
      if (this.currentStep >= this.steps) {
        clearInterval(this.intervalId);
        this.onComplete();
      }
    }, this.interval);
  }
  onComplete() {
  }
}
class Alert {
  constructor(responseData, type) {
    this.responseData = responseData;
    this.type = type;
    this.init();
  }
  init() {
    switch (this.type) {
      case "confirm":
        this.showConfirmationModal();
        break;
      case "success":
        this.showSuccessAlert();
        break;
      case "error":
        this.showErrorAlert();
        break;
      default:
        console.warn("Unknown alert type:", this.type);
    }
  }
  showConfirmationModal() {
    const { message, onConfirm, onCancel } = this.responseData;
    const modalHtml = `
            <div id="alert-modal" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full flex">
                 <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <div class="p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="text-2xl font-normal text-gray-500 dark:text-gray-400">${message}</h3>
                            <div class="py-5">
                                <button id="confirm-btn" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5">Yes, I'm sure</button>
                                <button id="cancel-btn" class="ml-3 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="alert-backdrop" class="bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40"></div>
        `;
    this.insertModal(modalHtml);
    document.getElementById("confirm-btn").addEventListener("click", () => {
      onConfirm();
      this.closeModal();
    });
    document.getElementById("cancel-btn").addEventListener("click", () => {
      if (onCancel) onCancel();
      this.closeModal();
    });
  }
  showSuccessAlert() {
    const { message, redirect } = this.responseData;
    const duration = 2e3;
    const interval = 100;
    const successHtml = `
            <div id="success-alert" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full flex">
                <div class="relative w-full max-w-2xl max-h-full p-4 mb-4 text-green-800 border-2 border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800">
                    ${new ProgressBar(duration, interval).createProgressBar()}
                    <div class="flex items-center justify-center flex-col">
                        <svg class="w-20 h-20 text-green-500 dark:text-green" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                          <path fill-rule="evenodd" d="M15.03 9.684h3.965c.322 0 .64.08.925.232.286.153.532.374.717.645a2.109 2.109 0 0 1 .242 1.883l-2.36 7.201c-.288.814-.48 1.355-1.884 1.355-2.072 0-4.276-.677-6.157-1.256-.472-.145-.924-.284-1.348-.404h-.115V9.478a25.485 25.485 0 0 0 4.238-5.514 1.8 1.8 0 0 1 .901-.83 1.74 1.74 0 0 1 1.21-.048c.396.13.736.397.96.757.225.36.32.788.269 1.211l-1.562 4.63ZM4.177 10H7v8a2 2 0 1 1-4 0v-6.823C3 10.527 3.527 10 4.176 10Z" clip-rule="evenodd"/>
                        </svg>
                        <h3 class="text-2xl font-medium">Success</h3>
                        <div class="mt-2 mb-4 text-xl font-bold">
                            ${message}
                        </div>
                    </div>
                </div>
            </div>
            <div id="alert-backdrop" class="bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40"></div>
        `;
    this.insertAlert(successHtml);
    const progressBar = new ProgressBar(duration, interval);
    progressBar.onComplete = () => {
      this.removeAlert("success-alert");
      if (redirect) {
        window.location.href = redirect;
      }
    };
    progressBar.startProgress();
  }
  showErrorAlert() {
    const { message, redirect } = this.responseData;
    const duration = 2e3;
    const interval = 100;
    const errorHtml = `
            <div id="error-alert" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full flex">
                <div class="relative w-full max-w-2xl max-h-full p-4 mb-4 text-red-800 border-2 border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800">
                ${new ProgressBar(duration, interval).createProgressBar()}
                    <div class="flex items-center justify-center flex-col">
                        <svg class="w-20 h-20 text-red-500 dark:text-red" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                          <path fill-rule="evenodd" d="M8.97 14.316H5.004c-.322 0-.64-.08-.925-.232a2.022 2.022 0 0 1-.717-.645 2.108 2.108 0 0 1-.242-1.883l2.36-7.201C5.769 3.54 5.96 3 7.365 3c2.072 0 4.276.678 6.156 1.256.473.145.925.284 1.35.404h.114v9.862a25.485 25.485 0 0 0-4.238 5.514c-.197.376-.516.67-.901.83a1.74 1.74 0 0 1-1.21.048 1.79 1.79 0 0 1-.96-.757 1.867 1.867 0 0 1-.269-1.211l1.562-4.63ZM19.822 14H17V6a2 2 0 1 1 4 0v6.823c0 .65-.527 1.177-1.177 1.177Z" clip-rule="evenodd"/>
                        </svg>

                        <h3 class="text-2xl font-medium">Error</h3>
                        <div class="mt-2 mb-4 text-xl font-bold">
                            ${message}
                        </div>
                    </div>
                </div>
            </div>
            <div id="alert-backdrop" class="bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40"></div>
        `;
    this.insertAlert(errorHtml);
    const progressBar = new ProgressBar(duration, interval);
    progressBar.onComplete = () => {
      this.removeAlert("error-alert");
      if (redirect) {
        window.location.href = redirect;
      }
    };
    progressBar.startProgress();
  }
  insertModal(html) {
    document.body.insertAdjacentHTML("beforeend", html);
  }
  insertAlert(html) {
    document.body.insertAdjacentHTML("beforeend", html);
  }
  closeModal() {
    const modalElement = document.getElementById("alert-modal");
    const backdropElement = document.getElementById("alert-backdrop");
    if (modalElement) modalElement.remove();
    if (backdropElement) backdropElement.remove();
  }
  removeAlert(alertId) {
    const alertElement = document.getElementById(alertId);
    const backdropElement = document.getElementById("alert-backdrop");
    if (alertElement) alertElement.remove();
    if (backdropElement) backdropElement.remove();
  }
}
class DataTable {
  constructor(dataTablesId) {
    this.dataTables = document.querySelector(dataTablesId);
    this.tableSource = this.dataTables ? this.dataTables.getAttribute("data-source-api") : "";
    this.loadingElement = this.createLoadingElement();
    this.init();
  }
  init() {
    if (this.dataTables) {
      this.dataTables.appendChild(this.loadingElement);
      this.renderTableOnPage(this.tableSource);
      const reflectedForm = document.querySelector("main #reflectedForm");
      if (reflectedForm) {
        const formTitle = reflectedForm.querySelector(".formTitle");
        if (formTitle) {
          formTitle.textContent = formTitle.getAttribute("data-form-title");
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
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
      }
    }).then((response) => {
      this.dataTables.innerHTML = response.data.html;
      initFlowbite();
    }).catch((error) => {
      console.error("Error fetching data:", error);
    }).finally(() => {
      this.toggleLoading(false);
    });
  }
  setupEventListeners() {
    document.addEventListener("click", (e) => {
      if (e.target.classList.contains("tableRowAction") || e.target.closest(".tableRowAction")) {
        e.preventDefault();
        const actionElement = e.target.classList.contains("tableRowAction") ? e.target : e.target.closest(".tableRowAction");
        const action = actionElement.getAttribute("data-row-action");
        const url = actionElement.getAttribute("data-table-row-url");
        const method = actionElement.getAttribute("data-row-method") || "GET";
        const rowId = actionElement.getAttribute("data-table-row-id");
        const reflectedForm = document.querySelector("main #reflectedForm");
        if (reflectedForm) {
          this.handleAction(action, url, method, actionElement, rowId, reflectedForm);
        } else {
          this.handleAction(action, url, method, actionElement, rowId);
        }
      }
    });
    document.addEventListener("click", (e) => {
      if (e.target.classList.contains("page-link") || e.target.closest(".page-link")) {
        e.preventDefault();
        const getActionUrl = e.target.closest(".page-link").getAttribute("data-action-url");
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
      searchInput.addEventListener("input", debouncedSearchHandler);
    }
    const filterInputs = document.querySelectorAll('input[name^="dataTable[filter]"]');
    filterInputs.forEach((input) => {
      input.addEventListener("change", () => {
        const tableData = this.gatherTableData();
        this.renderTableOnPage(this.tableSource, tableData);
      });
    });
    const sortInputs = document.querySelectorAll('input[name^="dataTable[sort]"]');
    sortInputs.forEach((input) => {
      input.addEventListener("change", () => {
        const tableData = this.gatherTableData();
        this.renderTableOnPage(this.tableSource, tableData);
      });
    });
  }
  handleAction(action, url, method, actionElement, rowId, reflectedForm) {
    if (action === "redirect") {
      window.location.href = url;
    } else if (action === "delete") {
      new Alert({
        message: "Are you sure you want to delete?",
        onConfirm: () => {
          axios({
            method,
            url,
            headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
            }
          }).then((response) => {
            if (response.data.status === "success") {
              actionElement.closest("tr").remove();
            }
          }).catch((error) => {
            console.error("Error deleting data:", error);
          });
        }
      }, "confirm");
    } else if (action === "submit") {
      axios({
        method,
        url,
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        }
      }).then((response) => {
        if (response.data.success) {
          this.renderTableOnPage(this.tableSource);
        }
      }).catch((error) => {
        console.error("Error submitting data:", error);
      });
    } else if (action === "reflect") {
      axios({
        method,
        url,
        data: {
          "id": rowId
        },
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        }
      }).then((response) => {
        const resetButton = reflectedForm.querySelector('[data-form-action="resetForm"]');
        resetButton.classList.add("flex");
        resetButton.classList.remove("hidden");
        if (response.data.status === "success") {
          const formFieldsData = response.data.data;
          const moduleTitle = response.data.module;
          if (reflectedForm) {
            const formTitle = reflectedForm.querySelector(".formTitle");
            if (formTitle) {
              formTitle.textContent = `Edit ${moduleTitle}`;
            }
          }
          for (const formField of reflectedForm.querySelectorAll("input, select, textarea")) {
            formField.value = "";
          }
          reflectedForm.querySelectorAll(".field-error").forEach((error) => error.remove());
          for (const [key, value] of Object.entries(formFieldsData)) {
            const formField = reflectedForm.querySelector(`[name="${key}"]`);
            if (formField) {
              formField.value = value;
            }
          }
        }
      }).catch((error) => {
        console.error("Error reflecting data:", error);
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
    filterInputs.forEach((input) => {
      const nameParts = input.getAttribute("name").match(/dataTable\[filter\]\[([^\]]+)\]/);
      if (nameParts && nameParts[1]) {
        const column = nameParts[1];
        let value = input.value;
        if (input.type === "checkbox" || input.type === "radio") {
          value = input.checked ? input.value : "";
        }
        if (value !== null && value !== "") {
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
      this.loadingElement.style.display = "flex";
    } else {
      this.loadingElement.style.display = "none";
    }
  }
  createLoadingElement() {
    const loadingDiv = document.createElement("div");
    loadingDiv.className = "flex items-center justify-center w-full h-full border border-gray-200 rounded bg-gray-50 dark:bg-gray-800 dark:border-gray-700 absolute top-0 left-0 right-0 bottom-0 z-50";
    loadingDiv.id = "table-loading";
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
document.addEventListener("DOMContentLoaded", () => {
  new DataTable(".dataTables");
});
class Plugins {
  constructor() {
    this.initSelect2();
  }
  initSelect2() {
    $('select[name="status"]').select2({
      placeholder: "Select a status",
      allowClear: true
    });
  }
}
document.addEventListener("DOMContentLoaded", () => {
  new Plugins();
});
class FormHandler {
  constructor(button) {
    this.submitButton = button;
    this.form = button.closest("form");
    this.formTitle = "";
    this.method = this.form.getAttribute("method");
    this.action = this.form.getAttribute("action");
    this.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
    this.loadingElement = this.createLoadingElement();
    this.init();
  }
  init() {
    var _a;
    (_a = this.submitButton) == null ? void 0 : _a.addEventListener("click", (event) => this.handleSubmit(event));
    const resetButton = this.form.querySelector('[data-form-action="resetForm"]');
    if (resetButton) {
      this.formTitle = this.form.querySelector(".formTitle").getAttribute("data-form-title");
      resetButton.addEventListener("click", (event) => this.handleReset(event));
    }
  }
  async handleSubmit(event) {
    var _a, _b;
    event.preventDefault();
    const formData = new FormData(this.form);
    this.toggleLoading(true);
    try {
      if (this.method === "GET") {
        window.location.href = `${this.action}?${new URLSearchParams(formData)}`;
      } else if (this.method === "DELETE") {
        await this.confirmDelete(formData);
      } else {
        await this.submitForm(formData);
      }
    } catch (error) {
      this.showError(((_b = (_a = error.response) == null ? void 0 : _a.data) == null ? void 0 : _b.message) || error.message || "An unknown error occurred. Please try again.");
    } finally {
      this.toggleLoading(false);
    }
  }
  async confirmDelete(formData) {
    new Alert({
      message: "Are you sure you want to delete this item?",
      onConfirm: async () => {
        try {
          const response = await axios({
            method: this.method,
            url: this.action,
            headers: { "X-CSRF-TOKEN": this.csrfToken },
            data: formData
          });
          this.handleSuccess(response.data);
        } catch (error) {
          this.handleFormError(error.response.data);
        }
      }
    }, "confirm");
  }
  async submitForm(formData) {
    try {
      const response = await axios({
        method: this.method,
        url: this.action,
        headers: { "X-CSRF-TOKEN": this.csrfToken },
        data: formData
      });
      this.handleSuccess(response.data);
    } catch (error) {
      this.handleFormError(error.response.data);
    }
  }
  handleSuccess(data) {
    if (data.status === "success") {
      this.form.reset();
      new Alert(data, "success");
    } else {
      new Alert(data, "error");
    }
  }
  handleFormError(data) {
    if (data.status === "form-error") {
      this.clearErrors();
      this.displayErrors(data.fields, data.message);
    } else {
      new Alert(data, "error");
    }
  }
  clearErrors() {
    this.form.querySelectorAll(".field-error").forEach((error) => error.remove());
  }
  displayErrors(fields, messages) {
    fields.forEach((field) => {
      var _a;
      const input = this.form.querySelector(`[name="${field}"]`);
      const error = messages[field];
      (_a = input.parentNode.querySelector(".text-red-500")) == null ? void 0 : _a.remove();
      if (error) {
        const errorElement = document.createElement("div");
        errorElement.className = "mt-2 text-xs text-red-600 dark:text-red-400 field-error";
        errorElement.innerText = error[0];
        input.parentNode.appendChild(errorElement);
      }
    });
  }
  toggleLoading(show) {
    if (show) {
      this.form.appendChild(this.loadingElement);
    } else {
      this.loadingElement.remove();
    }
  }
  createLoadingElement() {
    const loadingDiv = document.createElement("div");
    loadingDiv.className = "flex items-center justify-center w-full h-full border border-gray-200 rounded bg-gray-50 dark:bg-gray-800 dark:border-gray-700 absolute top-0 left-0 right-0 bottom-0 z-50";
    loadingDiv.id = "form-loading";
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
  handleReset(event) {
    event.preventDefault();
    this.form.reset();
    this.form.querySelectorAll("input, select, textarea").forEach((element) => {
      element.value = "";
    });
    this.clearErrors();
    event.target.classList.add("hidden");
    event.target.classList.remove("flex");
    const formTitle = this.form.querySelector(".formTitle");
    if (formTitle) {
      formTitle.innerText = this.formTitle;
    }
  }
  showError(message) {
    new Alert({ message, status: "error" }, "error");
  }
}
document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".formSubmit").forEach((button) => {
    new FormHandler(button);
  });
});
class FeaturedImage {
  constructor() {
    this.init();
  }
  init() {
    this.bindEvents();
  }
  bindEvents() {
    const featuredImageInput = document.querySelector(".featuredImage");
    const previewPlaceholder = document.querySelector(".previewPlaceholder");
    const addBtn = document.querySelector('[data-widget-action="add"]');
    const editBtn = document.querySelector('[data-widget-action="edit"]');
    const removeBtn = document.querySelector('[data-widget-action="remove"]');
    if (previewPlaceholder) {
      this.setDefaultImage(previewPlaceholder);
    }
    if (featuredImageInput) {
      featuredImageInput.addEventListener("change", () => {
        this.toggleButtons(addBtn, editBtn, removeBtn, true);
        previewPlaceholder.src = URL.createObjectURL(featuredImageInput.files[0]);
      });
    }
    this.addClickListener(addBtn, featuredImageInput);
    this.addClickListener(editBtn, featuredImageInput);
    if (removeBtn) {
      removeBtn.addEventListener("click", () => {
        this.resetImage(featuredImageInput, previewPlaceholder, addBtn, editBtn, removeBtn);
      });
    }
  }
  setDefaultImage(previewPlaceholder) {
    const defaultImageUrl = previewPlaceholder.getAttribute("data-preview-default-url");
    if (defaultImageUrl) {
      previewPlaceholder.src = defaultImageUrl;
    } else {
      console.error("Default image URL is not set.");
    }
  }
  addClickListener(button, input) {
    if (button) {
      button.addEventListener("click", () => input == null ? void 0 : input.click());
    }
  }
  resetImage(input, placeholder, addBtn, editBtn, removeBtn) {
    if (input) {
      input.value = "";
    }
    if (placeholder) {
      placeholder.src = placeholder.getAttribute("data-preview-default-url");
    }
    this.toggleButtons(addBtn, editBtn, removeBtn, false);
  }
  toggleButtons(addBtn, editBtn, removeBtn, isImageSelected) {
    if (addBtn) {
      addBtn.classList.toggle("hidden", isImageSelected);
    }
    if (editBtn) {
      editBtn.classList.toggle("hidden", !isImageSelected);
    }
    if (removeBtn) {
      removeBtn.classList.toggle("hidden", !isImageSelected);
    }
  }
}
class Categories {
  constructor() {
    this.widgetElement = document.querySelector('[data-render-widget="categories"]');
    this.checkboxState = {};
    this.checkedItemsCount = 0;
    this.checkAllState = false;
    this.totalCount = 0;
    this.searchQuery = "";
    this.hiddenInput = null;
    this.init().then(() => {
      console.log("TableBased widget initialized");
    });
  }
  async init() {
    if (this.widgetElement) {
      this.widgetApiSource = this.widgetElement.getAttribute("data-widget-source-api");
      await this.loadWidget(this.widgetApiSource);
      this.widgetTable = this.widgetElement.querySelector('[id="widget-list"]');
      if (this.widgetTable) {
        this.widgetTbody = this.widgetTable.querySelector("tbody");
        this.checkAllInput = this.widgetTable.querySelector('[data-widget-action="check-all"]');
        this.widgetApiListSource = this.widgetTbody.getAttribute("data-render-widget-list-api");
        this.defaultValues = this.widgetElement.getAttribute("data-widget-default-values").split(",");
        this.searchInput = this.widgetElement.querySelector('[data-widget-action="search"]');
        this.paginationators = this.widgetElement.querySelector("[data-widget-render-pagination]");
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
    this.hiddenInput = document.createElement("input");
    this.hiddenInput.type = "hidden";
    this.hiddenInput.name = "categories";
    this.hiddenInput.value = this.widgetElement.getAttribute("data-widget-default-values");
    this.widgetElement.appendChild(this.hiddenInput);
  }
  async loadWidget(dataSource) {
    try {
      const response = await axios$1.post(dataSource, { widget: "categories" });
      this.widgetElement.innerHTML = response.data.html;
    } catch (error) {
      console.error("Error loading widget:", error);
    }
  }
  async loadList(dataSource) {
    try {
      const response = await axios$1.post(dataSource, { search: this.searchQuery });
      this.widgetTbody.innerHTML = response.data.html;
      this.paginationators.innerHTML = response.data.pagination;
      if (response.data.totalCount !== void 0) {
        this.totalCount = response.data.totalCount;
      }
    } catch (error) {
      console.error("Error loading list:", error);
    }
  }
  handleTableEvents() {
    const selectedItemsElement = this.widgetTable.querySelector('[data-widget-action="selected-items-count"]');
    selectedItemsElement.innerHTML = this.checkedItemsCount;
    const checkboxes = this.widgetTbody.querySelectorAll('[data-widget-action="check"]');
    checkboxes.forEach((checkbox) => {
      checkbox.addEventListener("change", () => {
        if (checkbox.checked) {
          this.checkboxState[checkbox.getAttribute("data-checkbox-item-id")] = checkbox.checked;
        } else {
          delete this.checkboxState[checkbox.getAttribute("data-checkbox-item-id")];
        }
        this.updateCheckedItemsCount();
        this.updateWidgetUpdatedValues();
      });
    });
    this.handleCheckAllInput();
    this.handlePaginationEvents();
  }
  handleCheckAllInput() {
    this.checkAllInput.addEventListener("change", (event) => {
      const checkboxes = this.widgetTbody.querySelectorAll('[data-widget-action="check"]');
      const isChecked = event.target.checked;
      this.checkAllState = isChecked;
      checkboxes.forEach((checkbox) => {
        checkbox.checked = isChecked;
        this.checkboxState[checkbox.getAttribute("data-checkbox-item-id")] = isChecked;
      });
      if (!isChecked) {
        this.checkboxState = {};
      }
      this.updateCheckedItemsCount();
      this.updateWidgetUpdatedValues();
    });
  }
  handlePaginationEvents() {
    const pageLinks = this.paginationators.querySelectorAll(".page-link");
    pageLinks.forEach((pageLink) => {
      pageLink.addEventListener("click", async (event) => {
        event.preventDefault();
        this.storeCheckboxState();
        const page = pageLink.getAttribute("data-action-url");
        await this.loadList(page + (this.searchQuery ? "?search=" + this.searchQuery : ""));
        this.handleTableEvents();
      });
    });
    if (this.checkAllInput.checked) {
      this.restoreCheckboxState();
    }
  }
  storeCheckboxState() {
    const checkboxes = this.widgetTbody.querySelectorAll('[data-widget-action="check"]');
    checkboxes.forEach((checkbox) => {
      this.checkboxState[checkbox.getAttribute("data-checkbox-item-id")] = checkbox.checked;
    });
  }
  restoreCheckboxState() {
    const checkboxes = this.widgetTbody.querySelectorAll('[data-widget-action="check"]');
    checkboxes.forEach((checkbox) => {
      checkbox.checked = this.checkAllState || (this.checkboxState[checkbox.getAttribute("data-checkbox-item-id")] || false);
    });
  }
  restoreDefaultValues() {
    this.defaultValues.forEach((id) => {
      this.checkboxState[id] = true;
    });
    this.restoreCheckboxState();
    this.updateCheckedItemsCount();
    this.updateWidgetUpdatedValues();
  }
  updateCheckedItemsCount() {
    const selectedItemsElement = this.widgetTable.querySelector('[data-widget-action="selected-items-count"]');
    if (this.checkAllInput.checked) {
      this.checkedItemsCount = this.totalCount - Object.values(this.checkboxState).filter((checked) => !checked).length;
      selectedItemsElement.innerHTML = this.checkedItemsCount;
    } else {
      this.checkedItemsCount = Object.values(this.checkboxState).filter((checked) => checked).length;
      selectedItemsElement.innerHTML = this.checkedItemsCount;
    }
  }
  updateWidgetUpdatedValues() {
    const updatedValues = Object.keys(this.checkboxState).filter((id) => this.checkboxState[id]);
    this.hiddenInput.value = this.checkAllState ? "all" : updatedValues.join(",");
  }
  handleSearchEvent() {
    if (this.searchInput) {
      this.searchInput.addEventListener("input", debounce(async (event) => {
        this.searchQuery = event.target.value;
        await this.loadList(this.widgetApiListSource + "?search=" + this.searchQuery);
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
document.addEventListener("DOMContentLoaded", () => {
  if (document.querySelector(".featuredImage")) {
    new FeaturedImage();
  }
  if (document.querySelector('[data-render-widget="categories"]')) {
    new Categories();
  }
});
initFlowbite();
