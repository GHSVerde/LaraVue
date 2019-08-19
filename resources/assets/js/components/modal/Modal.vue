<template>
    <div class="modal fade" v-bind:id="nome" tabindex="-1" role="dialog" v-bind:aria-labelledby="nome">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['nome']
    }
</script>

<style scoped>

</style>