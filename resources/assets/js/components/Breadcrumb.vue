<template>
    <ol class="breadcrumb">
        <li v-for="item in lista">
            <a v-bind:class="defineClass" v-if="item.url" v-bind:href="item.url">{{item.titulo}}</a>
            <span v-if="!item.url">{{item.titulo}}</span>
        </li>
    </ol>
</template>

<script>
    export default {
        props: ['lista'],
        computed: {
            defineClass: function () {
                if(this.url) {
                    return "active"
                } else {
                    return ""
                }
            }
        }
    }
</script>

<style scoped>

</style>