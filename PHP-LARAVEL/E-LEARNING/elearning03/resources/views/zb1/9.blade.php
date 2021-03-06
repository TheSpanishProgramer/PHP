<!-- NAVIGATION WITH INSTRUCTIONS: SEE STYLEGUIDE FOR FURTHER DOCS -->

<form id="questionform" >
<input name="questionid" type="hidden" value="9" />
<input name="answeredQuestions" type="hidden" id="answeredQuestions" value="<?php echo $viewHelper->getItemsCompleteAnswered('h'); ?>" />

	{{ csrf_field() }}
      <nav data-equalizer>
          
      	<div id="instructions" class="" data-equalizer-watch>
          <h5><b>Teil 2</b> <span class="estimated-time"> </span></h5>
          <p>Sie hören nun einen Text. Sie hören den Text <b>einmal</b>. Dazu lösen Sie fünf Aufgaben.<br> Wählen Sie bei jeder Aufgabe die richtige Lösung 
            <input type='checkbox' name='chkbx' value='' id="chkbx1" disabled/><label class="small" for="chkbx1">a</label>, 
            <input type='checkbox' class="small" name='chkbx' value='' id="chkbx2" disabled/><label class="small" for="chkbx2">b</label> oder 
            <input type='checkbox' class="small" name='chkbx' value='' id="chkbx3" disabled/><label class="small" for="chkbx3">c</label>.<br>
            Lesen Sie jetzt die Aufgaben 11 bis 15. Dazu haben Sie 60 Sekunden Zeit.<br><br>
            <small><i>Sie nehmen an einer Führung durch das Münchner Stadtmuseum teil.</i></small>
          </p>
        </div>
        <a onClick="loadQuestion('zb1',8);changeMP3(1);" class="nav-button prev" data-equalizer-watch>
          <i class="fa fa-angle-left fa-2x"></i>
        </a>
        <a onClick="loadQuestion('zb1',10);changeMP3(3);" class="nav-button next" data-equalizer-watch>
          <i class="fa fa-angle-right fa-2x"></i>
        </a>
      </nav>
      <!-- //NAVIGATION WITH INSTRUCTIONS: SEE STYLEGUIDE FOR FURTHER DOCS -->
    
      <!-- CONTENT SECTION: SEE STYLEGUIDE FOR FURTHER DOCS -->
 				<section id="content" data-equalizer>
        <div class="top" data-equalizer-watch>
        	<div class="section-title"><h5></h5></div>
        </div>
        <div class="bottom" data-equalizer-watch>
        	<div class="section-title"><h5></h5></div>
        	<div class="item item-a-b-c">
        		<div class="number">11</div>
        		<div class="question">Das Museum ist ...</div>
        		<div class="answers">
        			<div class="a">
        				<div class="selector">
        				<input type="checkbox" name='h_11_a' {{ $viewHelper->getCheckedString('h_11_a') }} 
        				value='1' id="chkbx11a"/><label for="chkbx11a" class="small">a</label>
        				</div>
        				<div class="answer">
        					<span>sehr voll.</span>
        				</div>
        			</div>
        			<div class="b">
        				<div class="selector">
        				<input type="checkbox" name='h_11_b' {{ $viewHelper->getCheckedString('h_11_b') }} 
        				value='1' id="chkbx11b"/><label for="chkbx11b" class="small">b</label>
        				</div>
        				<div class="answer">
        					<span>teilweise geschlossen.</span>
        				</div>
        			</div>
        			<div class="c">
        				<div class="selector">
         				<input type="checkbox" name='h_11_c' {{ $viewHelper->getCheckedString('h_11_c') }} 
        				value='1' id="chkbx11c"/><label for="chkbx11c" class="small">c</label>
        				</div>
        				<div class="answer">
        					<span>ziemlich leer.</span>
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="item item-a-b-c">
        		<div class="number">12</div>
        		<div class="question">Was zeigt der Museumsführer den Touristen?</div>
        		<div class="answers">
        			<div class="a">
        				<div class="selector">
        				<input type="checkbox" name='h_12_a' {{ $viewHelper->getCheckedString('h_12_a') }} 
        				value='1' id="chkbx12a"/><label for="chkbx12a" class="small">a</label>
        				</div>
        				<div class="answer">
        					<span>alle Ausstellungen.</span>
        				</div>
        			</div>
        			<div class="b">
        				<div class="selector">
        				<input type="checkbox" name='h_12_b' {{ $viewHelper->getCheckedString('h_12_b') }} 
        				value='1' id="chkbx12b"/><label for="chkbx12b" class="small">b</label>
        				</div>
        				<div class="answer">
        					<span>die Hauptaustellung.</span>
        				</div>
        			</div>
        			<div class="c">
        				<div class="selector">
         				<input type="checkbox" name='h_12_c' {{ $viewHelper->getCheckedString('h_12_c') }} 
        				value='1' id="chkbx12c"/><label for="chkbx12c" class="small">c</label>
        				</div>
        				<div class="answer">
        					<span>die Sonderausstellungen.</span>
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="item item-a-b-c">
        		<div class="number">13</div>
        		<div class="question">Wo ist der Treffpunkt am Nachmittag?</div>
        		<div class="answers">
        			<div class="a">
        				<div class="selector">
								<input type="checkbox" name='h_13_a' {{ $viewHelper->getCheckedString('h_13_a') }} 
        				value='1' id="chkbx13a"/><label for="chkbx13a" class="small">a</label>
        				</div>
        				<div class="answer">
        					<span>am Eingang.</span>
        				</div>
        			</div>
        			<div class="b">
        				<div class="selector">
								<input type="checkbox" name='h_13_b' {{ $viewHelper->getCheckedString('h_13_b') }} 
        				value='1' id="chkbx13b"/><label for="chkbx13b" class="small">b</label>
        				</div>
        				<div class="answer">
        					<span>an der Garderobe.</span>
        				</div>
        			</div>
        			<div class="c">
        				<div class="selector">
								<input type="checkbox" name='h_13_c' {{ $viewHelper->getCheckedString('h_13_c') }} 
        				value='1' id="chkbx13c"/><label for="chkbx13c" class="small">c</label>
        				</div>
        				<div class="answer">
        					<span>im Café.</span>
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="item item-a-b-c">
        		<div class="number">14</div>
        		<div class="question">Die Ausstellung beschäftigt sich mit ... </div>
        		<div class="answers">
        			<div class="a">
        				<div class="selector">
								<input type="checkbox" name='h_14_a' {{ $viewHelper->getCheckedString('h_14_a') }} 
        				value='1' id="chkbx14a"/><label for="chkbx14a" class="small">a</label>
        				</div>
        				<div class="answer">
        					<span>dem Oktoberfest.</span>
        				</div>
        			</div>
        			<div class="b">
        				<div class="selector">
								<input type="checkbox" name='h_14_b' {{ $viewHelper->getCheckedString('h_14_b') }} 
        				value='1' id="chkbx14b"/><label for="chkbx14b" class="small">b</label>
        				</div>
        				<div class="answer">
        					<span>der bayrischen Küche.</span>
        				</div>
        			</div>
        			<div class="c">
        				<div class="selector">
								<input type="checkbox" name='h_14_c' {{ $viewHelper->getCheckedString('h_14_c') }} 
        				value='1' id="chkbx14c"/><label for="chkbx14c" class="small">c</label>
        				</div>
        				<div class="answer">
        					<span>der Geschichte Münchens.</span>
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="item item-a-b-c">
        		<div class="number">15</div>
        		<div class="question">Der Museumsführer empfiehlt den Teilnehmern einen ...</div>
        		<div class="answers">
        			<div class="a">
        				<div class="selector">
 								<input type="checkbox" name='h_15_a' {{ $viewHelper->getCheckedString('h_15_a') }} 
        				value='1' id="chkbx15a"/><label for="chkbx15a" class="small">a</label>
        				</div>
        				<div class="answer">
        					<span>Restaurantbesuch.</span>
        				</div>
        			</div>
        			<div class="b">
        				<div class="selector">
 								<input type="checkbox" name='h_15_b' {{ $viewHelper->getCheckedString('h_15_b') }} 
        				value='1' id="chkbx15b"/><label for="chkbx15b" class="small">b</label>
        				</div>
        				<div class="answer">
        					<span>Cafébesuch.</span>
        				</div>
        			</div>
        			<div class="c">
        				<div class="selector">
 								<input type="checkbox" name='h_15_c' {{ $viewHelper->getCheckedString('h_15_c') }} 
        				value='1' id="chkbx15c"/><label for="chkbx15c" class="small">c</label>
        				</div>
        				<div class="answer">
        					<span>Biergartenbesuch.</span>
        				</div>
        			</div>
        		</div>
        	</div>
      </section>
 </form>