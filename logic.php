
		<?php
		#error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
		#ini_set('display_errors', 1); # Display errors on page (instead of a log file)
		$numAppend = rand(0,9);
		$symAppend = randSym();

			function getAdverb(){
				$adverbs = file("Sources/POS_Lists/adverbs.txt", FILE_IGNORE_NEW_LINES);
				return $adverbs[array_rand($adverbs)];
			}

			function getAdjective(){
				$adjectives = file("Sources/POS_Lists/adjectives.txt", FILE_IGNORE_NEW_LINES);
				return $adjectives[array_rand($adjectives)];
			}

			function getNoun(){
				$nouns = file("Sources/POS_Lists/nouns.txt", FILE_IGNORE_NEW_LINES);
				return $nouns[array_rand($nouns)];
			}

			function getVerb(){
				$verbs = file("Sources/POS_Lists/verbs.txt", FILE_IGNORE_NEW_LINES);
				$randVerb = $verbs[array_rand($verbs)];
				if (substr($randVerb, -1) == 's' || substr($randVerb, -1) == 'h' || substr($randVerb, -1) == 'x') {
					$randVerb = $randVerb."es";
				}
				elseif (substr($randVerb, -1) == 'y' && !(substr($randVerb, -2) == "ey" || substr($randVerb, -2) == "uy" || substr($randVerb, -2) == "oy" || substr($randVerb, -2) == "ay")) {
					$randVerb = rtrim($randVerb,"y")."ies";
				}
				else {
					$randVerb = $randVerb."s";
				}
				return $randVerb;
			}

			function passwordGenerator($pwdLength = 3){
				$passwordArray = array();
				for ($i=0; $i < $pwdLength; $i++) {
					switch ($i) {
					 	case 0:
					 		$passwordArray[$i] = getAdverb();
					 		break;

					 	case 1:
					 		$passwordArray[$i] = getAdjective();
					 		break;

					 	case 2:
					 		$passwordArray[$i] = getNoun();
					 		break;

					 	case 3:
					 		$passwordArray[$i] = getVerb();
					 		break;

					 	case 4:
					 		$passwordArray[$i] = getAdverb();
					 		break;
					}
				}
				return $passwordArray;
			}

			function randSym(){
				$symArray = ['!','@','#','$','%','^','&','*'];
				return $symArray[rand(0,7)];
			}
			$newPassword = passwordGenerator($_GET["maxLength"],$_GET["symReq"],$_GET["numReq"]);


			//Getting mnemonic image to aid memory
			#$url = "https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=".$newPassword[1]."%20".$newPassword[2]."&userip=INSERT-USER-IP";

			// sendRequest
			#$ch = curl_init();
			#curl_setopt($ch, CURLOPT_URL, $url);
			#curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			#curl_setopt($ch, CURLOPT_REFERER, "localhost");
			#$body = curl_exec($ch);
			#curl_close($ch);

			//process the JSON string
			#$json = json_decode($body, TRUE);
			#$results = $json['responseData']['results'][0];
			?>

