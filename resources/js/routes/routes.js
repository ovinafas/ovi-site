//Routes
import adminRoutes from "./admin"
import publicRoutes from "./web"

const routes = [...adminRoutes, ...publicRoutes];
// const routes = [...adminRoutes,];
export default routes;
