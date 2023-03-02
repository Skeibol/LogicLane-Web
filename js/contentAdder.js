function addContent(name,html,repeats=1){
    var target = document.getElementById(name);
    
    for(var i = 0; i<repeats; i++){
    
       target.innerHTML += html;
    }

}
