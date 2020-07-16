import axios from "axios";

export default {

    async getTweets ({ commit  }, url) {
    let response = await axios.get(url);
    commit('PUSH_TWEET', response.data.data);
    commit('likes/PUSH_LIKES', response.data.meta.likes, {root: true })
    commit('retweets/PUSH_RETWEET', response.data.meta.retweets, {root: true })
    commit('replies/PUSH_REPLY', response.data.meta.replies, {root: true })

    return response
}

}
