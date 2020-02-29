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
    history.replaceState(charObject, "Char update", location.pathname + "?name="+charObject.name+"&lvl="+charObject.lvl+"&xp="+charObject.xp+"&lp="+charObject.lp+"&race="+charObject.race+"&sex="+charObject.sex+"&wealth="+charObject.wealth+"&fire="+charObject.fire+"&water="+charObject.water+"&wind="+charObject.wind+"&earth="+charObject.earth+"&light="+charObject.light+"&dark="+charObject.dark+"&neutral="+charObject.neutral+"&ini="+charObject.ini+"&stk="+charObject.stk+"&koe="+charObject.koe+"&int="+charObject.int+"&skill="+charObject.skill);
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
    document.getElementById('skill').innerHTML = charObject.skill;
    
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
    while(charObject.xp >= charObject.neededxp)
    {
        charObject.lvl++;
        charObject.lp = parseInt(charObject.lp, 10) + 3;
        charObject.neededxp = calcNeededXp(charObject.lvl);
    }
}

function addxp(element, charObject)
{
    charObject.xp = parseInt(charObject.xp, 10) + parseInt(element.parentElement.nextElementSibling.firstElementChild.value, 10);
    element.parentElement.nextElementSibling.firstElementChild.value = "";
    checkLevelUp(charObject);
    buildChar(charObject);
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
    if(charObject.lp)
    {
    	if((id == 'ini' || id == 'stk' || id == 'koe' || id == 'int') || ((id == 'fire' || id == 'water' || id == 'wind' || id == 'earth' || id == 'dark' || id == 'light') && charObject[id] < 5) || (id == 'neutral' && charObject[id] < 3) || id == 'skill')
    	{
    		charObject[id]++;
    		charObject.lp--;
    	}
    	buildChar(charObject);
    }
}

function minuskey(element)
{
    var id = element.id.split("-");
    id = id[0];
	if(((id == 'ini' || id == 'stk' || id == 'koe' || id == 'int') && charObject[id] >= 1) || (id == 'skill' && charObject[id] > 0) || ((id == 'fire' || id == 'water' || id == 'wind' || id == 'earth' || id == 'dark' || id == 'light') && charObject[id] > 0))
	{
		charObject[id]--;
		charObject.lp++;
	}
	buildChar(charObject);
}

function modifyText(element)
{
	if(element.parentElement.className == "openModify")
	{
		element.parentElement.setAttribute("hidden", "");
		element.parentElement.nextElementSibling.removeAttribute("hidden");
		element.parentElement.nextElementSibling.firstElementChild.value = charObject[element.previousElementSibling.id];
	}
	else
	{
		element.parentElement.setAttribute("hidden", "");
		element.parentElement.previousElementSibling.removeAttribute("hidden");
		if(element.parentElement.id == "changeName")
		{
			charObject.name = element.previousElementSibling.value;
			buildChar(charObject);
		}
		else if(element.parentElement.id == "changeRace")
		{
			charObject.race = element.previousElementSibling.value;
			buildChar(charObject);
		}
		else if(element.parentElement.id == "changeSex")
		{
			charObject.sex = element.previousElementSibling.value;
			buildChar(charObject);
		}
	}
}

function changeWealth(element)
{
	if (element.id == "addWealth")
	{
		charObject.wealth = parseInt(charObject.wealth, 10) + parseInt(element.parentElement.nextElementSibling.firstElementChild.value, 10);
	}
	else if(element.id == "subWealth" && charObject.wealth >= parseInt(element.parentElement.nextElementSibling.firstElementChild.value, 10))
	{
		charObject.wealth = parseInt(charObject.wealth, 10) - parseInt(element.parentElement.nextElementSibling.firstElementChild.value, 10);
	}
	element.parentElement.nextElementSibling.firstElementChild.value = "";
	buildChar(charObject);
}