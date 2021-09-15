@extends('template.templateadmin')

@section('content-page')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h5 mb-4 text-gray-800">Auxiliar / Cadastrar / País</h1>

    <div class="row">

        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Países<br>
                        <span class="small text-secondary">Campo marcado com * é de preenchimento obrigatório!</span>
                    </h6>
                </div>

                <div class="card-body">

                    <form action="{{route('admin.pais.store')}}" method="POST" autocomplete="off">
                        @csrf

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Nome<span class="small text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nome" name="nome" value="{{old('nome')}}" required>
                                        @error('nome')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Sigla<span class="small text-danger">*</span></label>
                                        <input type="text" class="form-control" id="sigla" name="sigla" value="{{old('sigla')}}" required>
                                        @error('sigla')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- ativo --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="ativo">Ativo ? <span class="small text-danger">*</span></label>
                                        <div style="margin-top: 5px">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="ativo" id="ativosim" value="s" {{old('ativo') == 's' ? 'checked' : ''}} required>
                                                <label class="form-check-label" for="ativosim">Sim</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="ativo" id="ativonao" value="n" {{old('ativo') == 'n' ? 'checked' : ''}} required>
                                                <label class="form-check-label" for="ativonao">Não</label>
                                            </div>
                                            @error('ativo')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="pl-lg-4">
                                        <div style="margin-top: 30px">
                                            <a class="btn btn-primary" href="{{route('admin.pais.index')}}" role="button">Cancelar</a>
                                            <button type="submit" class="btn btn-primary" style="width: 95px;"> Salvar </button>
                                        </div>
                                </div>

                            </div>

                        </div>


                    </form>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection

