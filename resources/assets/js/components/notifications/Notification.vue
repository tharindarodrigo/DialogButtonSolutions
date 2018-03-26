<template>
    <div>
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Notifications</h3>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Company</th>
                            <th>Branch</th>
                            <th>Type</th>
                            <th>Identifier</th>
                            <th>S. No.</th>
                            <th>Date Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="buttonRecord in buttonTriggers" :key="buttonRecord.id">
                            <td>{{buttonRecord.id}}</td>
                            <td>{{buttonRecord.company.name}}</td>
                            <td>{{buttonRecord.branch.branch}}</td>
                            <td>{{buttonRecord.button_type.button_type}}</td>
                            <td>{{buttonRecord.button.identifier}}</td>
                            <td>{{buttonRecord.button.serial_number}}</td>
                            <td>{{buttonRecord.created_at}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div v-for="buttonTrigger in buttonTriggers" :key="buttonTrigger.id"
                 v-bind:class="[calloutClass, 'bg-'+buttonTrigger.button_type.notification_color]">
                <p><b>{{buttonTrigger.button_type.button_type}} :</b> {{buttonTrigger.button_type.message}}</p>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                buttonTriggers: [],
                calloutClass: "callout"
            }
        },

        created() {
            this.getEchoNotifications()
//            this.getNotifications()
        },

        methods: {
            getNotifications() {
                axios.get('notifications')
                    .then((res) => {
                        this.buttonTriggers = res.data
                    })
                    .catch((error) => {
                        console.log(error)
                    })

//                setTimeout(this.getNotifications(),2000)
            },

            getEchoNotifications() {
//                alert('asdasdas');
                Echo.channel('button-trigger-channel')
                    .listen('ButtonTriggerEvent', (e) => {
                        console.log(e.data);
                        this.buttonTriggers.push(e.data)
                        this.buttonTriggers.sort(function (a,b) {
                            return b.id-a.id
                        })
                    });
            },

            getTable() {

            }

        }


    }
</script>

<style>
    .bounce-enter-active {
        animation: bounce-in .5s;
    }

    .bounce-leave-active {
        animation: bounce-in .5s reverse;
    }

    @keyframes bounce-in {
        0% {
            transform: scale(0);
        }
        50% {
            transform: scale(1.5);
        }
        100% {
            transform: scale(1);
        }
    }
</style>