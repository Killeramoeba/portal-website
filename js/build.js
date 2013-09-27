//This function is called when an <a> tag is clicked
//A border will be removed if it exists. Otherwise, it will be removed. 
function chooseItem(property,index)
{
	
	if($("#"+property+" > a > div:eq("+index+")").css('border-left-style') == "solid")
	{
		$("#"+property+" > a > div:eq("+index+")").css("border-style", "none").css("margin","1px");
	}
	else
	{
		$("#"+property+" > a > div").css("border-style", "none").css("margin","1px");
		$("#"+property+" > a > div:eq("+index+")").css("border-style", "solid").css("border-width", "1px").css("border-color","yellow").css("margin","0px");
	}
	
}

//When the sumbit button is pressed all of the values selected
//will be taken and converted into a code.
function getUserInput()
{
	var desiredClass;
	var desiredGun;
	var desiredArmor;
	var traitStart;
	var traitEnd;
	var specStart;
	var specEnd;
	var desiredTalent;
	
	var counter = 0
	cancelcode = false;
	
	var i = 0;
	while(i<12)
	{
		if($("#class > a > div:eq("+i+")").css('border-left-style') == "solid")
		{
			desiredClass = i;
			break;
		}
		else if (i==11)
		{
			cancelcode = true;
		}
		i++;
	}
	i = 0;
	while(i<8)
	{
		if($("#gun > a > div:eq("+i+")").css('border-left-style') == "solid")
		{
			desiredGun = i;
			break;
		}
		else if (i==7)
		{
			cancelcode = true;
		}
		i++;
	}
	i = 0;
	while(i<5)
	{
		if($("#armor > a > div:eq("+i+")").css('border-left-style') == "solid")
		{
			desiredArmor = i;
			break;
		}
		else if (i==4)
		{
			cancelcode = true;
		}
		i++;
	}
	i = 0;
	while(i<17)
	{
		if($("#trait > a > div:eq("+i+")").css('border-left-style') == "solid")
		{
			traitStart = i;
			break;
		}
		else if (i==16)
		{
			cancelcode = true;
		}
		i++;
	}
	i = 0;
	while(i<17)
	{
		if($("#trait2 > a > div:eq("+i+")").css('border-left-style') == "solid")
		{
			traitEnd = i;
			break;
		}
		else if (i==16)
		{
			cancelcode = true;
		}
		i++;
	}
	i = 0;
	while(i<10)
	{
		if($("#spec > a > div:eq("+i+")").css('border-left-style') == "solid")
		{
			specStart = i;
			break;
		}
		else if (i==9)
		{
			cancelcode = true;
		}
		i++;
	}
		i = 0;
	while(i<10)
	{
		if($("#spec2 > a > div:eq("+i+")").css('border-left-style') == "solid")
		{
			specEnd = i;
			break;
		}
		else if (i==9)
		{
			cancelcode = true;
		}
		i++;
	}
	i = 0;
	while(i<8)
	{
		if($("#talent > a > div:eq("+i+")").css('border-left-style') == "solid")
		{
			desiredTalent = i;
			break;
		}
		else if (i==7)
		{
			cancelcode = true;
		}
		i++;
	}
	if (cancelcode == false)
	{
		return [desiredClass, desiredGun, desiredArmor, traitStart, traitEnd, specStart, specEnd, desiredTalent];
	}
	else
	{
		alert("You did not complete the form!");
		return;
	}
	
}