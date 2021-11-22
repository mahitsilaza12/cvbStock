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
<!-- <page_header>
<img style="widht:65px; height:65px;" src="<?=base_url()?>issets/img/facture.png"> -->
<!-- </page_header> -->
<img style="height:150px;margin-right: 100px"  src="<?=base_url()?>issets/img/facture.PNG">
<img style="height:150px;" src="<?=base_url()?>issets/img/log.jpg">




<table style="width:100%;margin-top: 50px;">
	<tr style="margin-left:-200px;">
	<th style="width:60%">Client : <span style="font-weight: normal;"><?=$facture[0]->nom_client?> / Code:<?=$facture[0]->idclient ?></span></th>
	
		
	</tr>
	<tr>
		<td style="width:10%">Adresse : <?=$facture[0]->adresse?></td>
		<td style="width:70%;margin-left:55px;">date de commande : <?=$facture[0]->dates?></td>
	
	</tr>
</table>	
</page>
<page_footer>
	        <p style="text-align: center">Consultation / Diagnostique / Traitement / Vaccination / Chirurgies animales / Transfert d'animaux à l'étranger.<br>
         Coupe et toilettage / Produits, alimentation et accessoires Vétérianires<br>
        Tél : +261 33 64 639 12 / 033 75 130 15 / +261 34 04 374 74<br>
        mail : vetboulevard@yahoo.fr fb: cabinet vétérinaire boulevard</p>
<hr>
<p style="text-align: center">CABINET VETERINAIRE BOULEVARD vous remercie de votre visite.<br><em>" Bon rétablissement à votre compagnon ! "</em> </p>
</page_footer>
<!-- <p>Pharmacie CVB Ankazomanga Antananarivo</p> -->

<table style="margin:50px auto 10px auto;height: 400px;margin-top:10px;border-collapse: collapse;border:1px solid black;text-align: center">
	<tr>
		<td  style="border-bottom:1px solid black;font-size: 26px; padding-bottom: 10px" colspan="7">FACTURE N°:<?=$facture[0]->numfact?></td>
	</tr>
	<tr>		
		<td style="width: 22%;border:1px solid black">Nom produit</td>	
		<td style="width: 8%;border:1px solid black">qt</td>
		<td style="width: 10%;border:1px solid black">Unite</td>
		<td style="width: 12%;border:1px solid black">tva</td>
		<td style="width: 12%;border:1px solid black">PU</td>
		<td style="width: 16%;border:1px solid black">Conditionnement</td>
		<td style="width: 16%;border:1px solid black">Montant(Ar)</td>		
	</tr>
<?php 
					$montant = 0;
					$total = 0;

						foreach ($facture as $key) { 
							$montant = $key->montantD;
							if($key->conditio == 'gros')
								{$pu_d_V = $key->pu_d_G;
										$montant = $key->montantG;}
							else
								$pu_d_V = $key->pu_d_V
								
							// $key->montantD 
							// $key->montantG
							
		?>
    
	<tr>
	
		
		<td style="width: 11%;border:1px solid black"><?= $key->nom_produit?></td>
		<td style="width: 11%;border:1px solid black"><?= $key->qt?></td>
		<td style="width: 11%;border:1px solid black"><?= $key->unite ?></td>
		<td style="width: 11%;border:1px solid black"><?= $key->tva ?>%</td>

		<td style="width: 11%;border:1px solid black"><?= $pu_d_V ?> Ar</td>
		<td style="width: 11%;border:1px solid black"><?= $key->conditio ?></td>
		<td style="width: 11%;border:1px solid black"><?= $montant ?> Ar</td>

	</tr>
<?php 

$total +=$montant;

}

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
			<br>
						

		
		</td>
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
	
		
	
		
		<td style="border-right: 1px solid black"></td>
		<td style="border:1px solid black">Total</td>
		<td style="border:1px solid black"><?= splitter($total)?> Ar</td>
	</tr>
	<?php if($key->remise != 0) {
		 
		  ?>
		
	<tr>
	    <td></td>
	    <td></td>
	    <td></td>
	    <td></td>
	
		
	
		
		<td style="border-right: 1px solid black"></td>
		<td style="border:1px solid black">remise</td>
		<td style="border:1px solid black"><?= $key->remise?> %</td>
	
	</tr>
	<?php $total -= ($total * $key->remise) / 100; ?>

	<?php 	} 
	$lettre = new Lettre();
$m = $lettre->nombre($total);
$l = $lettre->nombre($facture[0]->rest);
?>
        <tr>
		<td></td>
	    <td></td>
	    <td></td>
	    <td></td>
		<td style="border-right: 1px solid black"></td>
        <td style="border:1px solid black">Net à payer</td>
        <td style="border:1px solid black"><?=splitter($total)?> Ar</td>
    </tr>
</table>
<div style="margin-top: 25px">Arrêté à la somme de : <strong> ********* <em><?= strtoupper($m)?></em> ********* </strong></div>

<div style="margin-top: 25px">Reste a payer:<strong>***<em><?=strtoupper($l)?></em>***</strong> </div>

<hr>
		<p style="margin-left: 550px">Le Responsable:</p>
        

<?php
$content = ob_get_clean();

//Mettre le nom de la facture dynamiquement
$nom = "facture".$facture[0]->numfact." CLI.pdf";
try{
	$pdf = new HTML2PDF('P' , 'A4' , 'fr');
	$pdf->pdf->setDisplayMode('fullpage');
	$pdf->writeHTML($content);
	$pdf->Output($nom);
}
catch(HTML2PDF_exception $e){
	die($e);
}