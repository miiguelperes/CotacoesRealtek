import HomeComponent from 'src/pages/home/home';
import VideosComponent from 'src/pages/videos/videos';
import RegisterComponent from 'src/pages/register/register';
import CartComponent from 'src/pages/cart/cart';

export default [
    {
        name: 'home',
        path: '/home',
        component: HomeComponent,
    },
    {
        name: 'videos',
        path: '/',
        component: VideosComponent,
    },
    {
        name: 'register',
        path: '/register',
        component: RegisterComponent,
    },
    {
        name: 'cart',
        path: '/cart',
        component: CartComponent,
        meta: { transitionName: 'slide' },
    },
];
