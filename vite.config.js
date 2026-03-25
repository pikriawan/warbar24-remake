import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/admin-dashboard.css',
                'resources/css/admin-layout.css',
                'resources/css/admin-login.css',
                'resources/css/admin-menu-create.css',
                'resources/css/admin-menu.css',
                'resources/css/admin-menus.css',
                'resources/css/admin-order.css',
                'resources/css/admin-orders.css',
                'resources/css/admin-sidebar.css',
                'resources/css/app.css',
                'resources/css/cart.css',
                'resources/css/customer-layout.css',
                'resources/css/global.css',
                'resources/css/header.css',
                'resources/css/home.css',
                'resources/css/menus.css',
                'resources/css/order.css',
                'resources/css/orders.css',
                'resources/css/utilities.css',
                'resources/js/admin-sidebar.js',
                'resources/js/app.js',
                'resources/js/header.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
