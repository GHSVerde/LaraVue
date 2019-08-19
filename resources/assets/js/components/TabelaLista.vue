<template>
    <div>
        <div class="form-inline">
            <modallink v-if="criar" nome="meuModalTeste" titulo="Criar" css="btn green" icone="ion ion-android-add"></modallink>
<!--            <btn v-if="criar" cor="green" v-bind:url="criar" texto="Criar" icone="ion ion-android-add"></btn>-->
            <div class="form-group pull-right">
                <input type="search" class="form-control" placeholder="Buscar" v-model="buscar">
            </div>
        </div>

        <table class="table table-hover">
            <thead>
            <tr>
                <th style="cursor: pointer" v-on:click="ordenaColuna(index)" v-for="(titulo, index) in titulos">{{ titulo }}</th>
                <th v-if="detalhe || editar || deletar">Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in lista">
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
        props: ['titulos', 'itens', 'criar', 'detalhe', 'editar', 'deletar', 'token', 'ordem', 'ordemCol'],
        data: function () {
            return {
                buscar: '',
                ordemAux: this.ordem || "asc",
                ordemAuxCol: this.ordemCol || 0
            }
        },

        methods: {
            executaForm: function(index) {
                document.getElementById(index).submit();
            },

            ordenaColuna: function(coluna) {
                this.ordemAuxCol = coluna;
                this.ordemAux = (this.ordemAux.toLowerCase() == "asc") ? 'desc' : 'asc';
            }
        },
        computed: {
            lista: function() {

                let ordem = this.ordemAux; // Se for definido pega o valor, asc padrão
                let ordemCol = this.ordemAuxCol; // Mesma coisa de cima
                ordem = ordem.toLowerCase(); // Transforma em lowercase
                ordemCol = parseInt(ordemCol); //Transforma em int

                if (ordem == "asc") { //Se a ordem for crescente, aplica o método responsável
                    this.itens.sort(function (a, b) {
                        if (a[ordemCol] > b[ordemCol]) { return 1; }
                        if (a[ordemCol] < b[ordemCol]) { return -1; }
                        return 0;
                    });
                } else { //Se não for, aplica decrescente
                    this.itens.sort(function (a, b) {
                        if (a[ordemCol] < b[ordemCol]) { return 1; }
                        if (a[ordemCol] > b[ordemCol]) { return -1; }
                        return 0;
                    });
                }

                //Retorna um filtro dos itens
                return this.itens.filter( res => {
                    for( let k = 0; k < res.length; k++) { // Loop enquanto tiver itens
                        if ( (res[k] + '').toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0) { // Transforma a pesquisa e os itens em lowercase e testa se são iguais
                            return true;
                        }
                    }
                    return false; //Retorna falso se não for do loop
                } );

                return this.itens;
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