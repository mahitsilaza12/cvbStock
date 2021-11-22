<?php
//var_dump($facture);
?>
<?php
            function splitter($ds)
            {
                $chiffre = '';
                $count = strlen($ds);
                $i = 0;
                    if($count % 3 == 0)
                        do{
                                $chiffre .= substr($ds, $i , 3).".";
                                $count -= 3;
                                $i += 3;
                            }
                            while($count > 0);
                    
                    else if($count % 3 == 2)
                        {
                            $chiffre .= substr($ds, $i , 2).".";
                            $i+= 2;
                            do{
                                $chiffre .= substr($ds, $i , 3).".";
                                $count -= 3;
                                $i += 3;
                            }
                            while($count > 0);
                        }
                    else if($count % 3 == 1)
                        {
                            $chiffre .= substr($ds, $i , 1).".";
                            $i = 1;
                            do{
                                $chiffre .= substr($ds, $i , 3).".";
                                $count -= 3;
                                $i += 3;
                            }
                            while($count > 0);
                                
            }
        echo rtrim($chiffre , ".");
    }

$facture;
ob_start();





?>
<page>
	<page_footer>
	<hr>
    <img style="margin-left:400px; height:200px;margin-right:200px; text-aligne:center;" src="<?=base_url()?>issets/img/facture.PNG">
		<p>Signature de l'agent :<br><br><br><br><br><br><br></p>
      
	</page_footer>
</page>
<p>Pharmacie CVB Ankazomanga Antananarivo</p>
<table style="width:100%;margin-top: 35px;">
	<tr>
			<th style="width:65%">numero facture : <span style="font-weight: normal;"><?=$facture[0]->numfact?></span></th>
            <th style="width:65%">Client : <span style="font-weight: normal;"><?=$facture[0]->nom_fournisseur?></span></th>
		
	</tr>
	<tr>
		<td>Adresse : <?=$facture[0]->adresse?></td>
	</tr>
</table>
<table style="margin:50px auto 10px auto;height: 400px;border-collapse: collapse;border:1px solid black;text-align: center">
	<tr>
		<td  style="border-bottom:1px solid black;padding-bottom: 10px" colspan="9">Description des approvisionnement :</td>
	</tr>
	<tr>				
		<td style="width: 11%;border:1px solid black">date appro</td>	
		<td style="width: 11%;border:1px solid black">net a payee</td>
		<td style="width: 11%;border:1px solid black">type de payement</td>
		<td style="width: 11%;border:1px solid black">payee</td>
		<td style="width: 11%;border:1px solid black">date de payement</td>
		<td style="width: 11%;border:1px solid black">rest</td>	
		<td style="width: 11%;border:1px solid black">date d'echenace</td>	
        <td style="width: 11%;border:1px solid black">ver</td>	
	</tr>
<?php 
$Montant = 0;
     
    foreach ($facture as $key) { ?>
    
	<tr>
		<td style="width: 11%;border:1px solid black"><?= $key->dates?></td>
		<td style="width: 11%;border:1px solid black"><?= $key->net?></td>
		<td style="width: 11%;border:1px solid black"><?= $key->type_d_payement?></td>
		<td style="width: 11%;border:1px solid black"><?= $key->payee?></td>
		<td style="width: 11%;border:1px solid black"><?= $key->date_payement?></td>
		<!-- <td style="width: 11%;border:1px solid black"><?= $key->rest?></td> -->
        <td style="width: 11%;border:1px solid black"><?= $key->date_d_echeance?></td>
		<!-- <td style="width: 11%;border:1px solid black"><?= $key->ver?></td> -->
	
	</tr>
<?php 

$Montant += $key->total;
}
    $lettre = new Lettre();
    $m = $lettre->nombre($Montant);
?>

	<tr>
		<td style="border:1px solid black">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
		</td>
		<td style="border:1px solid black"></td>
		<td style="border:1px solid black"></td>
		<td style="border:1px solid black"></td>
		<td style="border:1px solid black"></td>
		<td style="border:1px solid black"></td>
		<td style="border:1px solid black"></td>
		<td style="border:1px solid black"></td>
	</tr>
	<tr>
	    <td></td>
	    <td></td>
	    <td></td>
	    <td></td>
		<td></td>
		<td style="border-right: 1px solid black"></td>
		<td style="border:1px solid black">Total</td>
		<td style="border:1px solid black"><?= splitter($Montant)?> Ar</td>
	</tr>
</table>

<div style="margin-top: 25px">Arrêté à la somme de : <strong> ********* <em><?= strtoupper($m)?></em> ********* </strong></div>

<div style="margin-top: 25px">Rest a payee:<strong>*****<em><?=strtoupper($m)?></em>*****</strong> </div>
<?php
$content = ob_get_clean();

//Mettre le nom de la facture dynamiquement
$nom = "facture.pdf";
try{
	$pdf = new HTML2PDF('P' , 'A4' , 'fr');
	$pdf->pdf->setDisplayMode('fullpage');
	$pdf->writeHTML($content);
	$pdf->Output($nom);
}
catch(HTML2PDF_exception $e){
	die($e);
}