function Oblicz()
{
    const dystans = document.getElementById("dystans").value;
    const spalanie = document.getElementById("spalanie").value;

    const potrzeba = parseFloat(spalanie) / 100 * parseFloat(dystans);

    document.getElementById("wynik").innerHTML = "Potrzebujesz: " + potrzeba + " litrów paliwa";
}
