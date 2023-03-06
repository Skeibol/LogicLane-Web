var acc = document.getElementsByClassName("accordion--section");
var i;
for (i = 0; i < acc.length; i++) {
    
    acc[i].addEventListener("click", function() {
        var panel = this.nextElementSibling;
        if(panel.style.display === "block"){
            this.classList.remove("accordion--active")
            panel.style.display = "none";
            panel.style.maxHeight = null;
            return;
        }
        for (i = 0; i < acc.length; i++){
            panel = acc[i].nextElementSibling;
            
            acc[i].classList.remove("accordion--active")
            panel.style.display = "none";
            panel.style.maxHeight = null;
        }
        
        panel = this.nextElementSibling;
        
        this.classList.add("accordion--active")
        panel.style.display = "block";
        panel.style.maxHeight = panel.scrollHeight + "px";
            
            
    });
  }
