import {get} from "lodash";

export default {

    PUSH_TWEET (state, data) {
    state.tweets.push(...data)
},
    POP_TWEET (state, id) {
    state.tweets = state.tweets.filter((t) => {
        return t.id !== id
    })
},
    SET_LIKES (state, { id , count }){
    state.tweets = state.tweets.map((t) => {
        if (t.id === id ){
            t.likes_count = count
        }

        if (get(t.original_tweet,'id') === id) {
            t.original_tweet.likes_count = count
        }
        return t
    })
},
    SET_RETWEET (state, { id , count }){
    state.tweets = state.tweets.map((t) => {
        if (t.id === id ) {
            t.retweet_count = count
        }
        if (get(t.original_tweet,'id') === id) {
            t.original_tweet.retweet_count = count
        }
        return t
    })
},
    SET_REPLY (state, { id , count }){
    state.tweets = state.tweets.map((t) => {
        console.log()
        if (t.id === id ) {
            t.replies_count = count
        }
        if (get(t.original_tweet,'id') === id) {
            t.original_tweet.replies_count = count
        }
        return t
    })
},

}
