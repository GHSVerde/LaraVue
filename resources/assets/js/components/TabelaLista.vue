<template>
    <div>
        <div class="form-inline">
            <btn v-if="criar" cor="green" v-bind:url="criar" texto="Criar" icone="ion ion-android-add"></btn>
            <div class="form-group pull-right">
                <input type="search" class="form-control" placeholder="Buscar" v-model="buscar">
            </div>
        </div>

        <table class="table table-hover">
            <thead>
            <tr>
                <th v-for="titulo in titulos">{{ titulo }}</th>
                <th v-if="detalhe || editar || deletar">Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in itens">
                <td v-for="i in item">{{ i }}</td>
                <td v-if="detalhe || editar || deletar">
                    <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" v-bind:value="token">

                        <btn v-if="editar" v-bind:url="editar" icone="ion ion-android-create" cor="dark-gray"></btn>
                        <btn v-if="detalhe" v-bind:url="detalhe" icone="ion ion-android-arrow-forward" cor="dark-gray"></btn>

                        <a class="btn red" v-on:click="executaForm(index)"><i class="ion ion-android-delete"></i></a>
                    </form>
                    <span v-if="!token">
                        <btn v-if="editar" v-bind:url="editar" icone="ion ion-android-create" cor="dark-gray"></btn>
                        <btn v-if="detalhe" v-bind:url="detalhe" icone="ion ion-android-arrow-forward" cor="dark-gray"></btn>
                        <btn v-if="deletar" v-bind:url="deletar" icone="ion ion-android-delete" cor="red"></btn>
                    </span>
                    <span v-if="token && !deletar">
                        <btn v-if="editar" v-bind:url="editar" icone="ion ion-android-create" cor="dark-gray"></btn>
                        <btn v-if="detalhe" v-bind:url="detalhe" icone="ion ion-android-arrow-forward" cor="dark-gray"></btn>
                    </span>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['titulos', 'itens', 'criar', 'detalhe', 'editar', 'deletar', 'token'],

        methods: {
            executaForm: function(index) {
                document.getElementById(index).submit();
            }
        }
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
    .red {
        background-color: #f5365c;
    }
    .red:hover {
        background-color: #ac1b1a;
    }
</style>