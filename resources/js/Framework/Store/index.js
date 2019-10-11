import Vuex from 'vuex';
import Vue from 'vue';
Vue.use(Vuex);

import event from './Event';

export default new Vuex.Store({
    modules : {
        event
    }
});