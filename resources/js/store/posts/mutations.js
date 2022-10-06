export default {
    PUSH_POSTS(state, data) {
        state.posts.push(
            ...[data]
            // .filter((post) => {
            //     // console.log("post.data = " + JSON.stringify(post.data));
            //     return post.data.map((p) => p.id);
            //     // .includes(post.id);
            // })
        );
    },

    // POP_post (state, id) {
    //   state.posts = state.posts.filter((t) => {
    //     return t.id !== id
    //   })
    // },

    // SET_LIKES (state, { id, count }) {
    //   state.posts = state.posts.map((t) => {
    //     if (t.id === id) {
    //       t.likes_count = count
    //     }

    //     if (get(t.original_post, 'id') === id) {
    //       t.original_post.likes_count = count
    //     }

    //     return t
    //   })
    // },

    // SET_REpostS (state, { id, count }) {
    //   state.posts = state.posts.map((t) => {
    //     if (t.id === id) {
    //       t.reposts_count = count
    //     }

    //     if (get(t.original_post, 'id') === id) {
    //       t.original_post.reposts_count = count
    //     }

    //     return t
    //   })
    // },

    // SET_REPLIES (state, { id, count }) {
    //   state.posts = state.posts.map((t) => {
    //     if (t.id === id) {
    //       t.replies_count = count
    //     }

    //     if (get(t.original_post, 'id') === id) {
    //       t.original_post.replies_count = count
    //     }

    //     return t
    //   })
    // }
};
