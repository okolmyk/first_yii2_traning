//alert('hello js');

//alert('My hello');




window.onload = function(){
	
	$("#butd").click(function(){

			var id = $('#namemodel').text();
			
			/*$.ajax({		
				url: 'mymet',
				type: 'POST',
				data: {id: id},
				success: function(data){
						$("#data").html(data);
		
				}
		
			});*/	

			alert(id);
					
		});	
}


