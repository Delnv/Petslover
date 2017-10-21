
$(document).ready(
        function () {
            $("#btlogin").click(function () {
                var data = $("#login").serialize();

                $.ajax({
                    type: 'POST',
                    url: 'verifica_login.php',
                    data: data,
                    dataType: 'json',
                    beforeSend: function () {
                        $("#hidden").html("Validando ...");
                    },
                    success: function (response) {
                        if (response.codigo == "1") {
                            $("#btlogin").html("Entrar");
                            $("#hidden").css('display', 'none');
                            window.location.href = "index.php";
                        } else {
                            $("#btlogin").html("Entrar");
                            $("#hidden").css('display', 'block');
                            $("#hidden").html('<strong>Erro! </strong>' + response.mensagem);
                        }
                    }
                });
            });
        });

$(document).ready(function () {
    $("#btfarejar").click(function () {
        var data = $("#env_mens_prets").serialize();
        var data2 = $("#btfarejar").val();
        var allData = data + "&mensagem=" + data2;
        $.ajax({
            type: 'POST',
            url: 'enviar_mensagem.php',
            data: allData,
            dataType: 'json',
            async: true,
            beforeSend: function () {
                $("#escond").html("Validando...");
            },
            success: function (retorno) {
                if (retorno.codigo == true) {
                    $("#escond").html('<strong>' + retorno.mensagem + '</strong>');
                } else {
                    $("#escond").html('<strong>Erro!' + retorno.mensagem + '</strong>');
                }
            }
        });
    });
    
    $("#btfarejar2").click(function(){
        var data = $("#env_mens_prets").serialize();
        var data2 = $("#btfarejar2").val();
        var allData = data + "&mensagem=" + data2;
        $.ajax({
            type: 'POST',
            url: 'enviar_mensagem.php',
            data: allData,
            dataType: 'json',
            async: true,
            beforeSend: function () {
                $("#escond").html("Validando...");
            },
            success: function (retorno) {
                if (retorno.codigo == true) {
                    $("#escond").html('<strong>' + retorno.mensagem + '</strong>');
                } else {
                    $("#escond").html('<strong>Erro!' + retorno.mensagem + '</strong>');
                }
            }
        });
    });
    
    $("#btfarejar3").click(function(){
        var data = $("#env_mens_prets").serialize();
        var data2 = $("#btfarejar3").val();
        var allData = data + "&mensagem=" + data2;
        $.ajax({
            type: 'POST',
            url: 'enviar_mensagem.php',
            data: allData,
            dataType: 'json',
            async: true,
            beforeSend: function () {
                $("#escond").html("Validando...");
            },
            success: function (retorno) {
                if (retorno.codigo == true) {
                    $("#escond").html('<strong>' + retorno.mensagem + '</strong>');
                } else {
                    $("#escond").html('<strong>Erro!' + retorno.mensagem + '</strong>');
                }
            }
        });
    });
});