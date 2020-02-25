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
    copyCharObject(charObject, checkObject);
}

function buildUrlQuery(charObject)
{
    history.replaceState(charObject, "Char update", location.pathname + "?name="+charObject.name+"&lvl="+charObject.lvl+"&xp="+charObject.xp+"&lp="+charObject.lp+"&race="+charObject.race+"&sex="+charObject.sex+"&wealth="+charObject.wealth+"&fire="+charObject.fire+"&water="+charObject.water+"&wind="+charObject.wind+"&earth="+charObject.earth+"&light="+charObject.light+"&dark="+charObject.dark+"&neutral="+charObject.neutral+"&ini="+charObject.ini+"&stk="+charObject.stk+"&koe="+charObject.koe+"&int="+charObject.int);
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
    document.getElementById('hp').innerHTML = calcHp(charObject);
    document.getElementById('mp').innerHTML = calcMp(charObject);
    if(!compareCharObject(charObject, checkObject))
    {
        copyCharObject(charObject, checkObject);
        buildUrlQuery(charObject);
    }
    
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

function compareCharObject(charObject1, charObject2)
{
    var part;
    for (part in charObject1) 
    {
        if(charObject1[part] != charObject2[part])
        {
            return false;
        }
    }
    return true;
}

function copyCharObject(charObject1, charObject2)
{
    var part;
    for (part in charObject1) 
    {
        charObject2[part] = charObject1[part];
    }
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

function pluskey(element)
{
    var id = element.id.split("-");
    id = id[0];
    if(charObject.lp > 0)
    {
    	if((id == 'ini' || id == 'stk' || id == 'koe' || id == 'int') || ((id == 'fire' || id == 'water' || id == 'wind' || id == 'earth' || id == 'dark' || id == 'light') && charObject[id] < 5) || (id == 'neutral' && charObject[id] < 3))
    	{
    		charObject[id]++;
    		charObject.lp--;
    	}
    }
}



function minuskey(element)
{
    var id = element.id.substr(0,3);
	if((id == 'ini' || id == 'stk' || id == 'koe' || id == 'int') && charObject[id] > 1)
	{
		charObject[id]--;
		charObject.lp++;
	}
}
