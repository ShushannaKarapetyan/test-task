import Home from '../components/Home';
import Register from '../components/Register';
import Login from '../components/Login';
import Dashboard from '../components/user/Dashboard';
import AdminDashboard from '../components/admin/Dashboard';
import AttachRole from "../components/admin/AttachRole";
import Index from "../components/admin/Index";

// Routes
const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
        meta: {
            auth: undefined
        }
    },
    {
        path: '/register',
        name: 'register',
        component: Register,
        meta: {
            auth: false
        }
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            auth: false
        }
    },
    // USER ROUTES
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        meta: {
            auth: true
        }
    },
    // ADMIN ROUTES
    {
        path: '/admin',
        name: 'admin.dashboard',
        component: AdminDashboard,
        meta: {
            auth: {roles: 'Admin', redirect: {name: 'login'}, forbiddenRedirect: '/403'}
        },
        children: [
            {
                path: '/admin',
                name: 'admin.default',
                component: Index,
            },
            {
                path: '/admin/attach-role',
                name: 'attach.role',
                component: AttachRole,
            },
        ],
    },
];

export default routes;
