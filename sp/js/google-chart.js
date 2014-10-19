function drawChart_at_home() {

    // Create the data table.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
    data.addRows([
        ['Yes', 1],
        ['No', 5],
    ]);

     // Set chart options
    var options = {'title':'Who think Kodai is a Good Project Manager',
                'width':300,
                'height':300};

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('recent'));
    chart.draw(data, options);
}


function drawVoting_Result(jArray) {
    // Create the data table.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
	var array = [];
    
    for(var i=0; i<jArray.length; i++){
    	array.push([jArray[i]["answer"], parseInt(jArray[i]["data"])]);
    }
    
	data.addRows(array);
     // Set chart options
   var options = {'title':jArray[0]['question'],
                'width':380,
                'height':400};

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('chart_pallet'));
    chart.draw(data, options);
}