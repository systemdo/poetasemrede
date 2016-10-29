poetas = {
    obterTelaEditor : function (lugar, idModal){
        $.ajax({
                url: lugar,
                method: "POST",
                //data: { id : menuId },
                dataType: "html",
                success:function(data){
                    if(idModal){
                        $('#'+idModal+" .modal-body").html(data);
                        poetas.ckEditor('txtTexto');
                    }
                }
              });
    },
    enviarFormulario : function (lugar, form){
        $.ajax({
                url: lugar,
                method: "POST",
                data: form,
                dataType: "json",
                success:function(data){
                    if(data.resposta){
                        alert(data.mensagem);
                        location.reload();
                    }
                }
              });
    }, 
    
    abrirTelaEditor : function(btnId, idModal ,lugar){
                
        $("#"+btnId).on('click', function(){
            $('#'+idModal).modal('show');
            poetas.obterTelaEditor(lugar, idModal);
        });
    },
    
    abrirTelaModalComEditor : function(idModal ,lugar){
            $('#'+idModal).modal('show');
            poetas.obterTelaEditor(lugar, idModal);
    },
            
    ckEditor : function(id){
        if(!id){
            var textarea = document.body.appendChild( document.createElement( 'textarea' ) );
            CKEDITOR.replace(textarea);
        }else{
            CKEDITOR.replace(id);
        }
    }     
}


