<template>
    <a v-bind:class="defineCor" v-bind:href="url">
        <i v-if="icone" v-bind:class="icone"></i> {{ texto }}
    </a>
</template>

<script>
    export default {
        props: ['url', "texto", "icone", 'cor'],
        computed: {
            defineCor: function () {
                return "btn " + this.cor;
            }
        },
        name: "LargeBtn"
    }
</script>

<style scoped>
    .btn {
        color: #fff;
        margin-bottom: .5rem;
        cursor: pointer;
        font-weight: 500;
        letter-spacing: .03em;
        font-size: 0.8125rem;
        min-width: 2.375rem;
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border: 1px solid transparent !important;
        padding: 0.375rem 0.75rem;
        font-size: 12px;
        padding: 6px 12px;
        line-height: 1.84615385;
        border-radius: 3px;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .blue {
        background-color: #467fcf;
    }
    .blue:hover {
        background-color: #316cbe;
    }
    .azure {
        background-color: #45aaf2;
    }
    .azure:hover {
        background-color: #219af0;
    }
    .indigo {
        background-color: #6574cd;
    }
    .indigo:hover {
        background-color: #485ac4;
    }
    .purple {
        background-color: #867efc;
    }
    .purple:hover {
        background-color: #923ce6;
    }
    .pink {
        background-color: #ec82ef;
    }
    .pink:hover {
        background-color: #f44982;
    }
    .red {
        background-color: #f5365c;
    }
    .red:hover {
        background-color: #ac1b1a;
    }
    .orange {
        background-color: #fc7303;
    }
    .orange:hover {
        background-color: #fd811e;
    }
    .yellow {
        background-color: #ecb403;
    }
    .yellow:hover {
        background-color: #cea70c;
    }
    .lime {
        background-color: #7bd235;
    }
    .lime:hover {
        background-color: #69b829;
    }
    .green {
        background-color: #2dce89;
    }
    .green:hover {
        background-color: #28b97b;
    }
    .teal {
        background-color: #28b97b;
    }
    .teal:hover {
        background-color: #24ab9d;
    }
    .cyan {
        background-color: #17a2b8;
    }
    .cyan:hover {
        bakcground-color: #138496;
    }
    .gray {
        background-color: #868e96;
    }
    .gray:hover {
        background-color: #727b84;
    }
    .dark-gray {
        background-color: #343a40;
    }
    .dark-gray:hover {
        background-color: #23272b;
    }
</style>