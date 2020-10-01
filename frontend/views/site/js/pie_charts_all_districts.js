<?php
$cat = ['OBC'=>'789', 'SC'=>'434', 'ST'=>'2323']
?>

if(!<?= $tot ?>) {
  $("#pie_2").html('<br><br><h2 class="text-center"><small><i>Nothing to show</i></small></h2>');
} else {
  var data = google.visualization.arrayToDataTable([
    ['District', 'Total Figures'],
    <?php
    /*foreach($d as $d_id => $tot) {
      echo "['".$districts[$d_id]."', ".$tot['t']."],";
    }*/
    foreach($cat as $cat_name => $tot) {
      echo "['".$cat_name."', ".$tot."],";
    }
    ?>
  ]);



  var options = {
    width: '100%',
    height: 280,
    vAxis: { textPosition: 'none' },
    legend: {position: 'bottom', textStyle: {fontSize: 10}},
    chartArea: {
        height: "80%",
        width: "100%"
    },
    colors: ['#e57373', '#ba68c8', '#ffcdd2', '#bbdefb', '#42a5f5', '#b39ddb', '#81d4fa', '#4db6ac', '#a5d6a7', '#e6ee9c', '#fff59d', '#d7ccc8', '#e0e0e0', '#b0bec5', '#f48fb1', '#b2ebf2']
  };

  var pie_2 = new google.visualization.PieChart(document.getElementById('pie_2'));

  pie_2.draw(data, options);
}