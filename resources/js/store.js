import Vuex from "vuex";
import Services from "./Services";
import createPersistedstate from "vuex-persistedstate";

export default new Vuex.Store({
    state: {
        user: {},
    },
    mutations: {
        setUser: (state, user) => {
            state.user = user;
        },
    },
    actions: {
        useState: async ({ commit }) => {
            try {
                const { data } = await Services.userLogged.getUserLogged();

                commit("setUser", data);
            } catch (error) {
                console.error(error);
                if (window.location.pathname != "/login") {
                    window.location.href = "/login";
                }
            }
        },
    },
    plugins: [createPersistedstate()],
});
