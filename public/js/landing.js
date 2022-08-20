$(document).ready(function(){
	country();
});


function find(){
	$departamento = $("#departamento option:selected").text();
	$('#ciudad').empty();
	depa($departamento);
}

function depa($departamento){
	$.ajax({
	    url: "https://www.datos.gov.co/resource/xdk5-pm3f.json?departamento="+ $departamento,
	    type: "GET",
	    data: {
	    	"$order" : 'municipio DESC',
	    	"$limit" : 5000,
	    	// "$$app_token" : "aflloawjm93irmgwghd0eflmu"
	    }
	}).done(function(data) {
	  for(i = 0; i < data.length; i++){
	 	$('#ciudad').prepend("<option value='"+ data[i]['municipio'] +"' >"+ data[i]['municipio'] +"</option>");
	  }
	});
}

function country(){
	$.ajax({
	    url: "https://www.datos.gov.co/resource/xdk5-pm3f.json",
	    type: "GET",
	    data: {
	    	"$select" : 'departamento',
	    	"$group" : 'departamento',
	    	"$order" : 'departamento DESC',
	    	"$limit" : 5000,

	    	// "$$app_token" : "aflloawjm93irmgwghd0eflmu"
	    }
	}).done(function(data) {
	  for(i = 0; i < data.length; i++){
	 	$('#departamento').prepend("<option value='"+ data[i]['departamento'] +"' >"+ data[i]['departamento'] +"</option>");
	  }
	});
}