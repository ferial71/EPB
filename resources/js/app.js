/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('notification', require('./components/Notification.vue').default);
// Vue.component('notification', require('./components/Notification.vue'));
// Vue.component('notification-item', require('./components/NotificationItem.vue'));
// Vue.component('example', require('./components/Example.vue'));
// Vue.component('notification', require('./components/Notification.vue'));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//
// const app = new Vue({
//     el: '#app'
// });
//

// import Echo from 'laravel-echo';
//
// window.Pusher = require('pusher-js');
//
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'f9c41c660415c3 16d1e2',
//     cluster: 'mt1',
//     wsHost: window.location.hostname,
//     wsPort: 6001,
//     disableStats: true,
//
// });

//
const app = new Vue({
    el: '#app',
    // data: {
    //     notifications: ''
    // },
//     mounted(){
//         window.Echo.private(`App.User.${Laravel.userId}`)
//             .notification((notification) => {
//                 addNotifications([notification], '#notifications');
//             });
//     },
//     created() {
//         axios.post('/notification/get').then(response => {
//             this.notifications = response.data;
//             console.log(response.data);
//         });
//
//         window.Echo.private(`App.User.${Laravel.userId}`)
//             .notification((notification) => {
//                 this.notifications.push(notification);
//             });
//         // let userId = $('meta[name="userid"]').attr('content');
//         // Echo.private('App.User.' + userId).notification((notification) => {
//         //     console.log('ojnono');
//         //     this.notifications.push(notification);
//         // });
//     }
});
//
// var notifications = [];
//
// //...
//
// $(document).ready(function() {
//     if(Laravel.userId) {
//
//         window.Echo.private(`App.User.${Laravel.userId}`)
//             .notification((notification) => {
//                 addNotifications([notification], '#notifications');
//             });
//     }
// });
