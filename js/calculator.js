
$(".math").on({
                click: function() {

                    /** Mijenjamo visibility celije sa 'hidden' na 'visible' 
					 */
                    this.children[0].style.visibility='visible';

                    /**  Provjeramo da li je neko polje vec otkriveno, ako jeste ne upisuje ga u bazu					
					 *   i ispisuje poruku, a ako nije saljemo podatke na obradu. 
					 */
                    if ($( this ).hasClass( "clicked" )) {
                        console.log('Clicked already!');
                    } else {
						
                        /** Cuvamo vrijednosti u varijable
                         *  children[indeks] uzima child-e ".math" elementa i shodno indeksu selektuje
                         *  value ce uzeti ono sto je pod atributom "value" u html kodu.
                         */
                        let factor1 = this.children[1].value;
                        let factor2 = this.children[2].value;
                        let result = this.children[3].value;
						
						/** Saljemo podatke na obradu AJAXOM i to post metodom, 
						 *  ako je cuvanje u bazu uspjesno bicemo obavjesteni alert-om
						 */
                        $.ajax({
                            url: 'includes/config.php',
                            type: 'post',
                            data: {
                                'factor1' : factor1,
                                'factor2' : factor2,
                                'result'  : result
                            },
                            success: function () {
                                alert("Data added successfully!");
                            }
                        });
                    }
                    /** Nakon sto se zapis unese u bazu, dodajemo klasu "clicked" kojom cemo kasnije
                     *  provjeravati da li je polje vec jednom otvoreno
                     */
                    $(this).addClass('clicked');
                }
            });