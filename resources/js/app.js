import './bootstrap';
import 'flowbite';
import './themeToggle';
import './datatable';
import './alert';
import './plugins';
import './handleForm';
import './customEditor.js';
import { initFlowbite } from 'flowbite';
import FeaturedImage from "./widgets/FeaturedImage.js";
import TableBased from "./widgets/TableBased.js";

document.addEventListener('DOMContentLoaded', () => {
    if(document.querySelector('.featuredImage')){
        new FeaturedImage();
    }
    const modules = ['categories', 'tags', 'blogs'];
    modules.forEach(module => {
        if(document.querySelector(`[data-render-widget="${module}"]`)){
            new TableBased(module);
        }
    });
    initFlowbite();
});
