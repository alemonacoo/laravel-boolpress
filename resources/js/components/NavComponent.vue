<template>
    <nav>
        <ul>
            <li v-for="(link, index) in nav" :key="index">
                <router-link :to="link.path">{{ link.name }}</router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "NavComponent",
    props: {
        nav: Array,
    },
};
</script>

<style lang="scss" scoped>
ul {
    display: flex;
    padding: 0;
    margin: 10px;
    list-style-type: none;
    width: 100%;
    justify-content: space-evenly;
}
</style>
