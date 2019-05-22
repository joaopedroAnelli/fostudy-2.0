import VueRouter from "vue-router";
import MasterLayout from "./MasterLayout";
import institutions from "./modules/instituicoes/routes"


const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: MasterLayout,
            children: institutions
        }
    ]
})

export default router