// numéro d'étape
var nEtape=11; 
// var route='http://localhost/businesswordpress/agbat-devis/'; 
var time=120000;

// fonction n'est pas important seulement pour centrer les buttons en étape finale
function center()
{
  
    if(+$("#compteur").val()==11)
    {
        $("#controleur").addClass("textCenter"); 
        
    }
    else
    {
       $("#controleur").removeClass("textCenter");
    }
    
}

function valider()
{
        // afficher le button de formulaie 
        if(+$("#compteur").val()==nEtape)
        {
            
            // afficher le button de formulaire et cacher le button suivent
            $('#suivent').hide(); 
            $('#valider').show();        
   
        }
        else
        {
            $('#suivent').show(); 
            $('#valider').hide();  
        }
}


// confirmation de demande 
function confirme()
		{

          if(confirm("Êtes-vous sûr d'envoyer cette demande ?"))
          {
            //    var v=1;
               $(this).attr("type", "submit");   
               $("#compteur").val(nEtape+1); 
               compteur(); 
               $("#"+nEtape).hide(); 
               $(this).hide();                             
               console.log("oui"); 
           	 
          }




		}
$("#valider").on("click", confirme); 


// compter les étapes 
function compteur()
{
 var compteur =+$("#compteur").val(); 
 
$("#alertP").text("Etape "+compteur+" sur "+nEtape); 
    if(compteur>1)
    {
        $("#precedent").show(); 
        $("#suivent").addClass("ml-2"); 
    }
    else 
    {
        $("#precedent").hide(); 
    }

   if(compteur ==1)
   {
        $("#suivent").removeClass("ml-2");
   }

   if(compteur>=nEtape+1)
    {
        // il faut cacher le button fe formulaire 
        $("#suivent").hide(); 
        $("#precedent").hide(); 
        $("#alertP").hide();
        $("#progresD").hide();
        $('#message').show();         
    }
    else 
    {
        $("#suivent").show();
    }
    


}
compteur(); 

// div 1
    // le nom
    function verfierNom()
    {
        if($(this).val().length >=4 && $(this).val().length<=40 )
        {
            $(this).addClass("is-valid");
            $(this).removeClass("is-invalid");  
        }
        else
        {
            $(this).removeClass("is-valid"); 
            $(this).addClass("is-invalid"); 
        }
    }
    $("#nom").on("select",verfierNom);     
    $("#nom").on("keyup",verfierNom); 
  
    // l'adresse 
        
        function verfierAdresse()
        {
            if($(this).val().length >=6 && $(this).val().length<=80 )
            {
                $(this).addClass("is-valid");
                $(this).removeClass("is-invalid");  
            }
            else
            {
                $(this).removeClass("is-valid"); 
                $(this).addClass("is-invalid"); 
            }
        }
        $("#adresse").on("select",verfierAdresse); 
        $("#adresse").on("keyup",verfierAdresse); 



       //le mail

        function verfierMail()
        {
            if($(this).val().length >=6 && $(this).val().length<=70 &&  $(this).val().includes("@"))
            {
                $(this).addClass("is-valid");
                $(this).removeClass("is-invalid");  
            }
            else
            {
                $(this).removeClass("is-valid"); 
                $(this).addClass("is-invalid"); 
            }
        }
        $("#mail").on("select",verfierMail); 
        $("#mail").on("keyup",verfierMail); 
   
   
        //le phone

        function verfierPhone()
        {
            if($(this).val().length ==10 && Number.isInteger(+$(this).val()))
            {
                $(this).addClass("is-valid");
                $(this).removeClass("is-invalid");  
            }
            else
            {
                $(this).removeClass("is-valid"); 
                $(this).addClass("is-invalid"); 
            }
        }
        $("#phone").on("select",verfierPhone); 
        $("#phone").on("keyup",verfierPhone); 

  
    // passer le premier div 


    function passerDivUn()
    {
        if(+$("#compteur").val()==11 && $("#nom").hasClass("is-valid") && $("#mail").hasClass("is-valid"))
        {
                    
            $('#valider').show(); 

            $("#suiventNotActive").hide(); 
            console.log("test"); 
        }
    
        if((+$("#compteur").val()==11 && !$("#nom").hasClass("is-valid") && !$("#mail").hasClass("is-valid"))
        
            || (+$("#compteur").val()==11 && !$("#nom").hasClass("is-valid")) 
            || (+$("#compteur").val()==11 && !$("#mail").hasClass("is-valid"))
               )
        {
            $('#valider').hide();  
            $("#suiventNotActive").show(); 
        }
        
    }
   
   $("#nom").on("select",passerDivUn); 
   $("#nom").on("keyup",passerDivUn);

   $("#mail").on("select",passerDivUn); 
   $("#mail").on("keyup",passerDivUn); 











// modification 
function agbatM() {
    
   
    if(+$("#compteur").val()>=1 &&+$("#compteur").val()<=10 )
    {

        $("#suivent").show(); 
        $("#suiventNotActive").hide(); 
        console.log("allo1"); 

    }
    else
    {
        $("#suivent").hide();
        $('#valider').hide();  
        $("#suiventNotActive").show();
        console.log("allo11"); 
    }
    console.log(+$("#compteur").val()); 
    
}

