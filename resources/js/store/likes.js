
import axios from "axios";
import { without } from 'lodash';
export default {
    namespaced: true,

    state: {
        likes:[]
    },
    getters: {
        likes (state) {
            return state.likes
        }
    },

    mutations: {
        PUSH_LIKES (state, data) {
            state.likes.push(...data)
        },

        ADD_LIKE (state, id){
            state.likes.push(id)
        },
        POP_LIKE (state, id) {
           state.likes = without(state.likes, id)
        },

    },
    actions: {
            async like (_,url) {
             await axios.post(url)
        },
        async dislike (_,url) {
            await axios.delete(url)
        },
        asyncLike ({ commit ,state },  id ) {
            if(state.likes.includes(id)){
                commit('POP_LIKE',id)
                return
            }
            commit('ADD_LIKE',id)
        }


    }

}
