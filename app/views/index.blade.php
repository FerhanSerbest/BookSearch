<!DOCTYPE html>
<html lang="en">
  <head>
		<meta charset="utf-8">
		<title>BookSearch Application</title>
		<link href="css/bootstrap-combined.min.css" rel="stylesheet">
		<style>
			body { padding-top: 20px; }
			#mask{  
        		position:absolute; 
        		top:0px;  
        		left:0px;  
        		height:100%;  
        		width:100%;   
        		display:none;   
        		background-color: black;  
    		}  
      		.modal_window{  
        		position:absolute; 
        		display:none; 
        		color:white;  
    		}  
    		#modal_window{  
        		padding:50px;  
        		border:1px solid gray;  
        		background: #246493;  
        		color:black;  
    		}  
		</style>
		<script src="js/jquery-1.10.2.js"></script>
    	<script src="js/jquery.form.js"></script> 
		<script>
		function formFunction(){
			//use of the form plugin to get the form info and send it to the controller method
    		$('#find').ajaxForm({
        		url: '/BookSearch/public/',
        		type: 'post',
        		dataType: 'json',
        		success: function(response){
        			$('#result_table').empty(); //we start off by emptying the two divs in case they were used in a previous search
        			$('#alertShow').empty();
        			if (response.key == 'nok'){
        				var error = $('<div></div>').addClass('alert alert-error span7').text('Please start a search with 3 characters minimum');
        				$('#alertShow').append(error); //we append the error message to the div
        			}
        			else if (response.key == 'empty'){
        				var error = $('<div></div>').addClass('alert alert-error span7').text('No result');
        				$('#alertShow').append(error); //we also append the error to the div
        			}
        			else {
            			var table = $('<table></table>').addClass('foo'); //we created a table to store the results in
            			for(var i = 0; i < response.key.length; i++) { //we iterate through the results and separate each field
            				var id = response.key[i.toString()].id;        
    						var title = response.key[i.toString()].title;               
            				var ISBN = response.key[i.toString()].ISBN;                                        
            				var date_published = response.key[i.toString()].date_published;  
            				var description = response.key[i.toString()].description;                                      
    						var authorModal = response.key[i.toString()].firstname 
    										+ ' '
    										+ response.key[i.toString()].lastname;
    						//we start writing the necessary elements for the modal popup and then add them all to the correct element
    						var isbnModal = $('<p></p>').text('ISBN Number: '+ISBN);
    						var descrModal = $('<p></p>').text('Description: '+description);
    						var dateModal = $('<p></p>').text('Date Published: '+date_published);
    						var divModal = $('<div></div>').addClass('modal_window').attr('id', ISBN).text('Written by: '+authorModal);
    						var link = $('<a></a>').addClass('activate_modal').attr('name',ISBN).attr('href', '#').text(title);           
            				var row = $('<tr></tr>').addClass('basic');
            				divModal.append(dateModal);
            				divModal.append(descrModal);
            				divModal.append(isbnModal);
            				row.append(link);
            				row.append(divModal);
    						table.append(row);
						}     
						//we can now add what the table we did to the layout. The mask for the modal is also added
						var mask = $('<div></div>').addClass('close_modal').attr('id', 'mask'); //the mask is used to get out of a modal popup
						var layout = $('<div></div>').addClass('hero-unit').attr('id', 'table_holder');
						layout.append(mask);
						layout.append(table);
						$('#result_table').append(layout); //we can append everything we did to the div in the html
    					var window_width = $(window).width();  
    					var window_height = $(window).height();  
    					//vertical and horizontal centering of modal window(s)  
    					/*we will use each function so if we have more then 1 
    					modal window we center them all*/  
    					$('.modal_window').each(function(){ 
        					//get the height and width of the modal  
        					var modal_height = $(this).outerHeight();  
        					var modal_width = $(this).outerWidth();  
        					//calculate top and left offset needed for centering  
        					var top = (window_height-modal_height)/2;  
        					var left = (window_width-modal_width)/2;  
        					//apply new top and left css values  
        					$(this).css({'top' : top , 'left' : left});  
    					});  
				        $('.activate_modal').click(function(){  
            				//get the id of the modal window stored in the name of the activating element  
            				var modal_id = $(this).attr('name');  
            				//use the function to show it  
            				show_modal(modal_id);  
            			});  
        				$('.close_modal').click(function(){  
            				//use the function to close it  
            				close_modal();  
        				});  
        			}
    			}
    		});
		}
    	function close_modal(){  
        	//hide the mask  
        	$('#mask').fadeOut(500); 
        	//hide modal window(s)  
        	$('.modal_window').fadeOut(500);  
    	}  
    	function show_modal(modal_id){     
        	//set display to block and opacity to 0 so we can use fadeTo  
        	$('#mask').css({ 'display' : 'block', opacity : 0});  
        	//fade in the mask to opacity 0.8  
        	$('#mask').fadeTo(500,0.8);  
        	//show the modal window  
        	$('#'+modal_id).fadeIn(500); 
    	}  
</script>
</head>
<body>
	
	<div class="container">
		<div class="hero-unit" >
			<h2> Welcome to BookSearch, please type in your search below:</h2>
      		<br/>
      		{{ Form::open(array('url' => '', 'method' => 'POST', 'id' => 'find')) }}
			{{ Form::text('search', '', array('class' => 'search-query', 'placeholder' => 'Search')) }}
			{{ Form::submit('Submit', array('class' => 'btn btn-info', 'onclick' => 'formFunction()')) }}
			{{ Form::close() }}
        	<div id="alertShow"></div>
		</div>
	</div>
	<div class="container" id="result_table"></div>

</body>
</html>