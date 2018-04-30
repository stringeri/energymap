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
$dataraw = exec('python Sandbox.py', $retval, $retval2);
echo $dataraw;
$data =  substr($dataraw,1,-1);
$myArr = array();
$myArr =explode('],', $data);
if(count($myArr)>1)
$myArr[count($myArr)-1] = substr($myArr[count($myArr)-1],0,-1);
foreach ($myArr as $key => $value) {
 $value = substr($value,1);
 $myArr[$key] = array();
 $myArr[$key] = explode(',',$value);
}
echo "end1";
echo $myArr[0];
//$countArrayLength = count($dataraw);
echo $countArrayLength;
echo $dataraw[0];
echo "tdata above";
foreach ($myArr as $item) { 
             echo $item;};
//$urg = print_r (explode(",",$dataraw));
//$urglength = count($urg);
echo gettype ($dataraw);
foreach ($myArr as $values) { 
    echo $values[0] . "," . $values[1] . "],";};
?>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(
         "<?php echo $dataraw;?>" );

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
    document.write('<div>Print this after the script tag</div>');
    document.write('<?php echo $myArr?>');
    console.log("UGH")
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>