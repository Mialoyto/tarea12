<!-- seleciones del documento -->
<page backbottom="7mm">
    <page_header>
        <span>REPORTE GENERAL</span>
    </page_header>
    <page_footer>
        <div class="text-end">SENATI [[page_cu]]/[[page_nb]]</div>
    </page_footer>

</page>


<h1 class="text-center text-xl mb-4">
    <?= $sh_name; ?> </h1>
<h3 class="text-center mb-4">Reporte generado el <?= $fechaActual; ?></h3>
<!-- Mostrar la imagen del QR -->
<div class="text-center">
    <?= $dataQR; ?>
</div>

<table class="table mt-3">
    <colgroup>
        <col style="width:20%;">
        <col style="width:20%;">
        <col style="width:20%;">
        <col style="width:20%;">
        <col style="width:20%;">

    </colgroup>

    <thead>
        <tr class="bg-info">
            <th>ID</th>
            <th>Nombre Superhero</th>
            <th>Nombre Real</th>
            <th>Altura cm</th>
            <th>Peso kg</th>
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
          <td>{$row['height_cm']}</td>
          <td>{$row['weight_kg']}</td>

        </tr>
        ";
        }

        ?>
    </tbody>
</table>