agbatM(); 





// le barre de progrès 
function progres()
{
    $("#progres").width(+$("#compteur").val()*9 +"%"); 
    
}
 
// pour le button suivent 
function suivent()
{
   
    var compteur =+$("#compteur").val();
    $("#compteur").val(compteur+1); 
     
    // afficher le div correspondant 
    var compteP=compteur+1; 
    for(var i=compteP; i>0; i--)
    {
        if(i==compteP)
        $("#"+i).show(); 
        else
        $("#"+i).hide(); 
    }
   

}
$("#suivent").on("click",suivent); 
$("#suivent").on("click",compteur);
$("#suivent").on("click",progres);
$("#suivent").on("click",valider);

$("#suivent").on("click",agbatM);
$("#suivent").on("click",passerDivUn);

// pour le button précédent 
function precedent()
{
    
    var compteur =+$("#compteur").val();
    $("#compteur").val(compteur-1); 
    var compteP=compteur-1; 
    for(var i=compteP; i<nEtape+1; i++)
    {
        if(i==compteP)
        $("#"+i).show(); 
        else
        {
          $("#"+i).hide(); 
          
        }
    }


 
}
$("#precedent").on("click",precedent); 
$("#precedent").on("click",compteur); 
$("#precedent").on("click",progres); 
$("#precedent").on("click",valider); 
$("#precedent").on("click",agbatM);
$("#precedent").on("click",passerDivUn);









// maintenant on s'occupe chaque div de formulaire.


  // div 2
  function select()
  {
      var id=$(this).attr("id"); 
      $(".blockIcon input" ).removeAttr("checked");
      $(".blockIcon").css("border","1px solid #ADB5BD"); 
      $("#"+id).css("border","1px solid blue");
      $("#"+id+ " input" ).attr("checked","checked");      
     
  }
  $(".blockIcon").on("click", select); 

  // div 3
  function selectPiece()
  {
      var id=$(this).attr("id"); 
     
      
       if($("#"+id+ " input" ).attr("verifier")=="0")
       {
            $("#"+id).css("border","1px solid blue");
            $("#"+id+ " input" ).attr("checked","checked"); 
            $("#"+id+ " input" ).attr("verifier", "1");   
       }
       else
       {
            $("#"+id).css("border","1px solid #ADB5BD");  
            $("#"+id+ " input" ).removeAttr("checked");
            $("#"+id+ " input" ).attr("verifier", "0"); 
       }
        

    
  }
  $(".blockIconPiece").on("click", selectPiece); 
  
  // div 5
  function selectEtage()
  {
      var id=$(this).attr("id");    
      $(".blockIconEtage input" ).removeAttr("checked");  
      $(".blockIconEtage").css("border","1px solid #ADB5BD"); 
      $("#"+id).css("border","1px solid blue");     
      $("#"+id+ " input" ).attr("checked","checked");     
    
  }
  $(".blockIconEtage").on("click", selectEtage); 

  // div 6
  function selectEtat()
  {
      var id=$(this).attr("id");    
      $(".blockEtat input" ).removeAttr("checked");  
      $(".blockEtat").css("border","1px solid #ADB5BD"); 
      $("#"+id).css("border","1px solid blue");     
      $("#"+id+ " input" ).attr("checked","checked");     
    
  }
  $(".blockEtat").on("click", selectEtat); 

  function selectMeublees()
  {
      var id=$(this).attr("id");    
      $(".blockMeublees input" ).removeAttr("checked");  
      $(".blockMeublees").css("border","1px solid #ADB5BD"); 
      $("#"+id).css("border","1px solid blue");     
      $("#"+id+ " input" ).attr("checked","checked");     
    
  }
  $(".blockMeublees").on("click", selectMeublees); 

  // div 7
  function selectAgglomeration()
  {
      var id=$(this).attr("id");    
      $(".blockAgglomeration input" ).removeAttr("checked");  
      $(".blockAgglomeration").css("border","1px solid #ADB5BD"); 
      $("#"+id).css("border","1px solid blue");     
      $("#"+id+ " input" ).attr("checked","checked");     
    
  }
  $(".blockAgglomeration").on("click", selectAgglomeration); 

  function selectPermis()
  {
      var id=$(this).attr("id");    
      $(".blockPermis input" ).removeAttr("checked");  
      $(".blockPermis").css("border","1px solid #ADB5BD"); 
      $("#"+id).css("border","1px solid blue");     
      $("#"+id+ " input" ).attr("checked","checked");     
    
  }
  $(".blockPermis").on("click", selectPermis); 

 // div 8
    function selectDateTravail()
    {
        var id=$(this).attr("id");    
        $(".blockDateTravail input" ).removeAttr("checked");  
        $(".blockDateTravail").css("border","1px solid #ADB5BD"); 
        $("#"+id).css("border","1px solid blue");     
        $("#"+id+ " input" ).attr("checked","checked");     
      
    }
    $(".blockDateTravail").on("click", selectDateTravail); 

