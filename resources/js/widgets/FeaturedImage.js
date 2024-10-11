class FeaturedImage {
    constructor() {
        this.init();
    }

    init() {
        this.bindEvents();
    }

    bindEvents() {
        const featuredImageInput = document.querySelector('.featuredImage');
        const previewPlaceholder = document.querySelector('.previewPlaceholder');
        const addBtn = document.querySelector('[data-widget-action="add"]');
        const editBtn = document.querySelector('[data-widget-action="edit"]');
        const removeBtn = document.querySelector('[data-widget-action="remove"]');

        if (previewPlaceholder) {
            this.setDefaultImage(previewPlaceholder);
        }

        if (featuredImageInput) {
            featuredImageInput.addEventListener('change', () => {
                this.toggleButtons(addBtn, editBtn, removeBtn, true);
                previewPlaceholder.src = URL.createObjectURL(featuredImageInput.files[0]);
            });
        }

        this.addClickListener(addBtn, featuredImageInput);
        this.addClickListener(editBtn, featuredImageInput);

        if (removeBtn) {
            removeBtn.addEventListener('click', () => {
                this.resetImage(featuredImageInput, previewPlaceholder, addBtn, editBtn, removeBtn);
            });
        }
    }

    setDefaultImage(previewPlaceholder) {
        const defaultImageUrl = previewPlaceholder.getAttribute('src');
        if (defaultImageUrl) {
            previewPlaceholder.src = defaultImageUrl;
        } else {
            console.error('Default image URL is not set.');
        }
    }

    addClickListener(button, input) {
        if (button) {
            button.addEventListener('click', () => input?.click());
        }
    }

    resetImage(input, placeholder, addBtn, editBtn, removeBtn) {
        if (input) {
            input.value = '';
        }
        if (placeholder) {
            placeholder.src = placeholder.getAttribute('data-preview-default-url');
        }
        this.toggleButtons(addBtn, editBtn, removeBtn, false);
    }

    toggleButtons(addBtn, editBtn, removeBtn, isImageSelected) {
        if (addBtn) {
            addBtn.classList.toggle('hidden', isImageSelected);
        }
        if (editBtn) {
            editBtn.classList.toggle('hidden', !isImageSelected);
        }
        if (removeBtn) {
            removeBtn.classList.toggle('hidden', !isImageSelected);
        }
    }
}

export default FeaturedImage;
