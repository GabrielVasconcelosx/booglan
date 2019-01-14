<?php 

/**
 * Esta Classe é para uma analise de dados de dois textos
 */
class Booglan
{


	function __construct()
	{
		
	}


	public function getInfos($text){

			$return['text'] = $text;	
			$return['preposicoes'] = $this->getPreposiçoes($text);
			$return['verbos'] = $this->getVerbos($text);

			return json_encode($return);

	}


	public function getVerbos($texto){

			$text = explode(" ", $texto);
			$verb = "";
			$firstPerson ="";
			
			$dontword = array("r","t","c","d","b"); 
			
			foreach ($text as $txt) {
				if(strlen($txt) >= 8 && !in_array(substr($txt, -1), $dontword)){
						$verb++;
					}
				
				if(strlen($txt) >= 8 && !in_array(substr($txt, 0, 1), $dontword) && !in_array(substr($txt, -1), $dontword)){
						$firstPerson++;
				}
			}	
			$return['Verbos'] = $verb;
			$return['PrimeiraPessoa'] = $firstPerson;
			return $return;
	}


	public function getPreposiçoes($texto){

			$text = explode(" ", $texto); 
			$preposicao = "";
			$dontword = array("r","t","c","d","b"); 
			foreach ($text as $txt) {
				if(strlen($txt) == 5 && strpos($txt, 'l') === false && !in_array(substr($txt, -1), $dontword)){
						$preposicao++; 
					}
				
			}	

			// $return['preposicoes'] = $preposicao;
			return $preposicao;
 }



}
 ?>