/* default
require('./bootstrap');

window.Vue = require('vue');
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});
*/
require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import http from './http.js';

// const routesの中でrequireせず、外でimportする
import listUsers from './components/UsersIndex.vue'
import createUser from './components/UsersCreate.vue'
import editUser from './components/UsersEdit.vue'

const routes = [
  {path:'/', component:listUsers, name:'listUsers'},
  {path:'/create', component:createUser, name:'createUser'},
  {path:'/edit/:id', component:editUser, name:'editUser'},
]

const router = new VueRouter({ routes })
new Vue(Vue.util.extend({
  router,
  created () {
    http.init()
  },
})).$mount('#app');