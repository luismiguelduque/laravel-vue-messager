require('./bootstrap');

import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import store from './store'
import VueRouter from 'vue-router'

Vue.use(BootstrapVue);
Vue.use(VueRouter);

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

Vue.component('contact-form-component',
    require('./components/ContactFormComponent.vue')
);

Vue.component('profile-component',
    require('./components/ProfileFormComponent.vue')
);
Vue.component('messinger-component',
    require('./components/MessingerComponent.vue')
);
Vue.component('contact-component',
    require('./components/ContactComponent.vue')
);
Vue.component('contact-list-component',
    require('./components/ContactListComponent.vue')
);
Vue.component('active-conversation-component',
    require('./components/ActiveConversationComponent.vue')
);
Vue.component('message-conversation-component',
    require('./components/MessageConversationComponent.vue')
);
Vue.component('status-component',
    require('./components/StatusComponent.vue')
);

const routes = [
    { path: '/foo', component: Foo },
    { path: '/bar', component: Bar }
];

const router = new VueRouter({
    routes
})

const app = new Vue({
    el: '#app',
    store: store,
    methods: {
        logout(){
            document.getElementById('logout-form').submit();
        }
    }
});
