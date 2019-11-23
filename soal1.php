<?php
	function Json($name,$age,$address,$hobbies,$maried,$list_school,$skills,$interest){
		$data = array(
			'name' 					=>	$name,
			'age' 					=>	$age,
			'address'				=>	$address,
			'hobbies'				=>	$hobbies,
			'is_maried'				=>	$maried,
			'school' 				=> 	$list_school,
			'skills' 				=>	$skills,
			'interest_incoding'		=>	$interest);

		return json_encode($data);
	}

	$name = "Vildan Romli Afriansyah Putra";
	$age = 18;
	$address = "Kap. Parung Desa Bojongkulur Kab. Bogor RT 01/RW 12";
	$hobbies = ['membaca', 'ngoding'];
	$is_maried = false;
	$list_school = array(
			'Name' => 'SMK AL-Bahri',
			'years_in' => '2016',
			'year_out' => '2019',
			'major' => null);
	class Skill{
		public $skill_name;
		public $level;
	}

	$skill1 = new Skill();
	$skill1->skill_name = "Code Igniter";
	$skill1->level = "Beginer";

	$skill2 = new Skill();
	$skill2->skill_name = "Native";
	$skill2->level = "Advance";

	$skills = [$skill1,$skill2];
	$interest_incoding = true;


	echo Json($name,$age,$address,$hobbies,$is_maried,$list_school,$skills,$interest_incoding);
?>