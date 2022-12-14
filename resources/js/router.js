import Vue from "vue";
import VueRouter from "vue-router";
import PostComponent from "./pages/PostComponent";
import NotFoundComponent from "./pages/NotFoundComponent";
import AboutComponent from "./pages/AboutComponent";
import ContactsComponent from "./pages/ContactsComponent";
import HomepageComponent from "./pages/HomepageComponent";

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        { path: "/", name: "home", component: HomepageComponent },
        { path: "/posts", name: "Posts-index", component: PostComponent },
        { path: "/about", name: "About", component: AboutComponent },
        { path: "/contacts", name: "Contacts", component: ContactsComponent },
        { path: "/*", name: "NotFound", component: NotFoundComponent },
    ],
});

export default router;
