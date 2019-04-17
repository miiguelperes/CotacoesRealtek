import HomeComponent from 'src/pages/home/home';
import LoginComponent from 'src/pages/login';
import AdminComponent from 'src/pages/admin/admin';

export default [
    {
        name: 'home',
        path: '/',
        component: HomeComponent,
    },
    {
        name: 'login',
        path: '/login',
        component: LoginComponent,
    },
    {
        name: 'admin',
        path: '/admin',
        component: AdminComponent,
    },
];
