<!-- seleciones del documento -->
<!-- <page backbottom="7mm">
  <page_header>
    <span>REPORTE GENERAL</span>
  </page_header>
  <page_footer>
    <div class="text-end bg-danger">SENATI [[page_cu]]/[[page_nb]]</div>
  </page_footer>

</page> -->


<h1 class="text-center text-xl"><?= $titulo; ?></h1>
<h3 class=" text-center">Reporte generado el día <?= $fechaActual ?></h3>

<table class=" table mt-3">
  <colgroup>
    <col style="width:5%;">
    <col style="width:25%;">
    <col style="width:20%;">
    <col style="width:15%;">
    <col style="width:15%;">
    <col style="width:10%;">
    <col style="width:10%;">

  </colgroup>

  <thead>
    <tr class="bg-info text-light">
      <th>ID</th>
      <th>Nombre</th>
      <th>Nombre Real</th>
      <th>Raza</th>
      <th>Alineamiento</th>
      <th>Altura</th>
      <th>Peso</th>
    </tr>
  </thead>
  <tbody>

    <?php
    foreach ($datosSH as $row) {
      echo "
        <tr>
          <td>{$row['id']}</td>
          <td>{$row['superhero_name']}</td>
          <td>{$row['full_name']}</td>
          <td>{$row['race']}</td>
          <td>{$row['alignment']}</td>
          <td>{$row['height_cm']}</td>
          <td>{$row['weight_kg']}</td>
        </tr>
        ";
    }

    ?>
  </tbody>
</table>