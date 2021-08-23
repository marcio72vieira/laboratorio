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

                  {{-- --}}

                  <!-- MODAL FormDelete OBS: O id da modal para cada registro tem que ser diferente, senão ele pega apenas o primeiro registro-->
                  <div class="modal fade" id="formDelete" tabindex="-1" aria-labelledby="formDeleteLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="formDeleteLabel"><strong>Deletar empresa</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <h5>NOME DO ASSOCIADO</h5>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <form action="" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" role="button"> Confirmar</button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>

                  {{-- --}}

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
                    { data: 'actions'}
                ]
            });


            $('#modaldelete').on('click', function(event){
                event.preventDefault();
                // passar de alguma forma o id do Associado diretaemnte para a rota do formulário juntamente com seu nome para corpo
                // da modal
            })

         });
    </script>
@endsection
