likes = {
    insertLikes: function (idPoesia, obj) {
        $.ajax({
            url: URL+'/likes/inserirLikesPoesias',
            method: "POST",
            data: {idPoesia: idPoesia},
            dataType: "json",
            success: function (data) {
                console.debug(data.resposta);
                if (data.resposta) {
                    obj.removeClass('btn-do-like');
                    obj.addClass('btn-do-not-like');
                    obj.removeClass('glyphicon-book');
                    obj.addClass('glyphicon-ok-sign');
                    obj.attr('idlikepoesia' , data.idlikepoesia);   
                }

            }
        });
    },
    deleteLikes: function (idLike, obj) {
        $.ajax({
            url: URL+'/likes/delete',
            method: "POST",
            data: {idLike: idLike},
            dataType: "json",
            success: function (data) {
                console.debug(data.resposta);
                if (data.resposta) {
                    obj.removeClass('btn-do-not-like');
                    obj.addClass('btn-do-like');
                    obj.removeClass('glyphicon-ok-sign');
                    obj.addClass('glyphicon-book');

                }

            }
        });
    },
    eventLike: function () {
        $('.panel-poesia').on('click', '.btn-do-like',
        function () {
            var idPoesia = $(this).attr('idPoesia');
            likes.insertLikes(idPoesia, $(this));
        });
    },
    eventTakeLike: function () {
        $('.panel-poesia').on('click', '.btn-do-not-like',
        function () {
            var idlikepoesia = $(this).attr('idlikepoesia');
            likes.deleteLikes(idlikepoesia, $(this));
        });
    },
    
    insertLikesComentarios: function (idComentario, obj) {
        $.ajax({
            url: URL+'/likes/inserirLikesComentarios',
            method: "POST",
            data: {idComentario: idComentario},
            dataType: "json",
            success: function (data) {
                console.debug(data.resposta);
                if (data.resposta) {
                    console.debug(obj);
                    obj.removeClass('btn-do-like-comentario');
                    obj.addClass('btn-do-not-like-comentario');
                    obj.removeClass('glyphicon-book');
                    obj.addClass('glyphicon-ok-sign');
                    obj.attr('idLikeComentario' , data.idlikepoesia);   
                }

            }
        });
    },
    deleteLikesComentarios: function (idComentario, obj) {
        $.ajax({
            url: URL+'/likes/deleteLikeComentarios',
            method: "POST",
            data: {idComentario: idComentario},
            dataType: "json",
            success: function (data) {
                console.debug(data.resposta);
                if (data.resposta) {
                    obj.removeClass('btn-do-not-like-comentario');
                    obj.addClass('btn-do-like-comentario');
                    obj.removeClass('glyphicon-ok-sign');
                    obj.addClass('glyphicon-book');
                }

            }
        });
    },
    eventLikeComentarios: function () {
        $('.panel-poesia').on('click', '.btn-do-like-comentario', function () {
            var idComentario = $(this).attr('idComentario');
            likes.insertLikesComentarios(idComentario, $(this));
        });
    },
    eventTakeLikeComentarios: function () {
        $('.panel-poesia').on('click','.btn-do-not-like-comentario' ,function () {
            var idComentario = $(this).attr('idComentario');
            likes.deleteLikesComentarios(idComentario, $(this));
        });
    }
}


/*Vida dura de Programador 
 
 Vida dura de Trabalhor 
 
 No qual seu amor 
 
 São os código que saem 
 
 Do seu computador*/