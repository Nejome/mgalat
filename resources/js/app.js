
require('./bootstrap');

window.Vue = require('vue');

Vue.component('chat', require('./components/Chat.vue').default);

Vue.component('client-chat', require('./components/clientChat.vue').default);

const app = new Vue({
    el: '#app',
});
