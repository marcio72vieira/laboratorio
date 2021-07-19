@extends('template.templateadmin')

@section('content-page')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h5 mb-4 text-gray-800">Gerenciar / Form Cadastro</h1>

    <div class="row">

        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <span class="small text-secondary">Campo marcado com * é de preenchimento obrigatório!</span>
                    </h6>
                </div>

                <div class="card-body">

                    <form method="POST" action="" autocomplete="off">
                        @csrf

                        <div class="pl-lg-4">
                            <div class="row">
                                {{-- nome --}}
                                <div class="col-lg-7">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Nome<span class="small text-danger">*</span></label>
                                        <input type="text" id="nome" class="form-control" name="nome" value="{{old('nome')}}" required>
                                        @error('nome')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- nascimento --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nascimento">Data de Nascimento<span class="small text-danger">*</span></label>
                                        <input type="date" id="nascimento" class="form-control" name="nascimento" value="{{old('nascimento')}}" required>
                                        @error('nascimento')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- sexo --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="sexo">Sexo<span class="small text-danger">*</span></label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sexo" id="sexom" value="m" {{old('sexo') == 'm' ? 'checked' : ''}} required>
                                            <label class="form-check-label" for="sexom">Masculino</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sexo" id="sexof" value="f" {{old('sexo') == 'f' ? 'checked' : ''}} required>
                                            <label class="form-check-label" for="sexof">Feminino</label>
                                        </div>
                                        @error('sexo')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- rg --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="rg">RG<span class="small text-danger">*</span></label>
                                        <input type="text" id="rg" class="form-control" name="rg" value="{{old('rg')}}" required>
                                        @error('rg')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- rgorgaoemissor --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="rgorgaoemissor">Orgão Emissor</label>
                                        <input type="text" id="rgorgaoemissor" class="form-control" name="rgorgaoemissor" value="{{old('rgorgaoemissor')}}" required>
                                        @error('rgorgaoemissor')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- cpf --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="cpf">CPF<span class="small text-danger">*</span></label>
                                        <input type="text" id="cpf" class="form-control" name="cpf" value="{{old('cpf')}}" required>
                                        @error('cpf')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- racacor --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="racacor">Raça / Cor<span class="small text-danger">*</span></label>
                                        <select name="racacor" id="racacor" class="form-control" required>
                                            <option value="" selected disabled>Escolha ...</option>
                                            <option value="branca" {{old('racacor') == 'branca' ? 'selected' : ''}}>Branca</option>
                                            <option value="preta" {{old('racacor') == 'preta' ? 'selected' : ''}}>Preta</option>
                                            <option value="parda" {{old('racacor') == 'parda' ? 'selected' : ''}}>Parda</option>
                                            <option value="amarela" {{old('racacor') == 'amarela' ? 'selected' : ''}}>Amarela</option>
                                            <option value="indigena" {{old('racacor') == 'indigena' ? 'selected' : ''}}>Indígena</option>
                                        </select>
                                        @error('racacor')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- filiacao --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="filiacao">Data de filiacao<span class="small text-danger">*</span></label>
                                        <input type="date" id="filiacao" class="form-control" name="filiacao" value="{{old('filiacao')}}" required>
                                        @error('filiacao')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- companhia_id --}}
                                <div class="col-lg-7">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="companhia_id">Companhia / Associação<span class="small text-danger">*</span></label>
                                        <select name="companhia_id" id="companhia_id" class="form-control" required>
                                            <option value="">Companhia A</option>
                                            <option value="">Companhia B</option>
                                            <option value="">Companhia C</option>
                                        </select>
                                        @error('companhia_id')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- areas --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="areas">Área de Atuação<span class="small text-danger">*</span></label>
                                        <select name="areas[]" id="areas" class="form-control" multiple required>
                                            <option value="">Escolha...</option>
                                            <option value="">Área A</option>
                                            <option value="">Área B</option>
                                            <option value="">Área C</option>
                                        </select>
                                        @error('areas')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- quantidade --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="quantidade">Qtd. Coletada (Kg)<span class="small text-danger">*</span></label>
                                        <input type="number" id="quantidade" class="form-control" name="quantidade" value="{{old('quantidade')}}" required>
                                        @error('quantidade')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <h5>Endereço</h5>

                            <div class="row">
                                {{-- endereco --}}
                                <div class="col-lg-7">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="endereco">Rua; Av; Travessa, etc...<span class="small text-danger">*</span></label>
                                        <input type="text" id="endereco" class="form-control" name="endereco" value="{{old('endereco')}}" required>
                                        @error('endereco')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- numero --}}
                                <div class="col-lg-1">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="numero">Número<span class="small text-danger">*</span></label>
                                        <input type="text" id="numero" class="form-control" name="numero" value="{{old('numero')}}">
                                        @error('numero')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- bairro_id --}}
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="bairro_id">Bairro<span class="small text-danger">*</span></label>
                                        <select name="areas[]" id="areas" class="form-control" multiple required>
                                            <option value="">Escolha...</option>
                                            <option value="">Bairro A</option>
                                            <option value="">Bairro B</option>
                                            <option value="">Bairro C</option>
                                        </select>
                                        @error('bairro_id')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- complemento --}}
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="complemento">Complemento</label>
                                        <input type="text" id="complemento" class="form-control" name="complemento" value="{{old('complemento')}}">
                                        @error('complemento')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>


                                {{-- municipio_id --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="municipio_id">Município<span class="small text-danger">*</span></label>
                                        <select name="municipio_id" id="municipio_id" class="form-control" required>
                                            <option value="" selected disabled>Escolha...</option>
                                            <option value="">Município A</option>
                                            <option value="">Município B</option>
                                            <option value="">Município C</option>
                                        </select>
                                        @error('municipio_id')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- zona --}}
                                <div class="col-lg-5">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="zona" style="margin-top: 5px">Zona<span class="small text-danger">*</span></label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="zona" id="zonaurbana" value="urbana" {{old('zona') == 'urbana' ? 'checked' : ''}} required>
                                            <label class="form-check-label" for="zonaurbana">Urbana</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="zona" id="zonarural" value="rural" {{old('zona') == 'rural' ? 'checked' : ''}} required>
                                            <label class="form-check-label" for="zonarural">Rural</label>
                                        </div>
                                        @error('zona')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- foneum --}}
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="foneum">Telefone 1</label>
                                        <input type="text" id="foneum" class="form-control" name="foneum" placeholder="(99) 9999-9999" value="{{old('foneum')}}" required>
                                        @error('foneum')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- fonedois --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="fonedois">Telefone 2 (opcional)</label>
                                        <input type="text" id="fonedois" class="form-control" name="fonedois"  placeholder="(99) 9999-9999" value="{{old('fonedois')}}">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <a class="btn btn-primary" href="" role="button">Cancelar</a>
                                    <button type="submit" class="btn btn-primary" style="width: 95px;"> Salvar </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
