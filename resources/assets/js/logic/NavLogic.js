


// modes : grey or black
export function NavBarLogic(mode){
    if(mode == "black"){
        alert("go black mode");
    } else
    {
        var wrap = document.getElementById("app-agile-container");
        wrap.className = "white-background";
        document.getElementById('nav-default-logo').style.display = 'block';     // hide default 8-24 logo
        document.getElementById('nav-lab-logo').style.display = 'none';       // hide default 8-24 logo
        document.getElementById('side-nav-home-logo').style.display = 'none'; // hide side home btn
        document.getElementById('red-burger').style.display = 'block';
        document.getElementById('yellow-burger').style.display = 'none';
    
        document.getElementById('close-nav-btn-red').style.display = 'block';
        document.getElementById('close-nav-btn-yellow').style.display = 'none';
    }


}


