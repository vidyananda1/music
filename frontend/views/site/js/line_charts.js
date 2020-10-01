var line_1_data = new google.visualization.DataTable();
line_1_data.addColumn('number', 'Date');
line_1_data.addColumn('number', 'Figure Data');

var line_2_data = new google.visualization.DataTable();
line_2_data.addColumn('number', 'Date');
line_2_data.addColumn('number', 'Figure Data');

var line_3_data = new google.visualization.DataTable();
line_3_data.addColumn('number', 'Date');
line_3_data.addColumn('number', 'Figure Data');

var line_4_data = new google.visualization.DataTable();
line_4_data.addColumn('number', 'Date');
line_4_data.addColumn('number', 'Figure Data');

line_1_data.addRows([
  [0, 0],   [1, 1],  [2, 2],  [3, 2],
  [6, 6],  [10, 7], [11, 5],
  [12, 6], [13, 8], [14, 4], [15, 5], [17, 10],
  [18, 15], [19, 25], [22, 12], [23, 25],
  [25, 35], [26, 30], [27, 29], [29, 53],
  [30, 55]
]);
line_2_data.addRows([
  [0, 0], [14, 4], [16, 9], [17, 10],
  [18, 15], [19, 25], [20, 35],  [23, 25],
  [24, 40], [25, 35], [26, 30], [27, 29], [28, 49], [29, 53],
]);
line_3_data.addRows([
  [0, 0],   [1, 1], [4, 3], [5, 7],
  [6, 6],  [7, 5],  [8, 5],
  [12, 6], [17, 10],
  [18, 15], [19, 25], [22, 12], [23, 25],
  [24, 40], [25, 35], [26, 30], [27, 29],
  [30, 55]
]);
line_4_data.addRows([
  [0, 0], [2, 2], [9, 6],  [10, 7], [11, 5],
  [12, 6], [13, 8], [14, 4], [15, 5], [16, 9], [17, 10],
  [18, 15],  [21, 25], [22, 12], [23, 25],
  [24, 40], [25, 35]
]);

var options = {
	height: 30,
	chartArea: {'width': '100%'},
	colors: ['#64b5f6'],
  hAxis: {
  	textPosition: 'none',
  	gridlines: {color: 'transparent'},
  	baselineColor: 'transparent'
  },
  vAxis: {
  	textPosition: 'none',
  	gridlines: {color: 'transparent'},
  	baselineColor: 'transparent'
  },
  backgroundColor: 'transparent',
  legend: {position: 'none'},
  'tooltip' : {trigger: 'none'},
  animation:{
    duration: 5000,
    easing: 'out',
    "startup": true
  }
};

var line_1 = new google.visualization.LineChart(document.getElementById('line_1'));
line_1.draw(line_1_data, options);

var line_2 = new google.visualization.LineChart(document.getElementById('line_2'));
line_2.draw(line_2_data, options);

var line_3 = new google.visualization.LineChart(document.getElementById('line_3'));
line_3.draw(line_3_data, options);

var line_4 = new google.visualization.LineChart(document.getElementById('line_4'));
line_4.draw(line_4_data, options);
