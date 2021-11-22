<div class="col-md-6 col-md-10"class="row" style="height:650px;margin-left:-13px; margin-top:15px;margin-right:200px; box-shadow: 0px 20px 30px; margin-top:60px; left:229px;position:fixed;"> 
<div class="card-columns" style="margin-top:15px; height:700px;">
  <div class="card">
    <img src="<?=base_url()?>issets/img/sunset-1373171__340.jpg" style="widht:200px;height:200px;" class="card-img-top" alt="...">
    <div class="card-body">
    <p class="card-text"> Client enregistrer </p>
    <p class="card-text"><small class="text-muted">
    <div class="row">
    <a href=" <?= base_url()?>index.php/client/"><button class="btn btn-success" ><span><i class="fas fa-list"></i></span> List client</button></a>
      
      <!-- <button  type="button" style="margin-left:0px;" id="ajou" class="btn btn-info btn-xr" data-toggle="modal" data-target="#myModal"><span><i class="fas fa-plus-circle"></i></span> Ajout client</button>
   -->   </div> 
    </div>
    </small></p>
  </div>
  
  <div class="card">
    <img src="<?=base_url()?>issets/img/foudre.jpg"style="widht:200px;height:200px;" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text"> Fournisseur enregistrer</p>
      <p class="card-text"><small class="text-muted">
      <div class="row">
      <a href=" <?= base_url()?>index.php/fournisseur/"><button class="btn btn-success" ><span><i class="fas fa-list"></i></span> List fournisseur</button></a>
      
      <!-- <button  type="button" style="margin-left:0px;" id="ajou" class="btn btn-info btn-xr" data-toggle="modal" data-target="#fournisseur"><span><i class="fas fa-plus-circle"></i></span> Ajout fournisseur</button>
    -->  </div> 
      </small></p>
    </div>
  </div>
  <div class="card bg-primary text-white text-center p-3">
  <img src="<?=base_url()?>issets/img/tabby-kitten-sitting-on-the-grass-669015.jpg"style="widht:200px;height:200px;" class="card-img-top" alt="...">
    <blockquote class="blockquote mb-0">
      <p>Vos bilan </p>
      <footer class="blockquote-footer text-white">
        <small>
          List des produit <cite title="Source Title">en stock</cite><br>
     
          <a href="<?= base_url()?>index.php/commande_cli/journal"><button class="btn btn-info" ><span><i class="fas fa-dollar-sign"></i></span> Bilan des vente </button></a>
          <a href=" <?= base_url()?>index.php/produit/"><button class="btn btn-success" ><span><i class="fas fa-list"></i></span> Stock produit </button></a>
        </small>
      </footer>
    </blockquote>
  </div>
  <div class="card text-center">
  
    <div class="card-body">
      <h5 class="card-title">Statistique</h5>
      <p class="card-text">histogramme de vente.</p>
      <a href="<?= base_url()?>index.php/commande_cli/stat"><button class="btn btn-success" ><span><i class="fas fa-list"></i></span>histogramme </button></a>
      <p class="card-text"><small class="text-muted">Histogramme par annee ou moi ou jour</small></p>
    </div>
  </div>
  
  <div class="card">
    <img src="<?=base_url()?>issets/img/dogs-on-wooden-surface-3141394.jpg" style="widht:200px;height:200px;" class="card-img-top" alt="...">
    <div class="card-body">
    <p class="card-text"> Historique des commandes  clients </p>
    <p class="card-text"><small class="text-muted">
    <div class="row">    
    <a href=" <?= base_url()?>index.php/commande_cli/"><button class="btn btn-success" ><span><i class="fas fa-list"></i></span> List de commande</button></a>
    <a href=" <?= base_url()?>index.php/commande_cli/insertcom"><button class="btn btn-info" ><span><i class="fas fa-plus-circle"></i></span> Ajout commande</button></a>
      </div>
      </small></p>
    </div>
  </div>

  <div class="card">
    <img src="<?=base_url()?>issets/img/kitten-cat-rush-lucky-cat-45170.jpg" style="widht:200px;height:200px;" class="card-img-top" alt="...">
    <div class="card-body">
    <p class="card-text"> Historique des approvisionnement fournisseur </p>       
    <p class="card-text"><small class="text-muted">
    <div class="row">
    <a href=" <?= base_url()?>index.php/commande_fou/insertcomfou"><button class="btn btn-info" ><span><i class="fas fa-plus-circle"></i></span> approvisionnement de produit</button></a>
    </div>
      </small></p>
    </div>
  </div>
