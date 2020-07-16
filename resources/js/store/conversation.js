import axios from "axios";
import { get } from 'lodash';
import getters from "../tweet/getters";
import mutations from "../tweet/mutations";
import actions from "../tweet/actions";


export default {
    namespaced: true,

    state:{
        tweets: []
    },
    getters: {
        tweet(state){
            return id => state.tweets.find(t => t.id == id);
        },
        parents(state){

            return id => state.tweets.filter(t => {
                return t.id != id && !t.parent_ids.includes(parseInt(id))
            }).sort((a, b) => a.created_at - b.created_at);
        },
        replies(state){
            return id => state.tweets.filter(t => t.parent_id == id)
                .sort((a, b) => a.created_at - b.created_at);
        }
    },
        mutations,

        actions
}
