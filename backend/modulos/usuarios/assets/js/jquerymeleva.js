var url_app = !lang ? APP_URL: APP_URL+'/'+lang+'/';
var validar = function()
{
	var val = $('#inputWarning').val();
		$('#Warning').css('display', 'none');
		if(val == '')
		{
			$('#Warning').css('display', 'inline');
			return false;
		}
	return val;		
}
var validar2 = function($obj)
{
	var val = $obj.val();
		$('#Error').css('display', 'none');
		if(val == '')
		{
			$('#Error').css('display', 'inline');
			return false;
		}
	return val;		
}
var ajaxHtml = function(uri, data, lugar)
{
	$.ajax({
			type: "POST",
			url: url_app+uri,
			data: data,
			dataType: "html",
			success: function(data)
			{
				lugar.html(data);
			}
		});
}

var ajax = function(url,data, success){

$.ajax({
			type: "POST",
			url: url,
			data: data,
			dataType: "json",
			success: success
		});
} 	


$(document).ready(function() {
	

	$('#url').bind('blur keyup mouseup mouseover', function(){
		var url1= $('#url').val();
		var url = "http://img.youtube.com/vi/"+url1+"/2.jpg";
		if(url1 !='')
		{
			$('#video').css('display', 'block');
			$('#img_video').attr('src', url); 
		}	
		
	});
	
	
	$('.close').bind('click' , function(){
		
		$('#modal, #myModal').removeClass('in show');
		$('#modal, #myModal').addClass('hide');
	});
	
	
	$('.save').bind('click' , function(e){
		
		e.preventDefault();
		var operation = $('#inputWarning').attr('data-operacion');

		if(operation == 'home')
		{
			var id = $('#id').val();
			var titulo = $('#inputWarning').val();
			//alert(id);
			var url = '/'+lang+'/usuarios/dashboard/edit_home'
			var data = 'edit=editar&id='+id+'&titulo='+titulo;
			var success =function(callback)
			{
				if(callback.callback)
				{
					alert('Home editado con suceso');
					top.location = APP_URL+'/'+lang+'/usuarios/dashboard';
				}else
					{
						alert('Error en editar');
					}
			}
			ajax (url,data, success);	
		}else if(operation == 'new_event')
		{
			var titulo = validar();
			if(titulo != false)
			{
				var url = $('#inputWarning').attr('data-url');
				var id = $('#inputWarning').attr('data-id');
				var data ='id='+id+'&titulo='+titulo;
				var success =function(callback)
				{
					if(callback.callback)
					{
						alert('Evento creado con suceso');
						top.location = callback.redirect;;
					}else
						{
							alert('Error en Crear');
						}
				}
				ajax (url,data, success);
			}	
		}else if(operation == 'editar_video')
		{
			var titulo = validar();
			var url_video = validar2($('#url')); 
			if(titulo != false && url_video != false)
			{
				var url = $('#save_video').attr('data-url');
				var id = $('#save_video').attr('data-id');
				var data ='id='+id+'&titulo='+titulo+'&url='+url_video;
				var success =function(callback)
				{
					if(callback.callback)
					{
						alert('Video editado con suceso');
						top.location = callback.redirect;;
					}else
						{
							alert('Error en Editar');
						}
				}
				ajax (url,data, success);
			}	
		}else if(operation == 'new_video')
		{
			var titulo = validar();
			var url_video = validar2($('#url')); 
			if(titulo != false && url_video != false)
			{
				var url = $('#new_video').attr('data-url');
				var data ='titulo='+titulo+'&url='+url_video;
				var success =function(callback)
				{
					if(callback.callback)
					{
						alert('Video creado con suceso');
						top.location = callback.redirect;;
					}else
						{
							alert('Error en crear video');
						}
				}
				ajax (url,data, success);
			}	
		}
		else if(operation == 'editar_informe')
		{
			var titulo = validar();
			if(titulo != false)
			{
				var id = $(this).attr('data-id');
				var url = $(this).attr('data-url');
				var informe = $('#informe').val();
				var data ='id='+id+'&titulo='+titulo+'&informe='+informe;
				var success =function(callback)
				{
					if(callback.callback)
					{
						alert('Home editado con suceso');
						top.location = callback.redirect;
					}else
						{
							alert('Error en Editar');
						}
				}
				ajax (url,data, success);
			}	
		}
		
		
	});
	
	//activar y desactivar en la home
	$('.box-content').on('click', '.activar' , function(e){
		
		e.preventDefault(); 
		var obj = $(this);
		var id = $(this).attr('data-activar');
	
		
		var uri = '/'+lang+'/usuarios/dashboard/status';
		var data = 'status=activar&id='+id;
		var success = function(callback)
		{
			if(callback.callback)
			{
				hermano = obj.parent().prevAll().prevAll().children();
				console.debug(hermano );
				hermano.addClass('label-success');
				hermano.removeClass('label-inverse');
				hermano.text('Activado');

				/*var labelact = $('#la_desact_home');
				labelact.addClass('label-success');
				labelact.removeClass('label-inverse');
				labelact.text('Activado');
				labelact.attr('id','la_act_home');*/

				obj.addClass('btn-inverse desactivar');
				obj.removeClass('btn-success activar');
				obj.removeAttr('data-activar');
				obj.attr('data-desactivar', id);
				obj.text('Desactivar');
			}else
				{
					alert('Error');
				}
		}		
		ajax (uri,data, success);
	});
	
	
	$('.box-content').on('click','.desactivar' , function(e){
		
		e.preventDefault();
		var obj = $(this); 
		var id = $(this).attr('data-desactivar');
		
		var uri = '/'+lang+'/usuarios/dashboard/status';
		var data = 'status=desactivar&id='+id;
		var success = function(callback)
		{
			if(callback.callback)
			{
				hermano = obj.parent().prevAll().prevAll().children();
				 //alert(hermano.html());
				 
				//var hermano = obj.parent().prevAll().children();
				hermano.addClass('label-inverse');
				hermano.removeClass('label-success');
				hermano.text('Desactivado');

				/*var labelact = $('#la_act_home');
				labelact.addClass('label-inverse');
				labelact.removeClass('label-success');
				labelact.text('Desactivado');
				labelact.attr('id','la_desact_home');*/

				obj.addClass('btn-success activar');
				obj.removeClass('btn-inverse desactivar');
				obj.removeAttr('data-desactivar');
				obj.attr('data-activar', id);
				obj.text('Activar');
			}else
				{
					alert('Error');
				}
		}		
		ajax (uri,data, success);
	});
	
	//activar y desactivar eventos
	$('.box-content').on('click', '.act_evento' , function(e){
		
		e.preventDefault(); 
		var obj = $(this);
		var id = $(this).attr('data-activar');

		var uri = '/'+lang+'/usuarios/dashboard/eventos';
		var data = 'status=activar&id='+id;
		var success = function(callback)
		{
			if(callback.callback)
			{
				var hermano = obj.parent().prevAll().children('span#la_desact_event');
				hermano.addClass('label-success');
				hermano.removeClass('label-inverse');
				hermano.text('Activado');
				hermano.attr('id','la_act_event');
				///console.debug(obj.parent());
				/*var labelact = $('#la_desact_event');
				labelact.addClass('label-success');
				labelact.removeClass('label-inverse');
				labelact.text('Activado');
				labelact.attr('id','la_act_event');*/
				
				obj.addClass('btn-danger desac_evento');
				obj.removeClass('btn-success act_evento');
				obj.removeAttr('data-activar');
				obj.attr('data-desactivar', id);
				obj.text('Desactivar');
			}else
				{
					alert('Error');
				}
		}		
		ajax (uri,data, success);
	});
	
	$('.box-content').on('click','.desac_evento' , function(e){
		
		e.preventDefault();
		var obj = $(this); 
		var id = $(this).attr('data-desactivar');
		
		var uri = '/'+lang+'/usuarios/dashboard/eventos';
		var data = 'status=desactivar&id='+id;
		var success = function(callback)
		{
			if(callback.callback)
			{
				var hermano = obj.parent().prevAll().children('span#la_act_event');
			//console.debug(obj.parent());
				hermano.addClass('label-inverse');
				hermano.removeClass('label-success');
				hermano.text('Desactivado');
				hermano.attr('id','la_desact_event');	
					

				/*var labelact = $('#la_act_event');
				labelact.addClass('label-inverse');
				labelact.removeClass('label-success');
				labelact.text('Desactivado');*/
				
				obj.addClass('btn act_evento');
				obj.removeClass('btn-danger desac_evento');
				obj.removeAttr('data-desactivar');
				obj.attr('data-activar', id);
				obj.text('Activar');

			}else
				{
					alert('Error');
				}
		}		
		ajax (uri,data, success);
	});
	$('.borrar_eventos').bind('click' , function(e){
		
		e.preventDefault();
		if(!confirm("Estas seguro que lo quiere borrar?"))
		{
			return false;
		}
		var obj = $(this); 
		var id = $(this).attr('data-borrar');
		var uri = '/'+lang+'/usuarios/dashboard/delete_home';
		var data = 'id='+id;
		var success = function(callback)
		{
			if(callback.callback)
			{
				obj.parent().parent().empty();
				//$(this).parent().empty();
			}else
				{
					alert('Error en borrar');
				}
		}		
		ajax (uri,data, success);
	});
	
	$('.borrar').bind('click' , function(e){
		
		e.preventDefault();
		if(!confirm("Estas seguro que lo quiere borrar?"))
		{
			return false;
		}
		var operation = $(this).attr('data-operacion');
		var obj = $(this);
		if(operation == 'borrar_video')
		{
			var id = obj.attr('data-id');
			var url = obj.attr('data-url');
			
			var data = 'id='+id;
				var success =function(callback)
				{
					if(callback.callback)
					{
						alert('Video borrado con suceso');
						top.location = callback.redirect;;
					}else
						{
							alert('Error en borrar video');
						}
				}
				ajax (url,data, success);
			}
	});
	
	$('.gallery-delete').bind('click' , function(e){
		e.preventDefault();
		if(!confirm("Estas seguro que lo quiere borrar?"))
		{
			return false;
		}
			var obj = $(this);
			var id = obj.attr('data-id');
			var url = obj.attr('data-url');
			
			var data = 'id='+id;
				var success =function(callback)
				{
					if(callback.callback)
					{
						alert('Foto borrada con suceso');
						location.reload();
					}else
						{
							alert('Error en borrar Imagen');
						}
				}
				ajax (url,data, success);
			
	});
	
	
	$('#content').on('click' ,'.borrar_foto', function(e){
		
		e.preventDefault();
		if(!confirm("Estas seguro que lo quiere borrar?"))
		{
			return false;
		}
		var obj = $(this); 
		var id = $(this).attr('data-id');
		var uri = $(this).attr('data-url');;
		var data = 'id='+id;
		var success = function(callback)
		{
			if(callback.callback)
			{
				top.location = url_app+'usuarios/fotos';
			}else
				{
					alert('Error en borrar');
				}
		}		
		ajax(uri,data, success);
	});
	
	$('.subir_meleva').bind('click', function(){
	//$('#fileupload').on('click','#subir', function(){
		//alert($(this).attr('id'));
		var val = $('#inputWarning').val();
		var informe = $('#informe').val();
		$('#Warning').css('display', 'none');
		if(informe == "")
		{
			alert('Hay que tener el informe');
			return false;
		}
		if(val == '')
		{
			$('#Warning').css('display', 'inline');
			return false;
		}else{
				$('#home_nuevo').removeClass('span6');
				$('#home_nuevo').addClass('span12');
				$('#home_nuevo').css('width', '81%');
				$('input#file').change(function(){
					$('input#file').attr('disabled', '');
				});
				}
		
	});

	
	//$('.btn-minimize').bind('click', function(e){
	$('#content').on('click','.btn-minimize',function(e){
		e.preventDefault();
		var $target = $(this).parent().parent().next('.box-content');
		if($target.is(':visible')) $('i',$(this)).removeClass('icon-chevron-up').addClass('icon-chevron-down');
		else 					   $('i',$(this)).removeClass('icon-chevron-down').addClass('icon-chevron-up');
		$target.slideToggle();
		
		var controller =$(this).attr('data-uri');
		var id = $(this).attr('data-id');
		var uri = 'usuarios/'+controller;
		var data = 'id='+id;
		var lugar =  $target;
		
		ajaxHtml(uri,data,lugar);
		
	});
	
	

	
	$('.new').bind('click',function(e){
		e.preventDefault();
		$('#contenido').empty();
		var url = $(this).attr('data-url');	
		var id = $(this).attr('data-id');	
		var operacion = $(this).attr('id');
		
			$('#modal, #myModal').removeClass('hide');
			$('#modal, #myModal').addClass('in show');
			
		if(operacion == 'new_event')
		{
			var html='<div class="controls" >';
			  html+='<label class="control-label" style="margin-left:2px;" for="Titulo">Titulo </label>';	
			  html+='<input type="text" id="inputWarning" data-url="'+url+'" data-id="'+id+'" data-operacion="new_event" name="titulo_event" value="">';
			  html+='<span class="help-inline" id="Warning" style="display:none">Hay que poner un Titulo</span>';
			html+='</div>';
			
			$('#contenido').html(html);
		}
		
	});
	
	/*$('ul.gallery').on('click','li', function(e){
		e.preventDefault();
		alert(this);
		$('img',this).fadeToggle(1000);
		$(this).find('.gallery-controls').remove();
		$(this).append('<div class="well gallery-controls">'+
							'<p><a href="#" class="gallery-edit btn"><i class="icon-edit"></i></a> <a href="#" class="gallery-delete btn"><i class="icon-remove"></i></a></p>'+
						'</div>');
		//$(this).find('.gallery-controls').stop().animate({'margin-top':'-1'},400,'easeInQuint');
	},function(){
		$('img',this).fadeToggle(1000);
		$(this).find('.gallery-controls').stop().animate({'margin-top':'-30'},200,'easeInQuint',function(){
				$(this).remove();
		});
	});	*/
	
	$('.ver_img').bind('click', function (e){
		var img = $(this).attr('data-url');
		$('#modal, #myModal').removeClass('hide');
		$('#modal, #myModal').addClass('in show');
		var html = '<img class="" width="100%" heigth="100%" src="'+img+'">';
		$('#tittle_modal').text('Imagen');
		$('.modal-footer').empty();
		$('#contenido').html(html);	
	});
});
