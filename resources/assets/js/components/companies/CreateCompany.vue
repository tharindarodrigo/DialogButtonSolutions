<template>
    <div>
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
                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" v-model="company" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" v-on:click="storeCompany">Save</button>
                <button class="btn btn-dark" v-on:click="cancelCreateCompany">Cancel</button>
            </div>
        </div>
        </transition>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                company: '',
                create: false
            }

        },
        methods: {
            createCompany () {
                this.create = true
            },

            cancelCreateCompany() {
                this.create = false
            },
            storeCompany(){
                axios.post('companies')
                    .then((res)=>{

                    })
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
        transition: all .1s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter
        /* .slide-fade-leave-active below version 2.1.8 */ {
        transform: translateX(500px);
        opacity: 0;
    }
    .slide-fade-leave-to {
        opacity: 0;

    }
</style>