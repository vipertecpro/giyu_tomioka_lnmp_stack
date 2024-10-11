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
                const { hostname, pathname } = new URL(url);
                let formattedPath = pathname.replace(/\/$/, ''); // Remove trailing slash if present

                // Split the path into segments
                const pathSegments = formattedPath.split('/').filter(Boolean);

                // Truncate the middle part of the path with '...'
                if (pathSegments.length > 2) {
                    formattedPath = `${pathSegments[0]} › ... › ${pathSegments[pathSegments.length - 1]}`;
                } else {
                    formattedPath = pathSegments.join(' › ');
                }

                return `${hostname} › ${formattedPath}`;
            } catch (e) {
                return "totheweb.com › ... › invalid-url";  // Fallback for invalid URLs
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

        // Trigger the initial preview update on page load
        updateGooglePreview();
    }




    // Method to handle Meta (OpenGraph/Facebook) preview
    initMetaPreview() {
        const metaTitle = document.getElementById('meta_meta_title');
        const metaURL = document.getElementById('meta_meta_url');
        const metaDescription = document.getElementById('meta_meta_description');

        const metaPreviewTitle = document.querySelector('#metaMetaPreview .preview-title');
        const metaPreviewURL = document.querySelector('#metaMetaPreview .preview-url');
        const metaPreviewDescription = document.querySelector('#metaMetaPreview .preview-description');

        const updateMetaPreview = () => {
            metaPreviewTitle.textContent = metaTitle.value || "Your Meta Title Here";
            metaPreviewURL.textContent = metaURL.value || "https://example.com";
            metaPreviewDescription.textContent = metaDescription.value || "Your meta description will appear here.";
        };

        // Add event listeners to update preview on input change
        metaTitle.addEventListener('input', updateMetaPreview);
        metaURL.addEventListener('input', updateMetaPreview);
        metaDescription.addEventListener('input', updateMetaPreview);
    }

    // Method to handle Twitter preview
    initTwitterPreview() {
        const twitterTitle = document.getElementById('twitter_meta_title');
        const twitterURL = document.getElementById('twitter_meta_url');
        const twitterDescription = document.getElementById('twitter_meta_description');

        const twitterPreviewTitle = document.querySelector('#twitterMetaPreview .preview-title');
        const twitterPreviewURL = document.querySelector('#twitterMetaPreview .preview-url');
        const twitterPreviewDescription = document.querySelector('#twitterMetaPreview .preview-description');

        const updateTwitterPreview = () => {
            twitterPreviewTitle.textContent = twitterTitle.value || "Your Twitter Title Here";
            twitterPreviewURL.textContent = twitterURL.value || "https://example.com";
            twitterPreviewDescription.textContent = twitterDescription.value || "Your meta description will appear here.";
        };

        // Add event listeners to update preview on input change
        twitterTitle.addEventListener('input', updateTwitterPreview);
        twitterURL.addEventListener('input', updateTwitterPreview);
        twitterDescription.addEventListener('input', updateTwitterPreview);
    }
}
