function parseURL(charObject)
{
    var query = location.search.substr(1);
    var paramaters = query.split("&");
    var splitPair;
    var pair;
    for (pair of paramaters) {
        splitPair = pair.split("=");
        charObject[splitPair[0]] = splitPair[1];
    }
    charObject.neededxp = calcNeededXp(charObject.lvl);
}

function buildUrlQuery(charObject)
{
    location.search = "name="+charObject.name+"&lvl="+charObject.lvl+"&xp="+charObject.xp+"&lp="+charObject.lp+"&race="+charObject.race+"&sex="+charObject.sex+"&wealth="+charObject.wealth+"&fire="+charObject.fire+"&water="+charObject.water+"&wind="+charObject.wind+"&earth="+charObject.earth+"&light="+charObject.light+"&dark="+charObject.dark+"&neutral="+charObject.neutral+"&ini="+charObject.ini+"&stk="+charObject.stk+"&koe="+charObject.koe+"&int="+charObject.int;
}

function validateChar(charObject)
{
    if (lvl - 1 + 10 == charObject.lp + charObject.fire + charObject.water + charObject.wind + charObject.earth + charObject.light + charObject.dark + charObject.neutral + charObject.ini + charObject.stk + charObject.koe + charObject.int) {
        return true;
    }
    else
    {
        return false;
    }
}

function buildChar(charObject)
{
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
    
    document.getElementById('neededxp').innerHTML = charObject.neededxp;
    //calcHpMp();
    document.getElementById('hp').innerHTML = calcHp(charObject);
    document.getElementById('mp').innerHTML = calcMp(charObject);
    buildUrlQuery(charObject);
}

function calcNeededXp(lvl)
{
    var neededxp = 0;
    var step = 100;
    for (var i = 0; i <= lvl; i++)
    {
        if ((i+1) % 5 == 0)
        {
            step += 100;
        }
        neededxp += step;
    }
    return neededxp;
}

function calcMp(charObject)
{
    return 5 + parseInt(charObject.int, 10) + Math.floor(charObject.koe/3) + Math.floor(charObject.ini/5);
}

function calcHp(charObject)
{
    return 5 + parseInt(charObject.koe, 10) + Math.floor(charObject.stk/3) + Math.floor(charObject.ini/5);
}

function checkLevelUp(charObject)
{
    while(charObject.xp > charObject.neededxp)
    {
        charObject.lvl++;
        charObject.neededxp = calcNeededXp(charObject.lvl);
    }
}

function addxp(element, charObject)
{
    charObject.xp = parseInt(charObject.xp, 10) + parseInt(element.parentElement.nextElementSibling.firstElementChild.value, 10);
    checkLevelUp(charObject);
}

function subxp()
{

}

function buttonMouseOver(element)
{
    element.firstElementChild.firstElementChild.style = 'fill:#909090; fill-opacity:0.5;';
}

function buttonMouseOut(element)
{
    element.firstElementChild.firstElementChild.style = 'fill:#FFFFFF;';
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



