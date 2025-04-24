import Home from "@/utils/classes/Home";
import {request} from "@/utils/request";
import type {ActionContext} from "vuex";
import type IAutoTrips from "@/utils/interfaces/IAutoTrips.ts";

interface State {
    autoTrips: Array<object>;
}

export default {
    namespaced: true,

    state(): State {
        return {
            autoTrips: []
        }
    },
    mutations: {
        updateAutoTrips(state: State, payload: Array<IAutoTrips>): void {
            state.autoTrips = Home.changeNumberType(payload);
        }
    },
    actions: {
        async indexAutoTrips(context: ActionContext<object, object>): Promise<void> {
            return request("/api/auto-trips/index", {
                method: "GET",
            }).then((response: object) => {
                context.commit('updateAutoTrips', response);
            });
        },
    },
    getters: {
        GET_AUTO_TRIPS(state: State): Array<object> {
            return state.autoTrips;
        }
    }
}
