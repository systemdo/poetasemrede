poetas = {
    obterTelaEditor: function (lugar, idModal) {
        $.ajax({
            url: lugar,
            method: "POST",
            //data: { id : menuId },
            dataType: "html",
            success: function (data) {
                if (idModal) {
                    $('#' + idModal + " .modal-title").text('Estou sentindo que você está inspirada(o)');
                    $('#' + idModal + " .modal-body").html(data);
                    poetas.ckEditor('txtTexto');
                }
            }
        });
    },
    enviarFormulario: function (lugar, form) {
        $.ajax({
            url: lugar,
            method: "POST",
            data: form,
            dataType: "json",
            success: function (data) {
                if (data.resposta) {
                    alert(data.mensagem);
                    location.reload();
                }
            }
        });
    },
    //abri modal para escrever ou editar poesias 
    abrirTelaEditor: function (btnId, idModal, lugar) {
        //$('.modal').on('click','.'+btnId, function () {
        $("." + btnId).on('click', function () {
            $('#' + idModal).modal('show');
            poetas.obterTelaEditor(lugar, idModal);
        });
    },
    abrirTelaModalComEditor: function (idModal, lugar) {
        $('#' + idModal).modal('show');
        poetas.obterTelaEditor(lugar, idModal);
    },
    setCKEditorToAjaxTextarea : function () {
            for (var instanceName in CKEDITOR.instances)
                CKEDITOR.instances[instanceName].updateElement();
    },
    ckEditor: function (id) {
        if (!id) {
            var textarea = document.body.appendChild(document.createElement('textarea'));
            CKEDITOR.replace(textarea);
        } else {
            CKEDITOR.replace(id,
                    {   
                        //enterMode: Number(2),
                        toolbarGroups: [
                            //{ name: 'document', groups: [ 'mode', 'document' ] },			// Displays document group with its two subgroups.
                            {name: 'clipboard', groups: ['clipboard', 'undo']},//items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
                           
                            {name: 'editing', groups: ['find', 'selection', 'spellchecker']},
                            {name: 'basicstyles', groups: ['basicstyles', 'cleanup','Bold', 'Italic', 'Strike', '-', 'RemoveFormat']},
                             { name: 'colors', groups : [ 'TextColor','BGColor' ] },
                           '/',
                            {name: 'paragraph', groups: ['list', 'indent', 'align', 'bidi','NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']},
                            {name: 'styles', groups: ['Styles', 'Format']},
                           

                            //{ name: 'links' }
                        ]
                                // NOTE: Remember to leave 'toolbar' property with the default value (null).
                    });
        }
        /*CKEDITOR.editorConfig = function( config ) {
         config.toolbarGroups = [
         { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
         { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
         { name: 'links', groups: [ 'links' ] },
         { name: 'insert', groups: [ 'insert' ] },
         { name: 'forms', groups: [ 'forms' ] },
         { name: 'tools', groups: [ 'tools' ] },
         { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
         { name: 'others', groups: [ 'others' ] },
         '/',
         { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
         { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
         { name: 'styles', groups: [ 'styles' ] },
         { name: 'colors', groups: [ 'colors' ] },
         { name: 'about', groups: [ 'about' ] }
         ];
         
         config.removeButtons = 'Underline,Subscript,Superscript,Link,Image,Source,Maximize,Table,HorizontalRule,SpecialChar,Anchor,Unlink,About';
         };*/
    }
}


