

require('./bootstrap');

window.Vue = require('vue');


Vue.component('list-component', require('./components/ListComponent.vue').default);


const app = new Vue({
    el: '#app',
});
