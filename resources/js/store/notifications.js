import axios from "axios";
import { get } from 'lodash';
import getters from "../tweet/getters";
import mutations from "../tweet/mutations";
import actions from "../tweet/actions";
export default {
    namespaced: true,

    state: {
        notifications : [],
        tweets :[]
    },

    getters: {
        ...getters,
        notifications(state){
            return state.notifications
        },
        getTweetNotificationsIds(state){
            return state.notifications.map(n => n.data.tweet.id)
        }
    },

    mutations: {
        ...mutations,
        PUSH_NOTIFICATION (state,data ){
            state.notifications.push(...data)
        }
    },

    actions: {
        ...actions,
        async getNotifications ({ commit,dispatch,getters}, url) {
            let response = await axios.get(url);
            commit('PUSH_NOTIFICATION', response.data.data);
            dispatch('getTweets', `/api/tweets?ids=${getters.getTweetNotificationsIds.join(',')}`)

        }
    }
}