</div>


</div>



<!-- ajout client -->



<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        
        </div>
        <div class="modal-body">
       
        <div class="container  col-md-6 col-xs-6 col-md-offset-3 ">
  <h2>insert client</h2>
  <form method="post" role="form" name="insertion" action="<?php echo base_url(). 'index.php/client/insert_cli'; ?>" > 
    <div class="form-group">
      <label >NOM</label>
      <input type="nom" class="form-control" required value="<?php echo set_value('nom_client') ?>" name="nom_client" placeholder="Enter nom">
      <?php echo form_error('nom_client'); ?>
    </div>
    <div class="form-group">
      <label >ADRESSE:</label>
      <input type="adresse" class="form-control" required value="<?php echo set_value('adresse') ?>" name="adresse" placeholder="Enter adresse">
      <?php echo form_error('adresse'); ?>
    </div>
    <div class="form-group">
      <label >CONTACT:</label>
      <input type="contact" class="form-control" required value="<?php echo set_value('contact') ?>" name="contact" placeholder="Enter contact">
      <?php echo form_error('contact'); ?>
    </div>
    
    <button type="submit" class="btn btn-primary">Ajouter</button>
    <a href="<?php  echo base_url().'index.php/client/index';?>" class="btn btn-info">Annuler</a>
  </form>
</div>



        </div>
        <div class="modal-footer">
    
        </div>
      </div>
      
    </div>
  </div>
  







<!-- ajout fournisseur -->

  <div class="modal fade" id="fournisseur" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
       
        <div class="container  col-md-6 col-xs-6 col-md-offset-3 ">
  <h2>Ajout</h2>
  <form method="post" role="form" name="insertion" action="<?php echo base_url(). 'index.php/fournisseur/insert_fou'; ?>" > 
    <div class="form-group">
      <label >NOM</label>
      <input type="text" class="form-control" required value="<?php echo set_value('nom_fournisseur') ?>" name="nom_fournisseur" placeholder="Enter nom">
      <?php echo form_error('nom_fournisseur'); ?>
    </div>
    <div class="form-group">
      <label >ADRESSE:</label>
      <input type="text" class="form-control" required value="<?php echo set_value('adresse') ?>" name="adresse" placeholder="Enter adresse">
      <?php echo form_error('adresse'); ?>
    </div>
    <div class="form-group">
      <label >CONTACT:</label>
      <input type="number" class="form-control" required value="<?php echo set_value('contact') ?>" name="contact" placeholder="Enter contact">
      <?php echo form_error('contact'); ?>
    </div>

    <div class="form-group">
      <label >RESPONSABLE:</label>
      <input type="text" class="form-control" required value="<?php echo set_value('responsable') ?>" name="responsable" placeholder="Enter responsable">
      <?php echo form_error('responsable'); ?>
    </div>
    
    <button type="submit" class="btn btn-primary">Ajouter</button>
    <a href="<?php  echo base_url().'index.php/fournisseur/index';?>" class="btn btn-info">Annuler</a>
  </form>
</div>



        </div>
        <div class="modal-footer">

        </div>
      </div>
      
    </div>
  </div>
  
</div>
</div>

</div>



<div class="modal fade bd-example-modal-xl"  tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" >
    <div class="modal-header">
      produit entree

    </div>
    <div class="modal-content"style="box-shadow: 0px 20px 30px;" >
    
    </div>
  </div>
</div>
</div>







<!-- 
commande client au stock -->


