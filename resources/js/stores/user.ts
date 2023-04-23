import { defineStore } from "pinia";
import { User } from "@/types/user"; // User型をインポート

export const useUserStore = defineStore({
    id: "user",
    state: () => ({
        userData: null as User | null, // User | null 型を適用
    }),
    getters: {
        isLoggedIn(): boolean {
            return this.userData !== null;
        },
    },
    actions: {
        loginUser(user: User) {
            // User型を適用
            this.userData = user;
        },
        logoutUser() {
            this.userData = null;
        },
    },
});
