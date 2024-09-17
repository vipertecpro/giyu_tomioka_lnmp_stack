import FeaturedImage from './FeaturedImage';
import Categories from "./Categories";

document.addEventListener('DOMContentLoaded', () => {
    if(document.querySelector('.featuredImage')){
        new FeaturedImage();
    }
    if(document.querySelector('[data-render-widget="categories"]')){
        new Categories();
    }
});
