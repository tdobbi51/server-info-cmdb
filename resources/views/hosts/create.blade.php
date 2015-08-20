@extends('app')

@section('page-title', 'Create Application')

@section('panel-heading', 'Add New Application' )

@section('content')
{{-- TODO: This div has to be included in each 'content' section when using a form
There has to be a better way. This keeps the form fields from streaching full
page.  This was pulled from the main template becuase for the 'show' pages
I do was to use the full screen, so we are only passing this div in templates 
containing forms.  --}} 
<div class="col-xs-12 col-sm-8 col-sm-offset-1 col-md-6 col-md-offset-1 col-lg-4 col-lg-offset-1">



	{!! Form::open(array('route' => 'applications.store')) !!}

		{{-- Include shared form partial --}}
		@include('hosts/_form', ['submitButtonText' => 'Save'])

			    
	{!! Form::close() !!}


</div>


<script>
// On page load, use jQuery to disable the first option of Environment select
// This in effect will profile a "placehold" value for the selection box
$(document).ready(function () {
	// make the "Environment" option disabled and grey'd out
	$('#envSelect option:eq(0)').attr('disabled', 'disabled').css('color', 'grey');
	$('#devteamSelect option:eq(0)').attr('disabled', 'disabled').css('color', 'grey');
	$('#businessSelect option:eq(0)').attr('disabled', 'disabled').css('color', 'grey');
});
</script>




<script>


  // Pass php array to javascript object
  // This is passes to the view by the controller and 
  // made available to JavaScript here
  var hostnames =  <?php echo json_encode($hostnames);?>;


  // type-ahead logic
  var substringMatcher = function(strs) {
  	return function findMatches(q, cb) {
      	var matches, substringRegex;
   
      	// an array that will be populated with substring matches
      	matches = [];
   
      	// regex used to determine if a string contains the substring `q`
      	substrRegex = new RegExp(q, 'i');
   
      	// iterate through the pool of strings and for any string that
      	// contains the substring `q`, add it to the `matches` array
      	$.each(strs, function(i, str) {
        	if (substrRegex.test(str)) {
          	matches.push(str);
        	}
      });
   
      cb(matches);
    };
  };
 

  // Add type-ahead classes to the host input field 
  $('#host_typeahead .typeahead').typeahead({
  	hint: true,
  	highlight: true,
  	minLength: 1
  },
  {
    	name: 'hostnames',
    	source: substringMatcher(hostnames)
  });

 </script>



<script>

// When the plus (Add) button is clicked on the Host input field
// add additional input field
// create additional form field

  var counter = 2;

	$("#add").click(function (e) {
		e.preventDefault();

    	// Append a new row of code to the "#input_fields_wrap" div
      $(".input_fields_wrap").append(

        '<div class="form-group input-group" id="host_typeahead' + counter + '">' +
        '<input class="form-control typeahead" placeholder="Host" name="host[]" type="text" id="host">' +
        '<span class="input-group-btn">' +
        '<button id="delete" class="btn btn-default" type="button">' +
        '<i class="glyphicon glyphicon-minus"></i>' +
        '</button></span></div>'
      );

      // Apply the type-ahead classes to the added host input field
      $('#host_typeahead' + counter + ' .typeahead').typeahead({
        hint: true,
	      highlight: true,
	      minLength: 1
      },
      {
  	    name: 'hostnames',
  	    source: substringMatcher(hostnames)
      });

      // Increment counter
    	counter++;

});


  // If the minus (delete) button is clicked
  // remove the input field
  $("body").on("click", "#delete", function (e) {
    $(this).parent().parent("div").remove();
  });

</script>

	
@endsection
                




