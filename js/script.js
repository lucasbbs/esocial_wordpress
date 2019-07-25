/*
Contact Form Submission
 */
jQuery(document).ready( function($){ 

$( '#sunsetContactForm' ).on( 'submit', function (e) {
	e.preventDefault();
	var form = $( this);
	var name = form.find( '#name' ).val(),
		email = form.find( '#email' ).val(),
		message = form.find('#message').val(),
		ajaxurl = form.data( 'url' );


	if (name === '' || email =='' || message =='') {
		console.log('Required inputs are empty');
		return;
	}
	$.ajax({
				url : ajaxurl,
				type : 'post',
				data : {
					name : name,
					email : email,
					message : message,
					action: 'sunset_save_user_investment_form'
				},
				error : function( response ){},
				success : function( response ){
					if( response == 0 ){
					} else {
					}
				}
				
			});


	});




$( '#interestsForm' ).on( 'submit', function (e) {
	e.preventDefault();
	var form = $( this);
	var name = form.find( '#name' ).val(),
		email = form.find( '#email' ).val(),
		message = form.find('#message').val(),
		investment = form.find('#investment').children("option:selected").val(),
		ajaxurl = form.data( 'url' );

	console.log(message);
	if (name === '' || email =='' || message =='') {
		console.log('Required inputs are empty');
		return;
	}
	$.ajax({
				url : ajaxurl,
				type : 'post',
				data : {
					name : name,
					email : email,
					message : message,
					investment : investment,
					action: 'interest_set_form'
				},
				error : function( response ){},
				success : function( response ){
					if( response == 0 ){
					} else {
					}
				}
				
			});


	});

} );


