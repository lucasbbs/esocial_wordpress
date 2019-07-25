jQuery(document).ready( function($){

// $( '#pie-chart' ).append("Some appended text.");

// var data = [{
//   values: [19, 26, 55],
//   labels: ['Residential', 'Non-Residential', 'Utility'],
//   type: 'pie'
// }];

// var layout = {
// 	width: 0.9 * $('#history_investment' ).width(),
//  	height: 'auto'
  
// };
 

// var myDiv = document.getElementById('pie-chart') 

// Plotly.newPlot(myDiv, data, layout, {displaylogo: false}); 



// The width() method simply returns the element's width as unit-less pixel value.
// However calling the width(value) method sets the width of the element, where the value can be either a string (e.g. 100%, 50px, 25em, auto etc.) or a number.
// If only a number is provided for the value, jQuery assumes it as a pixel unit.
// $( '.js-plotly-plot' ).width(0);


// window.onresize = function() {
// 	var newWidth = 0.9*$('#history_investment' ).width();
//   Plotly.relayout(myDiv, {
//     width: newWidth,
//     height: 'auto'
//   });
// }

var tabs = document.querySelectorAll('ul >li.nav-bar')
tabs.forEach(
  function(tab) {
    tab.addEventListener('click', function(e) {
      e.preventDefault();

      document.querySelector('.nav-pane.active').classList.remove('active');
      //document.querySelector(".tab-pane.active").classList.remove("active");
      
      var clickedTab = e.currentTarget;
      var anchor = e.target;
      var link = anchor.getAttribute('href');
      document.querySelector(link).classList.add('active');
    });
  }
  )
});

