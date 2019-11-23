<?php
	function validasi_username($username){
		if(preg_match('/^(?=.*[a-z])(?!.*[A-Z])(?!.*[0-9]).{3,5}/', $username)){
			echo '<br> - valid username ('.$username.')<br>';
			echo '-	return true<br>';
		}else{
			echo '<br> - valid username ('.$username.')<br>';
			echo '-	return false<br>';
		}
	}

	function validasi_password($password){
		if(preg_match('/^(?!.*[a-z])(?=.*[0-9]).{3}(?=.*[-])(?=.*[A-Z]).{4}/', $password)){
			echo '<br> - valid password ('.$password.')<br>';
			echo '-	return true<br>';
		}else{
			echo '<br> - valid password ('.$password.')<br>';
			echo '-	return false<br>';
		}
	}

	echo validasi_username("tania");
	echo validasi_username("Eka");
	echo validasi_password("021-333BUDI");
	echo validasi_password("021*444DEA");
	echo validasi_password("987-654Oliv");
?>