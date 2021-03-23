
document.addEventListener("DOMContentLoaded", function () {

    var rectangle = document.querySelector("button.first");
    var ronde = document.querySelector("button.second");
    var reponse ="defaut value";
    rectangle.addEventListener("click", function (event) {
        reponse = "rectangle";
        console.log("c'est "+reponse);
    });

    ronde.addEventListener("click", function (event) {
        reponse = "ronde";
        console.log("c'est "+reponse);
    });
});




/*
function check(){
    var visible = new Boolean("false");

    if(document.getElementById('button').checked){
        //console.log(""+disabled);
        console.log("Coucou c'est check");
        document.getElementById('submit').disabled = false;
    }
    else{
        //console.log(""+disabled);
        document.getElementById('submit').disabled = true;
        console.log("Coucou c'est PAS check");
    }
}
*/