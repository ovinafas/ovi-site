<template>
    <div class="my-4">
        <form @submit.prevent="update">
        <div class="form-group">
            <label for="name">Edit a post</label>
            <input type="text" class="form-control" v-model="post.name" id="name">
        </div>

        <div class="form-group">
            <button class="btn btn-lg btn-info">Update <i class="fa fa-check"></i></button>
        </div>
        </form>
    </div>
</template>

<script>

    export default {
        name: "PostsEdit",
        data() {
            return {
                post: {
                    name: "",
                },
                endpoint: "/api/posts",
            }
        },
        mounted() {
            document.title = "Edit post | SPA Blog";
            this.endpoint = this.endpoint + `/${this.$route.params.post}`;
            this.loadCategory(this.endpoint)
        },
        methods: {
            loadCategory(url) {
                axios.get(url)
                    .then(response => {
                        this.post = response.data;
                    })
            },
            update() {
                axios.put(this.endpoint, this.post)
                    .then((response) => {
                        this.$router.push({
                            name: "admin.posts.index"
                        })
                    })
                    .catch((error) => {
                        console.log(error);
                    })
            }
        }
    }
</script>

<style scoped>

</style>
