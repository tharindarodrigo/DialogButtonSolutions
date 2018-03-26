<template>
    <div>
        <div v-for="(chunk,i) in chunkedItems">
            <div class="row">
                <div class="col-md-1 col-xs-1" v-for="(button,j) in chunk" :key="button.id">
                    <button class="btn btn-default btn-block" :id="button.serial_number"
                            :class="{buttonGlow: buttonInArray(button.serial_number)}"
                            @click="removeGlow"
                    >
                        {{ i + '' + (++j) }}
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
                buttons: []
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
                        if (this.buttons.indexOf(e.data.button.serial_number) < 0) {
                            this.buttons.push(e.data.button.serial_number)
                        }

                    });
            },

            buttonInArray(id) {
                return this.buttons.indexOf(id) >= 0
            },

            removeGlow(e){
                let clickedButton = e.target.id
                let buttonIndex = this.buttons.indexOf(clickedButton)
                this.buttons.splice(buttonIndex,1)
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