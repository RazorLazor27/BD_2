<?php include 'base_top.php' ?>

  <div id="TOP10">

    <div class="Filtros">

      <h1>Filtros</h1>

      <div>

        <form action="../php/top.php">
          <label for="tipodeplato">Tipo de plato:</label>
          <select name="tipodeplato" id="tipodeplato">
            <option value="nones">Cualquiera</option>
            <option value="entrada">Plato de Entrada</option>
            <option value="fondo">Plato de Fondo</option>
            <option value="postre">Postre</option>
          </select>
          <br><br>
        <input type="checkbox" id="diabetico" name="diabetico" value="diabetico">
        <label for="vehicle1"> Apto para diabéticos</label><br>
        <input type="checkbox" id="lactosa" name="lactosa" value="lactosa">
        <label for="vehicle2"> Apto para intolerantes a la lactosa</label><br>
        <input type="checkbox" id="gluten" name="gluten" value="gluten">
        <label for="vehicle3"> Contiene gluten</label><br>
        <input type="checkbox" id="vegano" name="vegano" value="vegano">
        <label for="vehicle3"> Apto para veganos</label><br><br>
        <input type="submit" value="Aplicar">
        </form>

      </div>

    </div>

    <div>

    </div>

  </div>

<?php include 'base_bottom.php' ?>