@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de Artigos">
            <tabela-lista
                    v-bind:titulos="['ID', 'Título', 'Descrição', 'Autor', 'Data da Publicação']"
                    v-bind:itens="[[1, 'The Mistakes I Made as a Beginner Programmer', 'Learn to Identify them, make habits to avoid them', 'Gabriel Verde', '4 de Agosto de 2019'], [2, 'The Mistakes I Made as a Beginner Programmer', 'Learn to Identify them, make habits to avoid them', 'Gabriel Verde', '4 de Agosto de 2019']]"
                    detalhe="#Detalhe" criar="#Criar" editar="#Editar" deletar="#Deletar" token="827398173872"
            ></tabela-lista>
        </painel>
    </pagina>
@endsection