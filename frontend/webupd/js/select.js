select = {
	controller:'municipio/conseguirMunicipios',
	allSelected: "Todos Selecionados",
	selectAllText: "Todas as opções",
	cidades: function(){ 
		$.getJSON( 'municipio/conseguirMunicipios', function(dados) {
			var items = [];  
			$.each( dados, function( key, obj ) {
			    items.push( '<option value="'+obj.id+'">'+obj.nome+'</option>');
			})
			
			$( "#select-cidades" ).html(items.join( "" ));

		}).done(function() {
			    $("#select-cidades").multipleSelect({
	        		placeholder: "Cidades",
	        		allSelected: select.allSelected,
	        		selectAllText:select.selectAllText
	    		});
		});
		
	},
	bairros: function(){
		$.getJSON( 'bairro/conseguirBairros', function(dados) {
			var items = [];  
			$.each( dados, function( key, obj ) {
			    items.push( '<option value="'+obj.id+'">'+obj.nome+'</option>');
			})
			
			$( "#select-bairros" ).html(items.join( "" ));

		}).done(function() {
		    $("#select-bairros").multipleSelect({
	        	placeholder: "Bairro",
	        	allSelected: select.allSelected,
	        	selectAllText:select.selectAllText
	    	});
		});
		
		
	},
	acao: function(){
	    $.getJSON( 'mais-info/conseguirAcao', function(dados) {
			var items = [];  
			$.each( dados, function( key, obj ) {
			    items.push( '<option value="'+key+'">'+obj+'</option>');
			})
			
			$( "#select-acao" ).html(items.join( "" ));

		}).done(function() {
		    $("#select-acao").multipleSelect({
	        	placeholder: "AÃ§Ã£o",
	        	allSelected: select.allSelected,
	        		selectAllText:select.selectAllText
	    	});
		});
	},
	valores: function(){
		
	    $.getJSON( 'mais-info/conseguirValores', function(dados) {
			var items = [];  
			$.each( dados, function( key, obj ) {
			    items.push( '<option value="'+key+'">'+obj.valor+'</option>');
			})
			
			$( "#select-valores" ).html(items.join( "" ));

		}).done(function() {
		    $("#select-valores").multipleSelect({
	        	placeholder: "Valores",
	        	allSelected: select.allSelected,
	        	selectAllText:select.selectAllText
	    	});
		});
	
	},
	quartos: function(){
	    $.getJSON( 'mais-info/conseguirQuartos', function(dados) {
			var items = [];  
			$.each( dados, function( key, obj ) {
			    items.push( '<option value="'+key+'">'+obj+'</option>');
			})
			
			$( "#select-quartos" ).html(items.join( "" ));

		}).done(function() {
		    $("#select-quartos").multipleSelect({
	        	placeholder: "Quartos",
	        	allSelected: select.allSelected,
	        	selectAllText:select.selectAllText
	    	});
		});
	},
	area: function(){
	    $.getJSON( 'mais-info/conseguirArea', function(dados) {
			var items = [];  
			$.each( dados, function( key, obj ) {
			    items.push( '<option value="'+key+'">'+obj+'</option>');
			})
			
			$( "#select-area" ).html(items.join( "" ));

		}).done(function() {
		    $("#select-area").multipleSelect({
	        	placeholder: "Area",
	        	allSelected: select.allSelected,
	        	selectAllText:select.selectAllText
	    	});
		});
	},
	vagas: function(){
		$.getJSON( 'mais-info/conseguirVagas', function(dados) {
			var items = [];  
			$.each( dados, function( key, obj ) {
			    items.push( '<option value="'+key+'"> '+obj+'</option>');
			})
			
			$( "#select-vagas" ).html(items.join( "" ));

		}).done(function() {
		    $("#select-vagas").multipleSelect({
	        	placeholder: "Vagas",
	        	allSelected: select.allSelected,
	        	selectAllText:select.selectAllText
	    	});
		});
	},
	mobiliado: function(){
	    $.getJSON( 'mais-info/conseguirMobiliado', function(dados) {
			var items = [];  
			$.each( dados, function( key, obj ) {
			    items.push( '<option value="'+key+'"> '+obj+'</option>');
			})
			
			$( "#select-mobiliado" ).html(items.join( "" ));

		}).done(function() {
		    $("#select-mobiliado").multipleSelect({
	        	placeholder: "Mobiliado",
	        	allSelected: select.allSelected,
	        	selectAllText:select.selectAllText
	    	});
		});
	},
	inicialize:function(){
		select.cidades();
		select.bairros();
		select.acao();
		select.valores();
		select.quartos();
		select.area();
		select.vagas();
		select.mobiliado();
	} 
	
} 
