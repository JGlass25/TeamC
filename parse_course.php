<?php
if(isset($_POST['Input_Course'])){

$parse=$_POST['parse'];

if(isset($parse)){

	$a = explode("\n",$parse);
	$b = explode("| ",$a[0]);
	$d = explode("  ",$a[2]);
	$e = explode("Type: ",$a[10]);
	$f = explode("Room:",$a[10]);
	$ff = explode("\n",$f[1]);
	$g = explode("Building: ",$f[0]);
	$h = explode("  ",$a[11]);
	$i = explode("Type: ",$a[19]);
	$j = explode("Room:",$a[19]);
	$jj = explode("\n",$j[1]);
	$k = explode("Building: ",$j[0]);
	$l = explode("Instructor: ",$parse);
	$ll = explode("(Primary)",$l[1]);
	$m = explode("CRN: ",$parse);

	$coursename = $b[0];
	$courseinfo = $b[1];
	$day1 = $d[1];
	$room1 = $ff[0];
	$time1 = $e[0];
	$location1 = $g[1];
	$prof = $ll[0];
	$crn = $m[1];
	$day2 = $h[0];
	$room2 = $jj[0];
	$time2 = $i[0];
	$location2 = $k[1];
	
	if ($room2==NULL){
		$day2='N/A';
		$lab="N/A";
                $room2 = "N/A";
		$time2 = "N/A";
		$location2 = "N/A";
	}else{
		$lab = "Yes";
	}

	echo $coursename;	
	echo $courseinfo;
	echo $day1;
	echo $room1;
	echo $time1;
	echo $location1;
	echo $prof;
	echo $crn;
        echo $date;
	echo $lab;
	echo $day2;
	echo $room2;
	echo $time2;
	echo $location2;
}


 ?>
