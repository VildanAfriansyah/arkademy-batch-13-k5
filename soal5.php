<?php
	$data = array(5,13,7,5,9,20,9,5,14);
	$jenis[] = null;
	$i = 0;
	for($x=0;$x<count($data);$x++){
		$index2 = array_search($data[$x], $jenis);
		if($index2 == ""){
			$jenis[$i] = $data[$x];
			$i++;
		}
	}

	cari($data,$jenis);

	function cari($data, $data2){
		for($x=0;$x < count($data2);$x++){
			echo $data2[$x]."=".yangsama($data,$data2[$x])."<br>";
		}
	}

	function yangsama($data,$sama){
		$nb=0;
		foreach ($data as $key => $d) 
		if($d==$sama)$nb++;
		return $nb;
	}
?> 