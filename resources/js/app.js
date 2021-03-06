/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('jquery-ujs');
import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import Notifications from 'vue-notification';
// window.Vue = require('vue');
Vue.use(BootstrapVue);
Vue.use(Notifications);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('projects', require('./components/Projects.vue').default);
Vue.component('project-progress', require('./components/ProjectProgress.vue').default);

Vue.component('tasks', require('./components/Tasks.vue').default);
Vue.component('add-task-form', require('./components/AddTaskForm.vue').default);
Vue.component('edit-task-form', require('./components/EditTaskForm.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.prototype.$eventHub = new Vue();
const app = new Vue({
  el: '#app'
});
