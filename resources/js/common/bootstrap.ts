import _ from "lodash";
declare global {
    interface Window {
        _: typeof _;
        axios: typeof axios;
        csrf_token: string;
    }
}
window._ = _;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
import axios from "axios";
window.axios = axios;
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
// import Echo from "laravel-echo";
// import Pusher from "pusher-js";

// // window.Pusher = Pusher;

// // window.Echo = new Echo({
// //     broadcaster: "pusher",
// //     key: import.meta.env.VITE_PUSHER_APP_KEY,
// //     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
// //     forceTLS: true,
// // });

window.csrf_token = "{{ csrf_token() }}";

// ページ遷移後はスクロール位置をトップにする
window.addEventListener("load", () => window.scrollTo(0, 0));
