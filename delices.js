let presentation = document.getElementById('presentation');
let presentation2 = document.getElementById('presentation2');
let presentation3 = document.getElementById('presentation3');

function bonjour(){

presentation.textContent = 'Les délices du Sahel vous souhaitent la bienvenue';

}
setTimeout('bonjour()', 2000);

function aPropos(){


presentation2.textContent = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit qui laudantium vero magnam? Fugiat natus ab cupiditate incidunt aut exercitationem ea optio, molestias, odio corporis officia tempora quam nam numquam.';

    }
    setTimeout('aPropos()', 4000);

    function signature(){

        presentation3.textContent = 'By Fatimata & Oumou';
        
        }
        setTimeout('signature()', 6000);   