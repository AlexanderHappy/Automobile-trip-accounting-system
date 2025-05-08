import { createWebHistory, createRouter } from "vue-router"
// eslint-disable-next-line @typescript-eslint/ban-ts-comment
// @ts-expect-error
import Home from  "./components/pages/Home.vue"
// eslint-disable-next-line @typescript-eslint/ban-ts-comment
// @ts-expect-error
import Create from  "./components/pages/Create.vue"
// eslint-disable-next-line @typescript-eslint/ban-ts-comment
// @ts-expect-error
import LayoutEmpty from "./components/layout/LayoutEmpty.vue";
// eslint-disable-next-line @typescript-eslint/ban-ts-comment
// @ts-expect-error
import Read from "@/components/pages/Read.vue";


// eslint-disable-next-line @typescript-eslint/typedef,@typescript-eslint/explicit-function-return-type
const route = function (name: string, path: string, component: object, permission: object, layout: object = LayoutEmpty) {
    return {
        name: name,
        path: path,
        component: component,
        meta: {
            permission: permission,
            layout: layout
        },
    }
}

// eslint-disable-next-line @typescript-eslint/typedef
const routes = [
    route("index", "/", Home, []),
    route("create", "/create", Create, []),
    route("read", "/read", Read, []),
]

// eslint-disable-next-line @typescript-eslint/typedef
const router = createRouter({
    history: createWebHistory(),
    routes
})


export default router;
