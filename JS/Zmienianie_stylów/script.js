function changeBackgroundColor(colorName){
    document.getElementById("right").style.background = colorName;
}

function changeTextColor(colorName){
    document.getElementById("right").style.color = colorName;
}

function changeTextSize(size){
    document.getElementById("right").style.fontSize = size;
}

function drawFrame(drawFrameBool){
    if (drawFrameBool)
        document.getElementById("siteImage").style.border = "1px solid white";
    else
        document.getElementById("siteImage").style.border = "none";
    
}

function changeListType(object){
    var allId = ["option","option1","option2"];
    allId.forEach(name => document.getElementById(name).checked = false);
    object.checked = true;
    document.getElementById("list").type = ["disc","circle","square"][allId.indexOf(object.id)];
}

function AllParagraps(drawFrameBool){
    if (drawFrameBool)
        document.querySelectorAll("p").forEach(element => element.style.border = "2px solid white");
    else
        document.querySelectorAll("p").forEach(element => element.style.border = "none");
}