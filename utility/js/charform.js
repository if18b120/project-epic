function validateChar(lvl, lp, fire, water, wind, earth, light, dark, neutral, ini, stk, koe, int)
{
    if (lvl - 1 + 10 == lp + fire + water + wind + earth + light + dark + neutral + ini + stk + koe + int) {
        return true;
    }
    else
    {
        return false;
    }
}

function buildChar(jsonCharString)
{
    
    var charObject = JSON.parse(jsonCharString);
    document.getElementById('name').innerHTML = charObject.name;
    document.getElementById('lvl').innerHTML = charObject.lvl;
    document.getElementById('xp').innerHTML = charObject.xp;
    document.getElementById('lp').innerHTML = charObject.lp;
    document.getElementById('race').innerHTML = charObject.race;
    document.getElementById('sex').innerHTML = charObject.sex;
    document.getElementById('wealth').innerHTML = charObject.wealth;
    document.getElementById('fire').innerHTML = charObject.fire;
    document.getElementById('water').innerHTML = charObject.water;
    document.getElementById('wind').innerHTML = charObject.wind;
    document.getElementById('earth').innerHTML = charObject.earth;
    document.getElementById('light').innerHTML = charObject.light;
    document.getElementById('dark').innerHTML = charObject.dark;
    document.getElementById('neutral').innerHTML = charObject.neutral;
    document.getElementById('ini').innerHTML = charObject.ini;
    document.getElementById('stk').innerHTML = charObject.stk;
    document.getElementById('koe').innerHTML = charObject.koe;
    document.getElementById('int').innerHTML = charObject.int;

    document.getElementById('neededxp').innerHTML = calcNeededXp(parseInt(document.getElementById('lvl').innerHTML, 10));
    calcHpMp();
}

function calcNeededXp(lvl)
{
    var neededxp = 0;
    var step = 100;
    for (var i = 0; i <= lvl; i++)
    {
        if ((i+1) % 5 == 0 && (i+1) != 0)
        {
            step += 100;
        }
        neededxp += step;
    }
    return neededxp;
}

function calcHpMp()
{
    document.getElementById('hp').innerHTML = 5 + parseInt(document.getElementById('koe').innerHTML, 10) + Math.floor(parseInt(document.getElementById('stk').innerHTML, 10)/3) + Math.floor(parseInt(document.getElementById('ini').innerHTML, 10)/5);
    document.getElementById('mp').innerHTML = 5 + parseInt(document.getElementById('int').innerHTML, 10) + Math.floor(parseInt(document.getElementById('koe').innerHTML, 10)/3) + Math.floor(parseInt(document.getElementById('ini').innerHTML, 10)/5);
}

function addxp(element)
{
    var xpamount = parseInt(element.parentElement.nextElementSibling.firstElementChild.value, 10);
    var neededxp = parseInt(document.getElementById('neededxp').innerHTML, 10);
    var currentxp = parseInt(document.getElementById('xp').innerHTML, 10);
    var lvl;
    document.getElementById('xp').innerHTML = currentxp + xpamount;
    element.parentElement.nextElementSibling.firstElementChild.value = "";
    while (currentxp + xpamount >= neededxp)
    {
        lvl = parseInt(document.getElementById('lvl').innerHTML, 10);
        document.getElementById('lvl').innerHTML = lvl + 1;
        neededxp = calcNeededXp(document.getElementById('lvl').innerHTML);
        document.getElementById('neededxp').innerHTML = neededxp;
        document.getElementById('lp').innerHTML = parseInt(document.getElementById('lp').innerHTML, 10) + 3;
    }
    lptrack = parseInt(document.getElementById('lp').innerHTML, 10);

}

function subxp()
{


}

function pluskey(event, element)
{
    if (event.type == 'click')
    {
        if (lptrack > 0)
        {
            var mem = element.previousElementSibling.innerHTML;
            element.previousElementSibling.innerHTML = parseInt(mem, 10) + 1;
            mem = document.getElementById('lptxt').innerHTML;
            document.getElementById('lptxt').innerHTML = mem - 1;
            lptrack--;
            if (lptrack <= 0)
            {
                disablePlus();
            }
        }
    }
    else if (event.type == 'mouseover')
    {
        if (lptrack > 0)
        {
            element.firstElementChild.firstElementChild.style = 'fill:#909090; fill-opacity:0.5;';
        }
    }
    else if (event.type == 'mouseout')
    {
        if (lptrack > 0)
        {
            element.firstElementChild.firstElementChild.style = 'fill:#FFFFFF;';
        }
    }
}

function disablePlus()
{
    plus = document.getElementsByClassName('pluskey');

    for (var i = 0; i < plus.length; i++)
    {
        plus[i].firstElementChild.firstElementChild.style = 'fill:#FFFFFF;';
        plus[i].style = 'fill-opacity:0.2';
    }
}

function minuskey(event, element)
{
    if (event.type == 'click')
    {

    }
    else if (event.type == 'mouseover')
    {
        element.firstElementChild.firstElementChild.style = 'fill:#909090; fill-opacity:0.5;';
    }
    else if (event.type == 'mouseout')
    {
        element.firstElementChild.firstElementChild.style = 'fill:#FFFFFF;';
    }
}


function disableMinus()
{

}

function calcMp()
{

}

function calcHp()
{
    
}