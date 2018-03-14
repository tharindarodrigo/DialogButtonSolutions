<template>
    <div>
        <div v-for="x in 10">
            <div class="row">
                <div class="col-md-1" v-for="y in 10">
                    <button class="btn btn-lg btn-flat btn-default btn-dark btn-block"
                            :class="{button:btnClass}" :id="(x - 1) * 10 + y"
                    @click="btnClass=!btnClass">
                        {{ (x - 1) * 10 + y }}
                    </button>
                </div>

            </div>
            <br>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                btnClass:  {button: true},
                buttons: [],
                x: ''
            }
        },

        methods: {
            glowButton: function (event) {
                this.buttons.push(event.target.id)
            }
        }
    }
</script>