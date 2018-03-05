<template>
    <select name="branches" id="" class="form-control">
        <option :value="branch.id" v-for="branch in branches" :key="branch.id">{{branch.branch}}</option>
    </select>
</template>

<script>
    export default {
        data(){
            return {
                branches: [],
                company: ''
            }
        },

        mounted(){

//            this.getBranches(this.company)

        },

        methods: {
            getBranches(){
            companyId = document.getElementById('company')
                axios.get(`${window.location.host}/company/${companyId}/branches`)
                    .then((res)=> {
                        this.branches = res.data
                    })
                    .catch((error)=> {
                        console.log(error)
                    })
            }
        }

    }
</script>