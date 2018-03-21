<template>
    <div class="row" v-for="chunk in chunkedItems">
        <div class="col-md-1" v-for="button in chunk">
            <button class="btn btn-default btn-dark btn-block"
                    :class="" :id="button.serial_number"
                    @click="">
                {{++index}}
            </button>
        </div>
        <!--<br :if="(index%9==0 && x>0)"/>-->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                btnClass: {button: false},
                buttonList: [],
                x: 0
            }
        },
        computed: {
            chunkedItems () {
                return _.chunk(this.buttonList,4)
            }
        },
        mounted() {
            this.getButtons()
        },

        methods: {
            glowButton: function (x, event) {
                this.buttons.push(event.target.id)
                this.buttonInArray(event.target.id)
            },

            buttonInArray(id) {
                if (this.buttons.indexOf(id) >= 0) {

                }
            },
            getButtons() {
                axios.get('button-list')
                    .then((res) => {
                        this.buttonList = res.data
                    })
                    .catch((error) => {
                        console.log(error)
                    })

//                setTimeout(this.getNotifications(),2000)
            }
        }
    }
</script>

<style>

    @-webkit-keyframes glowing {
        0% {
            background-color: #B20000;
            -webkit-box-shadow: 0 0 3px #B20000;
            color: #FFFFFF;
        }
        50% {
            background-color: #FF0000;
            -webkit-box-shadow: 0 0 40px #FF0000;
            color: #FFFFFF
        }
        100% {
            background-color: #B20000;
            -webkit-box-shadow: 0 0 3px #B20000;
            color: #FFFFFF
        }
    }

    @-moz-keyframes glowing {
        0% {
            background-color: #B20000;
            -moz-box-shadow: 0 0 3px #B20000;
            color: #FFFFFF
        }
        50% {
            background-color: #FF0000;
            -moz-box-shadow: 0 0 40px #FF0000;
            color: #FFFFFF
        }
        100% {
            background-color: #B20000;
            -moz-box-shadow: 0 0 3px #B20000;
            color: #FFFFFF
        }
    }

    @-o-keyframes glowing {
        0% {
            background-color: #B20000;
            box-shadow: 0 0 3px #B20000;
            color: #FFFFFF
        }
        50% {
            background-color: #FF0000;
            box-shadow: 0 0 40px #FF0000;
            color: #FFFFFF
        }
        100% {
            background-color: #B20000;
            box-shadow: 0 0 3px #B20000;
            color: #FFFFFF
        }
    }

    @keyframes glowing {
        0% {
            background-color: #B20000;
            box-shadow: 0 0 3px #B20000;
            color: #FFFFFF
        }
        50% {
            background-color: #FF0000;
            box-shadow: 0 0 40px #FF0000;
            color: #FFFFFF
        }
        100% {
            background-color: #B20000;
            box-shadow: 0 0 3px #B20000;
            color: #FFFFFF
        }
    }

    .buttonGlow {
        -webkit-animation: glowing 1500ms infinite;
        -moz-animation: glowing 1500ms infinite;
        -o-animation: glowing 1500ms infinite;
        animation: glowing 1500ms infinite;
    }
</style>