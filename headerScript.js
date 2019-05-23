var homeButton = document.getElementById("home")
function switchToIcons(mobileSize){
    if(mobileSize.matches){
     //   document.body.style.backgroundColor = "yellow";
     document.createElement("a");
    }
    else{

    }
}
var mobileSize = window.matchMedia("(max-width: 993px)");
switchToIcons(mobileSize);
mobileSize.addListener(switchToIcons);