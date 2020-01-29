<template>
    <div class="my-4">
        <form @submit.prevent="update">
        <div class="form-group">
            <label for="name">Edit a user</label>
            <input type="text" class="form-control" v-model="user.name" id="name">
        </div>

        <div class="form-group">
            <button class="btn btn-lg btn-info">Update <i class="fa fa-check"></i></button>
        </div>
        </form>
    </div>
</template>

<script>

    export default {
        name: "UsersEdit",
        data() {
            return {
                user: {
                    name: "",
                },
                endpoint: "/api/users",
            }
        },
        mounted() {
            document.title = "Edit user | SPA Blog";
            this.endpoint = this.endpoint + `/${this.$route.params.user}`;
            this.loadCategory(this.endpoint)
        },
        methods: {
            loadCategory(url) {
                axios.get(url)
                    .then(response => {
                        this.user = response.data;
                    })
            },
            update() {
                axios.put(this.endpoint, this.user)
                    .then((response) => {
                        this.$router.push({
                            name: "admin.users.index"
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
