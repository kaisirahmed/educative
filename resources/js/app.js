/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.VueRouter = require('vue-router').default;

window.Axios = require('axios').default;

Vue.use(require('vue-resource'));

import Vue from 'vue';
//import BackToTop from 'vue-backtotop';
 
//Vue.use(BackToTop);

Axios.defaults.baseURL = process.env.APP_URL;

// var infiniteScroll =  require('vue-infinite-scroll');
// Vue.use(infiniteScroll);
 
// CommonJS
//const Loadmore = require('vue-loadmore').default;



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('topics', require('./components/Topics.vue').default);
Vue.component('courses', require('./components/Courses.vue').default);
Vue.component('tracks', require('./components/Tracks.vue').default);
Vue.component('blogs', require('./components/Blogs.vue').default);
Vue.component('subscriptions', require('./components/Subscriptions.vue').default);
 
Vue.component('latest-courses', require('./components/LatestCourses.vue').default);
Vue.component('latest-topics', require('./components/LatestTopics.vue').default);

//Vue.component('loadmore', Loadmore);
Vue.component('InfiniteLoading', require('vue-infinite-loading'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
if(document.getElementById("app")){
    const app = new Vue({
        el: '#app',
    });
}

// new Vue({
//    data: {
//     loading: false
//     },
//     ready: function() {
//     this.loading = true;
//       // GET request
//       this.$http({url: '/someUrl', method: 'GET'}).then(
//       function (response) {
//           // success callback
//           this.loading = false;
//       }.bind(this),
//       function (response) {
//           // error callback
//       });
//     }
// })