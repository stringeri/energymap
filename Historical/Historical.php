<html>
<form method="post">
<select name = 'hour'>
  <option value=0>12</option>
  <option value=1>1</option>
  <option value=2>2</option>
  <option value=3>3</option>
  <option value=4>4</option>
  <option value=5>5</option>
  <option value=6>6</option>
  <option value=7>7</option>
  <option value=8>8</option>
  <option value=9>9</option>
  <option value=10>10</option>
  <option value=11>11</option>
</select>
<select name = 'minute'>
  <option value=0>:00 AM</option>
  <option value=1>:15 AM</option>
  <option value=2>:30 AM</option>
  <option value=3>:45 AM</option>
  <option value=4>:00 PM</option>
  <option value=5>:15 PM</option>
  <option value=6>:30 PM</option>
  <option value=7>:45 PM</option>
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
        $minute = $_POST['minute'];
        $search = $_POST['search'];
        $start = 0;
        echo exec('python ScrapeUpdate.py'. " ". $hour . " " . $minute . $sort . " ". $search. " ". $start, $retval, $retval2);
        ?>
        );

        var options = {
          chart: {
            title: 'Historical Electricity Costs',
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
  </body>
</html>