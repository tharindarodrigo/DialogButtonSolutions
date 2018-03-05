<template>
    <div class="card">
        <div class="card-header">Branches
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
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Company</label>
                                <select name="" id="" class="form-control">
                                    <option v-for="company in companies" :value="company.id" :if="id">{{company.name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Branch Name</label>
                                <input type="text" class="form-control" v-model="branch.branch">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" v-model="branch.phone">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea name="" cols="30" rows="1" class="form-control" v-model="branch.address"></textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-primary" v-on:click="storeBranch" v-if="!this.edit">Save</button>
                    <button class="btn btn-info" v-on:click="updateBranch" v-if="this.edit">Update</button>
                    <button class="btn btn-dark" v-on:click="cancelCreateBranch">Cancel</button>
                </div>
            </div>
        </transition>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Company</th>
                        <th>Branch</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr v-for="branch in branches" :key="branch.id">
                        <td>{{ branch.id }}</td>
                        <td>{{ branch.company.name }}</td>
                        <td>{{ branch.branch }}</td>
                        <td>{{ branch.address }}</td>
                        <td>{{ branch.phone }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" v-on:click="editBranch(branch.id)"><i
                                    class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger" v-on:click="deleteBranch(branch.id)"><i
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
                branches: [],
                companies: [],
                branch: {
                  branch:'',
                  company_id: '',
                  phone: '',
                  address: ''
                },

                create: false,
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
            this.fetchBranches();
            this.fetchCompanies()
        },

        methods: {
            fetchBranches() {
                axios.get('api/branches')
                    .then((res) => {
                        this.branches = res.data
                    })
                    .catch((error) => {
                        console.log(error)
                    })
            },
            fetchCompanies() {
                axios.get('api/companies')
                    .then((res) => {
                        this.companies = res.data
                    })
            },

            createBranch() {
                this.create = true
            },

            cancelCreateBranch() {
                this.create = false
                this.edit = false
                this.company = null
                this.resetNotifications()
            },
            storeBranch() {
                this.resetNotifications()
                axios.post('api/companies', this.branch)
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

            editBranch(id) {
                this.resetNotifications()
                axios.get(`api/brnaches/${id}`)
                    .then((res)=>{

                    })
                    .catch()

            },

            deleteBranch(){

            },

            loadData(res){
                this.branch.bnach = res.data.name
                this.branch.address = res.data.address
                this.branch.company_id = res.data.company_id
                this.branch.phone = res.data.phone
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