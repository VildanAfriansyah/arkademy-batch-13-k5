<?php
	function Singkatan($input){
		$hasil = '';
		$pisah = str_split($input);
		for($x=0;$x<count($pisah);$x++){
			if(preg_match('/^(?=.*[A-Z])/', $pisah[$x])){
				$hasil .= $pisah[$x]; 
			}
		}
		echo $hasil."<br>";
	}

	Singkatan("Negara Kesatuan Republik Indonesia");
	Singkatan("JAwa TIMur");
?>