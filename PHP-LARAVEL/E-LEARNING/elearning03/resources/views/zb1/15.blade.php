<script>
$('#grouptitle').html('<b>Zertifikat B1</b> Modellsatz Sprechen</h4>');
</script>
<!-- NAVIGATION WITH INSTRUCTIONS: SEE STYLEGUIDE FOR FURTHER DOCS -->
<form id="questionform" >
<input name="questionid" type="hidden" value="14" />
	{{ csrf_field() }}
      <nav data-equalizer>
        <div id="instructions" class="" data-equalizer-watch>
          <h5><b>Teil 2</b> <span class="estimated-time"> Dauer: circa drei Minuten</span></h5>
  Ein Thema präsentieren.<br><br>
        </div>
         <a onClick="loadQuestion('zb1',14);" class="nav-button prev" data-equalizer-watch>
          <i class="fa fa-angle-left fa-2x"></i>
         </a>
          <a  class="nav-button next" onClick="loadQuestion('zb1',16);" data-equalizer-watch>
          <i class="fa fa-angle-right fa-2x"></i>
          </a>
      </nav>
      <!-- //NAVIGATION WITH INSTRUCTIONS: SEE STYLEGUIDE FOR FURTHER DOCS -->
    
      <!-- CONTENT SECTION: SEE STYLEGUIDE FOR FURTHER DOCS -->
      
      <section id="content" data-equalizer>
  		<div class="left" data-equalizer-watch>
  			<div style="padding-left:10px;padding-top:10px;">
  			
  Sie sollen Ihren Zuhörern ein aktuelles Thema präsentieren. Dazu finden Sie hier fünf Folien.<br>
Folgen Sie den Anweisungen links und schreiben Sie Ihre Notizen und Ideen rechts daneben.<br/><br/>
    		  	<div class="item item-a-b-c">
        			<div class="question">
        					Stellen Sie Ihr Thema vor. Erklären Sie den Inhalt und die Struktur Ihrer Präsentation.
        			</div>
        			<div class="answers">
        				<img src="/assets/img/Fernsehen1.png" />
        			</div>
        		</div>
        		<div class="item item-a-b-c">
        			<div class="question">
        					Berichten Sie von Ihrer Situation oder einem Erlebnis im Zusammenhang mit dem Thema.
        			</div>
        			<div class="answers">
        				<img src="/assets/img/Fernsehen2.png" />
        			</div>
        		</div>
        		<div class="item item-a-b-c">
        			<div class="question">
        					Berichten Sie von der Situation in Ihrem Heimatland und geben Sie Beispiele.
        			</div>
        			<div class="answers">
        				<img src="/assets/img/Fernsehen3.png" />
        			</div>
        		</div>
        		<div class="item item-a-b-c">
        			<div class="question">
        					Nennen Sie die Vor- und Nachteile und sagen Sie dazu Ihre Meinung. Geben Sie auch Beispiele.
        			</div>
        			<div class="answers">
        				<img src="/assets/img/Fernsehen4.png" />
        			</div>
        		</div>
        		<div class="item item-a-b-c">
        			<div class="question">
        					Beenden Sie Ihre Präsentation und bedanken Sie sich bei den Zuhörern.
        			</div>
        			<div class="answers">
        				<img src="/assets/img/Fernsehen5.png" />
        			</div>
        		</div>
        	</div>
  		</div>
  		<div class="right" data-equalizer-watch>
    		<div style="padding-left:10px;padding-top:10px;">
    			    			<div class="section-title">
            		<h5>Leistungsbeispiel</h5>
    				<a id="showvideobtn" href="#" onClick="$('#examplebox').show();$('#showvideobtn').hide();" class="primary hollow large button">Leistungsbeispiel anzeigen</a>
				</div>
    			<div id="examplebox" style="display:none;">
    				<p>
    					Dieses Video ist ein Beispiel für eine sehr gute Leistung auf Niveau B1.<br/>
						Die mündliche Prüfung wird in der Regel als Paarprüfung durchgeführt. Einzelprüfungen<br/>
						finden nur in Ausnahmefällen statt.<br/>
    				</p>
					<video width="540" height="360" controls>
 			 			<source src="/assets/mp4/2Teil_Maristela_neu.mp4" type="video/mp4">
  						Ihr Browser unterstützt leider keine Videos!
					</video>
				</div>
			</div>
  		</div>
	</section>
 </form>
