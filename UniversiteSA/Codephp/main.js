var Boursier=document.getElementById("Boursier");
var TypeBourse=document.getElementById("TypeBourse");
var Loger=document.getElementById("Loger");
var Chambre=document.getElementById("Chambre");
var Libelle=document.getElementById("Libelle");

var NonBoursier=document.getElementById("NBoursier");
var Adresse=document.getElementById("Adresse");

var Nonloger=document.getElementById("Nonloger");
var ANonloger=document.getElementById("ANonloger");

Boursier.disabled=false;
NBoursier.disabled=false;
Loger.disabled=false;
Nonloger.disabled=false;

NonBoursier.onchange= function() {
    TypeBourse.disabled=true; // Null
    Chambre.disabled=true; // Null
    ANonloger.disabled=true; // Null
    Adresse.disabled=false; // insert seulement Adresse false par defaut egal ajouter (champ Ok)
    Libelle.disabled=true; // Null
}
Boursier.onchange= function(){
    Adresse.disabled=true; // Null
    TypeBourse.disabled=false; // on insert le Type de bourser soit entiere ou demi
    Chambre.disabled=false; // on insert le type de chambre
    ANonloger.disabled=false; // on insert l'adresse d'un Non loger 
    Libelle.disabled=false; // on insert le libellé
}
Loger.onchange = function(){
    Adresse.disabled=true; // Null
    TypeBourse.disabled=false; // on insert le Type de bourser soit entiere ou demi
    Chambre.disabled=false; // on insert le type de chambre
    Libelle.disabled=false; // on insert le libellé
    ANonloger.disabled=true; // on insert l'adresse d'un Non loger 
}
Nonloger.onchange = function(){
    Adresse.disabled=true; // Null 
    TypeBourse.disabled=false; // peut avoir une bourse
    Chambre.disabled=true; // Null
    ANonloger.disabled=false; // on insert l'adresse d'un Non loger 
    Libelle.disabled=true;
}
 
    // document.getElementById('infoNonBoursier').style.display='none';
    // document.getElementById('infoBoursier').style.display='none';
    // function showHideBourse() {
    //     if (document.getElementById('nonBoursier').checked) {
    //         document.getElementById('infoNonBoursier').style.display='block';
    //     document.getElementById('infoBoursier').style.display='none';
    //     }else if(document.getElementById('Boursier').checked)
    //     {
    //         document.getElementById('infoBoursier').style.display='block';
    //         document.getElementById('infoNonBoursier').style.display='none';
    //         document.getElementById('infoLoger').style.display='none';           
    //     }
    //     if (document.getElementById('Loger').checked) {
    //     document.getElementById('infoLoger').style.display='block';
    //    }
    // }       