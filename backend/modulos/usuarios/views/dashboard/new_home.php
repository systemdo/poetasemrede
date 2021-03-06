<?php $this->setHeader('head2')?>
<style type="text/css">
.form-horizontal .controls
{
	margin-left:0px;
}


label {
/*margin-left: 0px;*/
}

.control-label {
float: none;
width: 370px;
padding-top: 5px;
text-align: right;
}
}
</style>



<meta name="viewport" content="width=device-width">
<!-- Bootstrap CSS Toolkit styles -->
<!--<link rel="stylesheet" href="http://blueimp.github.com/cdn/css/bootstrap.min.css">-->
<!-- Generic page styles -->
<!--<link rel="stylesheet" href="<?php echo M_PATH_CSS?>styleupload.css">-->
<!-- Bootstrap styles for responsive website layout, supporting different screen sizes -->
<!--<link rel="stylesheet" href="http://blueimp.github.com/cdn/css/bootstrap-responsive.min.css">-->
<!-- Bootstrap CSS fixes for IE6 -->
<!--[if lt IE 7]><link rel="stylesheet" href="http://blueimp.github.com/cdn/css/bootstrap-ie6.min.css"><![endif]-->
<!-- Bootstrap Image Gallery styles -->
<!--<link rel="stylesheet" href="http://blueimp.github.com/Bootstrap-Image-Gallery/css/bootstrap-image-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="<?php echo M_PATH_CSS?>jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="<?php echo M_PATH_CSS?>jquery.fileupload-ui-noscript.css"></noscript>
<!-- Shim to make HTML5 elements usable in older Internet Explorer versions -->
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
<div class="box span10" id="home_nuevo">
	<div class="box-header well" data-original-title>
		<h2><i class="icon-user"></i> Archivos (La imagen debe ser preferentemente lo màs aproximada a 980px X 439px
)</h2>
	</div>
	<div class="box-content">
	
		
		<div class="control-group" >
		   <form  class="form-horizontal" id="fileupload" action="" method="POST"  enctype="multipart/form-data" data-url="<?php echo helper_build_url('dashboard/save_home');?>">

		   <div class="controls">
			  <label class="control-label" for="Titulo" style="width: 171px;">Titulo </label>	
			  <input type="text" id="inputWarning" name="titulo_home" data-dir="home" value="">
			  <span class="help-inline" id="Warning" style="display:none">Hay que poner un Titulo</span>
		  </div>
		  <div class="controls">
			<label class="control-label" for="informe" style="float: none; width: 213px;"><?php echo htmlentities('Información')?></label>
		  </div>
		  <div class="controls">
			<textarea class="cleditor" id="informe" name="informe" rows="3"></textarea>
		  </div>
		  <div class="controls" id="button-upload" style="margin-left: 353px;">
			<!--<label class="control-label" for="fileInput">File input</label>-->
			<!-- Redirect browsers with JavaScript disabled to the origin page -->
			<noscript><input type="hidden" name="redirect" value="http://blueimp.github.com/jQuery-File-Upload/"></noscript>
			<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
			
			<div class="row fileupload-buttonbar">
				<div class="span11">
					<!-- The fileinput-button span is used to style the file input field as button -->
					<span class="btn btn-success subir_meleva fileinput-button" id="subir_home">
						<i class="icon-plus icon-white"></i>
						<span>Subir Imagen</span>
						<input class="filemeleva" type="file" name="files">
					</span>
					<button type="submit" class="btn btn-primary start">
						<i class="icon-upload icon-white"></i>
						<span>Start</span>
					</button>
					<button type="reset" class="btn btn-warning cancel">
						<i class="icon-ban-circle icon-white"></i>
	'					<span>Cancel</span>
					</button>
					<button type="button" id="delete" class="btn btn-danger delete">
						<i class="icon-trash icon-white"></i>
						<span>Delete</span>
					</button>
					<input type="checkbox" class="toggle">
				</div>
				<!-- The global progress information -->
				<div class="span5 fileupload-progress fade">
					<!-- The global progress bar -->
					<div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
						<div class="bar" style="width:0%;"></div>
					</div>
					<!-- The extended global progress information -->
					<div class="progress-extended">&nbsp;</div>
				</div>
			</div>
			<!-- The loading indicator is shown during file processing -->
			<div class="fileupload-loading"></div>
			<br>
			<!-- The table listing the files available for upload/download -->
			<table role="presentation" class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
		</div>
		</form>
	</div>
