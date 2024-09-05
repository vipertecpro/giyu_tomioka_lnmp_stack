class Plugins {
    constructor() {
        this.initSelect2();
    }
    initSelect2() {
        $('select[name="status"]').select2({
            placeholder: 'Select a status',
            allowClear: true
        });
    }
}
document.addEventListener('DOMContentLoaded', () => {
    new Plugins();
});
