 <?php

// script dkbfvk --key=AK

// On recupère les parametres
$message = $argv[1];
$option = $argv[2];

function persoCrypt($msg,$option) {
	$result = "";
	if($option == "c"){ // Pour un cryptage
		$key = chr(rand(65,90)).chr(rand(65,90));
		echo $key;
	}else if($option == "d"){ // Pour un d2cryptage
		$key = substr($msg,-2);
		$key = $key[1].$key[0];
		$msg = substr($msg,0,-2);
	}
	$end = $key[1];
	$start = $key[0];
	if(ord($end)>ord($start)){ // Pour un clée dont la première lettre est inférieur à la second
		$pa = ord($end) - ord($start);
		//echo $pa; 
		for ($i=0;$i<strlen($msg);$i++){
				if($msg[$i]!=" "){
					$chr_N = ord($msg[$i])+$pa; 
					//echo $chr_N."\n";
					if($chr_N>90){
						$chr_N = 64 + ($chr_N - 90);
					}
					$result = $result.chr($chr_N);
				}else{
					$result = $result.$msg[$i];
				}		
			}
	}else { // Pour un clée dont la second lettre est inférieur à la première
		$pa = ord($start) - ord($end);	
		$pa = 90 - $pa;
		//echo "T".$pa."CC\n";
		for ($i=0;$i<strlen($msg);$i++){
		if($msg[$i]!=" "){
			$chr_N = ord($msg[$i])+$pa; 
			//echo $chr_N."\n";
			if($chr_N>90){
				$chr_N = $chr_N - 90;
				if($chr_N<65){
					$chr_N = 90-(64-$chr_N);
				}			
			}
			$result = $result.chr($chr_N);
		}else{
			$result = $result.$msg[$i];
		}
	
		
	}
	}
	
	if($option == "c"){
		$result = $result.$key;
	}

	return "result == ".$result."\n";
}


echo persoCrypt($message,$option);

?>
