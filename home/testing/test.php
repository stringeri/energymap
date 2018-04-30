<html><body>
<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

echo 'Hello world from Clouasdd9!';

$command = escapeshellcmd('/workspace/DAM/Sandbox.py');
$output = shell_exec($command);
echo $output;
echo "Line 312";
system('cd && cd && cd && cd && cd workpspace && python Sandbox.py');
$last_line = exec('python Sandbox.py', $retval, $retval2);
// Printing additional info
echo '
</pre>
<hr />Last line of the output: ' . $last_line . '
<hr />Return value: ' . $retval;

?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    var retval = "<?php exec('python ScrapeUpdate.py', $retval, $retval2); ?>";
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
         ['Location', 'Price'],
         ['CADICKS_804V', 23.58], 
         ['ADICKS__138B', 23.59], 
         ['ADICKS__8030', 23.59], 
         ['ADK_V_C', 23.59]
      ]);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(
         retval);
      
        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Location', 'Price'],['CADICKS_804V', '$23.58'], ['ADICKS__138B', '$23.59'], ['ADICKS__8030', '$23.59'], ['ADK_V_C', '$23.59'], ['CADICKS_804O', '$23.59'], ['CADICKS_804N', '$23.59'], ['ADICKS__345A', '$23.59'], ['ADICKS_345C', '$23.59'], ['ADICKS_138N', '$23.58'], ['ADICKS_138D', '$23.59'], ['DUN_138A', '$23.6'], ['DUN_138B', '$23.6'], ['DUN_TR1', '$23.6'], ['DUN_TR2', '$23.6'], ['DUN_8000', '$23.6'], ['DUN_8005', '$23.6'], ['DUN_8020', '$23.6'], ['DUN_TR3', '$23.6'], ['DPO_138A', '$23.59'], ['DPO_8000', '$23.59'], ['DPO_TR1', '$23.59'], ['DPO_TR2', '$23.59'], ['DPO_8005', '$23.59'], ['DPO_138B', '$23.59'], ['DPO_8015', '$23.59'], ['ETP_1', '$25.56'], ['ETP_2', '$25.56'], ['CPCSUB9_1', '$23.54'], ['CPCSUB9_2', '$23.54'], ['CP_LN6', '$23.54'], ['CP_LN5', '$23.54'], ['CP_16', '$23.54'], ['CP_17', '$23.54'], ['BNT_TR5', '$23.59'], ['TNFM524___0A', '$23.54'], ['TNFM524___1T', '$23.54'], ['TNFM524___1U', '$23.54'], ['TNFM524___1V', '$23.54'], ['CTG1', '$23.56']
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>