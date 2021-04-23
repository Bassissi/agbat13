<?php


    /*
    Template Name: template-devis
    */

// get_header();
$route="https://agbat13.fr/"; 
$loction="https://agbat13.fr/devis.php";
include "config/config.php"; 
include "phpClass/devisClass.php";  
$mailT="agbatmarseille@gmail.com";


?>
<!-- bootstrap-->
    <meta  name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="shortcut icon" type="image/x-icon" href="<?=$route?>imagesAgbat/log.png" />    
    <!-- SEO-->
    <title>AGBAT- devis en ligne travaux</title>
    <meta name="description" content="L’entreprise AGBAT vous propose son service pour faire rapidement l’estimation en ligne de vos travaux et bénéficiez de 10% de remise immédiate. Confiez dès maintenant votre projet à un Professionnel qualifié près de chez vous !" >
    <meta name="keywords" content="Agbat, agbat13, agbat 13, devis, Marseille, devis immédiat, devis immédiat des travaux, devis immédiat en 2 minutes, devis en 5 minutes, devis en ligne, devis en ligne des travaux, devis menuiserie, devis peinture, devis électricité, devis plomberie, devis revêtement de sols, contact, devis travaux, devis travaux gratuit, travaux, travaux renovation, devis travaux renovation, renovation maison, devis batiment, entreprise de batiment, prix travaux renovation, cout travaux">	

    <meta charset="utf-8">	
	<meta http-equiv="“content-language”" content="“fr-fr”">   
    <link rel="stylesheet" href="<?=$route?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$route?>css/style1.css">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet"> 

<!-- header-->
<div class="container-fluid headerA mb-1">
    <div class="container">    
        <div class="row">
                        <div class="col-4 col-md-2 pt-3 pb-2">
                                <a href="<?=$route?>"><img src="<?=$route?>imagesAgbat/log.png"  class="log" alt=""></a>                        
                        </div>
                        <div class="col-8 col-md-10 pt-3 pb-2">

                                <p class="textLogo">Profitez d'une remise exceptionelle de 10% sur vos travaux en faisant votre demande en ligne. </p>
                        </div>        
        </div>
    </div>   
</div>


