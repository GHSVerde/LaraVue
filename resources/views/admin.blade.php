@extends('layouts.app')

@section('content')

                <pagina tamanho="10">
                    <painel titulo="Dashboard">
                        <breadcrumb v-bind:lista="{{ $listaBreadcrumb }}"></breadcrumb>
                        <div class="row">
                            @can('eAutor')
                            <div class="col-md-3">
                                    <caixa qtd="{{ $artigos }}" titulo="Artigos" url="{{ route('artigos.index') }}" cor="#ffc107" icone="ion ion-ios-paper"></caixa>
                                </div>
                            @endcan
                            
                            @can('eAdmin')
                            <div class="col-md-3">
                                <caixa qtd="{{ $usuarios }}" titulo="Usuários" url="{{ route('usuarios.index') }}" cor="#03A9F4" icone="ion ion-ios-people"></caixa>
                            </div>
                            <div class="col-md-3">
                                <caixa qtd="{{ $autores }}" titulo="Autores" url="{{ route('autores.index') }}" cor="#8BC34A" icone="ion ion-ios-person"></caixa>
                            </div>

                            <div class="col-md-3">
                                    <caixa qtd="{{ $admin }}" titulo="Admin" url="{{ route('adm.index') }}" cor="green" icone="ion ion-ios-person"></caixa>
                            </div>
                            @endcan
                        </div>
                    </painel>
                </pagina>
                
@endsection
