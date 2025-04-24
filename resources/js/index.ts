import {createApp} from "vue"
import "./assets/css/main.css"
import store from "./store"
import router from "./router"
import PrimeVue from 'primevue/config';
import Aura from '@primevue/themes/aura';
import ToastService from 'primevue/toastservice'
import { library } from "@fortawesome/fontawesome-svg-core"
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome"
import {fas} from "@fortawesome/free-solid-svg-icons"
import Tooltip from "primevue/tooltip"
// eslint-disable-next-line @typescript-eslint/ban-ts-comment
// @ts-expect-error
import Index from "./components/Index.vue";

library.add(fas)

createApp(Index)
    .use(router)
    .use(store)
    .use(PrimeVue, {
        theme: {
            preset: Aura,
        }
    })
    .use(ToastService)
    .component('font-awesome-icon', FontAwesomeIcon)
    .directive('tooltip', Tooltip)
    .mount('#app');
