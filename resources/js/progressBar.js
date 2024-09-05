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
        this.progressBar = document.getElementById('progress-bar');
        this.intervalId = setInterval(() => {
            this.currentStep++;
            const progress = (this.currentStep / this.steps) * 100;
            this.progressBar.style.width = `${progress}%`;

            if (this.currentStep >= this.steps) {
                clearInterval(this.intervalId);
                this.onComplete();
            }
        }, this.interval);
    }

    onComplete() {
        // Override this method to handle completion
    }
}

export default ProgressBar;
