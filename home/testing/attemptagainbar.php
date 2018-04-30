<html>
<form method="post">
<select name = 'hour'>
  <option value=0>12:00 AM</option>
  <option value=1>1:00 AM</option>
  <option value=2>2:00 AM</option>
  <option value=3>3:00 AM</option>
  <option value=4>4:00 AM</option>
  <option value=5>5:00 AM</option>
  <option value=6>6:00 AM</option>
  <option value=7>7:00 AM</option>
  <option value=8>8:00 AM</option>
  <option value=9>9:00 AM</option>
  <option value=10>10:00 AM</option>
  <option value=11>11:00 AM</option>
  <option value=12>12:00 PM</option>
  <option value=13>1:00 PM</option>
  <option value=14>2:00 PM</option>
  <option value=15>3:00 PM</option>
  <option value=16>4:00 PM</option>
  <option value=17>5:00 PM</option>
  <option value=18>6:00 PM</option>
  <option value=19>7:00 PM</option>
  <option value=20>8:00 PM</option>
  <option value=21>9:00 PM</option>
  <option value=22>10:00 PM</option>
  <option value=23>11:00 PM</option>
</select>
<select name = 'sort'>
  <option value=" No Sort"></option>
  <option value=" High">Highest to Lowest</option>
  <option value=" Low">Lowest to Highest</option>
</select>
<input type="submit" value="Go" />
</form>

<?php
echo "hi"
?>

  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(
        <?php 
        $hour = $_POST['hour'];
        $sort = $_POST['sort'];
        echo exec('python ScrapeUpdate.py'. " ". $hour . $sort, $retval, $retval2);
        ?>
        );

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
<?php
echo exec('python ScrapeUpdate.py', $retval, $retval2);
?>