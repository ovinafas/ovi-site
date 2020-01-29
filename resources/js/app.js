require('./bootstrap');
window.Vue = require('vue');
import VueRouter from "vue-router";
import routes from "./routes/routes";

Vue.use(VueRouter);
Vue.component('App', require('./Root').default);

const app = new Vue({
    el: '#app',
    router: new VueRouter({ routes, mode: "history" }),
});
