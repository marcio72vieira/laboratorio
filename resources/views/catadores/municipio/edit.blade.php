@extends('template.layoutmaster')

@section('conteudo-principal')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Gerenciar / Municípios / Editar</h1>

    <div class="row">

        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        {{$municipio->nome}}<br>
                        <span class="small text-secondary">Campo marcado com * é de preenchimento obrigatório!</span>
                    </h6>
                </div>

                <div class="card-body">

                    <form action="{{route('admin.municipio.update', $municipio->id )}}" method="POST" autocomplete="off">
                        @csrf
                        @method('PUT')



                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Nome<span class="small text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nome" name="nome" value="{{old('nome', $municipio->nome)}}" required>
                                        @error('nome')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <a class="btn btn-primary" href="{{route('admin.municipio.index')}}" role="button">Cancelar</a>
                                    <button type="submit" class="btn btn-primary" style="width: 95px;"> Salvar </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
