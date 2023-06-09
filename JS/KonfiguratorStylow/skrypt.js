function ChangeBackground(value)
{
    document.getElementById("prawy").style.backgroundColor = value;
}

function ChangeFontSize(value)
{
    document.getElementById("prawy").style.fontSize = value;
}

function ChangeTextColor(value)
{
    if (document.getElementById("prawy").style.color != value)
        document.getElementById("prawy").style.color = value;
}

function ChangeImageBorderVisibility(value)
{
    let images = document.getElementById("prawy").getElementsByTagName("img");
    for(var i = 0; i < images.length; i++)
    {
        if(value)
            images[i].style.border = "solid";
        else
            images[i].style.border = "none";
    }
}

function ChangeListType(value)
{
    let lists = document.getElementById("prawy").getElementsByTagName("ul");

    for(var i = 0; i < lists.length; i++)
    {
        lists[i].style.listStyleType = value;
    }
}