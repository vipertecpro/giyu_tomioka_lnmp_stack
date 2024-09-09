import axios from 'axios';
import Alert from './alert.js';

class FormHandler {
    constructor(button) {
        this.submitButton = button;
        this.form = button.closest('form');
        this.method = this.form.getAttribute('method');
        this.action = this.form.getAttribute('action');
        this.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        this.loadingElement = this.createLoadingElement();
        this.init();
    }
    init() {
        this.submitButton?.addEventListener('click', event => this.handleSubmit(event));
    }
    async handleSubmit(event) {
        event.preventDefault();
        const formData = new FormData(this.form);
        this.toggleLoading(true);
        try {
            if (this.method === 'GET') {
                window.location.href = `${this.action}?${new URLSearchParams(formData)}`;
            } else if (this.method === 'DELETE') {
                await this.confirmDelete(formData);
            } else {
                await this.submitForm(formData);
            }
        } catch (error) {
            const errorMessage = error.response?.data?.message || error.message || 'An unknown error occurred. Please try again.';
            this.showError(errorMessage);
        } finally {
            this.toggleLoading(false);
        }
    }

    async confirmDelete(formData) {
        new Alert({
            message: 'Are you sure you want to delete this item?',
            onConfirm: async () => {
                try {
                    const response = await axios({
                        method: this.method,
                        url: this.action,
                        headers: { 'X-CSRF-TOKEN': this.csrfToken },
                        data: formData
                    });
                    this.handleSuccess(response.data);
                } catch (error) {
                    const response = error.response;
                    this.handleFormError(response.data);
                }
            },
        }, 'confirm');
    }

    async submitForm(formData) {
        try {
            const response = await axios({
                method: this.method,
                url: this.action,
                headers: { 'X-CSRF-TOKEN': this.csrfToken },
                data: formData
            });
            this.handleSuccess(response.data);
        } catch (error) {
            const response = error.response;
            this.handleFormError(response.data);
        }
    }

    handleSuccess(data) {
        if (data.status === 'success') {
            this.form.reset();
            new Alert(data, 'success');
        } else {
            new Alert(data, 'error');
        }
    }

    handleFormError(data) {
        if (data.status === 'form-error') {
            this.clearErrors();
            this.displayErrors(data.fields, data.message);
        } else {
            new Alert(data, 'error');
        }
    }

    clearErrors() {
        this.form.querySelectorAll('.field-error').forEach(error => error.remove());
    }
    displayErrors(fields, messages) {
        fields.forEach(field => {
            const input = this.form.querySelector(`[name="${field}"]`);
            const error = messages[field];
            input.parentNode.querySelector('.text-red-500')?.remove();
            if (error) {
                const errorElement = document.createElement('div');
                errorElement.className = 'mt-2 text-xs text-red-600 dark:text-red-400 field-error';
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
        const loadingDiv = document.createElement('div');
        loadingDiv.className = 'flex items-center justify-center w-full h-full border border-gray-200 rounded bg-gray-50 dark:bg-gray-800 dark:border-gray-700 absolute top-0 left-0 right-0 bottom-0 z-50';
        loadingDiv.id = 'form-loading';
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
    showError(message) {
        new Alert({ message, status: 'error' }, 'error');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const formSubmitButtons = document.querySelectorAll('.formSubmit');
    if(!formSubmitButtons) return;
    formSubmitButtons.forEach(button => {
        new FormHandler(button);
    });
});
