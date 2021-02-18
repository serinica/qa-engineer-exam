/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue'
import moment from 'moment'
import Vuelidate from 'vuelidate'
import DataTable from 'laravel-vue-datatable'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import 'video.js/dist/video-js.css';
import 'video.js/dist/video-js.min.css';
import 'video.js/dist/video.min.js';
import 'videojs-youtube/dist/Youtube.min.js';
import { BootstrapVue, IconsPlugin, FormInputPlugin, SpinnerPlugin } from 'bootstrap-vue'

require('./bootstrap');
Vue.config.productionTip = false
Vue.use(Vuelidate);
//import css files
Vue.use(FormInputPlugin)
Vue.use(SpinnerPlugin)
Vue.use(DataTable);
Vue.filter('formatDate', function (value) {
    if (value) {
        return moment(String(value)).format('MM/DD/YYYY hh:mm')
    }
});
// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)


window.Vue = require('vue').default;
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('create-component', require('./components/CreateComponent.vue').default);
Vue.component('datatable-list', require('./components/BootstrapDatatable.vue').default);
Vue.component('edit-modal-vue', require('./components/modalvue.vue').default);
Vue.component('video-player', require('./components/VideoLinkComponent.vue').default);
Vue.component('video-link', require('./components/VideoPlayComponent.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

