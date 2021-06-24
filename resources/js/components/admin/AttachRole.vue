<template>
    <div class="alert alert-success" v-if="message">
        <p>{{ message }}</p>
    </div>
    <div class="users">
        <div class="form-group col-md-4">
            <label for="users">Users</label>
            <select class="form-select form-control" id="users" v-model="user">
                <option :value="id" v-for="(user, id) in users">{{ user }}</option>
            </select>
        </div>
    </div>
    <div class="roles">
        <div class="form-group col-md-4">
            <label for="roles">Roles</label>
            <select class="form-select form-control" id="roles" v-model="role">
                <option :value="id" v-for="(role, id) in roles">{{ role }}</option>
            </select>
        </div>
    </div>
    <div class="form-group col-md-4">
        <button type="button" class="btn btn-primary" @click="attach">Save</button>
    </div>
</template>

<script>
export default {
    name: "AttachRole",
    data() {
        return {
            users: [],
            roles: [],
            user: null,
            role: null,
            message: '',
        }
    },

    mounted() {
        this.getUsersRoles();
    },

    methods: {
        getUsersRoles() {
            axios.get('/attach-role')
                .then(response => {
                    //console.log(response);
                    this.users = response.data.users;
                    this.roles = response.data.roles;
                }).catch(error => {
                console.log(error)
            });
        },

        attach() {
            axios.post('/attach-role', {
                user: this.user,
                role: this.role,
            })
                .then(response => {
                    console.log(response);
                    this.message = response.data;
                }).catch(error => {
                console.log(error)
            });
        },
    },
}
</script>
