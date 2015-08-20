@extends('app')

@section('page-title', 'Edit Dev Team')

@section('panel-heading', 'Edit Dev Team' )

@section('content')


<form method="GET">

<div class="form-group input-group"> 
    <input type="text" class="typeahead form-control" id="hostsearch" placeholder="Add Server Host">
</div>

<div class="form-group"> 
    <select id="hostlist" class="form-control" name="hosts[]" multiple="multiple" size="5"></select>
    <input type="button" id="remove" value="Remove" />
</div>

<input type="submit">

</form>







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
 

 var $hostlist = $('#hostlist');
 var $hostsearch = $('#hostsearch');

  // Add type-ahead classes to the host input field 
  // $('#host_typeahead .typeahead').typeahead({
  $hostsearch.typeahead({
    hint: true,
    highlight: true,
    minLength: 1
    
  },
  {
        name: 'hostnames',
        source: substringMatcher(hostnames)

  }).on('typeahead:selected', function (obj, datum) {
    $hostlist.append('<option value="' + datum + '">' + datum + '</option>');
    $('#hostsearch').val('xxx');
   $hostsearch.typeahead('val', '');


});

 </script>

<script>

$("#remove").click(function (e) {
    e.preventDefault();
    $('#hostlist option:selected').remove();
});
</script>    


@endsection 


