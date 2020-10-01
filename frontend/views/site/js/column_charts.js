var data = google.visualization.arrayToDataTable([
  ['District', 'Total Figures', { role: 'annotation' } ],
  <?php
  $max = 0;
  foreach($d as $d_id => $tot) {
    if($max < $tot['t'])
      $max = $tot['t'];
    $done = $tot['t'] - $tot['c'];
    echo "['".$districts[$d_id]."', ".$tot['t'].", ''],";
  }
  ?>
]);

var view = new google.visualization.DataView(data);

var options = {
  vAxis: {viewWindow: {min: 0, max: <?= $max ? $max+5 : 100 ?>}},
  hAxis: {textStyle: {fontSize: 10}, slantedText:true, slantedTextAngle:60},
  height: 330,
  backgroundColor: 'transparent',
  chartArea: {'width': '80%'},
  bar: { groupWidth: '60%' },
  legend: {position: 'none'},
  // isStacked: true,
  colors: ['#2196f3'],
  animation:{
    duration: 2000,
    easing: 'out',
    "startup": true
  }
};

var column_1 = new google.visualization.ColumnChart(document.getElementById("column_1"));
column_1.draw(view, options);
