import {createStore} from "vuex";
import Test from "./store/Test.ts";

export interface State {

}

export default createStore({
    modules: {
        test: Test,
    },
    actions: {

    },
})
