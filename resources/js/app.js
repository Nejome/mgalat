
require('./bootstrap');

window.Vue = require('vue');

Vue.component('admin-chat', require('./components/adminChat.vue').default);

Vue.component('client-chat', require('./components/clientChat.vue').default);

const app = new Vue({
    el: '#app',
});
