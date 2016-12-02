amigos = {
    procurarAmigos: function (url, divId) {
        $.ajax({
            url: url,
            method: "POST",
            //data: { id : menuId },
            dataType: "html",
            success: function (data) {
                if (divId) {
                    $('#' + divId).html(data);
                }
            }
        });
    },
    enviarConvite:function(idConvidado){
        $.ajax({
            url: '/amigos/enviarConvite',
            method: "POST",
            data: { idConvidado : idConvidado },
            dataType: "json",
            success: function (data) {
                if (data.resposta) {
                   location.reload();
                }
            }
        });
    },
    aceitarConvite:function(idRelacionamento){
        $.ajax({
            url: '/amigos/aceitarConvite',
            method: "POST",
            data: { idRelacionamento : idRelacionamento },
            dataType: "json",
            success: function (data) {
                if (data.resposta) {
                   location.reload('verPerfil/'+data.nome);
                }
            }
        });
    },
    amigosPendentes: function(){
       amigos.procurarAmigos('amigos/procurarAmigosPedentesHtml', 'pendentes') 
    } 
}

$(document).ready(function () {


    $('#txt-procurar-amigos').on('keyup', function () {
        var nome = $('#txt-procurar-amigos').val();
        if(nome != ''){
            amigos.procurarAmigos('amigos/procurarNovosAmigosHtml/' + nome, 'grid-novos-amigos');
        }
    });
    $('#txt-procurar-relacionamentos').on('keyup', function () {
        var nome = $(this).val();
        amigos.procurarAmigos('amigos/procurarAmigosHtml/' + nome + '/4', 'grid-relacionamento');

    });
    
   $('.tab-content').on('click','.btn-convidar', function () {
        var idConvidado = $(this).attr('idConvidado');
        amigos.enviarConvite(idConvidado);

    });
    
     $('.tab-content').on('click','.btn-aceitar-convite', function () {
        // $('.tab-content').off();
        var idRelacionamento = $(this).attr('idRelacionamento');  
        amigos.aceitarConvite(idRelacionamento);

    });

    amigos.amigosPendentes();
    /*$('#txt-procurar-amigos-pendentes').on('keyup', function () {
        var nome = $('#txt-procurar-amigos').val();
        amigos.procurarAmigos('amigos/procurarAmigosHtml/' + nome + '/2', 'grid-novos-amigos');

    });*/

    /*$('.modal').on('click', '#atualizar-poesia', function (e) {
     e.preventDefault();
     var id = $(this).attr('data-id');
     poetas.enviarFormulario('poesias/update/' + id, $('#form-poesia').serialize());
     });
     
     $('.btn-delete-poesia').on('click', function (e) {
     e.preventDefault();
     if(confirm("Deseja Jogar fora essa poesia")){
     var id = $(this).attr('data-id');
     
     $.post('poesias/delete/'+id)
     .done(function (dados) {
     if (dados.resposta) {
     alert(dados.mensagem);
     location.reload();
     } else {
     alert(dados.mensagem);
     }
     });
     }        
     });*/


});

/*Vida dura de Programador 
 
 Vida dura de Trabalhor 
 
 No qual seu amor 
 
 São os código que saem 
 
 Do seu computador*/