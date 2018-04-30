<html><body>
<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

echo 'Hello world from Clouasdd9!';

$command = escapeshellcmd('/workspace/DAM/ScrapeUpdate.py');
$output = shell_exec($command);
echo $output;
echo "Line 312";
system('cd && cd && cd && cd && cd workpspace && python ScrapeUpdate.py');
$last_line = exec('python ScrapeUpdate.py', $retval, $retval2);
// Printing additional info
echo '
</pre>
<hr />Last line of the output: ' . $last_line . '
<hr />Return value: ' . $retval;

?>
</html>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var retval = "<?php exec('python ScrapeUpdate.py', $retval, $retval2); ?>";
        var data = google.visualization.arrayToDataTable([retval]);

        var options = {
          title: 'Lengths of dinosaurs, in meters',
          legend: { position: 'none' },
        };

        var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
  echo "Line 312";
</html>