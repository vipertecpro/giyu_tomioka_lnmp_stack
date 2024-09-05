import Alert from './alert.js';

class FormHandler {
    constructor(button, loadingSelector) {
        this.submitButton = button;
        this.form = button.closest('form');
        this.method = this.form.getAttribute('method');
        this.loading = document.querySelector(loadingSelector);
        this.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
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
                window.location.href = `${this.form.action}?${new URLSearchParams(formData)}`;
            } else if (this.method === 'DELETE') {
                this.confirmDelete(formData);
            } else {
                await this.submitForm(formData);
            }
        } catch (error) {
            this.showError(error.message || 'An unknown error occurred. Please try again.');
        } finally {
            this.toggleLoading(false);
        }
    }

    async confirmDelete(formData) {
        new Alert({
            message: 'Are you sure you want to delete this item?',
            onConfirm: async () => {
                try {
                    const response = await fetch(this.form.action, {
                        method: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': this.csrfToken },
                        body: formData
                    });
                    const data = await response.json();
                    response.ok ? this.handleSuccess(data) : this.handleFormError(data);
                } catch (error) {
                    this.showError('An error occurred while deleting. Please try again.');
                }
            },
        }, 'confirm');
    }

    async submitForm(formData) {
        const response = await fetch(this.form.action, {
            method: this.method,
            headers: { 'X-CSRF-TOKEN': this.csrfToken },
            body: formData
        });
        const data = await response.json();
        response.ok ? this.handleSuccess(data) : this.handleFormError(data);
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
        this.loading.classList.replace(show ? 'hidden' : 'flex', show ? 'flex' : 'hidden');
    }

    showError(message) {
        new Alert({ message, status: 'error' }, 'error');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.formSubmit').forEach(button => {
        new FormHandler(button, '#form-loading');
    });
});
