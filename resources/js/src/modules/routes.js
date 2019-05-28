import institution from './instituicoes/routes'
import dashboard from './dashboard/routes'
import disciplinas from './disciplinas/routes'
import cursos from './cursos/routes'

const routes = Array.concat(
    institution,
    dashboard,
    disciplinas,
    cursos
)


export default routes