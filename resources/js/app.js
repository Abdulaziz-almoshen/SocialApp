/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";
import VueObserveVisibility from 'vue-observe-visibility'
import Vuex from 'vuex'
import VueLazyLoad from 'vue-lazyload'
import LightBox from 'vue-image-lightbox'
import VModal from 'vue-js-modal'
import vuetify from './vuetify'
import VueCompositionAPI from '@vue/composition-api'

// stores
import timeline from './store/timeline';
import likes from './store/likes';
import retweets from './store/retweets';
import replies from './store/replies';
import notifications from "./store/notifications";
import conversation from "./store/conversation";


Vue.use(Vuex);
Vue.use(VueObserveVisibility);
Vue.use(VueLazyLoad)

Vue.use(VueCompositionAPI)

require('./bootstrap');

window.Vue = require('vue');
//call user gloabaly
Vue.prototype.$user = User;

Vue.use(VModal, {
    dynamic: true,
    injectModalsContainer:true,
    dynamicDefaults: {
        clickToClose: true,
        pivotY: 0.1,
        height: 'auto',
        classes:'!bg-gray-400 rounded-full',

    } })


const store = new Vuex.Store({
    modules: {
        timeline,
        likes,
        retweets,
        replies,
        notifications,
        conversation,
        LightBox


    }
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('tasks', require('./components/tasks.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store,
    vuetify

}).$mount('#app')


window.Echo.channel('tweets').listen('.tweet.likes', (e) => {
    store.commit('timeline/SET_LIKES',e)
    store.commit('notifications/SET_LIKES',e)
    store.commit('conversation/SET_LIKES',e)

    store.dispatch('likes/asyncLike', e.id)
});

window.Echo.channel('tweets').listen('.tweet.retweet', (e) => {
    store.commit('timeline/SET_RETWEET',e)
    store.dispatch('retweets/asyncRetweet', e.id)
    store.commit('notifications/SET_RETWEET',e)
    store.commit('conversation/SET_RETWEET',e)

});
window.Echo.channel('tweets').listen('.tweet.deleted', (e) => {
    store.commit('timeline/POP_TWEET',e.id)

});
window.Echo.channel('tweets').listen('.reply.created', (e) => {
    console.log('im here')
    console.log(e)
    store.commit('timeline/SET_REPLY',e)
    store.commit('notifications/SET_REPLY',e)
    store.commit('conversation/SET_REPLY',e)

    store.dispatch('replies/asyncReplies', e.id)

});
// window.Echo.channel('tweets').listen('.reply.created', (e) => {
//     console.log('im here')
//     console.log(e)
//     store.commit('timeline/SET_REPLY',e)
//     store.dispatch('replies/asyncReplies', e.id)
//
// });





