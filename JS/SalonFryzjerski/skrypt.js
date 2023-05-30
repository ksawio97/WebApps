const prices = [25, 30, 40, 50];

function GetCutPrice()
{
    var options = document.getElementsByName("opcje");

    let price = 0;
    for(var i = 0; i < options.length; i++)
    {
        if(options[i].checked)
        {
            price = prices[i];
            break;
        }
    }

    var result = "Cena strzyżenia " + price;
    document.getElementById("wynik").innerHTML = result;
}