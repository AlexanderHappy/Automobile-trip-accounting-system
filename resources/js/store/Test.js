import {request} from "../utils/request";

export default {

    namespaced: true,

    state() {
        return {

        }
    },
    mutations: {

    },
    actions: {
        async indexTest(context, payload) {
            return request("/api/test/", {
                headers: {
                    "Content-Type": "application/json"
                },
                method: "POST",
                body: JSON.stringify(payload)
            });
        },
    },
    getters: {

    }
}
