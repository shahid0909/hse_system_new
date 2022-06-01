import Vue from 'vue/dist/vue.js';
window.Vue = require('vue').default;

/**   Component Register   **/
require("./component_register");

/**  Event **/
window.Event=new Vue();


const app = new Vue({
    el: '#app',
});
