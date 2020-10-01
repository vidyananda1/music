if(!<?= $male ?> && !<?= $female ?>) {
  $("#pie_1").html('<br><br><h2 class="text-center"><small><i>Nothing to show</i></small></h2>');
} else {
  var data = google.visualization.arrayToDataTable([
    ['Data', 'Total'],
    ['Fig 1', <?= $male ?>],
    ['Fig 2', <?= $female ?>]
  ]);

  var options = {
    pieHole: 0.4,
    width: '100%',
    height: 215,
    pieSliceTextStyle: {
      color: 'transparent'
    },
    vAxis: { textPosition: 'none' },
    chartArea: {
          top: "3%",
          height: "100%",
          width: "100%"
      },
    legend: 'none',
    colors: ['#42a5f5', '#ef5350']
  };

  var pie_1 = new google.visualization.PieChart(document.getElementById('pie_1'));
  pie_1.draw(data, options);
}