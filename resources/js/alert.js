import ProgressBar from './progressBar.js';
class Alert {
    constructor(responseData, type) {
        this.responseData = responseData;
        this.type = type;
        this.init();
    }

    init() {
        switch (this.type) {
            case 'confirm':
                this.showConfirmationModal();
                break;
            case 'success':
                this.showSuccessAlert();
                break;
            case 'error':
                this.showErrorAlert();
                break;
            default:
                console.warn('Unknown alert type:', this.type);
        }
    }

    showConfirmationModal() {
        const {message, onConfirm, onCancel} = this.responseData;
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
        document.getElementById('confirm-btn').addEventListener('click', () => {
            onConfirm();
            this.closeModal();
        });
        document.getElementById('cancel-btn').addEventListener('click', () => {
            if (onCancel) onCancel();
            this.closeModal();
        });
    }

    showSuccessAlert() {
        const { message, redirect } = this.responseData;
        const duration = 2000;
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
            this.removeAlert('success-alert');
            if (redirect){
                window.location.href = redirect;
            }
        };
        progressBar.startProgress();
    }

    showErrorAlert() {
        const { message, redirect } = this.responseData;
        const duration = 2000;
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
            this.removeAlert('error-alert');
            if (redirect){
                window.location.href = redirect;
            }
        };
        progressBar.startProgress();
    }

    insertModal(html) {
        document.body.insertAdjacentHTML('beforeend', html);
    }

    insertAlert(html) {
        document.body.insertAdjacentHTML('beforeend', html);
    }

    closeModal() {
        const modalElement = document.getElementById('alert-modal');
        const backdropElement = document.getElementById('alert-backdrop');
        if (modalElement) modalElement.remove();
        if (backdropElement) backdropElement.remove();
    }

    removeAlert(alertId) {
        const alertElement = document.getElementById(alertId);
        const backdropElement = document.getElementById('alert-backdrop');
        if (alertElement) alertElement.remove();
        if (backdropElement) backdropElement.remove();
    }
}

export default Alert;
