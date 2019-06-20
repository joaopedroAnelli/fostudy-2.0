import institution from './instituicoes/routes'
import dashboard from './dashboard/routes'
import disciplinas from './disciplinas/routes'
import cursos from './cursos/routes'
import aulas from './aulas/routes'
import trabalhos from './trabalhos/routes'
import provas from './provas/routes'

const routes = Array.concat(
    institution,
    dashboard,
    disciplinas,
    cursos,
    aulas,
    provas,
    trabalhos
)


export default routes
