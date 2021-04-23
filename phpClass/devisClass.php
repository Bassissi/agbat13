<?php

 class Devis
{
   
   /**-1-
  * 
  * chercherDevis
  * @param  string $identifiant
  * @return  string array 
  */

  public static function chercherDevis($identifiant)
	  {
	  	$pdo= new PDO(SGBD.':host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

	  	$requette=$pdo->prepare("SELECT * FROM `devis` WHERE identifiant='$identifiant' ");
	  	$requette->execute(array()); 

	  	$resultat=$requette->FetchAll(PDO::FETCH_ASSOC); 
	  	return $resultat; 
	  }

  

  /**-2-
  * 
  * Vérifier si l'identifiant existe ou pas 
  * @param   string $identifiant
  * @return  bool true " s'il existe " ou  bool false "s'il n'est pas existe "
  */
  public static function verifierIdentifiant($identifiant)
  {
      $pdo= new PDO(SGBD.':host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

      $requette=$pdo->prepare("SELECT * FROM `devis` WHERE identifiant='$identifiant' ");
      $requette->execute(array()); 

      $resultat=$requette->FetchAll(PDO::FETCH_ASSOC); 
      
      if($resultat)
      {
          return true; 
      }
      else
      {
          return false; 
      }

  } 

   /**-3-
  * 
  * chercherFiles
  * @param  string $identifiant
  * @return  string array 
  */

  public static function chercherFiles($identifiant)
	  {
	  	$pdo= new PDO(SGBD.':host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

	  	$requette=$pdo->prepare("SELECT * FROM `file` WHERE identifiant='$identifiant' ");
	  	$requette->execute(array()); 

	  	$resultat=$requette->FetchAll(PDO::FETCH_ASSOC); 
	  	return $resultat; 
	  }  



  /**-4-
  * 
  * ecrire : créer un devis dans notre la table devis 
  * @param  tous les paramètres 
  * @return  void
  */
  public static function createDevis($civilite,$nom,$mail,$phone,$adresse,$bat,$anneeC,$pieces,$prestations,$surface,$etage,$etat,$meublees,$agglomeration,$permis,$dateTravail,$rendez,$informationsS,$identifiant)
  {
      $pdo= new PDO(SGBD.':host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

      $requette=$pdo->prepare('INSERT INTO `devis` (`id`, `civilite`, `nom`, `mail`,`phone`, `adresse`, `bat`, `anneeC`, `pieces`, `prestations`, `surface`, `etage`, `etat`, `meublees`, `agglomeration`, `permis`, `dateTravail`, `rendez`, `informationsS`, `identifiant`) 
      VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
      //$moment=NOW(); 
      $requette->execute(array($civilite,$nom,$mail,$phone,$adresse,$bat,$anneeC,$pieces,$prestations,$surface,$etage,$etat,$meublees,$agglomeration,$permis,$dateTravail,$rendez,$informationsS,$identifiant)); 

  }  

  /**-5-
  * 
  * ecrire : créer un fichier  dans notre la table file
  * @param  tous les paramètres 
  * @return  void
  */
  public static function createfile($identifiant, $url)
  {
      $pdo= new PDO(SGBD.':host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

      $requette=$pdo->prepare('INSERT INTO `file` (`id`, `identifiant`, `url`) 
      VALUES (NULL,?,?)');
      //$moment=NOW(); 
      $requette->execute(array($identifiant,$url)); 

  }        





}

?>