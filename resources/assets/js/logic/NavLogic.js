/*
* @param {String}  mode - one of these two modes grey or black
* @param {String}  page - one of these two pages illustration or color
*/
export function NavBarLogic(mode, page){

    if(mode == "black"){
        var wrap = document.getElementById("app-agile-container");
        if(page == 'illustration'){
            wrap.className = "black-background";
        }else{
            wrap.className = "body-black-bg";
        }
        document.getElementById('nav-default-logo').style.display = 'none';    // hide default 8-24 logo
        document.getElementById('nav-lab-logo').style.display = 'block';      // show default 8-24 logo
        document.getElementById('side-nav-home-logo').style.display = 'block'; // show side home btn
        document.getElementById('side-nav-labs-logo').style.display = 'none'; // hide labs logo
        document.getElementById('red-burger').style.display = 'none'; // hide red burger
        document.getElementById('yellow-burger').style.display = 'block';
    
        document.getElementById('close-nav-btn-red').style.display = 'none'; // hide red btn
        document.getElementById('close-nav-btn-yellow').style.display = 'block'; // show yellow btn
        document.getElementById('display-nav').className = "";
        document.getElementById('display-nav').className = "hidden-nav black-nav ";

        document.getElementById('main-nav-wrap').classList.remove('grey-nav');
        document.getElementById('main-nav-wrap').classList.add('black-nav');
    } else
    {
        var wrap = document.getElementById("app-agile-container");
        if(page == 'illustration'){
            wrap.className = "white-background";
        }else{
            wrap.className = "grey-background";
        }
        document.getElementById('nav-default-logo').style.display = 'block';     // hide default 8-24 logo
        document.getElementById('nav-lab-logo').style.display = 'none';       // hide default 8-24 logo
        document.getElementById('side-nav-home-logo').style.display = 'none'; // hide side home btn
        document.getElementById('red-burger').style.display = 'block';
        document.getElementById('yellow-burger').style.display = 'none';
    
        document.getElementById('close-nav-btn-red').style.display = 'block';
        document.getElementById('close-nav-btn-yellow').style.display = 'none';

        document.getElementById('display-nav').className = "";
        document.getElementById('display-nav').className = "hidden-nav grey-nav ";

        document.getElementById('main-nav-wrap').classList.remove('black-nav');
        document.getElementById('main-nav-wrap').classList.add('grey-nav');
    }


}

export function LogoLogic(page){
    if(page == home){

    }else{
        
    }

}


