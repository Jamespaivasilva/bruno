<?php

	function getMoeda($array=[]){

		$i = 0;
		while($i <  count($array, COUNT_RECURSIVE)) {
		    $array[$i] = "R$ " . number_format($array[$i], 2, ',', '.');		    
		    $i++;
    	}
    	return $array;
    }   
?> 