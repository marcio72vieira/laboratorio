@extends('template.templateadmin')

@section('content-page')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabela Associados (DATA TABLE)</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="empTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Sexo</th>
                            <th>Raça</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Sexo</th>
                            <th>Raça</th>
                            <th>Ação</th>
                        </tr>
                    </tfoot>

                </table>

                {{--
                <table id='empTable' width='100%' border="1" style='border-collapse: collapse;'>
                    <thead>
                      <tr>
                        <td>ID</td>
                        <td>Nome</td>
                        <td>CPF</td>
                        <td>Sexo</td>
                        <td>Raça / Cor</td>
                        <td>Ação</td>
                      </tr>
                    </thead>
                  </table>
                --}}
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

            // DataTable
            $('#empTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('getAssociados')}}",
                columns: [
                    { data: 'id' },
                    { data: 'nome' },
                    { data: 'cpf' },
                    { data: 'sexo' },
                    { data: 'racacor' },
                ]
            });
         });
    </script>
@endsection
