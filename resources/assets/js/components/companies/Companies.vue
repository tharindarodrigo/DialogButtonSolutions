<template>

    <div class="card">

        <div class="card-header">
            Companies
            <button class="btn btn-primary btn-sm float-right" v-if="!this.create" v-on:click="create=true"><span><i
                    class="fa fa-plus"> </i></span>
                Create
            </button>
        </div>
        <transition name="slide-fade">
            <div v-if="this.create">
                <div class="card-body">
                    <div v-if="formNotification.visible" class="alert alert-success fade show"
                         role="alert">
                        {{formNotification.message}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div v-if="notification.visible" class="alert alert-warning fade show" role="alert">
                        {{notification.message}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" v-model="company" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" v-on:click="storeCompany" v-if="!this.edit">Save</button>
                    <button class="btn btn-info" v-on:click="updateCompany" v-if="this.edit">Update</button>
                    <button class="btn btn-dark" v-on:click="cancelCreateCompany">Cancel</button>
                </div>
            </div>
        </transition>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr v-for="company in companies" v-bind:key="company.id">
                        <td>{{ company.id }}</td>
                        <td>
                            <a :href="`/companies/${company.id}`">{{ company.name }}</a>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-primary" v-on:click="editCompany(company.id)"><i
                                    class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger" v-on:click="deleteCompany(company.id)"><i
                                    class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>


</template>

<script>
    export default {
        data() {
            return {
                company: '',
                create: false,
                companies: [],
                company_id: '',
                pagination: {},
                edit: false,
                errors: [],
                formNotification: {
                    visible: false,
                    type: '',
                    message: ''
                },
                notification: {
                    visible: false,
                    type: '',
                    message: ''
                },
                update: false
            }
        },
        created() {
            this.fetchCompanies()
        },
        methods: {
            fetchCompanies() {
                axios.get('api/companies')
                    .then((res) => {
                        this.companies = res.data
                    })
            },

            fetchCompany(id) {
                axios.get(`api/companies/${id}`)
                    .then((res) => {
                        alert(res)
                    })
            },

            createCompany() {
                this.create = true
            },

            cancelCreateCompany() {
                this.create = false
                this.edit = false
                this.company = null
                this.resetNotifications()
            },
            storeCompany() {
                this.resetNotifications()
                axios.post('api/companies', {
                    company: this.company
                })
                    .then((res) => {
                        if (res.status === 201) {
                            this.fetchCompanies()

                            this.formNotification.visible = true
                            this.formNotification.message = "successfully Added"
                            this.company = ""
                            setTimeout(() =>{
                                this.formNotification.visible = false;
                            }, 3000)
                        }
                    })
                    .catch((error) => {
                        console.log(error)
                    })
            },

            resetNotifications() {
                this.formNotification.visible = false
                this.formNotification.type = ''
                this.formNotification.message = ''

                this.notification.visible = false
                this.notification.type = ''
                this.notification.message = ''
            },

            editCompany(id) {
                this.resetNotifications()
                this.fetchCompanies()
                axios.get(`api/companies/${id}/edit`)
                    .then((res) => {
                        this.company = res.data.name
                        this.edit = true
                        this.create = true
                        this.company_id = id
                    })
                    .catch((error) => {
                        console.log(error)
                        this.notification.visible = true
                        this.notification.message = error.message

                        this.fetchCompanies()

                        setTimeout(() =>{
                            this.notification.visible = false;
                        }, 5000)

                    })
            },

            updateCompany() {
                this.resetNotifications()
                axios.put(`api/companies/${this.company_id}`, {
                    name: this.company
                })
                    .then((res) => {
                        if (res.status === 201) {
                            this.formNotification.visible = true
                            this.formNotification.message = "successfully Updated record"
                            this.company = ""
                            this.edit = false
                            this.company_id = null
                            this.fetchCompanies()

                            setTimeout(() =>{
                                this.formNotification.visible = false;
                            }, 3000)

                        }
                    })
                    .then((error) => {
                        console.log(error)
                    })
            },
            deleteCompany(id) {
                this.resetNotifications()
                this.fetchCompanies()
                if (confirm('Are you sure?')) {
                    axios.delete(`api/companies/${id}`)
                        .then((res) => {
                            if (res.status = 204) {
                                console.log(res.data.message)
                                this.fetchCompanies()
                                this.resetNotifications()

                            } else {

                            }
                        })
                        .catch((error) => {
                            console.log(error)
                            this.notification.visible = true
                            this.notification.message = error.message

                            setTimeout(() =>{
                                this.notification.visible = false;
                            }, 5000)
                            this.fetchCompanies()
                        })
                }
            }
        }
    }
</script>

<style>
    /* Enter and leave animations can use different */
    /* durations and timing functions.              */
    .slide-fade-enter-active {
        transition: all .3s ease;
    }

    .slide-fade-leave-active {
        transition: all .5s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }

    .slide-fade-enter
        /* .slide-fade-leave-active below version 2.1.8 */
    {
        transform: translateX(1000px);
        opacity: 0;
    }

    .slide-fade-leave-to {
        opacity: 0;

    }
</style>