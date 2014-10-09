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
                'width':250,
                'height':250};

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('recent'));
    chart.draw(data, options);
}