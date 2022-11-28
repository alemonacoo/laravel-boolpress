<template>
    <div>
        <NavComponent :nav="nav" />
        <router-view></router-view>
    </div>
</template>

<script>
import NavComponent from "../components/NavComponent.vue";

export default {
    name: "App",
    components: { NavComponent },
    data() {
        return {
            nav: [
                { path: "/", name: "Home" },
                { path: "/posts", name: "Posts" },
                { path: "/about", name: "Chi Siamo" },
                { path: "/contacts", name: "Contatti" },
            ],
        };
    },
};
</script>

<style scoped lang="scss"></style>
