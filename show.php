<?php
$route="https://agbat13.fr/"; 
include "config/config.php"; 
include "phpClass/devisClass.php";  

if(isset($_GET['id']))
{

$identifiant=$_GET['id']; 
$devis=Devis::chercherDevis($identifiant); 
$fichiers=Devis::chercherFiles($identifiant); 




}
else
{
    header("Location: ".$route);

}

?>
<?php if(isset($identifiant)): ?>
    <title>La demande de <?=$devis[0]['civilite']; ?> <?=$devis[0]['nom']; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?=$route?>imagesAgbat/log.png" />
    <meta  name="viewport" content="width=device-width, initial-scale=1"> 
    <meta charset="utf-8">	
	<meta http-equiv="“content-language”" content="“fr-fr”">   
    <link rel="stylesheet" href="<?=$route?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$route?>css/style1.css">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet"> 

<!-- header de détails -->
<div class="container-fluid headerA mb-1">
    <div class="container ">    
        <div class="row">
                        <div class="col-4 col-md-4 pt-3 pb-2  ">
                                <a href="<?=$route?>"><img src="<?=$route?>imagesAgbat/log.png"  class="log" alt=""></a>                        
                        </div>
                        <div class="col-8 col-md-8 pt-3 pb-2 textCenter">

                                <p class="textLogo user"><?=$devis[0]['civilite']; ?> <?=$devis[0]['nom']; ?></p>
                                <p class="textLogo red user userUatre">N° : <?=$devis[0]['identifiant']; ?></p>
                                <?php if(!empty($devis[0]['phone'])): ?>
                                    <p class="textLogo user userUatre">Téléphone : <?=$devis[0]['phone']; ?></p>
                                <?php endif; ?>    
                                <?php if(!empty($devis[0]['mail'])): ?>
                                    <p class="textLogo user userUatre">Mail : <?=$devis[0]['mail']; ?></p>
                                <?php endif; ?>  
                                <?php if(!empty($devis[0]['adresse'])): ?>
                                    <p class="textLogo user userUatre">Adresse : <?=$devis[0]['adresse']; ?></p>
                                <?php endif; ?>  
                        </div>        
        </div>
    </div>   
</div>
<div class="container mt-2 textCenter">
            <div class="alert alert-dismissible alert-info">    
                <h5>La demande de <?=$devis[0]['civilite']; ?> <?=$devis[0]['nom']; ?></h5> 
            </div>   
