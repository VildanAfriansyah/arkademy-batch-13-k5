<?php
	function Angka($input){
		if(!preg_match('/^(?=.*[0-9])/', $input)){
			echo "Input Harus Angka";
		}
		for($x=1;$x<=$input;$x++){
			if($x % 3 != 0 && $x % 7 != 0){
				echo $x;
			}
			if($x % 3 == 0){
				echo "Arka";
			}else{}
			if($x % 7 == 0 ){
				echo "Demy";
			}
		}
	}

	angka("21");
?>