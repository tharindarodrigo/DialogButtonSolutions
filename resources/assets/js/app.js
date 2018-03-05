
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// window.Axios = require('axios');



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Vue.component('Companies', require('./components/companies/Companies.vue'));
Vue.component('Notification', require('./components/notifications/Notification.vue'));
Vue.component('Notifications', require('./components/notifications/Notifications.vue'));
// Vue.component('Createcompany', require('./components/companies/CreateCompany.vue'));

const app = new Vue({
    el: '#app'
});