// div 9
function selectRendez()
{
    var id=$(this).attr("id");    
    $(".blockRendez input" ).removeAttr("checked");  
    $(".blockRendez").css("border","1px solid #ADB5BD"); 
    $("#"+id).css("border","1px solid blue");     
    $("#"+id+ " input" ).attr("checked","checked");     
  
}
$(".blockRendez").on("click", selectRendez);   

// div 11

$('#add-image').click(
    function(){
       
        // je récupère le numéro des futurs champs que je vais créer
        var index =+$('#compteurImages').val(); 
         
       
        
        //J'injecte ce code au sein de la div   

        $("#images").append( "<div class='form-group'  id="+index+">"+
                            "<div class=' messageFA' id=messageF"+index+" style='text-align: center;'>"+
                            "Sélectionner votre fichier"+
                            "</div>"+
                            "<div class='row '>"+                                                    

                                "<div class='col-11 col-md-8 pt-2'>"+
                                        "<input type='file' id=f"+index+" name=file"+index+" data="+index+" class='file' onchange='verifierFile("+index+")' >"+
                                "</div>"+                                   
                            
                                "<div class='col-2 pt-2'>"+
                                       " <button type='button' class='btn btn-danger' title='Supprimer ce fichier !' id="+index+">X</button>"+
                                "</div>"+

                                "<div class='col-2 pt-2'>"+
                                "</div>"+
                            "</div>"+
                            
                        "</div>"); 



        // changer le valeur du compteur 
         
        $('#compteurImages').val(index +1); 
        // je gère le bouton supprimer
        handleDeleteButtons(); 
    }
); 

function handleDeleteButtons()
{
    $("#images button").click(function(){
        id=this.id; 
         
        //supprimer cet élément 
        id='#'+id; 


        $("#images "+id).remove(); 
         var index =$('#images div.form-group').length; 
         interditA(); 
          

    }); 
}

function updateCounter(){
    const count = +$("#images div.form-group").length; 
    $('#compteurImages').val(count); 
    
}

updateCounter(); 
handleDeleteButtons();

// Inerdiction de mettre plus de 10 Images
function interditA()
{
    var index =+$('#images div.form-group').length; 
    if(index>9){

        $('#ajouter').hide(); 
    
    }
    else
    {
        $('#ajouter').show(); 
    
    }

}
 $('#ajouter').on("click",interditA); 




 function verifierFile(index){
    
    var format1 ="image/"; 
    var format2 ="application/pdf"; 
    var taille =1500000; 
    var id='f'+index; 
      
    var fileIn = $("#"+id)[0];
    var type = fileIn.files[0].type;
    var size=fileIn.files[0].size;
    var name=fileIn.files[0].name;
   

    if((type.indexOf(format1)==0 || type.indexOf(format2)==0 ) && size<taille)
        {
             
            $('#messageF'+index).removeClass('messageFA'); 
            $('#messageF'+index).removeClass('messageFAPb');
            $('#messageF'+index).addClass('messageFAB');
            $('#messageF'+index).text("Votre fichier "+name+" est bien enregistré"); 
        }
    else
        {
            
            $('#messageF'+index).removeClass('messageFA'); 
            $('#messageF'+index).removeClass('messageFAB'); 
            $('#messageF'+index).addClass('messageFAPb');
            $('#messageF'+index).text("Le Format ou la taille de ce fichier "+name+" est invalide ! "); 
        }
           
 }

// // refresh

// $(document).keydown(function(e){
//     if((e.which || e.keyCode) == 116)
//     {      
//        $(location).attr('href',route);
//     }
//  });


 // afficher le message d'erreure
 function erreure(){
    if($('#1').css('display')=='none' && $('#2').css('display')=='none' && $('#3').css('display')=='none' && $('#4').css('display')=='none' && $('#5').css('display')=='none' && $('#6').css('display')=='none' && $('#7').css('display')=='none' && $('#8').css('display')=='none' && $('#9').css('display')=='none' && $('#10').css('display')=='none' && $('#11').css('display')=='none' && $('#message').css('display')==undefined  ) 
    {
        
        $('#time').hide(); 
        $("#messageErreure").show(); 

       
    }
    else
    {
        $("#messageErreure").hide(); 
        
    }
   
}
function erreureT()
{
    setTimeout(erreure, time); 
}
$('#valider').on("click",erreureT); 

 // afficher le temmps : est en cours de traitement
 function timeT(){
    if($('#1').css('display')=='none' && $('#2').css('display')=='none' && $('#3').css('display')=='none' && $('#4').css('display')=='none' && $('#5').css('display')=='none' && $('#6').css('display')=='none' && $('#7').css('display')=='none' && $('#8').css('display')=='none' && $('#9').css('display')=='none' && $('#10').css('display')=='none' && $('#11').css('display')=='none' && $('#messageErreure').css('display')=='none') 
    {
        
        $("#time").show(); 
       
    }
    else
    {
        $("#time").hide(); 
        
    }
   
}

$('#valider').on("click",timeT ); 






