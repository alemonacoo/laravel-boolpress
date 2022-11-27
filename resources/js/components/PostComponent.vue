<template>
    <div>
        <div v-if="loading">CARICAMENTO...</div>
        <div v-else-if="errorMessage.length > 0">ERRORE NEL CARICAMENTO</div>
        <div v-else-if="posts.length > 0">
            <div v-for="post in posts" :key="post.id">
                <div @click="showPost(post.id)">
                    {{ post.title }}
                </div>
            </div>
        </div>
        <div v-else>Non ci sono post da visualizzare</div>
    </div>
</template>

<script>
export default {
    name: "PostComponent",
    data() {
        return {
            posts: [],
            errorMessage: "",
            loading: true,
        };
    },
    created() {
        console.log("post component ok!");

        axios.get("/api/posts").then(({ data }) => {
            if (data.success) {
                this.posts = data.result;
            } else {
                this.errorMessage = data.error;
            }
            this.loading = false;
        });
    },
    methods: {
        showPost(id) {
            this.loading = true;
            axios
                .get("/api/posts/" + id)
                .then((response) => {
                    console.log(response);
                    this.loading = false;
                })
                .catch((e) => {
                    console.log("errore", e);
                    this.loading = false;
                });
        },
    },
};
</script>

<style lang="scss" scoped></style>
