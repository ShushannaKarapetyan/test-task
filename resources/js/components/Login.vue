<template>
    <div class="container mt-5">
        <div class="card card-default">
            <div class="card-header">Login</div>
            <div class="card-body">
                <div class="alert alert-danger" v-if="has_error">
                    <p>Error, unable to connect with these credentials.</p>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" class="form-control" placeholder="user@example.com"
                           v-model="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" v-model="password" required>
                </div>
                <button type="button" class="btn btn-success" @click="login">Login</button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "Login",
    data() {
        return {
            email: null,
            password: null,
            has_error: false,
        }
    },

    methods: {
        login() {
            axios.post('/auth/login', {
                email: this.email,
                password: this.password,
            }).then(response => {
                for (let i = 0; i < response.data.authUser['roles'].length; i++) {
                    if (response.data.authUser.roles[i]['name'] === 'Admin') {
                        this.$router.push({name: 'admin.dashboard'});
                    } else {
                        this.$router.push({name: 'dashboard'});
                    }
                }
            }).catch(response => {
                console.log(response)
                this.has_error = true;
            });


            // let redirect = this.$auth.redirect();
            // let app = this;
            //
            // this.$auth.login({
            //     params: {
            //         email: app.email,
            //         password: app.password
            //     },
            //     success: function () {
            //         const redirectTo = redirect ? redirect.from.name : this.$auth.user().role === 'Admin' ? 'admin.dashboard' : 'dashboard'
            //         this.$router.push({name: redirectTo})
            //     },
            //     error: function () {
            //         app.has_error = true
            //     },
            //     rememberMe: true,
            //     fetchUser: true
            // })
        },
    },
}
</script>
