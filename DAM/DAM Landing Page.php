<html>
<form method="post">
<select name = 'hour'>
  <option value=25>All Hours</option>
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
  <option value=" No_Sort"></option>
  <option value=" High">Highest to Lowest</option>
  <option value=" Low">Lowest to Highest</option>
</select>
  <input type="text" name="search" />
<input type="submit" value="Go" />
</form>

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
        $search = $_POST['search'];
        if ($search < "1") {
          $search = "None";}
        $start = "0";
        echo exec('python ScrapeUpdate.py'. " ". $hour . $sort . " ". $search, $retval, $retval2);
        ?>
        );

        var options = {
          chart: {
            title: 'DAM Electricity Costs',
            subtitle: '',
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
  <?php 
        $hour = $_POST['hour'];
        $sort = $_POST['sort'];
        $search = $_POST['search'];
        $start = "0";
        if ($search < "1") {
          $search = "None";}
        echo exec('python ScrapeUpdate.py'. " ". $hour . $sort . " ". $search, $retval, $retval2);
        ?>
  </body>
</html>

