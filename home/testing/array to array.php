<?php
// Sample python list 
$data = '[["1","2","3","4"],["11","12","13","14"],["21","22","23","24"]]';

// Removing the outer list brackets
$data =  substr($data,1,-1);

$myArr = array();
// Will get a 3 dimensional array, one dimension for each list
$myArr =explode('],', $data);

// Removing last list bracket for the last dimension
if(count($myArr)>1)
$myArr[count($myArr)-1] = substr($myArr[count($myArr)-1],0,-1);

// Removing first last bracket for each dimenion and breaking it down further
foreach ($myArr as $key => $value) {
 $value = substr($value,1);
 $myArr[$key] = array();
 $myArr[$key] = explode(',',$value);
}
echo $myArr;
//echo array_values( array($myArr[0][0][0]) );
echo $myArr[0][0];
foreach ($myArr as $product) {
  echo $product[0];
};
?>
