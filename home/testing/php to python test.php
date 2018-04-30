

<?php 
$hello = 1;
$hello2 = " worlds";

$result = shell_exec('python testme.py ' . $hello . $hello2);
echo $result;
        ?>