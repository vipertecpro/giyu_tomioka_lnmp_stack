import jquery from 'jquery';
window.jQuery = window.$ = jquery;
import select2 from 'select2';
select2($);

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
