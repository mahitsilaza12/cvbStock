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
<img style="margin-left:160px; height:150px;margin-right:400px;wihdt:300px; text-aligne:center;" src="<?=base_url()?>issets/img/facture.PNG">
<table style="width:100%;margin-top: 50px;">
	<tr style="margin-left:-200px;">
	<th style="width:60%">Client : <span style="font-weight: normal;"><?=$facture[0]->nom_client?></span></th>
	<th style="width:75%;margin-left:55px;">numero facture : <span style="font-weight: normal;">N-000<?=$facture[0]->numfact?></span>CLI</th>
	
		
	</tr>
	<tr>
		<td style="width:10%">Adresse : <?=$facture[0]->adresse?></td>
		<td style="width:70%;margin-left:55px;">date de commande : <?=$facture[0]->dates?></td>
	
	</tr>
</table>	
</page>
<!-- <p>Pharmacie CVB Ankazomanga Antananarivo</p> -->

<table style="margin:50px auto 10px auto;height: 400px;margin-top:10px;border-collapse: collapse;border:1px solid black;text-align: center">
	<tr>
		<td  style="border-bottom:1px solid black;padding-bottom: 10px" colspan="7">Description des commande :</td>
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
    $lettre = new Lettre();
	$m = $lettre->nombre($montant);

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
</table>
<div style="margin-top: 25px">Tva :<strong>*****<em></em>*****</strong> </div>
<div style="margin-top: 25px">Arrêté à la somme de : <strong> ********* <em><?= strtoupper($m)?></em> ********* </strong></div>

<div style="margin-top: 25px">Reste a payeer:<strong>***<em><?=strtoupper($facture[0]->rest)?></em>***</strong> </div>


<page_footer>
	<hr>
	
		<p>Signature de l'agent :<br><br><br><br><br><br><br></p>

		<table>
	<tr>
	<td style="width:70%;margin-top:55px;"> <strong><em></em></strong></td>
	</tr>
	</table>

	<strong><em>Le Veterinaire Traitant</em></strong><br><br>
	<strong><em>__________________________________</em></strong><br><br>
	<strong style="margin-left:40%;">consultation/diagnostique/Traitement/Vaccination/Chirurgie animales</strong><br>
	<strong>Transfert d'animaux a l'entranger</strong><br>
	<strong>Coupe et Toilettage/Produits , alimentantion et Accesoires Veternaires</strong><br>
	<strong>Tel: +261 33 64 639 12 / +261 33  / +261 34 04 374 74</strong><br>
	<strong>mail: vetboulevard@yahoo.fr fb: cabinet veterinaire boulevard</strong><br>
	<strong><em>Bon retablissement et merci a votre confiance</em></strong><br>
		
	</page_footer>
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