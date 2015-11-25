<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    	<script type="text/javascript">
    	// Load the Visualization API and the piechart package.
      	google.load('visualization', '1.0', {'packages':['corechart']});

      	// Set a callback to run when the Google Visualization API is loaded.
      	google.setOnLoadCallback(drawColumnChart);

      	function drawColumnChart() {
     		var data = google.visualization.arrayToDataTable([
        		["Element", "Số lượng", { role: "style" } ],
        		["15", 7, "gold"],
        		["15.5", 7, "gold"],
        		["16", 7, "gold"],
        		["16.5", 7, "gold"],
        		["17", 7, "gold"],
        		["17.5", 5, "#b87333"],
        		["21", 6, "silver"],
        		["21.5", 7, "gold"],
        		["22", 8, "color: #e5e4e2"],
        		["21.5", 7.5, "gold"]
      		]);

      		var view = new google.visualization.DataView(data);
      		view.setColumns([0, 1,
            	           { calc: "stringify",
                	         sourceColumn: 1,
                    	     type: "string",
                        	 role: "annotation" },
                       		2]);

      		var options = {
        		title: "Số lượng thí sinh theo điểm",
        		width: 1300,
        		height: 400,
        		bar: {groupWidth: "95%"},
        		legend: { position: "none" },
        		};
        	var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_student"));
      		chart.draw(view, options);
     	};
     	</script>

	</head>	
	<body>

	<div id="columnchart_student" style="width: 2000px; height: 2000px;"></div>


	</body>


</html>