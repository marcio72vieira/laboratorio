@extends('template.templateadmin')

@section('content-page')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <h5><strong>ASSOCIADOS</strong></h5>

        {{-- <h6 class="m-0 font-weight-bold text-primary">Relação de Associados</h6> --}}
        <a class="btn btn-primary" href="{{route('admincat.associado.create')}}" role="button" style="margin-bottom: 10px">
            <i class="fas fa-plus-circle"></i>
            Novo
        </a>

        @if(session('sucesso'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>OK!</strong> {{session('sucesso')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="empTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Sexo</th>
                                <th>Raça / Cor</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Sexo</th>
                                <th>Raça / Cor</th>
                                <th>Ação</th>
                            </tr>
                        </tfoot>
                    </table>

                    <!-- MODAL FormDelete OBS: O id da modal para cada registro tem que ser diferente, senão ele pega apenas o primeiro registro-->
                    <div class="modal fade" id="formDelete" tabindex="-1" aria-labelledby="formDeleteLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="formDeleteLabel"><strong>Deletar Associado</strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <h5 id='h5nome'></h5>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                    <form id="formdelete" action="" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" role="button">Confirmar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

            // DataTable
            $('#empTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('admincat.getAssociados')}}", // Preenche a tabela automaticamente, a partir de uma requisição Ajax (pela rota nomeada)
                columns: [
                    { data: 'id' },
                    { data: 'nome' },
                    { data: 'cpf' },
                    { data: 'sexo' },
                    { data: 'racacor' },
                    { data: 'actions'}
                ],
                language: {
                    "lengthMenu": "Mostrar _MENU_ registos",
                    "search": "Procurar:",
                    "info": "Mostrando os registros _START_ a _END_ num total de _TOTAL_",
                    "paginate": {
                        "first": "Primeiro",
                        "previous": "Anterior",
                        "next": "Seguinte",
                        "last": "Último"
                    },
                    "zeroRecords": "Não foram encontrados resultados",
                },
                pagingType: "full_numbers", // Todos os links de paginação

            });

            // No script abaixo, uma função é disparada quando o usuário clicar exatamente [on('click', '.deleteassociado')] em cima do ícone
            // deletar (definido como um botão no controller: AssociadoController) cuja a classe está definida como ".deletarassociado".
            // Disparada esta função o id e o nome do associado são recuperados através dos dados armazenados nas propriedades
            // "data-idassoc" e "data-nomeassoc", do mesmo ícone de botão deletar também definido no controller AssociadoController.
            // A "route" é uma string completa que possui o nome da rota juntamente com o id do associado. Infelizmente não tem
            // como referenciar uma variável javascript em um script PHP(Laravel), por isso a necessidade de fazeer esse junção
            // com o recurso: route = route.replace('id', idassociado);
            $('#empTable').on('click', '.deleteassociado', function(event){
                var idAssociado = $(this).data('idassociado');
                var nomeAssociado = $(this).data('nomeassociado');
                var route = "{{route('admincat.associado.destroy', 'id')}}";
                    route = route.replace('id', idAssociado);

                // alert($(this).data('idassociado')); // alert($(this).data('nomeassociado')); // alert(route);

                $('#h5nome').text(nomeAssociado);
                $('#formdelete').attr('action', route);
            });

         });
    </script>
@endsection
