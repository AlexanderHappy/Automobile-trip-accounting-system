import { createWebHistory, createRouter } from "vue-router"
import Home from  "./components/pages/Home.vue"
import Create from  "./components/pages/Create.vue"
import LayoutEmpty from "./components/layout/LayoutEmpty.vue";


const route = function (name, path, component, permission, layout = LayoutEmpty) {
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

const routes = [
    route("index", "/", Home, []),
    route("create", "/create", Create, []),
]

const router = createRouter({
    history: createWebHistory(),
    routes
})


export default router;
