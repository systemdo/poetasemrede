likes = {
    insertLikes: function (idPoesia, obj) {
        $.ajax({
            url: 'likes/inserirLikesPoesias',
            method: "POST",
            data: {idPoesia: idPoesia},
            dataType: "json",
            success: function (data) {
                console.debug(data.resposta);
                 if(data.resposta){
                    obj.removeClass('btn-do-like');
                    obj.addClass('btn-do-not-like');
                }

            }
        });
    },
    deleteLikes: function (idLike , obj) {
        $.ajax({
            url: 'likes/delete',
            method: "POST",
            data: {idLike: idLike},
            dataType: "json",
            success: function (data) {
                console.debug(data.resposta);
                if(data.resposta){
                    obj.removeClass('btn-do-not-like');
                    obj.addClass('btn-do-like');
                }
                
            }
        });
    },
    eventLike: function () {
        $('.btn-do-like').on('click', function () {
            var idPoesia = $(this).attr('idPoesia');
            likes.insertLikes(idPoesia, $(this));
        });
    },
    eventTakeLike: function () {
        $('.btn-do-not-like').on('click', function () {
            var idlikepoesia = $(this).attr('idlikepoesia');
            likes.deleteLikes(idlikepoesia,$(this));
        });
    }
}


/*Vida dura de Programador 
 
 Vida dura de Trabalhor 
 
 No qual seu amor 
 
 São os código que saem 
 
 Do seu computador*/