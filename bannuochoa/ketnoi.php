<?php
	$con = mysqli_connect("localhost","root","","bannuochoa");
	if($con){
		// mysqli_query($con,"character set utf8");
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}else{
		die();
	}

	function formatMoney($number, $fractional=false) {  
	    if ($fractional) {  
	        $number = sprintf('%.2f', $number);  
	    }  
	    while (true) {  
	        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);  
	        if ($replaced != $number) {  
	            $number = $replaced;  
	        } else {  
	            break;  
	        }  
	    }  
	    return $number;  
	}

	function rutnganten($ten) {  
		if(strlen($ten)>20){

	    	$ten = substr($ten, 0,20)."...";
		}
		return $ten;
	}
?>