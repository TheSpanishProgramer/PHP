<div class="row uniform">
      <!-- datos personales -->
  <div class="12u 12u$(xsmall)">
    <div class="select-wrapper">
      <h3>Seleccione el  Grado </h3>
      <hr>
      <select name="grado" id="grado" onchange="populate(this.id,'sede')">
        <option value="">- Seleccion el Grado -</option>
        <option value="prescolar">Prescolar</option>
        <option value="primero">Primero -  1</option>
        <option value="segundo">Segundo -  2</option>
        <option value="tercero">Tercero -  3</option>
        <option value="cuarto">Cuarto   -  4</option>
        <option value="quinto">Quinto   -  5</option>
        <option value="sexto">Sexto   -  6</option>
        <option value="septimo">Septimo -  7</option>
        <option value="octavo">Octavo -  8</option>
        <option value="noveno">Noveno -  9</option>
        <option value="decimo">Decimo -  10</option>
        <option value="once">Once -  11</option>

      </select>
    </div>
	</div>
  <div class="12u$ 12u$(xsmall)">
    <div class="select-wrapper">
      <hr>

        <h3>Seleccione la Sede</h3>
        <hr>
        <select id="sede" name="sede" onchange="populate2(this.id,'jornada')">

        </select>
    <hr>
    </div>
  </div>

  <div class="12u$ 12u$(xsmall)">
    <div class="select-wrapper">
      <h3>Seleccione la Jornada</h3>
      <hr>
      <select id="jornada" name="jornada">

      </select>

    </div>
  </div>

  <!-- Break -->
  <div class="12u$">
    <ul class="actions">
      <li><input type="submit" value="Pre-matricularme" class="special" /></li>
      <li><input type="reset" value="Cancelar" /></li>
    </ul>
  </div>
</div>
