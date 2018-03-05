<template>
    <transition name="bounce">
    <div>
        <div v-for="buttonTrigger in buttonTriggers" :key="buttonTrigger.id" v-bind:class="[calloutClass, 'bg-'+buttonTrigger.button_type.notification_color]">
            <p><b>{{buttonTrigger.button_type.button_type}} :</b> {{buttonTrigger.button_type.message}}</p>
        </div>
    </div>
    </transition>

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
                    });

            },


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