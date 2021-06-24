<template>
    <div class="container mt-5">
        <div class="card card-default">
            <div class="card-header font-weight-bold">Registration</div>
            <div class="card-body">
                <div class="alert alert-danger" v-if="has_error && !success">
                    <p v-if="error === 'registration_validation_error'">Erreur(s) de validation, veuillez consulter
                        le(s)
                        message(s) ci-dessous.</p>
                    <p v-else>Error, unable to register at the moment.</p>
                </div>
                <div class="form-group" :class="{ 'has-error': has_error && errors.name }">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" v-model="name">
                    <span class="help-block" v-if="has_error && errors.name">{{ errors.name }}</span>
                </div>
                <div class="form-group" :class="{ 'has-error': has_error && errors.email }">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" class="form-control" placeholder="user@example.com"
                           v-model="email">
                    <span class="help-block" v-if="has_error && errors.email">{{ errors.email }}</span>
                </div>
                <div class="form-group" :class="{ 'has-error': has_error && errors.password }">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" v-model="password">
                    <span class="help-block" v-if="has_error && errors.password">{{ errors.password }}</span>
                </div>
                <div class="form-group" :class="{ 'has-error': has_error && errors.password }">
                    <label for="password_confirmation">Confirm password</label>
                    <input type="password" id="password_confirmation" class="form-control"
                           v-model="password_confirmation">
                </div>
                <button type="button" class="btn btn-success" @click="register">Submit</button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "Register",
    data() {
        return {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            has_error: false,
            error: '',
            errors: {},
            success: false,
        }
    },

    methods: {
        register() {
            let app = this;

            axios.post('auth/register', {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation,
            }).then(response => {
                this.success = true;
                this.$router.push({name: 'login', params: {successRegistrationRedirect: true}})
            }).catch(response => {
                console.log(response)
                this.has_error = true
                this.error = response.response.data.error
                this.errors = response.response.data.errors || {}
            });

            // this.$auth.register({
            //     data: {
            //         email: app.email,
            //         password: app.password,
            //         password_confirmation: app.password_confirmation
            //     },
            //
            //     success: function () {
            //         app.success = true
            //         this.$router.push({name: 'login', params: {successRegistrationRedirect: true}})
            //     },
            //
            //     error: function (res) {
            //         console.log(res.response.data.errors)
            //         app.has_error = true
            //         app.error = res.response.data.error
            //         app.errors = res.response.data.errors || {}
            //     }
            // })


        },
    },
}
</script>
