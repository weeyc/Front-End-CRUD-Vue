require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import routes from './routes';


Vue.component('top-bar', require('./components/Bar.vue').default);
Vue.component('main-body', require('./components/Main.vue').default);
Vue.component('table-body', require('./components/Table.vue').default);

Vue.use(VueRouter);

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});
