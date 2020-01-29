<template>
    <div class="my-4">
        <form @submit.prevent="update">
        <div class="form-group">
            <label for="name">Edit a tag</label>
            <input type="text" class="form-control" v-model="tag.name" id="name">
        </div>

        <div class="form-group">
            <button class="btn btn-lg btn-info">Update <i class="fa fa-check"></i></button>
        </div>
        </form>
    </div>
</template>

<script>

    export default {
        name: "TagsEdit",
        data() {
            return {
                tag: {
                    name: "",
                },
                endpoint: "/api/tags",
            }
        },
        mounted() {
            document.title = "Edit tag | SPA Blog";
            this.endpoint = this.endpoint + `/${this.$route.params.tag}`;
            this.loadCategory(this.endpoint)
        },
        methods: {
            loadCategory(url) {
                axios.get(url)
                    .then(response => {
                        this.tag = response.data;
                    })
            },
            update() {
                axios.put(this.endpoint, this.tag)
                    .then((response) => {
                        this.$router.push({
                            name: "admin.tags.index"
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
