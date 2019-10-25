@extends('layouts.app')

@section('content')
    <pagina tamanho="12">

        @if($errors->all())
            <div class="alert alert-danger alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                @foreach($errors->all() as $key => $value)
                    <p>{{ $value }}</p>
                @endforeach
            </div>
        @endif

        
        <painel titulo="Lista de Artigos">
            <breadcrumb v-bind:lista="{{ $listaBreadcrumb }}"></breadcrumb>
            <tabela-lista
                    v-bind:titulos="['ID', 'Título', 'Descrição', 'Autor' ,'Data']"
                    v-bind:itens="{{ json_encode($listaArtigos) }}"
                    detalhe="/admin/artigos/" criar="#Criar" editar="/admin/artigos/" deletar="/admin/artigos/" token="{{ csrf_token() }}"
                    ordem="desc" ordem-col="0" modal="1"
            ></tabela-lista>
            <div align="right"> {{ $listaArtigos }}</div>
        </painel>
    </pagina>


    <modal nome="adicionar" titulo="Adicionar">
            <formulario id="formAdicionar" css="" action="{{ route('artigos.store') }}" method="post" enctype="" token="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="{{ old('titulo') }}">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" value="{{ old('descricao') }}">
                </div>

                <div class="form-group">
                    <label for="addConteudo">Conteúdo</label>
                    <textarea class="ckeditor form-control" id="conteudoAdd" name="conteudo" placeholder="Conteúdo">{{ old('conteudo') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="data">Data</label>
                    <input type="datetime-local" class="form-control" id="data" name="data" value="{{ old('data') }}">
                </div>


            </formulario>
        <span slot="botoes"><button form="formAdicionar" class="btn btn-info">Adicionar</button></span>


    </modal>
    <modal nome="editar" titulo="Editar">
            <formulario id="formEditar" css="" :action=' "/admin/artigos/" + $store.state.item.id' method="put" enctype="" token="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" v-model="$store.state.item.titulo" name="titulo" placeholder="Título">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" v-model="$store.state.item.descricao" name="descricao" placeholder="Descrição">
                </div>
                <div class="form-group">
                    <label for="descricao">Conteúdo</label>
                    <textarea class="form-control" id="conteudoEditar" name="conteudo" placeholder="Conteúdo" v-model="$store.state.item.conteudo" value="$store.state.item.conteudo"></textarea>
                </div>
                <div class="form-group">
                    <label for="data">Data</label>
                    <input type="datetime-local" class="form-control" id="data" name="data" v-model="$store.state.item.data" >
                </div>


            </formulario>
        <slot slot="botoes"><button form="formEditar" class="btn btn-info">Salvar</button></slot>

    </modal>
    <modal nome="detalhe" titulo="Visualizar">

        <h3>@{{ $store.state.item.titulo }}</h3>
        <p><b>Descrição</b><br>@{{ $store.state.item.descricao }}</p>
        <p><b>Conteúdo</b><br></p>
        <div v-html="$store.state.item.conteudo"></div>
        <p><b>Data</b><br>@{{ $store.state.item.data }}</p>
    </modal>
@endsection