const Welcome = () => import('./components/Welcome.vue' /* webpackChunkName: "resource/js/components/welcome" */)
const CategoryList = () => import('./components/category/List.vue' /* webpackChunkName: "resource/js/components/category/list" */)
const CategoryCreate = () => import('./components/category/Add.vue' /* webpackChunkName: "resource/js/components/category/add" */)
const CategoryEdit = () => import('./components/category/Edit.vue' /* webpackChunkName: "resource/js/components/category/edit" */)
const Fail = () => import('./components/Error.vue')
const Login = () => import('./components/security/Login')

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Welcome,
        meta: {
            middleware: 'auth'
        }
    },
    {
        name: 'categoryList',
        path: '/category',
        component: CategoryList,
        meta: {
            middleware: 'auth'
        }
    },
    {
        name: 'categoryEdit',
        path: '/category/:id/edit',
        component: CategoryEdit,
        meta: {
            middleware: 'auth'
        }
    },
    {
        name: 'categoryAdd',
        path: '/category/add',
        component: CategoryCreate,
        meta: {
            middleware: 'auth'
        }
    },
    {
        path: '/Login',
        name: 'Login',
        component: Login,
    },
    {
        path: '*',
        component: Fail,
    }
]