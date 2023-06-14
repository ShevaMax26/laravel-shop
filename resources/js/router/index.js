import {createRouter, createWebHistory} from 'vue-router'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'main',
            component: () => import('../views/main/Index.vue')
        },
        {
            path: '/products',
            name: 'products.index',
            component: () => import('../views/product/Index.vue')
        },
        {
            path: '/products/:id',
            name: 'products.show',
            component: () => import('../views/product/Show.vue')
        },
        {
            path: '/cart',
            name: 'cart.index',
            component: () => import('../views/cart/Index.vue')
        },
        {
            path: '/blog',
            name: 'blog.index',
            component: () => import('../views/blog/Index.vue')
        },
        {
            path: '/blog/:id',
            name: 'blog.show',
            component: () => import('../views/blog/Show.vue')
        },
    ]
})

export default router
