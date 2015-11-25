<!DOCTYPE html>
<html>

	<head>
		<head>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    	<script type="text/javascript">
    	// Load the Visualization API and the piechart package.
      	google.load('visualization', '1', {'packages':['corechart', 'line']});

      	// Set a callback to run when the Google Visualization API is loaded.
      	google.setOnLoadCallback(drawLineChart);

      	
      	
		function drawLineChart() {
			//console.log(temp1);
      		var data = new google.visualization.DataTable();
     		data.addColumn('date', 'X');
    		data.addColumn('number', 'Thí sinh');
      		data.addRows([
      			[new Date(2014, 10, 5), {!!$data[0]!!}],
		        [new Date(2014, 10, 6), {!!$data[1]!!}],
		        [new Date(2014, 10, 7), {!!$data[2]!!}]
		        ]);
      		// $.ajax({
      		// 		url: "{url('')}",
      		// 		data: {},
      		// 		cache: false,
      		// 		success: function(data){
      		// 			data.addRows([]);
      		// 		}
      		// 	});
      		// 		echo "[new Date(2014, 10, 5), ],";
      		// 		echo "[new Date(2014, 10, 6), ],";
      		// 		echo "[new Date(2014, 10, 7), ]";
		      //   // [new Date(2014, 10, 5), 20],
		      //   // [new Date(2014, 10, 6), 10],
		      //   // [new Date(2014, 10, 7), 10]
		    

		     var options = {
		        hAxis: {
		          title: 'Thời gian'
		        },
		        vAxis: {
		          title: 'Thí sinh'
		        }
		      };

		      var chart = new google.visualization.LineChart(document.getElementById('chart_line'));

		      chart.draw(data, options);
		    }

      	</script>


	</head>

	<body>

		<div id="chart_line" style="width: 900px; height: 500px"></div>
		{!!$data[0]!!}
	</body>




</html>