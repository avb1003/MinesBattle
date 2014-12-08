<?php
function trace($a) {
    if($_SERVER['argc']) print($a);
}
function trace_r($a) {
    if($_SERVER['argc']) print_r($a);
}
function href($r,$t=0) {
	trace("href:<a href=\"".$r."\">".($t?$t:$r)."</a>");
    return "<a href=\"".$r."\">".($t?$t:$r)."</a>";
}
function sign($a) {return ($a>=0)?1:-1;}
function cmp($a, $b) {
global $key;
$k=abs($key);
	if($a[$k-1] == $b[$k-1]) {
	    return 0;
	}
	return (sign($key)*(($a[$k-1] < $b[$k-1]) ? -1 : 1));
}
function h($l,$d) {
    echo "<h$l>".$d."</h$l>\n";
}
function td($d) {
    echo "<td>".$d."</td>";
}
function td_id($d,$id) {
    echo "<td id=\"".$id."\">".$d."</td>";
}
function th($d) {
    echo "<th>".$d."</th>";
}
function tr() {
    $numargs = func_num_args();
    $args = func_get_args();
    if($numargs==1 && is_array($args[0])) {
    	$args=$args[0];
    }
    echo "<tr>".implode("",array_map("td",$args))."</tr>"."\n";
}
function trh() {
    $numargs = func_num_args();
    $args = func_get_args();
    if($numargs==1 && is_array($args[0])) {
    	$args=$args[0];
    }
    echo "<tr>".implode("",array_map("th",$args))."</tr>"."\n";
}
function array_slice_assoc($array,$keys) {
    return array_intersect_key($array, array_flip($keys)); 
}
?>
