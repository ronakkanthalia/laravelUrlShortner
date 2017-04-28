$('#submit').click(function(){
	var data ={};
	data.url = $('#url').val();
	$.ajax({
		data:data,
		type:'post',
		url:'api/short/create'		
	}).done(function(data){
			if (data.result == 'success'){
				$('#error').html("");
				$('#shortUrl').html('Here is your short link: <a href="' +data.data.short_link + '" target="_blank">' + data.data.short_link +'</a>');
			} else if(data.result == 'error')  {
				$('#shortUrl').html("");
				if(data.errors.error!=undefined){
					// Hardcoded error returned from php sever, here we can also handle errors which are dynamically generating form php server, like validation error.
					$('#error').html(data.errors.error);
				}
				
			}
		}
	);
});