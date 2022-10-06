export default {
    posts(state) {
        let posts = [];
        state.posts.filter((t) => {
            posts = t.data;
        });
        return posts;
    },

    // post (state) {
    //   return id => state.posts.find(t => t.id === id)
    // }
};
