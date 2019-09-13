<?php

	class calculator{
		
		//Atributi klase calculator
		private $factor1=0;
		private $factor2=0;
		private $result;
		
		//Konstruktor
		function __construct($fact1, $fact2){
			$this->factor1 = $fact1;
			$this->factor2 = $fact2;
		}
	 
		//Metod za množenje faktora, vraća proizvod 
		function multiply(){
			$this ->  result = $this -> factor1 * $this -> factor2;
			return $this->result; 
		}		
	}
?>