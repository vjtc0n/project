<!DOCTYPE html>
<html>

	<head>
		<head>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    	<script type="text/javascript">
    	// Load the Visualization API and the piechart package.
      	google.load('visualization', '1', {'packages':['corechart', 'line']});

      	// Set a callback to run when the Google Visualization API is loaded.
      	google.setOnLoadCallback(drawLineChart);

      	
      	
		function drawLineChart() {
			//console.log(temp1);
      		var datachart = new google.visualization.DataTable();
     		datachart.addColumn('date', 'X');
    		datachart.addColumn('number', 'Thí sinh');

        /*
        datachart.addRow([new Date('2015','8','1'),20]);
        datachart.addRow([new Date(2015,8,2),30]);
        datachart.addRow([new Date(2015,8,3),40]);
        */
    		$.ajax({
    			url: "{{url('http://localhost/project/public/api/data')}}",
    			type : "GET",
          async: false,
    			
    			success:function(data){
    				console.log(data);
            //console.log(data.year[0]);
            //console.log(data.month[0]);
            
            var i = 0;
            while(i<20)
            { 
              //console.log(data.day[i]);

              datachart.addRow([new Date(data.year[0], data.month[0], data.day[i]),
                                         data.numberofstudent[i] + Math.floor((Math.random() * 10) + 1)
                                ]);

              i++;
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
		
		<div id="chart_line" style="width: 1300px; height: 500px"></div>
		
	</body>




</html>