@extends('app')

@section('page-title', 'Edit Dev Team')

@section('panel-heading', 'Edit Dev Team' )

@section('content')





<div class="input_fields_wrap">
	<div class="form-group input-group" id="host_typeahead">
	    <div><input type="text" class="form-control" name="host"></div>
	    <span id="input_remove" class="input-group-btn"><button class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove-circle"></i></button></span>
	</div>
</div>

<button type="Submit" class="btn btn-default add_host_field">Add More</button>









<script>
$(document).ready(function() {

    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_host_field"); //Add button ID
    var counter         = 1;
    
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
  
            $(wrapper).append('<div class="form-group input-group" id="host_typeahead">' +
	                          '<div><input type="text" class="form-control" name="host"></div>' +
	                           '<span id="input_remove" class="input-group-btn"><button class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove-circle"></i></button></span></div>'
					); 

             counter++;

    });


        $("#input_remove").click(function(){
        //$(this).parent('div').remove();
        console.log($(this).parent('div'));
    });
    

});


</script>

@endsection 
