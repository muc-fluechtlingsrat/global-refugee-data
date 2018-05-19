<!DOCTYPE html>
<html>
<body>
<?php
$file = fopen("data.js", "w");
$cache1 = file("koenigsstein_with_index.csv");
$cache2 = array();
for ($i = 1; $i < sizeof($cache1); $i+=1) {
  $cache2[$i] = explode(",",$cache1[$i]);
  echo $cache1[$i]."\t".sizeof($cache2[$i])."<br>";
  $cache3[$i] = "['".$cache2[$i][0]."',".$cache2[$i][5].",".$cache2[$i][7].",".str_replace("\n","",$cache2[$i][8])."],";
}
fwrite($file, "daten = [");
foreach($cache3 as $value) {
  fwrite($file,$value);
}
fwrite($file, "]");
?>
</body>
</html>