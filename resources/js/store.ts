import {createStore} from "vuex";
import AutoTrips from "@/store/AutoTrips.ts";

export default createStore({
    modules: {
        autoTrips: AutoTrips,
    },
});