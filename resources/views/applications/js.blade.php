<script type="text/javascript">



// On page load, use jQuery to disable the first option of Environment select
// This in effect will profile a "placehold" value for the selection box
$(document).ready(function () {
  // make the "Environment" option disabled and grey'd out
  $('#environmentSelect option:eq(0)').attr('disabled', 'disabled').css('color', 'grey');
  $('#devteamSelect option:eq(0)').attr('disabled', 'disabled').css('color', 'grey');
  $('#businessSelect option:eq(0)').attr('disabled', 'disabled').css('color', 'grey');
});



  // Pass php array to javascript object
  // This is passes to the view by the controller and 
  // made available to JavaScript here
  var allHosts =  <?php echo json_encode($allHosts);?>;



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
   


  var $hostList = $('#hostList');
  var $hostSearch = $('#hostSearch');

  // Add type-ahead classes to the hostSearch input field 
  $hostSearch.typeahead({
    hint: true,
    highlight: true,
    minLength: 1
  },
  {
    name: 'allHosts',
    source: substringMatcher(allHosts)
  }).on('typeahead:selected', function (obj, datum) {

    // Move search ahead selection to listbox
    $hostList.append('<option value="' + datum + '">' + datum + '</option>');
    // Clear search ahead form
    $hostSearch.typeahead('val', '');

  });



  // Action for remove button
  // Remove selected element from listbox
  $("#remove").click(function (e) {
      e.preventDefault();
      $('#hostList option:selected').remove();
  });



  // On form submit select all options
  // in the host multiple select list
  $( "#applications" ).submit(function( event ) {
      $('#hostList option').prop('selected', true);
        
  });



</script>