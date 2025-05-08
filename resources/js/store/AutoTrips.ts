import {request} from "@/utils/request";
import type {ActionContext} from "vuex";
import type IAutoTrips from "@/utils/interfaces/IAutoTrips.ts";
import type State from "@/utils/interfaces/IAutoTripsState.ts";
import changeTypeNumber from "@/utils/format.ts";

export default {
    namespaced: true,

    state(): State {
        return {
            autoTrips: [],
            totalNumberTrips: 0,
            totalVolume: 0,
            totalConsumption: 0,
        }
    },
    mutations: {
        updateAutoTrips(state: State, payload: Array<IAutoTrips>): void {
            state.autoTrips = payload.map((autoTrip: IAutoTrips) => {
                return {
                    ...autoTrip,
                    consumption: {
                        value: changeTypeNumber(autoTrip.consumption.value),
                        description: autoTrip.consumption.description
                    },
                    bulk: {
                        value: changeTypeNumber(autoTrip.bulk.value),
                        description: autoTrip.bulk.description
                    },
                }
            });
        },
        updateHeaderBlocksNumbers(state: State, payload: Array<IAutoTrips>): void {

            state.totalNumberTrips = payload.length;

            state.totalVolume = payload.reduce(
                (totalBulk: number, curBulk: IAutoTrips): number => {
                    return totalBulk + curBulk.bulk.value
                }, 0);

            state.totalConsumption = payload.reduce(
                (totalConsumption: number, curConsumption: IAutoTrips): number => {
                    return totalConsumption + curConsumption.consumption.value
                }, 0);
        }
    },
    actions: {
        async indexAutoTrips(context: ActionContext<object, object>): Promise<void> {
            return request("/api/auto-trips/index", {
                method: "GET",
            }).then((response: object) => {
                context.commit('updateAutoTrips', response);
                context.commit('updateHeaderBlocksNumbers', response);
            });
        },
    },
    getters: {
        GET_AUTO_TRIPS(state: State): Array<object> {
            return state.autoTrips;
        },
        GET_TOTAL_CONSUMPTION(state: State): number {
            return changeTypeNumber(state.totalConsumption);
        },
        GET_TOTAL_VOLUME(state: State): number {
            return changeTypeNumber(state.totalVolume);
        },
        GET_TOTAL_TRIPS(state: State): number {
            return state.totalNumberTrips;
        }
    }
}
