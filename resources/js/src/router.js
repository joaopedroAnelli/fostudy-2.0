import VueRouter from "vue-router";
import MasterLayout from "./MasterLayout";
import routes from './modules/routes'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: MasterLayout,
            children: routes
        }
    ]
})

export default router