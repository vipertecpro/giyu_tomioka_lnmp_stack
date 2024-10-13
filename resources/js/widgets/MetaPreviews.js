export default class MetaPreviews {
    constructor() {
        // Check if Google Meta Data section exists
        if (document.getElementById('meta-data-google-accordion-body')) {
            this.initGooglePreview();
        }

        // Check if Meta (OpenGraph/Facebook) Meta Data section exists
        if (document.getElementById('meta-data-meta-accordion-body')) {
            this.initMetaPreview();
        }

        // Check if Twitter Meta Data section exists
        if (document.getElementById('meta-data-twitter-accordion-body')) {
            this.initTwitterPreview();
        }
    }

    // Method to handle Google preview
    initGooglePreview() {
        const googleTitle = document.getElementById('google_meta_title');  // Meta Title input
        const googleURL = document.getElementById('google_meta_url');      // Canonical URL input
        const googleDescription = document.getElementById('google_meta_description');  // Meta Description textarea
        const slugInput = document.getElementById('slug'); // Slug input field

        // Preview elements
        const googlePreviewCrumbs = document.querySelector('#googleMetaPreview .preview-crumbs'); // Breadcrumb-style URL
        const googlePreviewTitle = document.querySelector('#googleMetaPreview .preview-title a');   // Title with link
        const googlePreviewDescription = document.querySelector('#googleMetaPreview .preview-description'); // Description + Date

        const titleMaxLength = 60;
        const urlMaxLength = 60;  // Limit for URL character count
        const descriptionMaxLength = 160;

        // Get the current formatted date (e.g., 'Oct 2023')
        const getFormattedDate = () => {
            const today = new Date();
            const options = { month: 'short', year: 'numeric' };
            return today.toLocaleDateString('en-US', options);
        };

        // Helper function to format the URL into breadcrumb style (e.g., 'domain.com › ... › path')
        const formatURLForCrumbs = (url) => {
            if (!url) return "totheweb.com › ... › your-blog-post";

            try {
                // Create a URL object to parse the URL
                const { protocol, hostname, pathname } = new URL(url);

                // Remove trailing slashes in the path and split into segments
                let formattedPath = pathname.replace(/\/$/, ''); // Remove trailing slash if present
                const pathSegments = formattedPath.split('/').filter(Boolean);

                // Truncate the middle part of the path with '...'
                if (pathSegments.length > 2) {
                    formattedPath = `${pathSegments[0]} › ... › ${pathSegments[pathSegments.length - 1]}`;
                } else {
                    formattedPath = pathSegments.join(' › ');
                }

                // Return the formatted URL as "protocol://hostname › path"
                return `${protocol}//${hostname} › ${formattedPath}`;
            } catch (e) {
                return "https://totheweb.com › ... › invalid-url";  // Fallback for invalid URLs
            }
        };

        // Update preview with dynamic content and counters
        const updateGooglePreview = () => {
            const formattedDate = getFormattedDate();
            const formattedCrumbs = formatURLForCrumbs(googleURL.value);

            // Update the breadcrumb URL
            googlePreviewCrumbs.textContent = formattedCrumbs;

            // Update the meta title as a clickable anchor link
            const url = googleURL.value || "#";  // Default to '#' if no URL is provided
            const titleText = googleTitle.value || "Your Title Here";
            googlePreviewTitle.href = url;
            googlePreviewTitle.textContent = titleText;

            // Update the meta description with the date
            googlePreviewDescription.innerHTML = `<span class="preview-date">${formattedDate}</span> - ${googleDescription.value || "Your meta description will appear here."}`;

            // Update character counters (no restriction, just change color when limits are exceeded)
            updateCounter(googleTitle, document.getElementById('googleTitleCount'), titleMaxLength);
            updateCounter(googleURL, document.getElementById('googleURLCount'), urlMaxLength);  // Added URL counter
            updateCounter(googleDescription, document.getElementById('googleDescriptionCount'), descriptionMaxLength);
        };

        // Function to update character counters and apply red color when limits are exceeded
        const updateCounter = (element, counter, maxLength) => {
            const length = element.value.length;
            counter.textContent = `${length} / ${maxLength} characters`;
            if (length > maxLength) {
                counter.classList.add('text-red-600');
            } else {
                counter.classList.remove('text-red-600');
                counter.classList.add('text-gray-500');
            }
        };

        // Add event listeners for live preview updates
        googleTitle.addEventListener('input', updateGooglePreview);
        googleURL.addEventListener('input', updateGooglePreview);  // This updates the URL and its counter
        googleDescription.addEventListener('input', updateGooglePreview);

        // Add event listener for slug input to update google_meta_url
        slugInput.addEventListener('input', () => {
            if (!googleURL.value) {
                googleURL.value = `${googleURL.getAttribute('data-client-url')}/${slugInput.value}`;
            } else {
                const baseUrl = googleURL.value.split('/').slice(0, -1).join('/');
                googleURL.value = `${baseUrl}/${slugInput.value}`;
            }
            updateGooglePreview();
        });

        // Add event listener for google_meta_url input to update slug
        googleURL.addEventListener('input', () => {
            const urlParts = googleURL.value.split('/');
            const newSlug = urlParts[urlParts.length - 1];
            slugInput.value = newSlug;
            updateGooglePreview();
        });

        // Trigger the initial preview update on page load
        updateGooglePreview();
    }

    // Method to handle Meta (OpenGraph/Facebook) preview
    initMetaPreview() {
        const facebookMetaTitle = document.getElementById('facebook_meta_title');
        const facebookMetaDescription = document.getElementById('facebook_meta_description');

        const metaPreviewTitle = document.querySelector('.preview_facebook_meta_title');
        const metaPreviewDescription = document.querySelector('.preview_facebook_meta_description');

        const titleMaxLength = 40;
        const descriptionMaxLength = 125;

        const updateMetaPreview = () => {
            metaPreviewTitle.textContent = facebookMetaTitle.value || "Lorem ipsum dolor consectetur";
            metaPreviewDescription.textContent = facebookMetaDescription.value || "Lorem ipsum, dolor sit amet sit ametconsectetur adipisicing elit.";

            updateCounter(facebookMetaTitle, document.getElementById('facebookTitleCount'), titleMaxLength);
            updateCounter(facebookMetaDescription, document.getElementById('facebookDescriptionCount'), descriptionMaxLength);
        };

        // Function to update character counters and apply red color when limits are exceeded
        const updateCounter = (element, counter, maxLength) => {
            const length = element.value.length;
            counter.textContent = `${length} / ${maxLength} characters`;
            if (length > maxLength) {
                counter.classList.add('text-red-600');
            } else {
                counter.classList.remove('text-red-600');
                counter.classList.add('text-gray-500');
            }
        };

        // Add event listeners to update preview on input change
        facebookMetaTitle.addEventListener('input', updateMetaPreview);
        facebookMetaDescription.addEventListener('input', updateMetaPreview);

        // Trigger the initial preview update on page load
        updateMetaPreview();
    }

    // Method to handle Twitter preview
    initTwitterPreview() {
        const twitterTitle = document.getElementById('twitter_meta_title');
        const twitterDescription = document.getElementById('twitter_meta_description');

        const twitterPreviewTitle = document.querySelector('.preview_twitter_meta_title');
        const twitterPreviewDescription = document.querySelector('.preview_twitter_meta_description');

        const titleMaxLength = 70;
        const descriptionMaxLength = 200;

        const updateTwitterPreview = () => {
            twitterPreviewTitle.textContent = twitterTitle.value || "Lorem ipsum dolor consectetur";
            twitterPreviewDescription.textContent = twitterDescription.value || "Lorem ipsum, dolor sit amet sit ametconsectetur adipisicing elit.";

            updateCounter(twitterTitle, document.getElementById('twitterTitleCount'), titleMaxLength);
            updateCounter(twitterDescription, document.getElementById('twitterDescriptionCount'), descriptionMaxLength);
        };

        // Function to update character counters and apply red color when limits are exceeded
        const updateCounter = (element, counter, maxLength) => {
            const length = element.value.length;
            counter.textContent = `${length} / ${maxLength} characters`;
            if (length > maxLength) {
                counter.classList.add('text-red-600');
            } else {
                counter.classList.remove('text-red-600');
                counter.classList.add('text-gray-500');
            }
        };

        // Add event listeners to update preview on input change
        twitterTitle.addEventListener('input', updateTwitterPreview);
        twitterDescription.addEventListener('input', updateTwitterPreview);

        // Trigger the initial preview update on page load
        updateTwitterPreview();
    }
    setDefaultImage(previewPlaceholder) {
        const defaultImageUrl = previewPlaceholder.getAttribute('src');
        if (defaultImageUrl) {
            previewPlaceholder.src = defaultImageUrl;
        } else {
            console.error('Default image URL is not set.');
        }
    }
}
