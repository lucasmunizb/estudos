$( document ).ready(function() {
    $('#clientes').change( function () {
        if($(this).val() != '') {
            $('#tabelas').html('');
            $.ajax({
                url: 'rota.php',
                method: "POST",
                data: {
                    url_destino: "actions.php",
                    acao: "carregarTabelas",
                    banco: $(this).val()
                }
            }).done(function (retorno) {
                $('#tabelas').append(retorno);
                $('#arquivos').show();
            });
        }
    });
});