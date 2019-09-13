<!DOCTYPE html>

<html>
<head>
	<title> Multiplication Table </title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
	<table id='table'>
		<caption style="margin-bottom:10px; font-size:20px; font-weight: bold; color: #104050;"> 
				Multiplication Table
		</caption>
		
		<?php

		require "class/calculator.class.php";
		
		/* Prvom for petljom kreiramo vrste tabele (table rows),
		 * a drugom kolone tabele (table data/cells)
		 */
		for ($row = 0; $row <= 10; $row++) {
			echo "<tr> \n";
			for ($column = 0; $column <= 10; $column++) {
				
				/* Ako su indeksi vrste i kolone 0 (tj. row=column=0)
    			 *  tada se u to polje tabele ništa ne upisuje 
				 */
				if($row == 0 && $column == 0)
					echo '<td style="background-color:#ffffcc">	</td>';
				
				/* U prvu vrstu tabele ispisujemo brojeve od 1 od 10 
				 * (to je vrsta sa indeksom row=0 ali izuzimamo prvo polje tabele koje je prazno) 
				 */
				else if($row == 0 && $column != 0)
						echo "<td class='th'>$column</td>";
				
				/* U prvu kolonu tabele ispisujemo brojeve od 1 do 10
  				 * (to je kolona sa indeksom j=0 ali izuzimamo prvo polje tabele koje je prazno)
				 */
				else if ($row != 0 && $column == 0)
					echo "<td class='th'>$row</td>";
				
				else {
					
					//Kreiramo novi objekat klase Calculator
					$calc = new calculator($row,$column);
					
					/*  Unutar ćelija tabele čuvamo vrijednosti koje su inicijalno sakrivene, klikom na neku
					 *  ćeliju se prikazuju ti podaci metodom onclick, takođe odovojeno čuvamo faktore i rezultat množenja
					 *  da bismo ih kasnije lakše sačuvali u bazi 
					 */
					echo '
							<td class="math">
								<input readonly class="review" style="visibility: hidden" type="text" id="review" name="review" value="'.$row.'×'.$column.'"/>
								<input readonly type="hidden" name="factor1" id="factor1" value="'.$row.'"/>
								<input readonly type="hidden" name="factor2" id="factor2" value="'.$column.'"/>
								<input readonly type="hidden" name="result" id="result" value="'.$calc->multiply().'"/>	
							</td>
						';
					echo "\n";
					}
				}
				echo "</tr>";
			}
		?>
	</table>
	
	<script src="js/calculator.js"></script>
</body>
 
</html>