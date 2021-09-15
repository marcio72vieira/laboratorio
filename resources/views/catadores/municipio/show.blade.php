@extends('template.layoutmaster')

@section('conteudo-principal')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Gerenciar / Municípios / Exibir</h1>

    <div class="row">

        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">  Municípios: {{$municipio->nome}}</h6>
                </div>

                <div class="card-body">

                    <form method="" action="" autocomplete="off">
                        @csrf

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Nome</label>
                                        <input type="text" id="nome" class="form-control" name="nome" placeholder="Nome" value="{{$municipio->nome}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <a class="btn btn-primary" href="{{route('admin.municipio.index')}}" role="button">
                                        <i class="fas fa-undo-alt"></i>
                                        Retornar</a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
