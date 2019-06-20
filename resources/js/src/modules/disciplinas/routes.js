import index from './index'
import novo from "./novo";
import selecao from "./selecao";

export default [
    {
        path: '/disciplinas',
        component: index
    },
    {
        path: '/disciplinas/novo',
        component: novo
    },
    {
        path: '/disciplinas/selecao',
        component: selecao
    }
]