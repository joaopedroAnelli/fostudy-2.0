import institution from './instituicoes/routes'
import dashboard from './dashboard/routes'
import disciplinas from './disciplinas/routes'
import cursos from './cursos/routes'
import aulas from './aulas/routes'

const routes = Array.concat(
    institution,
    dashboard,
    disciplinas,
    cursos,
    aulas
)


export default routes