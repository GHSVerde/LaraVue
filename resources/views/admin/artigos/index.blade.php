@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de Artigos">
            <breadcrumb v-bind:lista="{{ $listaBreadcrumb }}"></breadcrumb>
            <tabela-lista
                    v-bind:titulos="['ID', 'Título', 'Descrição']"
                    v-bind:itens="[[1, 'PHP OO', 'PHP OO'], [2, 'The Mistakes I Made as a Beginner Programmer', 'Learn to Identify them, make habits to avoid them']]"
                    detalhe="#Detalhe" criar="#Criar" editar="#Editar" deletar="#Deletar" token="827398173872"
                    ordem="desc" ordem-col="1"
            ></tabela-lista>
        </painel>
    </pagina>


    <modal nome="meuModalTeste">
        <painel titulo="teste">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" id="exampleInputFile">
                    <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Check me out
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </painel>
    </modal>
@endsection