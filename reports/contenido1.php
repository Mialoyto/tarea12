<!-- seleciones del documento -->
<page backbottom="7mm">
    <page_header>
        <span>REPORTE GENERAL</span>
    </page_header>
    <page_footer>
        <div class="text-end bg-danger">SENATI [[page_cu]]/[[page_nb]]</div>
    </page_footer>

</page>


<h1 class="text-center text-xl">TAREA</h1>
<h3 class="text-center">Reporte generado el día <?= $fechaActual ?></h3>

<table class="table mt-3">
    <colgroup>
        <col style="width:5%;">
        <col style="width:5%;">
        <col style="width:15%;">
        <col style="width:15%;">
        <col style="width:10%;">
        <col style="width:10%;">
        <col style="width:10%;">
        <col style="width:10%;">
        <col style="width:5%;">
        <col style="width:15%;">
    </colgroup>

    <thead>
        <tr class="bg-info text-light">
            <th>ID</th>
            <th>ID supereroh</th>
            <th>Nombre</th>
            <th>Nombre Real</th>
            <th>Género</th>
            <th>Ojos</th>
            <th>Cabello</th>
            <th>Piel</th>
            <th>Raza</th>
            <th>Compañía</th>
        </tr>
    </thead>
    <tbody>

        <?php
    foreach ($datosSH as $row) {
      echo "
        <tr>
          <td>{$row['publisher_id']}</td>
          <td>{$row['idsuperhero']}</td>
          <td>{$row['superhero_name']}</td>
          <td>{$row['full_name']}</td>
          <td>{$row['gender']}</td>
          <td>{$row['eye_colour']}</td>
          <td>{$row['hair_colour']}</td>
          <td>{$row['skin_colour']}</td>
          <td>{$row['race']}</td>
          <td>{$row['publisher_name']}</td>
        </tr>
        ";
    }

    ?>
    </tbody>
</table>