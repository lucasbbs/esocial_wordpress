
jQuery(document).ready( function($){

	var cnae = document.querySelector('.cnaeSelector');

	cnae.addEventListener('focusout', function(e) {

		
		var xmlhttp = new XMLHttpRequest();
		
		xmlhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var teste = JSON.parse( this.responseText);
				console.log(teste);
			}
		}
	
		var data = "action=myAjaxFunction";
		xmlhttp.open("POST","/wp-admin/admin-ajax.php",true);
		xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8'); //estava faltando isso para funcionar
		
		var domElem = document.querySelector('.cnaeSelector > option[value="' + this.value + '" ]');

		xmlhttp.send("action=myAjaxFunction&landID=" + domElem.getAttribute('id'));

	});

	
// loadDoc("url-1", myFunction1);

// loadDoc("url-2", myFunction2);

// function loadDoc(url, cFunction) {
//   var xhttp;
//   xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//       cFunction(this);
//     }
//   };
//   xhttp.open("GET", url, true);
//   xhttp.send();
// }

// function myFunction1(xhttp) {
//   // action goes here
// } 
// function myFunction2(xhttp) {
//   // action goes here
// }

	
});

// jQuery(document).ready( function($){
//  type:"POST",
//  url: "/wp-admin/admin-ajax.php",
//  data: {
//   action: 'myAjaxFunction',
//   name: "action=myAjaxFunction&landID=500"
//  },  
//  success: function(data){
//   console.log(data)
//  }
// });