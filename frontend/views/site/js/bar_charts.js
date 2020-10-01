<?php
$d = [
    '2014-15'=>['man'=>3443, 'ser'=>6576],
    '2015-16'=>['man'=>3443, 'ser'=>6576],
    '2016-17'=>['man'=>3443, 'ser'=>6576],
    '2017-18'=>['man'=>3443, 'ser'=>6576],
    '2018-19'=>['man'=>3443, 'ser'=>6576],
    '2019-20'=>['man'=>3443, 'ser'=>6576],
    '2020-21'=>['man'=>3443, 'ser'=>6576],
];
?>

var data = google.visualization.arrayToDataTable([
    ['Title', 'Figure 1', 'Figure 2'],
    <?php
    $max = 0;
    foreach($d as $yr => $tot) {
        if($max < $tot['man'])
            $max = $tot['man'];
        if($max < $tot['ser'])
            $max = $tot['ser'];
        echo "['".$yr."', ".$tot['man'].", ".$tot['ser']."],";
    }
    ?>
]);

var options = {
    height: 300,
    chartArea: {width: '75%', height: '80%'},
    vAxis: {
      title: 'Age',
    },
    hAxis: {
        viewWindow: {min: 0, max: <?= $max ? $max+5 : 100 ?>},
    },
    backgroundColor: 'transparent',
	legend: {position: 'none'},
	animation:{
	    duration: 3000,
	    easing: 'out',
	    "startup": true
	},
	colors: ['#42a5f5', '#ef5350']
};

var bar_1 = new google.visualization.BarChart(document.getElementById('bar_1'));
bar_1.draw(data, options);
