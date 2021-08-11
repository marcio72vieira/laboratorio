@extends('template.templateadmin')

@section('content-page')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>

    <img src="{{asset('storage/uploads/cpf.jpeg')}}">
    <br>
    <img src="{{asset('storage/uploads/robo.png')}}">
    <br>
    <a href="{{asset('storage/uploads/BOLETO DIGITAL HAPVIDA.PDF')}}" target="_blank">ver Boleto</a>
    <br>
    <a href="{{asset('/storage/uploads/CNPJ-Eireli.pdf')}}" target="_blank">ver Documento</a>

</div>
<!-- /.container-fluid -->

@endsection
