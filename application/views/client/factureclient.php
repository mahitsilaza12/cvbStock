<?php 
      // var_dump($liste);
       ob_start();
 ?>

 <style
 type="text/css">
    .table td,
  .table th {
    background-color: #fff ;
    text-align: center;
  }
  .table-bordered th,
  .table-bordered td {
    border: 1px solid #ddd ;
    color: #A9A9A9
   
  }
}>
 
 
 </style>

<page>

<page_footer>
  <hr />
  <h1 style="font-size:13px;">Fait à .................................................... le <?= date('d/m/y')?></h1>
</page_footer>
</page>
  
<table style="border-collapse:collapse;width:700px;margin:25px auto;" class="table table-bordered">
  <tr>
    <td colspan="3">LISTE DES CLIENTS</td>
  </tr>
  <tr>
      <th style="width:25%;">Code du client</th>
      <th style="width: 25%">Nom </th>
      <th style="width: 20%">Adresse</th>
	  <th style="width: 30%">contact</th>
  </tr>
<?php
  foreach($client as $clients) {
?>
    <tr>
      <td>C<?= $clients->idclient ?></td>
      <td><?=$clients->nom_client ?></td>
      <td><?=$clients->adresse ?></td>
	  <td><?=$clients->contact ?></td>
    </tr>
<?php
  }
 ?>
</table>

  <?php
$content = ob_get_clean();

try{
	$pdf = new HTML2PDF('P' , 'A4' , 'fr');
	$pdf->pdf->setDisplayMode('fullpage');
	$pdf->writeHTML($content);
	$pdf->Output('client.pdf');
}
catch(HTML2PDF_exception $e){
	die($e);
}

 ?>