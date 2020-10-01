var data = google.visualization.arrayToDataTable([
  ['Date', 'Male', 'Female'],
  ['10 Mar', 1, 0],
  ['11 Mar', 3, 0],
  ['12 Mar', 6, 0],
  ['13 Mar', 4, 3],
  ['14 Mar', 3, 3],
  ['15 Mar', 4, 0],
  ['16 Mar', 7, 0],
  ['17 Mar', 3, 4],
  ['18 Mar', 2, 0],
  ['19 Mar', 0, 5],
  ['20 Mar', 2, 6],
  ['21 Mar', 5, 1],
  ['22 Mar', 0, 0],
  ['23 Mar', 2, 0],
  ['24 Mar', 3, 1],
  ['25 Mar', 4, 2],
  ['26 Mar', 17, 10],
  ['27 Mar', 20, 8],
  ['28 Mar', 15, 6],
  ['29 Mar', 13, 5],
  ['30 Mar', 10, 9],
  ['31 Mar', 15, 12],
]);

var options = {
  height: 300,
  chartArea: {'width': '100%'},
  legend: {position: 'none'},
  backgroundColor: 'transparent',
  animation:{
    duration: 3000,
    easing: 'out',
    "startup": true
  },
  colors: ['#42a5f5', '#f48fb1'],
};

var area_1 = new google.visualization.AreaChart(document.getElementById('area_1'));
area_1.draw(data, options);