</div>
<div class="container pb-2">
    <!-- afficher le type de bâtiment -->
    <?php if(!empty($devis[0]['bat'])): ?>
        
            <div class="row services">
                <div class="col-12 col-md-4  p1 ">
                    <strong><p class=" ">Type de bâtiment : </p></strong>                                          
                </div>
                <div class="col-12 col-md-8  textLeft p2">

                    <p class=" "> <?=$devis[0]['bat']; ?></p>

                </div>  
            </div>          
        
    <?php endif; ?>
    <!-- afficher l'année de construction -->
    <?php if(!empty($devis[0]['anneeC'])): ?>
        
            <div class="row services">
                <div class="col-12 col-md-4  p1 ">
                    <strong><p class=" ">Année de construction : </p></strong>                                          
                </div>
                <div class="col-12 col-md-8  textLeft p2">
                    <p class=" "> <?=$devis[0]['anneeC']; ?></p>
                </div>  
            </div>          
        
    <?php endif; ?>
    <!-- afficher les pièces souhaités -->
    <?php if(!empty($devis[0]['pieces'])): ?>
        
            <div class="row services">
                <div class="col-12 col-md-4  p1 ">
                    <strong><p class=" ">Pièce(s) souhaité(s) : </p></strong>                                          
                </div>
                <div class="col-12 col-md-8  textLeft p2">
                    <p class=" "> <?=$devis[0]['pieces']; ?></p>
                </div>  
            </div>          
        
    <?php endif; ?>
    <!-- afficher les prestation -->
    <?php if(!empty($devis[0]['prestations'])): ?>
        
            <div class="row services">
                <div class="col-12 col-md-4  p1 ">
                    <strong><p class=" ">Prestation(s) : </p></strong>                                          
                </div>
                <div class="col-12 col-md-8  textLeft p2">
                    <p class=" "> <?=$devis[0]['prestations']; ?></p>
                </div>  
            </div>          
        
    <?php endif; ?>
    <!-- afficher la surface -->
    <?php if(!empty($devis[0]['surface'])): ?>
        
            <div class="row services">
                <div class="col-12 col-md-4  p1 ">
                    <strong><p class=" ">Surface : </p></strong>                                          
                </div>
                <div class="col-12 col-md-8  textLeft p2">
                    <p class=" "> <?=$devis[0]['surface']; ?></p>
                </div>  
            </div>          
        
    <?php endif; ?>
    <!-- afficher l'étage -->
    <?php if(!empty($devis[0]['etage'])): ?>
        
            <div class="row services">
                <div class="col-12 col-md-4  p1 ">
                    <strong><p class=" ">Etage : </p></strong>                                          
                </div>
                <div class="col-12 col-md-8  textLeft p2">
                    <p class=" "> <?=$devis[0]['etage']; ?></p>
                </div>  
            </div>          
        
    <?php endif; ?>
    <!-- afficher l'état -->
    <?php if(!empty($devis[0]['etat'])): ?>
        
            <div class="row services">
                <div class="col-12 col-md-4  p1 ">
                    <strong><p class=" ">Etat : </p></strong>                                          
                </div>
                <div class="col-12 col-md-8  textLeft p2">
                    <p class=" "> <?=$devis[0]['etat']; ?></p>
                </div>  
            </div>          
        
    <?php endif; ?>
    <!-- afficher pièces meublées -->
    <?php if(!empty($devis[0]['meublees'])): ?>
        
            <div class="row services">
                <div class="col-12 col-md-4  p1 ">
                    <strong><p class=" ">Pièces meublées : </p></strong>                                          
                </div>
                <div class="col-12 col-md-8  textLeft p2">
                    <p class=" "> <?=$devis[0]['meublees']; ?></p>
                </div>  
            </div>          
        
    <?php endif; ?>
    <!-- afficher où -->
    <?php if(!empty($devis[0]['agglomeration'])): ?>
        
            <div class="row services">
                <div class="col-12 col-md-4  p1 ">
                    <strong><p class=" ">Où : </p></strong>                                          
                </div>
                <div class="col-12 col-md-8  textLeft p2">
                    <p class=" "> <?=$devis[0]['agglomeration']; ?></p>
                </div>  
            </div>          
        
    <?php endif; ?>
    <!-- afficher permis -->
    <?php if(!empty($devis[0]['permis'])): ?>
        
            <div class="row services">
                <div class="col-12 col-md-4  p1 ">
                    <strong><p class=" ">Avoir permis : </p></strong>                                          
                </div>
                <div class="col-12 col-md-8  textLeft p2">
                    <p class=" "> <?=$devis[0]['permis']; ?></p>
                </div>  
            </div>          
        
    <?php endif; ?>
    <!-- afficher la date des travaux -->
    <?php if(!empty($devis[0]['dateTravail'])): ?>
        
            <div class="row services">
                <div class="col-12 col-md-4  p1 ">
                    <strong><p class=" ">Date des travaux : </p></strong>                                          
                </div>
                <div class="col-12 col-md-8  textLeft p2">
                    <p class=" "> <?=$devis[0]['dateTravail']; ?></p>
                </div>  
            </div>          
        
    <?php endif; ?>
    <!-- afficher le rendez vous -->
    <?php if(!empty($devis[0]['rendez'])): ?>
        
            <div class="row services">
                <div class="col-12 col-md-4  p1 ">
                    <strong><p class=" ">Rendez-vous : </p></strong>                                          
                </div>
                <div class="col-12 col-md-8  textLeft p2">
                    <p class=" "> <?=$devis[0]['rendez']; ?></p>
                </div>  
            </div>          
        
    <?php endif; ?>
    <!-- afficher les informations supplémentaires -->
    <?php if(!empty($devis[0]['informationsS'])): ?>
        
            <div class="row services">
                <div class="col-12 col-md-4  p1 ">
                    <strong><p class=" ">Informations supplémentaires : </p></strong>                                          
                </div>
                <div class="col-12 col-md-8  textLeft p2">
                    <p class=" "> <?=$devis[0]['informationsS']; ?></p>
                </div>  
            </div>          
        
    <?php endif; ?>
</div>
<!-- afficher les fichiers-->
<?php if(!empty($fichiers)): ?>
    <div class="container mt-2 textCenter">
            <div class="alert alert-dismissible alert-warning">    
                <h5>Les fichiers de <?=$devis[0]['civilite']; ?> <?=$devis[0]['nom']; ?></h5> 
            </div>   
    </div>
    <div class="container pb-2 pl-5">
       <div class="row">
            <?php  foreach( $fichiers as $key=>$fichier): ?>
                <?php $url=$route.$fichier['url'];  ?>
                <?php if(stristr($url,'pdf')): ?>
                    <!-- on affiche image de pdf et button de télécharger et url correspondant-->
                    <div class="col-12 col-sm-6 col-md-4 row textCenter pt-4 pb-4 divM " id="<?=$key?>"> 
                        <div class="col-12 col-md-12 textCenter divImageFileH">                   
                            <a href="<?=$url?>" >
                                <img src="<?=$route?>imagesAgbat/pdf.png" alt="" class="imageFileH">                      
                            </a>
                        </div>
                        <div class="col-12 col-md-12 textCenter pt-2 pb-2">
                            <a href="<?=$url?>" download="" class="btn btn-info" >Télécharger</a> 
                        </div>                    
                    
                    </div>
                <?php else: ?>
                    <!-- on affiche L'image et button de télécharger et url correspondant-->
                    <div class="col-12 col-sm-6 col-md-4 row textCenter pt-4 pb-4 divM " id="<?=$key?>"> 
                        <div class="col-12 col-md-12 textCenter divImageFileH">                   
                            <a href="<?=$url?>" >
                                <img src="<?=$url?>" alt="" class="imageFileH">                      
                            </a>
                        </div>
                        <div class="col-12 col-md-12 textCenter pt-2 pb-2">
                            <a href="<?=$url?>" download="" class="btn btn-info" >Télécharger</a> 
                        </div>                    
                    
                    </div>

                <?php endif;?>               
            
            <?php endforeach;  ?>
       </div> 
    </div>
<?php endif; ?>

















<!-- javascript jquery -->
<script src="<?=$route?>javascript/jquery.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!-- bootstrap javascript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script>

</script>
<?php endif; ?>