<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        
           </div>
           <div class="modal-body">
       
               <div class="container  col-md-6 col-xs-6 col-md-offset-3 ">
                    <h1>Ajout commande</h1>
                                <form method="post"  action="<?php echo base_url(). 'index.php/commande_cli/insert_commande_cli/'; ?>" >
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                <label>client</label>
                                <input value="<?php echo set_value('nom_client') ?>" type='text' id="nom_client" name="nom_client" class="form-control">
                                <?php echo form_error('nom_client'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                  <label >PRODUIT</label>
                                <input value="<?php echo set_value('nom_produit') ?>" name="nom_produit"  type='text' id="pro" class="form-control">
                                <?php echo form_error('nom_produit'); ?>
                                </div>
                                </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label >qt </label>
                                  <input value="<?php echo set_value('qt') ?>" name="qt"  type="number" name="qt" class="form-control" >
                                  <?php echo form_error('qt'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                  <label >date commande </label>
                                  <input value="<?php echo set_value('date_commande') ?>"  type="date" name="date_commande" class="form-control" >
                                  <?php echo form_error('date_commande'); ?>
                                </div>
                                </div>
                                <!-- Default inline 1-->
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" checked="" value="detail" class="custom-control-input" id="defaultInline1" name="type">
                              <label class="custom-control-label" for="defaultInline1">en detail</label>
                            </div>

                            <!-- Default inline 2-->
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" value="gros" id="defaultInline2"  name="type">
                              <label class="custom-control-label" for="defaultInline2">en gros</label>
                            </div>

                              <div style="">
                                  <div class="modal-footer">
                                        <button type="submit"  class="btn btn-primary containair-fluid">Ajouter</button>
                                        <a href="<?php  echo base_url().'index.php/commande_cli/index';?>" class="btn btn-info">Annuler</a>
                                  </div>
                              </div>

                            </form>

               </div>

          </div>

     </div>
    </div>
</div>      















<!-- commande fournisseur -->





    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                          <div class="modal-header">
                          <h1>Ajout commande fournisseur</h1>
                          </div>
                                 <div class="modal-body">
       
                                    <div class="container  col-md-6 col-xs-6 col-md-offset-3 ">
      
                                              <form method="post"  action="<?php echo base_url(). 'index.php/commande_fou/insert_commande_fou/'; ?>" >
                                              <div class="form-row">
                                              <div class="form-group col-md-6">
                                              <label>Fournisseur</label>
                                              <input value="<?php echo set_value('nom_fournisseur') ?>" type='text' id="nom_fournisseur" name="nom_fournisseur" class="form-control">
                                              <?php echo form_error('nom_fournisseur'); ?>
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label >PRODUIT</label>
                                              <input value="<?php echo set_value('nom_produit') ?>" type='text' id="pro" name="nom_produit" class="form-control">
                                              <?php echo form_error('nom_produit'); ?>
                                              </div>
                                              </div>
                                              <div class="form-row">
                                              <div class="form-group col-md-6">
                                                <label >qt </label>
                                                <input value="<?php echo set_value('qt') ?>"  type="number" name="qt" class="form-control" >
                                                <?php echo form_error('qt'); ?>
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label >date appro </label>
                                                <input value="<?php echo set_value('date_appro') ?>"  type="date" name="date_appro" class="form-control" >
                                                <?php echo form_error('date_appro'); ?>
                                              </div>
                                              </div>

                                              <!-- Default inline 1-->
                                          <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio"  value="detail" class="custom-control-input" id="defaultInline1" name="type">
                                            <label class="custom-control-label" for="defaultInline1">en detail</label>
                                          </div>

                                          <!-- Default inline 2-->
                                          <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" checked="" class="custom-control-input" value="gros" id="defaultInline2"  name="type">
                                            <label class="custom-control-label" for="defaultInline2">en gros</label>
                                          </div>
                                            <div style="">
                                            <div class="modal-footer">
                                            <button type="submit"  class="btn btn-primary containair-fluid">Ajouter</button>
                                            <a href="<?php  echo base_url().'index.php/commande_fou/index';?>" class="btn btn-info">Annuler</a>
                                             </div>
                                            </div>
                                          </form>

                                     </div>

                                </div>


                   </div>
             </div>
      
     </div>







