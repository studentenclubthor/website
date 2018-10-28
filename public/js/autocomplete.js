$(function(){
  // setup autocomplete function pulling from array
  
	$('.autocomplete').focus(function(){
	  search = searches[this.id];
	  $('.autocomplete').autocomplete({
		lookup: search,
		onSelect: function (suggestion) {
		  // var thehtml = '<strong>Currency Name:</strong> ' + suggestion.value + ' <br> <strong>Symbol:</strong> ' + suggestion.data;
		  // $('#outputcontent').html(thehtml);
		}
	  });
	});
  
  
  
  

});