if(!<?= $d['t'] ?>) {
  $("#pie_2").html('<br><br><h2 class="text-center"><small><i>Nothing to show</i></small></h2>');
} else {
  var data = google.visualization.arrayToDataTable([
    ['Case', 'Total'],
    ['Figure 1', <?= $d['c'] ?>],
    ['Figure 2', <?= $d['s'] ?>],
    ['Figure 3', <?= $d['i'] ?>],
    ['Figure 4', <?= ($d['t']-$d['c']) ?>]
  ]);

  var options = {
    width: '100%',
    height: 300,
    vAxis: { textPosition: 'none' },
    legend: 'none',
    chartArea: {
        top: "3%",
        height: "100%",
        width: "100%"
    },
    colors: ['#69b2f8', '#f18fb3', '#4db6ac', '#81c784']
  };

  var pie_2 = new google.visualization.PieChart(document.getElementById('pie_2'));

  pie_2.draw(data, options);
}