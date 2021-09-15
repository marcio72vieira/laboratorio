@extends('template.templateadmin')

@section('content-page')

        <h5><strong>MUNICÍPIOS</strong></h5>

        {{--
        <a class="btn btn-primary" href="{{route('admin.municipio.create')}}" role="button" style="margin-bottom: 10px">
            <i class="fas fa-plus-circle"></i>
            Adicionar
        </a>

        <a class="btn btn-primary btn-danger" href="{{route('admin.municipio.relatorio')}}" role="button" style="margin-bottom: 10px" target="_blank">
            <i class="far fa-file-pdf"></i>
            pdf
        </a>

        @can('adm')
            <a class="btn btn-primary btn-success" href="{{route('admin.municipio.relatorioexcel')}}" role="button" style="margin-bottom: 10px">
                <i class="far fa-file-excel"></i>
                xlsx
            </a>

            <a class="btn btn-primary btn-warning" href="{{route('admin.municipio.relatoriocsv')}}" role="button" style="margin-bottom: 10px">
                <i class="fas fa-file-csv"></i>
                csv
            </a>
        @endcan
        --}}


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
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nome</th>
              <th>Ações</th>
            </tr>
          </thead>

          <tbody>
          @foreach($municipios as $municipio)
             <tr>
                <td>{{$municipio->id}}</td>
                <td>{{$municipio->nome}}</td>
                <td>
                    <a href="{{route('admincat.municipio.show', $municipio->id)}}" title="exibir"><i class="fas fa-eye text-warning mr-2"></i></a>
                    <a href="{{route('admincat.municipio.edit', $municipio->id)}}" title="editar"><i class="fas fa-edit text-info mr-2"></i></a>
                    @can('adm')<a href="" data-toggle="modal" data-target="#formDelete{{$municipio->id}}" title="excluir"><i class="fas fa-trash text-danger mr-2"></i></a>@endcan

                    <!-- MODAL FormDelete OBS: O id da modal para cada registro tem que ser diferente, senão ele pega apenas o primeiro registro-->
                    <div class="modal fade" id="formDelete{{$municipio->id}}" tabindex="-1" aria-labelledby="formDeleteLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="formDeleteLabel"><strong>Deletar municipio</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <h5>{{$municipio->nome}}</h5>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <form action="{{route('admincat.municipio.destroy', $municipio->id)}}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" role="button"> Confirmar</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
          </tbody>
      </table>
    </div>
    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
          $('#dataTable').dataTable({
            "ordering": false,
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
            }
          })
        });
    </script>
@endsection
