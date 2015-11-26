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
        		["15",    {!!$data[0]!!},  "opacity: 0.8"],
        		["15.5",  {!!$data[1]!!},  "opacity: 0.8"],
        		["16",    {!!$data[2]!!},  "opacity: 0.8"],
        		["16.5",  {!!$data[3]!!},  "opacity: 0.8"],
        		["17",    {!!$data[4]!!},  "opacity: 0.8"],
        		["17.5",  {!!$data[5]!!},  "opacity: 0.8"],
            ["18",    {!!$data[6]!!},  "opacity: 0.8"],
            ["18.5",  {!!$data[7]!!},  "opacity: 0.8"],
            ["19",    {!!$data[8]!!},  "opacity: 0.8"],
            ["19.5",  {!!$data[9]!!},  "opacity: 0.8"],
            ["20",    {!!$data[10]!!}, "opacity: 0.8"],
            ["20.5",  {!!$data[11]!!}, "opacity: 0.8"],
        		["21",    {!!$data[12]!!}, "opacity: 0.8"],
        		["21.5",  {!!$data[13]!!}, "opacity: 0.8"],
        		["22",    {!!$data[14]!!}, "opacity: 0.8"],
        		["21.5",  {!!$data[15]!!}, "opacity: 0.8"],
            ["22",    {!!$data[16]!!}, "opacity: 0.8"],
            ["22.5",  {!!$data[17]!!}, "opacity: 0.8"],
            ["23",    {!!$data[18]!!}, "opacity: 0.8"],
            ["23.5",  {!!$data[19]!!}, "opacity: 0.8"],
            ["24",    {!!$data[20]!!}, "opacity: 0.8"],
            ["24.5",  {!!$data[21]!!}, "opacity: 0.8"],
            ["25",    {!!$data[22]!!}, "opacity: 0.8"],
            ["25.5",  {!!$data[23]!!}, "opacity: 0.8"],
            ["26",    {!!$data[24]!!}, "opacity: 0.8"],
            ["26.5",  {!!$data[25]!!}, "opacity: 0.8"],
            ["27",    {!!$data[26]!!}, "opacity: 0.8"],
            ["27.5",  {!!$data[27]!!}, "opacity: 0.8"],
            ["28",    {!!$data[28]!!}, "opacity: 0.8"],
            ["28.5",  {!!$data[29]!!}, "opacity: 0.8"],
            ["29",    {!!$data[30]!!}, "opacity: 0.8"],
            ["29.5",  {!!$data[31]!!}, "opacity: 0.8"],
            ["30",    {!!$data[32]!!}, "opacity: 0.8"],
            ["30.5",  {!!$data[33]!!}, "opacity: 0.8"],
            ["31",    {!!$data[34]!!}, "opacity: 0.8"],
            ["31.5",  {!!$data[35]!!}, "opacity: 0.8"],
            ["32",    {!!$data[36]!!}, "opacity: 0.8"],
            ["32.5",  {!!$data[37]!!}, "opacity: 0.8"],
            ["33",    {!!$data[38]!!}, "opacity: 0.8"]
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
        		width: 1200,
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