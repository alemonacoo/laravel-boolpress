<template>
    <nav>
        <ul>
            <li>
                <router-link to="/">Home</router-link>
            </li>
            <li>
                <router-link to="/about">Chi siamo</router-link>
            </li>
            <li>
                <router-link to="/contacts">Contatti</router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "NavComponent",
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
