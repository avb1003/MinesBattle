<?php
echo "<table border='1'>\n";
echo "<tr>";
echo "<td>";
echo "<table border='1'>\n";
$images_old=array (
"bang", "face-cool", "face-sad", "face-smile", "face-win", "face-worried", "flag-question", "flag", "mine", "warning");
$images=array( "Bump", "closed", "Empty", "Five", "flag-question", "Four", "MineFlag", "mine", "One",
			"Three", "Two");
	trh("names","Icons");
 foreach($images as $i) {
	tr($i,img($i) );
 }
echo "</table>";
echo "</td>";
 $m=10; $n=10;
echo "<td>";
    echo "<table border='1'>\n";
    for($i=0;$i<$m;$i++) {
	echo "<tr>";
	for($j=0;$j<$n;$j++) {
	    td(img($images[($j+$i*$n)%count($images)]));
	}
	echo "</tr>";
    }
echo "</table>";
echo "</td>";
echo "</tr>";
echo "</table>";
?>

