
import axios from "axios";
import {get, without} from 'lodash';
export default {
    namespaced: true,

    state: {
        replies:[]
    },
    getters: {
        replies (state) {
            return state.replies
        }
    },

    mutations: {

        PUSH_REPLY (state, data) {
            state.replies.push(...data)
        },

        ADD_REPLY (state, id){
            state.replies.push(id)
        },
        POP_REPLY (state, id) {
            state.replies = without(state.replies, id)
        },

    },
    actions: {
        asyncReplies ({ commit ,state },  id ) {
            commit('ADD_REPLY',id)
        },
        async qoute (_,{ tweet, data }) {
            await axios.post(`/api/tweets/${tweet.id}/qoute`, data)
        },
        async reply (_,{ tweet, data }) {
            await axios.post(`/api/tweets/${tweet.id}/reply`, data)
        }


    }

}
