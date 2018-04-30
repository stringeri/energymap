<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Hour', 'Location', 'Price'], 
          ['1:00', 'CADICKS_804V', '23.58'], 
          ['1:00', 'ADICKS__138B', '23.59'], ['1:00', 'ADICKS__8030', '23.59'], 
          ['1:00', 'ADK_V_C', '23.59'], ['1:00', 'CADICKS_804O', '23.59'], 
          ['1:00', 'CADICKS_804N', '23.59'], ['1:00', 'ADICKS__345A', '23.59'], 
          ['1:00', 'ADICKS_345C', '23.59'], ['1:00', 'ADICKS_138N', '23.58'], ['1:00', 'ADICKS_138D', '23.59'], 
          ['1:00', 'DUN_138A', '23.6'], 
          ['1:00', 'DUN_138B', '23.6'], ['1:00', 'DUN_TR1', '23.6'], ['1:00', 'DUN_TR2', '23.6'], 
          ['1:00', 'DUN_8000', '23.6'], ['1:00', 'DUN_8005', '23.6'], 
          ['1:00', 'DUN_8020', '23.6'], ['1:00', 'DUN_TR3', '23.6'], ['1:00', 'DPO_138A', '23.59'], 
          ['1:00', 'DPO_8000', '23.59'], ['1:00', 'DPO_TR1', '23.59'], 
          ['1:00', 'DPO_TR2', '23.59'], ['1:00', 'DPO_8005', '23.59'], ['1:00', 'DPO_138B', '23.59'], 
          ['1:00', 'DPO_8015', '23.59'], ['1:00', 'ETP_1', '25.56'], 
          ['1:00', 'ETP_2', '25.56'], ['1:00', 'CPCSUB9_1', '23.54'], ['1:00', 'CPCSUB9_2', '23.54'], 
          ['1:00', 'CP_LN6', '23.54'], ['1:00', 'CP_LN5', '23.54'], 
          ['1:00', 'CP_16', '23.54'], ['1:00', 'CP_17', '23.54'], ['1:00', 'BNT_TR5', '23.59'], 
          ['1:00', 'TNFM524___0A', '23.54'], ['1:00', 'TNFM524___1T', '23.54'], 
          ['1:00', 'TNFM524___1U', '23.54'], ['1:00', 'TNFM524___1V', '23.54'], ['1:00', 'CTG1', '23.56'], 
          ['1:00', 'CTG2', '23.56'], ['1:00', 'CTG3', '23.56'], 
          ['1:00', 'CTG4', '23.56'], ['1:00', 'CTG5', '23.56'], ['1:00', 'CTG6', '23.56'], 
          ['1:00', 'BAC_138A', '23.56'], ['1:00', 'EB_101', '23.56'], 
          ['1:00', 'EB_201', '23.56'], ['1:00', 'EB_601', '23.56'], ['1:00', 'EB_501', '23.56'], 
          ['1:00', 'EB_401', '23.56'], ['1:00', 'EB_301', '23.56'], 
          ['1:00', 'BAC_0926', '23.56'], ['1:00', 'VANHUMBLE', '27.9'], ['1:00', 'CALHOUN_UN1', '30.67'], 
          ['1:00', 'CALHOUN_UN2', '30.67'], ['1:00', 'CALHN_LD', '30.67'],
          ['1:00', 'LSBUS', '30.67'], ['1:00', 'CALHN_LN', '30.67'], ['1:00', 'STP_GN1___1', '23.43'], 
          ['1:00', 'STP_GN2___2', '23.43']]);

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
</html>
