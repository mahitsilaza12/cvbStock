<?php
header('content-Type: application/vnd.ms-excel');
header('content-Disposition:attachement;filename="client.xls"');

?>


<table class="table table-dark"style=";height:40px;margin-top:px;margin-right:80px;margin-left:px;  width:100%;" class="container-fluid col-md-7 col-md-12 shadow-none p-3 mb-5 bg-light rounded">
                                    <thead class="thead bg-info text-white">
                                      <tr>
                                      
                                        <th scope="col">nom_fournisseur</th>
                                        <th scope="col">numero_facture</th>
                                        <th scope="col">date_appro</th>
                                
                                        <th scope="col">somme_a_payeee</th>
                                        <th scope="col">type_de_payement</th>
                                        <th scope="col">payee</th>
                                        <th scope="col">date_de_payement</th>
                                        <th scope="col">rest_a_payee</th>
                                        <th scope="col">date_d_echeance</th>
                                        <th scope="col">Verification</th>
                                        <th scope="col">Payement</th>
                                  
                                      </tr>
                                    </thead>
                                    <tbody>
                                          <?php   $total = 0; if(isset($exceljournal) AND !empty($exceljournal)){ 
                                                            $last = 0;

                                                           foreach($exceljournal as $exceljournals){
                                                            
                                                            $exceljournals['ver']= 'incomplet';
                                                            
                                                            $exceljournals['rest'] =  ($exceljournals['net'] - $exceljournals['payee'] );

                                                           
                                                          if($exceljournals['payee']==$exceljournals['net'] )
                                                           {
                                                              $exceljournals['ver']= 'complet';
                                                           }
                                                          


                                                           if($exceljournals['numfact'] == $last)
                                                               {
                                                                 $last = $exceljournals['numfact'];
                                                              }
                                                            
                                                               else {
                                                                 $last = $exceljournals['numfact'];
                                                               
                                                           ?>
                                                            <tr>
                                                               
                                                                <td><?php echo $exceljournals['nom_fournisseur'] ?></td>
                                                                <td><?php echo $exceljournals['numfact'] ?></button></a></td>   
                                                                <td><?php echo $exceljournals['date_appro'] ?></td>
                                                                <td><?php echo $exceljournals['net']?>Ar</td>
                                                                <td><?php echo $exceljournals['type_d_payement'] ?></td>
                                                                <td><?php echo $exceljournals['payee']?>Ar</td>
                                                                <td><?php echo $exceljournals['date_payement'] ?> </td>
                                                                <td><?php echo $exceljournals['rest'] ?>Ar</td>
                                                                <td><?php echo $exceljournals['date_d_echeance'] ?></td>
                                                                <td><?php echo $exceljournals['ver'] ?></td>
                                                               
                                                                <td>
                                                                <?php if($exceljournals['rest'] != 0){?>
                                                                  <a  href="<?php echo base_url().'index.php/payement_fou/edit_pay/'.$exceljournals['numfact']; ?> " ><i class="fas fa-phone"></i></a>
                                                                <?php } ?>
                                                                </td>
                                                                <!-- <td>
                                                                <a href="<?php echo base_url().'index.php/commande_fou/facturefournissers/'.$exceljournals['numfact'] ?> "></span><i class="fas fa-download"></i></a>
                                                                  
                                                                </td> -->
                                                                
                                                              
                                                            </tr>


                                                        <?php 
                                                               }
                                                               $total +=$exceljournals['payee'];
                                                       
                                                              } 
                                                       
                                                       

                                                       } else { ?>   
                                                        <td colspan= "5">Element non trouvee</td>
                                                        <?php    }  ?>  

                                                            </tbody>

                                                            <tfoot>
                                  <tr>
                                        <th scmontanDope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col">Depense:</th>
                                        <th scope="col"><?php echo $total ?>Ar</th>

                                        
                                      </tr>
                                  </tfoot>
                                  </table>     