<br>
<!-- modal-gallery is the modal dialog used for the image gallery -->
<div id="modal-gallery" class="modal modal-gallery hide fade" data-filter=":odd" tabindex="-1">
<div class="modal-header">
	<a class="close" data-dismiss="modal">&times;</a>
	<h3 class="modal-title"></h3>
</div>
<div class="modal-body"><div class="modal-image"></div></div>
<div class="modal-footer">
	<a class="btn modal-download" target="_blank">
		<i class="icon-download"></i>
		<span>Download</span>
	</a>
	<a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000">
		<i class="icon-play icon-white"></i>
		<span>Slideshow</span>
	</a>
	<a class="btn btn-info modal-prev">
		<i class="icon-arrow-left icon-white"></i>
		<span>Previous</span>
	</a>
	<a class="btn btn-primary modal-next">
		<span>Next</span>
		<i class="icon-arrow-right icon-white"></i>
	</a>
</div>
</div>

	
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td class="preview"><span class="fade"></span></td>
        <td class="name"><span>{%=file.name%}</span></td>
        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
        {% if (file.error) { %}
            <td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
        {% } else if (o.files.valid && !i) { %}
            <td>
                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
            </td>
            <td class="start">{% if (!o.options.autoUpload) { %}
                <button class="btn btn-primary">
                    <i class="icon-upload icon-white"></i>
                    <span>Start</span>
                </button>
            {% } %}</td>
        {% } else { %}
            <td colspan="2"></td>
        {% } %}
        <td class="cancel">{% if (!i) { %}
            <button class="btn btn-warning">
                <i class="icon-ban-circle icon-white"></i>
                <span>Cancel</span>
            </button>
        {% } %}</td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        {% if (file.error) { %}
            <td></td>
            <td class="name"><span>{%=file.name%}</span></td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
        {% } else { %}
            <td class="preview">{% if (file.thumbnail_url) { %}
                <a href="{%=file.url%}" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
            {% } %}</td>
            <td class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
            </td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td colspan="2"></td>
        {% } %}
        <td class="delete">
            <button class="btn btn-danger" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                <i class="icon-trash icon-white"></i>
                <span>Delete</span>
            </button>
            <input type="checkbox" name="delete" value="1">
        </td>
    </tr>
{% } %}
</script>
		</form>   
	</div>
</div><!--/span-->
	

	<script src="<?php echo M_PATH_JS?>jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="<?php echo M_PATH_JS?>jquery-ui-1.8.21.custom.min.js"></script>
<script src="<?php echo M_PATH_JS?>vendor/jquery.ui.widget.js"></script>	
<script src="<?php echo M_PATH_JS?>jquery.uploadify-3.1.min.js"></script>
<script src="<?php echo M_PATH_JS?>tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="<?php echo M_PATH_JS?>load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="<?php echo M_PATH_JS?>canvas-to-blob.min.js"></script>
<script src="<?php echo M_PATH_JS?>jquery.fileupload.js?=<?php echo rand();?>"></script>
<!-- The File Upload file processing plugin -->
<script src="<?php echo M_PATH_JS?>jquery.fileupload-fp.js?=<?php echo rand();?>"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo M_PATH_JS?>jquery.fileupload-ui.js?=<?php echo rand();?>"></script>
<!-- The main application script -->
<script src="<?php echo M_PATH_JS?>main.js?=<?php echo rand();?>"></script>
<script src="<?php echo M_PATH_JS?>jquerymeleva.js?=<?php echo rand();?>"></script>
<script type="text/javascript">

$(document).ready(function(){
	
$('#informe').cleditor();

});	
</script>

	<script src="<?php echo M_PATH_JS?>jquery.cleditor.js"></script>
	<script src="<?php echo M_PATH_JS?>jquery.cleditor.min.js"></script>
	
