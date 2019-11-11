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

        <painel titulo="Lista de Admin">

            {{ $listaModelo }}
            <breadcrumb v-bind:lista="{{ $listaBreadcrumb }}"></breadcrumb>
            <tabela-lista
                    v-bind:titulos="['ID', 'Nome', 'E-mail']"
                    v-bind:itens="{{ json_encode($listaModelo) }}"
                    detalhe="/admin/adm/" criar="#Criar"
                    editar="/admin/adm/"
                    ordem="asc" ordem-col="1" modal="1"
            ></tabela-lista>
            <div align="right"> {{ $listaModelo }}</div>
        </painel>
    </pagina>


    <modal nome="adicionar" titulo="Adicionar">
            <formulario id="formAdicionar" css="" action="{{ route('adm.store') }}" method="post" enctype="" token="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="titulo">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="descricao">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="admin">Admin</label>
                    <select name="admin" id="admin" class="form-control">
                        <option {{ (old('admin') && old('admin')) == 'N' ? 'selected' : ''}} value="N">Não</option>
                        <option {{ (old('admin') && old('admin') == 'S' ? 'selected' : '')}} {{(!old('admin') ? 'selected' : '')}} value="S">Sim</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="descricao">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                </div>

            </formulario>
        <span slot="botoes"><button form="formAdicionar" class="btn btn-info">Adicionar</button></span>


    </modal>
    <modal nome="editar" titulo="Editar">
            <formulario id="formEditar" css="" :action=' "/admin/adm/" + $store.state.item.id' method="put" enctype="" token="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="titulo">Nome</label>
                    <input type="text" class="form-control" id="nome" v-model="$store.state.item.name" name="name" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="descricao">E-mail</label>
                    <input type="email" class="form-control" id="email" v-model="$store.state.item.email" name="email" placeholder="E-mail">
                </div>

                <div class="form-group">
                    <label for="admin">Admin</label>
                    <select name="admin" id="admin" class="form-control" v-model="$store.state.item.admin">
                        <option value="N">Não</option>
                        <option value="S">Sim</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="descricao">E-mail</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>


            </formulario>
        <slot slot="botoes"><button form="formEditar" class="btn btn-info">Salvar</button></slot>

    </modal>
    <modal nome="detalhe" titulo="Visualizar">

        <h3>@{{ $store.state.item.name }}</h3>
        <p><b>Descrição</b><br>@{{ $store.state.item.email }}</p>
    </modal>
@endsection