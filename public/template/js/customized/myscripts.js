
$(function(){
    // Configurações do DataTable
    $('#dataTable').dataTable({
        "ordering": true,
        // Orderna a terceira coluna em ordem decrescente
        "order": [[ 3, "desc" ]],
        //Oculta uma ou mais colunas da tabela
        "columnDefs": [
            {
                "targets": [ 2 ],
                "visible": false
            }
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
        }
    });

    // Configuraçoes jquerymask
    $('.phone').mask('(00) 00000-0000');
    $('#telefone').mask('(00) 00000-0000');
    $('#cpf').mask('000.000.000-00');
    $('#cep').mask('00000-000');
    $('#cnpj').mask('00.000.000/0000-00');




});



