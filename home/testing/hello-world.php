<html><body>
<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

echo 'Hello world from Clouasdd9!';

$command = escapeshellcmd('/workspace/Test.py');
$output = shell_exec($command);
echo $output;
echo "Line 312";
system('cd && cd && cd && cd && cd workpspace && python Test.py');
$last_line = exec('python Test.py', $retval, $retval2);
// Printing additional info
echo '
</pre>
<hr />Last line of the output: ' . $last_line . '
<hr />Return value: ' . $retval2;

?>
</body>
</html>