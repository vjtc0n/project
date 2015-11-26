<!DOCTYPE html>
<html>

	<head>
		<head>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.js"></script>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    	<script type="text/javascript">
    	// Load the Visualization API and the piechart package.
      	google.load('visualization', '1', {'packages':['corechart', 'line']});

      	// Set a callback to run when the Google Visualization API is loaded.
      	google.setOnLoadCallback(drawLineChart);

      	
      	
		function drawLineChart() {
			//console.log(temp1);
      		var datachart = new google.visualization.DataTable();
     		data.addColumn('date', 'X');
    		data.addColumn('number', 'Thí sinh');

    		$.ajax({
    			url: "{{url('http://localhost/project/public/api/data')}}",
    			type : "GET",
    			data : $data,
    			success:function(data){
    				foreach (data as number)
    				{
    					console.log(number);
    				}
    					
    			}
    		});
    		
    		
    		

		     var options = {
		        hAxis: {
		          title: 'Thời gian'
		        },
		        vAxis: {
		          title: 'Thí sinh'
		        }
		      };

		      var chart = new google.visualization.LineChart(document.getElementById('chart_line'));

		      chart.draw(datachart, options);
		    }

      	</script>


	</head>

	<body>
		
		<div id="chart_line" style="width: 900px; height: 500px"></div>
		
	</body>




</html>