import axios from "axios";

export default {
    async getPosts({ commit }, url) {
        let response = await axios.get(url);

        if (!response.data.books) {
            commit("PUSH_POSTS", response.data.likeRankings);
        } else {
            commit("PUSH_POSTS", response.data.books);
        }

        // commit('likes/PUSH_LIKES', response.data.meta.likes, { root: true })
        // commit('retweets/PUSH_RETWEETS', response.data.meta.retweets, { root: true })
        return response;
    },

    // async quoteTweet (_, { tweet, data }) {
    //   await axios.post(`/api/tweets/${tweet.id}/quotes`, data)
    // },

    // async replyToTweet (_, { tweet, data }) {
    //   await axios.post(`/api/tweets/${tweet.id}/replies`, data)
    // }
};
