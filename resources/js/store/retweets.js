
import axios from "axios";
import { without } from 'lodash';
export default {
    namespaced: true,

    state: {
        retweets:[]
    },
    getters: {
        retweets (state) {
            return state.retweets
        }
    },

    mutations: {
        PUSH_RETWEET (state, data) {
            state.retweets.push(...data)
        },

        ADD_RETWEET (state, id){
            state.retweets.push(id)
        },
        POP_RETWEET (state, id) {
            state.retweets = without(state.retweets, id)
        },

    },
    actions: {
        async retweet (_,url) {
            await axios.post(url)
        },
        async unretweet (_,url) {
            await axios.delete(url)
        },
        asyncRetweet ({ commit ,state },  id ) {
            if(state.retweets.includes(id)){
                commit('POP_RETWEET',id)
                return
            }
            commit('ADD_RETWEET',id)
        },


    }

}
