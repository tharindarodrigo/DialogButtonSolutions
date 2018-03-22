<template>
    <div>
        <div v-for="(chunk,i) in chunkedItems">
            <div class="row">
                <div class="col-md-1" v-for="(button,j) in chunk" :key="button.id">
                    <button class="btn btn-default btn-block" :id="button.serial_number"
                            :class="{buttonGlow: buttonInArray(button.serial_number)}"
                            @click="removeGlow(button.serial_number)"
                    >
                        {{ i + '' + j }}
                    </button>
                </div>
            </div>
            <br/>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                buttonList: [],
                x: 0,
                buttons: [],
                btnGlw: false
            }
        },

        mounted() {
            this.getButtons()
            this.glowButton()
        },

        computed: {
            chunkedItems: function () {
                return _.chunk(this.buttonList, 10)
            }
        },

        methods: {
            glowButton: function () {
                Echo.channel('button-trigger-channel')
                    .listen('ButtonTriggerEvent', (e) => {
                        console.log(e.data)
                        if (!buttonInArray(e.data.button.serial_number)) {
                            this.buttons.push(e.data.button.serial_number)
                        }
//                        this.btnGlw = this.buttonInArray(e.data.button.serial_number)
//                        this.buttonInArray(e.data.button.serial_number)
//                        this.buttonTriggers.push(e.data)
//                        this.buttonTriggers.sort(function (a,b) {
//                            return b.id-a.id
//                        })
                    });
            },

            buttonInArray(id) {
                if(this.buttons.indexOf(id) >= 0) {
                    return true
                }
                return  false

            },

            removeGlow(serial){
                this.buttons.splice(this.buttons.indexOf(serial))
            },

            getButtons() {
                axios.get('button-list')
                    .then((res) => {
                        this.buttonList = res.data
                    })
                    .catch((error) => {
                        console.log(error)
                    })

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