import Vue from "vue";
import VueRouter from "vue-router";
import PostComponent from "./pages/PostComponent";
import NotFoundComponent from "./pages/NotFoundComponent";

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        { path: "/", name: "home", component: PostComponent },
        { path: "/*", name: "NotFound", component: NotFoundComponent },
    ],
});

export default router;
