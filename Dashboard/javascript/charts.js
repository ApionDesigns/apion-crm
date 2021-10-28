//bar graph for jobs vs jobs completed
var jobs = "<?php echo $count; ?>";
var jCom = "<?php echo $count2; ?>";
google.charts.load("current", {
  packages: ["bar"],
});
google.charts.setOnLoadCallback(drawStuff);

function drawStuff() {
  var data = new google.visualization.arrayToDataTable([
    ["Name", "#"],
    ["JOBS", Number(jobs)],
    ["COMPLETED", Number(jCom)],
  ]);

  var options = {
    legend: {
      position: "none",
    },
    chart: {
      title: "COMPANY JOBS STATISTICS",
      subtitle: "",
    },
    bars: "vertical", // Required for Material Bar Charts.
    axes: {
      x: {
        0: {
          side: "top",
          label: "",
        }, // Top x-axis.
      },
    },
    bar: {
      groupWidth: "100%",
    },
  };

  var chart = new google.charts.Bar(document.getElementById("top_x_div"));
  chart.draw(data, options);
}