<?php if(isset($_POST['valider'])):?>

        <?php
        // mon code princibale 


        // les datas 
        // div1
        // la civilité
        $civilite=$_POST['civilite']; 
        
        // le nom
        $nom=$_POST['nom']; 

        // le mail
        $mailU=$_POST['mail']; 

        // téléphone
        $phone=$_POST['phone'];

        if (empty($_POST['phone']) ||strlen($_POST['phone'])!=10 || !is_numeric($phone))
        {
                $phone=''; 
        }
        
        // L'adresse 
        $adresse=$_POST['adresse'];

        if (empty($_POST['adresse']) || strlen($_POST['adresse'])<6 || strlen($_POST['adresse'])>80)
        {
                $adresse=''; 
        }
        
        // var_dump($civilite.' '.$nom.' '.$mailU.' '.$phone.' '.$adresse);
        // div 2

        // type de bâtiment 
        $bat=$_POST['bat']; 

        // L'année de construction  
        $anneeC=$_POST['anneeC']; 

        if (empty($_POST['anneeC']) || strlen($_POST['anneeC'])!=4)
        {
                $anneeC=''; 
        }

        // var_dump($bat.' '.$anneeC);
        //div 3
        // dans quelle(s) pièce(S)
        
        $pieces='';  
        for($i=1;$i<=9;$i++)
        {    
                if(isset($_POST['piece'.$i]))
                if( empty($_POST['piece'.$i])==false)
                    {
  
                        $pieces.=$_POST['piece'.$i].', ';                            
                                        
                    }
        }
      
        if(!empty($pieces))
        {
                // enlever , de dernier éléments et mettre . à sa place.
                $pieces=substr($pieces,0,-2); 
                $pieces=$pieces.'. '; 

        }

        //  var_dump($pieces);
        //div 4
        // Prestations
        
        $prestations='';  
        for($i=1;$i<=12;$i++)
        {    
                 if(isset($_POST['prestation'.$i]))
                if( empty($_POST['prestation'.$i])==false)
                    {
                                      
                        $prestations.=$_POST['prestation'.$i].', ';                                        
                                        
                    }
        }

        if(!empty($prestations))
        {
                // enlever , de dernier éléments et mettre . à sa place.
                $prestations=substr($prestations,0,-2); 
                $prestations=$prestations.'. '; 
                $prestations=str_replace("\'", "'", $prestations); 

        }      
        //  var_dump($prestations);
        // div 5
        // surface 
        $surface=$_POST['surface']; 

        if (empty($_POST['surface']) || strlen($_POST['surface'])>6)
        {
                $surface=''; 
        }
        
        
        if(isset($_POST['etage']))
        $etage=$_POST['etage']; 
        else        
        $etage=''; 
        // var_dump($surface.' '.$etage);

        // div 6
        // l'état
        if(isset($_POST['etat']))
        $etat=$_POST['etat']; 
        else        
        $etat='';     
       // les pièces meublées
       if(isset($_POST['meublees']))
       $meublees=$_POST['meublees']; 
       else        
       $meublees=''; 

        // var_dump($etat.' '.$meublees);

        // div 7
        // agglomeration
        $agglomeration=$_POST['agglomeration']; 
       
       // la permis de construction
       if(isset($_POST['permis']))
       $permis=$_POST['permis']; 
       else        
       $permis=''; 

        //  var_dump($agglomeration.' '.$permis);

        // div 8
        // la date des travaux
        if(isset($_POST['dateTravail']))
        $dateTravail=$_POST['dateTravail']; 
        else        
        $dateTravail=''; 

        if(!empty($dateTravail))
        {
                $dateTravail=str_replace("\'", "'", $dateTravail); 
        }   

        // var_dump($dateTravail);

        // div 9
        // Disponibilité de rendez-vous
        $rendez=$_POST['rendez']; 
        // var_dump($rendez);

        // div 10 
        // informations supplémentaires
        $informationsS=$_POST['informationsS'];
        if (empty($_POST['informationsS']) || strlen($_POST['informationsS'])>1500 || strlen($_POST['informationsS'])==35) 
        {
                $informationsS=''; 
        }        
       
        if(!empty($informationsS))
        {
                // $informationsS=substr($informationsS,0,-33);
                $informationsS=str_replace("\'", "'", $informationsS);
                
        }  


        //  var_dump($informationsS);


       // faire un identifiant 
       $identifiant =mt_rand(1000,1000000); 

       while(Devis::verifierIdentifiant($identifiant))
       {
           ++$identifiant; 
       }
       
      // enregistrer le contenu du formulaire 
      Devis::createDevis($civilite,$nom,$mailU,$phone,$adresse,$bat,$anneeC,$pieces,$prestations,$surface,$etage,$etat,
      $meublees,$agglomeration,$permis,$dateTravail,$rendez,$informationsS,$identifiant);



      // envoyer un mail à l'utilisateur 
      $headers0[] = 'MIME-Version: 1.0';
      $headers0[]= 'Content-type: text/html; charset=utf-8';
      $to      = $mailU; 
      $subject = 'AGBAT: gardez votre identifiant pour avoir 10% réduction sur votre devis';      
      $message = '
      <html>
       <head>
        <title>AGBAT: gardez votre identifiant pour avoir 10% réduction sur votre devis</title> 
       </head>
       <body style="">
          <center style="">
              <div>
                  <a href="https://agbat13.fr/"><img src="https://agbat13.fr/wp-content/uploads/2020/02/cropped-logo-ag-bat-86x86.png" alt=""></a>
              </div>
              <div>
                  <h2 style="color: #032497; margin-top:0;">Service devis en ligne</h2>
              </div>
          </center> 
         
          <div style="color:white; background-color:#02B875;   margin-left:10%; margin-right:10%; padding:3%; border-radius:5px;  ">
              
                  <p>Nous vous remercions d\'avoir demandé votre devis. '.$civilite.' '.$nom.' gardez cet identifiant : '. '<strong style="color:red;">'.$identifiant.'</strong>  pour avoir 10% réduction sur votre devis.</p>              
                  <p>AGBAT se fera un plaisir de vous répondre dans les meilleurs délais.</p>            
                 
          </div>  
          <div style="text-align:center"><img src="https://agbat13.fr/wp-content/uploads/2020/05/logo-offre-speciale.jpg"  ></div>
          
          </body>
      </html>
      ';
       
      
      mail($to, $subject, $message,implode("\r\n", $headers0));
      
         ?>
         <!-- enregistrer les fichiers-->
         <?php
     
               for($i=0;$i<=30;$i++)
               {
                        if(isset($_FILES['file'.$i]['type']))
                        {
                        // vérifier le type et la taille de fichier 
                                if((stristr($_FILES['file'.$i]['type'],'image')||$_FILES['file'.$i]['type']=='application/pdf')&&$_FILES['file'.$i]['size']<=1500000)
                                {
                                        // verifier si le nom de fichier existe ou pas puis on l'enregistre
                                        $nomFile=$identifiant; 
                                        $lesNomsFiles=glob('filesHmzeh/*'); 

                                        // récupérer l'extension de fichier
                                        if(stristr($_FILES['file'.$i]['type'],'image'))
                                        {
                                                $extension='.';
                                                $extension.=substr($_FILES['file'.$i]['type'],6,30); 

                                        }
                                        else
                                        {
                                                $extension='.pdf'; 
                                        }

                                        $nomFile=$identifiant.$extension; 


                                        foreach ($lesNomsFiles as $value )
                                        {                                                                
                                          
                                            if($value=='filesHmzeh/'.$nomFile)                  
                                            {
                                             
                                              $nomFile='h'.$nomFile;                 
                                              
                                            }                                                        
                                        } 
                                        $urlFile='filesHmzeh/'.$nomFile; 
                                        // enregistrer le fichier                                   
                                        move_uploaded_file($_FILES['file'.$i]['tmp_name'], $urlFile);

                                        // mettre url dans la base des données
                                        Devis::createfile($identifiant,$urlFile);  


                                }
                        }
               } 


         ?>

         <!-- Envoyer un mail à Agbat pour indiquer la demande-->
         <?php
                $headers[] = 'MIME-Version: 1.0';
                $headers[]= 'Content-type: text/html; charset=utf-8';
                $to      = $mailT;                
                $subject = 'AGBAT: Demande un devis de '.$civilite.' '.$nom;              
                $urlDemande=$route.'show.php?id='.$identifiant; 
                $message = '
                <html>
                <head>
                <title></title> 
                </head>
                <body style="">
                <center style="">
                        <div>
                        <a href="https://agbat13.fr/"><img src="https://agbat13.fr/wp-content/uploads/2020/02/cropped-logo-ag-bat-86x86.png" alt=""></a>
                        </div>
                        <div>
                        <h2 style="color: #032497; margin-top:0;">'.$civilite.' '.$nom.' N°:'.$identifiant.' </h2>
                        </div>
                </center> 
                
                <div style="color:white; background-color:#73738C;  text-align:center; margin-left:10%; margin-right:10%; padding:3%; border-radius:5px; padding-bottom:50px; ">
                        
                        <p style="margin-bottom: 25px;">'.$civilite.' '.$nom.' a demandé un devis</p>              
                        <a href='.$urlDemande.' style="border:1px solid red; padding:10px; background-color:#FF0000;  
                        border-radius:5px; color:white;  text-decoration: none;            
                        ">Regarder sa demande</a>   
                        
                </div>  
                
                
                </body>
                </html>
                ';
                mail($to, $subject, $message,implode("\r\n", $headers));

         ?>

     
        <!--Message finale -->
        <div class="container">
                <div class="alert alert-dismissible alert-success mt-5 cach" id="message" >
                       <p > Nous vous remercions d'avoir demandé votre devis. <?=$_POST['civilite'];?> <?=$_POST['nom'];?> gardez cet identifiant : <strong class="red"><?=$identifiant;?></strong> pour avoir 10% réduction sur votre devis. 
                        Nous vous avons également envoyé cet identifiant par <strong>mail</strong>.</p>                        
                       <p> AGBAT se fera un plaisir de vous répondre dans les meilleurs délais.</p>
                </div>
                
        </div> 



