export default function sketch (p) {
    var divWidth = 0.02;
    var colorsMondrian = [];
    colorsMondrian[1] = "#E5BC04";
    colorsMondrian[2] = "#B61E03";
    colorsMondrian[3] = "#4678A5";
    var gapVal = 0.5;
  
    p.setup = function () {
      var widthCnv = (document.getElementById("page-content").offsetWidth / 10) * 10;
      var cnv = p.createCanvas(widthCnv , (window.innerHeight / 2), p.WEBGL);
      p.background(0);
    };

    var r = 1;
    p.draw = function () {
        //console.log(r);
        p.stroke(0);
        //getCells();
      
        //if(r%20 == 0) {
          if(r == 1)
          {
              getCells();
          }
        //}
        r += 1;
    };

    p.keyPressed = function(){
            r = 0;
            save(cnv, "mondrian_frame.jpg");
    }



    function getCells()
    {
    p.background(255);
    var widthSec = Math.floor((Math.random() * (9 - 3) + 3));
    var heightSec = Math.floor((Math.random() * (9 - 3) + 3));
    var divXCoord = [widthSec];
    var divYCoord = [heightSec];
    divXCoord[0] = 0;
    divYCoord[0] = 0;
    var widthDiv = p.width / widthSec;
    var heightDiv = p.height / heightSec;

    for(var i = 1; i < widthSec; i++){
        divXCoord[i] = widthDiv * (Math.random() * (divWidth - (1 - divWidth))) + i;
    }

    for(var i = 0; i < heightSec; i++){
        divYCoord[i] = heightDiv * (Math.random() * (divWidth - (1 - divWidth)) + i);
    }

    //console.log(divXCoord);

    for(var i = 0; i < (widthSec - 1); i++)
    {
        for(var j = 0; j < (heightSec - 1); j++)
        {
        if(Math.random() < 0.23)
        {
            var randomNb = Math.floor( Math.random() * (3) + 1);
            p.fill(colorsMondrian[randomNb]);
            p.noStroke();
            p.rect(divXCoord[i], divYCoord[j], divXCoord[i+1] - divXCoord[i], divYCoord[j+1] - divYCoord[j]);
        }
        }
    }
    p.fill(0);

    for(var i = 0; i <widthSec; i++)
    {
        for(var j = 0; j < heightSec; j++)
        {
        if(j == 0){
            if(i != 0){
            p.rect(divXCoord[i] - p.width * divWidth * 4, 0,p. width * divWidth, divYCoord[1]);
            }
        }

        if(i != 0)
        {
            p.rect(divXCoord[i] - p.width * divWidth * 4, divYCoord[j] - p.height * divWidth/2, p.width * divWidth, p.width * divWidth);
            if(j < heightSec)
            {
            p.rect(divXCoord[i] - divWidth * p.width * 4, divYCoord[j], p.width * divWidth, p.width - divYCoord[j]);
            }else{
            p.rect(divXCoord[i] - divWidth * p.width * 4, divYCoord[j], p.width * divWidth, divYCoord[j+1] - divYCoord[j]);
            }
        }

        if( (Math.random() ) < gapVal)
        {
            if (i == 0) {
            p.rect(divXCoord[i], divYCoord[j] - divWidth * p.width * 4, divXCoord[i + 1], p.width * divWidth);
            }
            else if (i == heightSec - 1) {
            p.rect(divXCoord[i], divYCoord[j] - divWidth * p.width * 4, p.width - divXCoord[i], p.width * divWidth);
            }
            else {// if (i > 0 & i < numCols) {
            p.rect(divXCoord[i], divYCoord[j] - divWidth * p.width * 4, divXCoord[i+1] - divXCoord[i], p.width * divWidth);
            }
        }
        }
    }
    }
  };