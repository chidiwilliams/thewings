
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.html2canvas = require('html2canvas');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const Nominate = require('./components/Nominate.vue');
const Nominations = require('./components/Nominations.vue');
const Edit = require('./components/Edit.vue');

const app = new Vue({
  el: '#app',
  components: {
    Nominate,
    Nominations,
    Edit,
  },
});
