accueil = document.getElementById('accueil') ;
accueil.addEventListener('mouseover' ,image ) ;
accueil.addEventListener("mouseout" ,image1 ) ;

function image( ) {

    accueil.src="images/home2.png";
    accueil.style.top= "85px";
}

function image1() {

    accueil.src="images/home1.png" ;
    accueil.style.top = "79px" ;

}




deco = document.getElementById('deco') ;
deco.addEventListener('mouseover' ,image2 ) ;
deco.addEventListener("mouseout" ,image3 ) ;


function image2() {

    deco.src="images/off2.png";
    deco.style.top= "85px";

}

function image3() {

    deco.src="images/off.png" ;
    deco.style.top = "79px" ;

}


impression = document.getElementById('impression') ;
impression.addEventListener("mouseover" , image4 );
impression.addEventListener("mouseout" , image5);



function image4( ) {

    impression.src="images/impression1.png";
    impression.style.top= "85px";
}

function image5() {

    impression.src="images/impression.png" ;
    impression.style.top = "79px" ;

}

//////////////////////////////////////////////////////////////


