@extends('layouts.app')

@section('content')

                <pagina tamanho="10">
                    <painel titulo="Dashboard">
                        <breadcrumb v-bind:lista="{{ $listaBreadcrumb }}"></breadcrumb>
                        <div class="row">
                            <div class="col-md-4">
                                <caixa qtd="{{ $artigos }}" titulo="Artigos" url="{{ route('artigos.index') }}" cor="#ffc107" icone="ion ion-ios-paper"></caixa>
                            </div>
                            <div class="col-md-4">
                                <caixa qtd="{{ $usuarios }}" titulo="Usuários" url="{{ route('usuarios.index') }}" cor="#03A9F4" icone="ion ion-ios-people"></caixa>
                            </div>
                            <div class="col-md-4">
                                <caixa qtd="{{ $autores }}" titulo="Autores" url="{{ route('autores.index') }}" cor="#8BC34A" icone="ion ion-ios-person"></caixa>
                            </div>
                        </div>
                    </painel>
                </pagina>
                
@endsection
