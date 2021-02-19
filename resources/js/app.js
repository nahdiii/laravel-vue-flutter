/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.Vue = require('vue');
import { Form, HasError, AlertError } from 'vform';

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '10px'
})

//Import Alert
import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.Toast = Toast;


let Fire = new Vue();
window.Fire = Fire;


import VueRouter from 'vue-router'
Vue.use(VueRouter)


let routes = [
    { path: '/user-register', component: require('./components/Register-user.vue').default },
    { path: '/kategori', component: require('./components/Kategori.vue').default, name: 'kategori' },
    { path: '/data-kirim-masuk', component: require('./components/Datakirim.vue').default },

]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('login-api', require('./components/Login-api.vue').default);



Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);


const app = new Vue({
    el: '#app',
    router
});