<?php else:?>


<!-- parti du travail-->    
<div class="container">

        <div class="alert alert-dismissible alert-secondary" id="alertP">
                
        </div>
        <div class="progress mb-2"  style="margin-top: -10px;" id="progresD" >
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 9%" id="progres"></div>
        </div>        

        <input type="number" value="1" id="compteur" style="display:none">
        <!--  la partie de formulaire  -->
<form method="POST"  enctype="multipart/form-data" >	     
        <div id="formulaire">   

                <div id="1"  class="mt-3" >
                        <h4 class="couleurB"> Demander votre devis en deux minutes </h4>
                        <p>Pour quel type de bâtiment ? (Facultatif)</p>
                        <div class="row ml-2">
                                <div class=" col-5 col-md-2  blockIcon  textCenter"  id="bat1">
                                   <div class="textRight">   
                                        <input type="radio" class="" name="bat" value="Appartement" checked > 
                                   </div>                                                                  
                                   <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/apartmentBuilding.svg" class="icon"  >
                                   <p class="mt-3 mb-4">Appartement</p>
                                </div>
                                <div class=" col-5 col-md-2  blockIcon  textCenter"  id="bat2">
                                   <div class="textRight"> 
                                        <input type="radio" class="" name="bat" value="Maison individuelle">
                                   </div>                                      
                                   <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/standaloneHouse.svg" class="icon"  >
                                   <p class="mt-3 mb-4">Maison individuelle</p>
                                </div>
                                <div class=" col-5 col-md-2  blockIcon  textCenter"  id="bat3">
                                   <div class="textRight">  
                                        <input type="radio" class="" name="bat" value="Bureau"> 
                                   </div>                                       
                                   <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/commercialBuilding.svg" class="icon"  >
                                   <p class="mt-3 mb-4">Bureau</p>
                                </div>
                                <div class=" col-5 col-md-2  blockIcon  textCenter"  id="bat4">
                                   <div class="textRight">  
                                        <input type="radio" class="" name="bat" value="Commerce">
                                   </div>                                    
                                   <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/house1Level.svg" class="icon"  >
                                   <p class="mt-3 mb-4">Commerce</p>
                                </div>
                                <div class=" col-5 col-md-2  blockIcon  textCenter"  id="bat5">
                                   <div class="textRight">    
                                        <input type="radio" class="" name="bat" value="Immeuble"> 
                                   </div>                                    
                                   <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/farmHouse.svg" class="icon"  >
                                   <p class="mt-3 mb-4">Immeuble</p>
                                </div>
                                <div class=" col-5 col-md-2  blockIcon  textCenter"  id="bat6">
                                   <div class="textRight">   
                                        <input type="radio" class="" name="bat" value="Local industriel">  
                                   </div>                               
                                   <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/industrialBuilding.svg" class="icon"  >
                                   <p class="mt-3 mb-4">Local industriel</p>
                                </div>
                                <div class=" col-5 col-md-2  blockIcon  textCenter"  id="bat7">
                                   <div class="textRight"> 
                                        <input type="radio" class="" name="bat" value="Usine">
                                   </div>                                       
                                   <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/industrialBuilding.svg" class="icon"  >
                                   <p class="mt-3 mb-4">Usine</p>
                                </div>
                                <div class=" col-5 col-md-2  blockIcon  textCenter"  id="bat8">
                                   <div class="textRight">
                                        <input type="radio" class="" name="bat" value="Hôtel">
                                   </div>                                      
                                   <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/hotel.svg" class="icon"  >
                                   <p class="mt-3 mb-4">Hôtel</p>
                                </div>
                        </div>
                        <p class="mt-3">Quelle est l'année de la construction ? (Facultatif)</p>
                        <div class="row ">
                             <div class="col-6 col-md-4">
                                <input type="number" name="anneeC" class="form-control" id="anneeC" maxlength="4"  size="4" value="2000">                             
                             </div>  
                        
                        </div>
                </div>
                <div id="2" style="display:none">
                        <p>Dans quelle(s) pièce(s) souhaitez-vous réaliser vos travaux ? (Facultatif)</p>
                                <div class="row ml-2">
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="piece1">
                                                <div class="textRight">
                                                        <input type="checkbox" class="" name="piece1" value="Salon" verifier="0" >
                                                </div>        
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/livingRoom.svg" class="icon"  >
                                                <p class="mt-3 mb-4">Salon</p>
                                        </div>
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="piece2">
                                                <div class="textRight">
                                                        <input type="checkbox" class="" name="piece2" value="Chambre(s)" checked verifier="1">
                                                </div>        
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/bedroom.svg" class="icon"  >
                                                <p class="mt-3 mb-4">Chambre(s)</p>
                                        </div>
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="piece3">
                                                <div class="textRight">
                                                         <input type="checkbox" class="" name="piece3" value="Salle de bains ou toilettes" verifier="0">
                                                </div>         
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/bath.svg" class="icon"  >
                                                <p class="mt-3 mb-4">Salle de bains ou toilettes</p>
                                        </div>
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="piece4">
                                                <div class="textRight">
                                                         <input type="checkbox" class="" name="piece4" value="Cuisine" verifier="0">
                                                </div>         
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/kitchen.svg" class="icon"  >
                                                <p class="mt-3 mb-4">Cuisine</p>
                                        </div>
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="piece5">
                                                <div class="textRight">
                                                         <input type="checkbox" class="" name="piece5" value="Combles" verifier="0">
                                                </div>         
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/attic.svg" class="icon"  >
                                                <p class="mt-3 mb-4">Combles</p>
                                        </div>
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="piece6">
                                                <div class="textRight">
                                                        <input type="checkbox" class="" name="piece6" value="Sous-sol" verifier="0">
                                                </div>        
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/basement.svg" class="icon"  >
                                                <p class="mt-3 mb-4">Sous-sol</p>
                                        </div>
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="piece7">
                                                <div class="textRight">
                                                        <input type="checkbox" class="" name="piece7" value="Garage ou cabanon" verifier="0">
                                                </div>        
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/garage.svg" class="icon"  >
                                                <p class="mt-3 mb-4">Garage ou cabanon</p>
                                        </div>
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="piece8">
                                                <div class="textRight">
                                                        <input type="checkbox" class="" name="piece8" value="Extérieur" verifier="0">
                                                </div>        
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/publicPark.svg" class="icon"  >
                                                <p class="mt-3 mb-4">Extérieur</p>
                                        </div>                                        
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="piece9">
                                                <div class="textRight">
                                                        <input type="checkbox" class="" name="piece9" value="Autre" verifier="0">
                                                </div>        
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/more.svg" class="icon" >
                                                <p class="mt-3 mb-4">Autre</p>
                                        </div>
                                </div>
                      
                </div>
                <div id="3" style="display:none">
                        <p>Quelle prestation souhaitez-vous ? (Facultatif)</p>
                                <div class="row ml-2">
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="prestation1">
                                                <div class="textRight">
                                                        <input type="checkbox" class="" name="prestation1" value="Rénovation des murs ou plafonds" verifier="1" checked>
                                                </div>        
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/interiorWalls.svg" class="icon"  >
                                                <p class="mt-3 mb-4">Rénovation des murs ou plafonds</p>
                                        </div>
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="prestation2">
                                                <div class="textRight">
                                                        <input type="checkbox" class="" name="prestation2" value="Travaux de maçonnerie" checked verifier="1">
                                                </div>
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/plasteringTool.svg" class="icon"  >
                                                <p class="mt-3 mb-4">Travaux de maçonnerie</p>
                                        </div>
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="prestation3">
                                                <div class="textRight">
                                                        <input type="checkbox" class="" name="prestation3" value="Installation d'un revêtement de sol" verifier="1" checked>
                                                </div>
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/parquet.svg" class="icon"  >
                                                <p class="mt-3 mb-4">Installation d'un revêtement de sol</p>
                                        </div>
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="prestation4">
                                                <div class="textRight">
                                                        <input type="checkbox" class="" name="prestation4" value="Pose d'un carrelage sol ou mur" verifier="0">
                                                </div>
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/tiles.svg" class="icon"  >
                                                <p class="mt-3 mb-4">Pose d'un carrelage sol ou mur</p>
                                        </div>
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="prestation5">
                                                <div class="textRight">
                                                        <input type="checkbox" class="" name="prestation5" value="Installation de fenêtres ou portes" verifier="0">
                                                </div>
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/windowFrame.svg" class="icon"  >
                                                <p class="mt-3 mb-4">Installation de fenêtres ou portes</p>
                                        </div>
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="prestation6">
                                                <div class="textRight">
                                                        <input type="checkbox" class="" name="prestation6" value="Travaux de démolition" verifier="0">
                                                </div>
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/wreckingBall.svg" class="icon"  >
                                                <p class="mt-3 mb-4">Travaux de démolition</p>
                                        </div>
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="prestation7">
                                                <div class="textRight">
                                                         <input type="checkbox" class="" name="prestation7" value="Travaux d'électricité" verifier="1" checked>
                                                </div>
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/lights.svg" class="icon"  >
                                                <p class="mt-3 mb-4">Travaux d'électricité</p>
                                        </div>
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="prestation8">
                                                <div class="textRight">
                                                        <input type="checkbox" class="" name="prestation8" value="Travaux de plomberie" verifier="0">
                                                </div>
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/fixtures.svg" class="icon"  >
                                                <p class="mt-3 mb-4">Travaux de plomberie</p>
                                        </div>                                        
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="prestation9">
                                                <div class="textRight">
                                                         <input type="checkbox" class="" name="prestation9" value="Système de chauffage" verifier="0">
                                                </div>
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/radiator.svg" class="icon" >
                                                <p class="mt-3 mb-4">Système de chauffage</p>
                                        </div>
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="prestation10">
                                                <div class="textRight">
                                                         <input type="checkbox" class="" name="prestation10" value="Rénovation de la toiture" verifier="0">
                                                </div>
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/chimney.svg" class="icon" >
                                                <p class="mt-3 mb-4">Rénovation de la toiture</p>
                                        </div>
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="prestation11">
                                                <div class="textRight">
                                                         <input type="checkbox" class="" name="prestation11" value="Ravalement de façade" verifier="0">
                                                </div>
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/exteriorWall.svg" class="icon" >
                                                <p class="mt-3 mb-4">Ravalement de façade</p>
                                        </div>
                                        <div class=" col-5 col-md-2  blockIconPiece  textCenter"  id="prestation12">
                                                <div class="textRight">
                                                         <input type="checkbox" class="" name="prestation12" value="Autre" verifier="0">
                                                </div>
                                                <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/more.svg" class="icon" >
                                                <p class="mt-3 mb-4">Autre</p>
                                        </div>
                                </div>
                      
                </div>
                <div id="4" style="display:none">
                        <p class="mt-3">Quelle est la surface approximative en m2 ? (Facultatif)</p>
                        <div class="row ">
                             <div class="col-6 col-md-4">
                                <input type="number" name="surface" class="form-control" id="surface" maxlength="6"  size="6" value="6">                             
                             </div>                          
                        </div>

                        <p class="mt-4">Combien y a-t-il d'étages dans le bâtiment ? (Facultatif)</p>
                        <div class="row ml-1">
                                <div class=" col-5 col-md-2  blockIconEtage  textCenter" id="etage1" >
                                   <div class="textRight">     
                                        <input type="radio" class="" name="etage" value="1"  >
                                   </div>
                                   <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/house1Level.svg" class="icon"  >
                                   <p class="mt-3 mb-4">1</p>
                                </div>
                                <div class=" col-5 col-md-2  blockIconEtage  textCenter" id="etage2"  >
                                   <div class="textRight">     
                                        <input type="radio" class="" name="etage" value="2"  >
                                   </div>
                                   <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/house2Levels.svg" class="icon"  >
                                   <p class="mt-3 mb-4">2</p>
                                </div>
                                <div class=" col-5 col-md-2  blockIconEtage  textCenter" id="etage3"  >
                                   <div class="textRight">     
                                         <input type="radio" class="" name="etage" value="3 ou plus"  >
                                   </div>
                                   <img src="https://s3-eu-west-1.amazonaws.com/svg-icons/house3Levels.svg" class="icon"  >
                                   <p class="mt-3 mb-4">3 ou plus </p>
                                </div>
                        </div> 

                </div>
                <div id="5" style="display:none">
                                <p class="">Quel est l'état général du bien ? (Facultatif)</p>
                                <div class="row ml-3">
                                        <div class=" col-10 col-md-7 row blockEtat mb-2  " id="etat1" > 
                                                <div class="col-12 col-md-12  textRight mt-2 ml-3 "> 
                                                        <input type="radio" class=" " name="etat" value="Bon état"  >
                                                </div> 
                                                <div class="col-12 col-md-12  "> 
                                                         <p >Bon état </p>
                                                </div>                                         

                                        </div>
                                        <div class=" col-10 col-md-7 row blockEtat mb-2 " id="etat2" > 

                                                <div class="col-12 col-md-12 textRight mt-2 ml-3"> 
                                                        <input type="radio" class=" " name="etat" value="Etat moyen"  >
                                                </div>                                          
                                                <div class="col-12 col-md-12"> 
                                                         <p >Etat moyen </p>
                                                </div>                 
        
                                        </div>

                                        <div class=" col-10 col-md-7 row blockEtat mb-2 " id="etat3" >
                                                <div class="col-12 col-md-12 textRight mt-2 ml-3 "> 
                                                        <input type="radio" class=" " name="etat" value="Mauvais état"  >
                                                </div> 

                                                <div class="col-12 col-md-12"> 
                                                         <p >Mauvais état </p>
                                                </div>                                         

                                        </div>
                                        <div class=" col-10 col-md-7 row blockEtat mb-2 " id="etat4" > 
                                                <div class="col-12 col-md-12 textRight mt-2 ml-3 "> 
                                                        <input type="radio" class=" " name="etat" value="Très mauvais état"  >
                                                </div>                                                  
                                                <div class="col-12 col-md-12 "> 
                                                         <p >Très mauvais état </p>
                                                </div>                                         

                                        </div>
                                </div>
                                <p class="mt-4">Les pièces sont-elles meublées ? (Facultatif)</p>
                                <div class="row ml-3">
                                        <div class=" col-8 col-md-4 row blockMeublees mb-2 " id="meublees1" >
                                                <div class="col-12 col-md-12  textRight mt-2 ml-3 "> 
                                                        <input type="radio" class=" " name="meublees" value="Oui"  >
                                                </div>                                                   
                                                <div class="col-12 col-md-12"> 
                                                         <p >Oui </p>
                                                </div>                                         

                                        </div>
                                        <div class="col-12"></div>
                                        <div class=" col-8 col-md-4 row blockMeublees mb-2 " id="meublees2" > 
                                                <div class="col-12 col-md-12  textRight mt-2 ml-3"> 
                                                        <input type="radio" class=" " name="meublees" value="Non"  >
                                                </div>                                       
                                                <div class="col-12 col-md-12 "> 
                                                         <p >Non </p>
                                                </div>                                
                                        </div>                          
                                </div>                         
                        </div>
                <div id="6" style="display:none">
                        <p >Où se situe le bâtiment ? (Facultatif)</p>
                        <div class="row ml-3">
                                <div class=" col-8 col-md-7 row blockAgglomeration mb-2 " id="agglomeration1" >
                                        <div class="col-12 col-md-12 textRight mt-2 ml-3 "> 
                                                <input type="radio" class=" " name="agglomeration" value="Dans une agglomération" checked >
                                        </div>                                          
                                        <div class="col-12 col-md-12 "> 
                                                <p >Dans une agglomération </p>
                                        </div>                      
                                 </div>

                                <div class=" col-8 col-md-7 row blockAgglomeration mb-2 " id="agglomeration2" >  
                                        <div class="col-12 col-md-12  textRight mt-2 ml-3 "> 
                                                <input type="radio" class=" " name="agglomeration" value="Hors agglomération"  >
                                        </div>                                         
                                        <div class="col-12 col-md-12 "> 
                                                <p >Hors agglomération </p>
                                        </div>                                         
                                </div>                                                           
                        </div>
                        <p class="mt-4">Disposez-vous d'un permis de construire ? (Facultatif)</p>
                        <div class="row ml-3">
                                <div class=" col-8 col-md-4 row blockPermis mb-2 " id="permis1" > 
                                        <div class="col-12 col-md-12  textRight mt-2 ml-3"> 
                                                <input type="radio" class=" " name="permis" value="Oui"  >
                                        </div>                                          
                                        <div class="col-12 col-md-12 "> 
                                                <p >Oui </p>
                                        </div>                                         

                                </div>
                                <div class="col-12"></div>
                                <div class=" col-8 col-md-4 row blockPermis mb-2 " id="permis2" >
                                        <div class="col-12 col-md-12 textRight mt-2 ml-3 "> 
                                                <input type="radio" class=" " name="permis" value="Non"  >
                                        </div>                                           
                                        <div class="col-12 col-md-12"> 
                                                <p >Non </p>
                                        </div>                                         

                                </div>                                                           
                        </div>
                </div>        
                <div id="7" style="display:none">
                        <p >Quand souhaitez-vous que le travail soit terminé ? (Facultatif)</p>
                                <div class="row ml-3">
                                        <div class=" col-8 col-md-7 row blockDateTravail mb-2 " id="dateTravail1" > 
                                                <div class="col-12 col-md-12 textRight mt-2 ml-3"> 
                                                        <input type="radio" class=" " name="dateTravail" value="Urgent"  >
                                                </div>                                                  
                                                <div class="col-12 col-md-12"> 
                                                        <p >Urgent </p>
                                                </div>                                         

                                        </div>
                                        <div class=" col-8 col-md-7 row blockDateTravail mb-2 " id="dateTravail2" > 
                                                <div class="col-12 col-md-12 textRight mt-2 ml-3"> 
                                                        <input type="radio" class=" " name="dateTravail" value="Pas de date fixée"  >
                                                </div>                                                  
                                                <div class="col-12 col-md-12"> 
                                                        <p >Pas de date fixée </p>
                                                </div>                                         

                                        </div>                                                           
                                        <div class=" col-8 col-md-7 row blockDateTravail mb-2 " id="dateTravail3" > 
                                                <div class="col-12 col-md-12 textRight mt-2 ml-3"> 
                                                        <input type="radio" class=" " name="dateTravail" value="Dans moins de deux semaines"  >
                                                </div>                                                  
                                                <div class="col-12 col-md-12"> 
                                                        <p >Dans moins de deux semaines </p>
                                                </div>                                         

                                        </div>                                                           
                                        <div class=" col-8 col-md-7 row blockDateTravail mb-2 " id="dateTravail4" > 
                                                <div class="col-12 col-md-12 textRight mt-2 ml-3"> 
                                                        <input type="radio" class=" " name="dateTravail" value="Dans moins d'un mois"  >
                                                </div>                                                  
                                                <div class="col-12 col-md-12"> 
                                                        <p >Dans moins d'un mois </p>
                                                </div>                                         

                                        </div>                                                           
                                        <div class=" col-8 col-md-7 row blockDateTravail mb-2 " id="dateTravail5" >
                                                <div class="col-12 col-md-12 textRight mt-2 ml-3 "> 
                                                        <input type="radio" class=" " name="dateTravail" value="Dans moins de 6 mois"  >
                                                </div>                                                   
                                                <div class="col-12 col-md-12"> 
                                                        <p >Dans moins de 6 mois </p>
                                                </div>                                         

                                        </div>                                                           
                                </div>                        
                </div>
                <div id="8" style="display:none">
                        <p >En ce qui concerne la crise COVID-19, comment souhaitez-vous procéder ensuite pour les travaux? (Facultatif)</p>
                        <p class="covid ml-1">*Tous nos professionnels sont d'accord et respectent la politique gouvernementale de santé : restez à l'intérieur si vous avez des symptômes de rhume ou de grippe, ne vous serrez pas les mains, lavez vous les mains régulièrement avec de l'eau et du savon ou utilisez des désinfectants hygiéniques, toussez / éternuez à l'intérieur de votre coude, utilisez des mouchoirs en papier à usage unique, ne touchez pas votre visage, évitez les zones peuplées et gardez au moins 1 m de distance des autres.</p>
                                <div class="row ml-3">
                                        <div class=" col-8 col-md-8 row blockRendez mb-2 " id="rendez1" >  
                                                <div class="col-12 col-md-12  textRight mt-2 ml-3  "> 
                                                        <input type="radio" class=" " name="rendez" value="Disponible" checked >
                                                </div>                                        
                                                <div class="col-12 col-md-12"> 
                                                        <p >Disponible pour un rendez-vous - en respectant toutes les précautions sanitaires </p>
                                                </div>                                         

                                        </div>
                                        <div class=" col-8 col-md-8 row blockRendez mb-2 " id="rendez2" > 
                                                <div class="col-12 col-md-12 textRight mt-2 ml-3 "> 
                                                        <input type="radio" class=" " name="rendez" value="Disponible mais par email, appel téléphonique ou vidéo préféré"  >
                                                </div>                                                  
                                                <div class="col-12 col-md-12"> 
                                                        <p >Je préfère ne pas avoir de rendez-vous pour le moment - email, appel téléphonique ou vidéo préféré </p>
                                                </div>                                         

                                        </div>                                                           
                                        <div class=" col-8 col-md-8 row blockRendez mb-2 " id="rendez3" >
                                                <div class="col-12 col-md-12 textRight mt-2 ml-3"> 
                                                        <input type="radio" class=" " name="rendez" value="Autre"  >
                                                </div>                                                   
                                                <div class="col-12 col-md-12"> 
                                                        <p >Autre</p>
                                                </div>                                         

                                        </div>                                                           
                                </div>                        
                        </div>
                <div id="9" style="display:none">
                       <p>Informations supplémentaires (Facultatif) Merci de ne pas partager vos coordonnées ici</p>                                                          
                       <div class="col-10 col-md-6 "> 
                                <textarea   name="informationsS" id="informationsS" cols="30" rows="10" class="form-control" > 
                                </textarea>
                       </div>  
                </div>
                <div id="10" style="display:none">
                        <p>Photos ou plans (Facultatif)</p>
                        <p class="covid ml-1">En ajoutant des photos, les artisans pourront mieux évaluer le travail à réaliser pour votre projet de chantier et vous faire un devis plus précis.<span class="red"> (10 fichiers maximum, 15MB)</span></p> 
                        <input type="hidden" id="compteurImages" value="0">
                        
                        <div  id="images" class="">
                    
                        </div>
                        <div class="form-group" id="ajouter">
                                <button type="button" id="add-image" class="btn btn-primary ">
                                         Ajouter une image
                                </button>
                         </div>  


                       

                </div>
                <div id="11"  class="mt-3" style="display:none;"  >
                                                
                         <div class="row">                             
                                <div class="col-8 col-md-4">
                                        <label for="civilite"><strong>Civilité</strong></label>
                                        <select name="civilite" class="form-control" id="civilite">
                                                <option value="Madame">Madame</option>
                                                <option value="Monsieur">Monsieur</option>
                                        </select>
                                </div>                                
                        </div> 
                        <div class="row mt-1">
                                <div class="col-10 col-md-4">
                                     
                                        <label for="nom" ><strong>Nom<span class="red">*</span></strong></label>
                                        <input type="text" name="nom" class="form-control " id="nom" maxlength="40" minlength="4" required>   
                                                                            
                                </div>        
                        
                        </div> 

                        <div class="row mt-1">
                                <div class="col-10 col-md-4">
                                        <label for="mail"><strong>Mail<span class="red">*</span></strong></label>
                                        <input type="text" name="mail" class="form-control" id="mail" maxlength="70" required>                                        
                                </div>                         
                        </div> 

                        <div class="row mt-1">
                                <div class="col-10 col-md-4">
                                        <label for="phone"><strong>Téléphone</strong> (Facultatif)</label>
                                        <input type="text" name="phone" class="form-control" id="phone" maxlength="10">                                        
                                </div>                         
                        </div>  

                        <div class="row mt-1">
                                <div class="col-10 col-md-4">
                                        <label for="adresse"><strong>Adresse</span></strong> (Facultatif)</label>
                                        <input type="text" name="adresse" class="form-control" id="adresse" maxlength="80" >                                        
                                </div>                         
                        </div> 
                       
                      
                </div>                 
        </div>
        
        <div id="controleur">
                 
                 <input type="button" class="btn btn-dark mt-3 mb-3 " id="precedent" value="Précédent">             
                 <input type="button" class="btn btn-success mt-3 mb-3 " id="suivent" value="Suivant">
                 <input type="button" id='valider' value="Suivant" class="btn btn-success mt-3 mb-3" style="display:none;" name="valider" title="Envoyer votre demande" />      
                 <img src="https://agbat13.fr/imagesAgbat/suivant1.PNG" class="mt-1"  title="Remplir les champs Nom et Mail pour continuer " id="suiventNotActive">
        </div>

</form>
</div>
<?php endif; ?>

         <!-- Message ereure -->
         <div class="container textCenter " style="display:none" id="messageErreure">         
                <div class="alert alert-dismissible alert-danger ">
                        <p>Vérifier votre saisie ! </p>
                        <a href="<?=$loction?>" class="btn btn-primary">Lancer autre demande</a>
                </div>
        </div>

        <div class="container textCenter" id="time" style="display: none;">
                  
        <img src="<?=$route?>imagesAgbat/time.png"   title="Votre demande est en cours de traitement" >       
        </div>



<!-- javascript jquery -->
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!-- bootstrap javascript -->
      


      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- mon javascript-->        
        <script src="<?=$route?>javascript/javascript.js"></script>





