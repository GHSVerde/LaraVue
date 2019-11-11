<template>
    <div v-bind:class="defineCor">
        <div class="panel-heading" v-if='titulo'>{{ titulo }}</div>
        <div class="panel-body">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['titulo', 'cor'],
        computed: {
            defineCor: function () {
                return "panel " + (this.cor || "panel-default")
            }
        }
    }
</script>

<style scoped>
    .panel {
        overflow: hidden;
        margin: 0;
        transition: box-shadow .25s, -webkit-box-shadow .25s;
        border-radius: 2px;
        background-color: #fff;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .14), 0 3px 1px -2px rgba(0, 0, 0, .12), 0 1px 5px 0 rgba(0, 0, 0, .2);
        -webkit-box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .14), 0 3px 1px -2px rgba(0, 0, 0, .12), 0 1px 5px 0 rgba(0, 0, 0, .2);
        padding: 24px;
        border-radius: 0 0 2px 2px;
    }
    .panel-heading {
        border: 0;
        font-size: 18px;
        font-weight: 400;
        line-height: 32px;
    }

    .red {
        border-color: #D32F2F
    }

    .red > .panel-heading {
        color: #fff;
        background-color: #FF5252;
        border-color: #FF5252
    }

    .light-blue {
        border-color: #03A9F4 ;
    }
    .light-blue > .panel-heading {
        color: #fff;
        background-color: #03A9F4;
        border-color: #03A9F4;
    }

    .deep-orange {
     border-color: #FF5722;
    }
    .deep-orange > .panel-heading {
        color: #fff;
        background-color: #FF5722;
        border-color: #FF5722;
    }

    .pink {
        border-color: #E91E63;
    }
    .pink > .panel-heading {
        color: #fff;
        background-color: #E91E63;
        border-color: #E91E63;
    }

    .purple {
        border-color: #9C27B0;
    }
    .purple > .panel-heading {
        color: #fff;
        background-color: #9C27B0;
        border-color: #9C27B0;
    }

    .deep-purple {
        border-color: #673AB7;
    }
    .deep-purple > .panel-heading {
        color: #fff;
        background-color: #673AB7;
        border-color: #673AB7;
    }

    .indigo {
        border-color: #3F51B5;
    }
    .indigo > .panel-heading {
        color: #fff;
        background-color: #3F51B5;
        border-color: #3F51B5;
    }

    .teal {
        border-color: #009688;
    }
    .teal > .panel-heading {
        color: #fff;
        background-color: #009688;
        border-color: #009688;
    }

    .panel-success {
        border-color: #4CAF50;
    }
    .panel-success > .panel-heading {
        color: #fff;
        background-color: #4CAF50;
        border-color: #4CAF50;
    }

    .panel-warning {
        border-color: #FBC02D;
    }
    .panel-warning> .panel-heading {
        color: #fff;
        background-color: #FBC02D;
        border-color: #FBC02D;
    }
</style>