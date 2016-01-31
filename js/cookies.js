function getCookie(c_name)
{
var i,x,y,ARRcookies=document.cookie.split(";");
for (i=0;i<ARRcookies.length;i++)
  {
  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
  x=x.replace(/^\s+|\s+$/g,"");
  if (x==c_name)
    {
    return unescape(y);
    }
  }
}

function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
}

function eraseCookies() {
    setCookie("energyisforwimps-rcpdUsername","",-1);
	setCookie("energyisforwimps-rcpdPassword","",-1);
	
	$("rcpd-button-inner").prop("href","http://night.org/swat2/playerdb/");
	
	$("#rcpd-name").val("")	
	$("#rcpd-password").val("")
	
	$("#settings-form").show();
	$("#settings-message").hide();
}


function saveSettingsCookies()
{
	setCookie("energyisforwimps-rcpdUsername", $("#rcpd-name").val(), 365);	
	setCookie("energyisforwimps-rcpdPassword", $("#rcpd-password").val(), 365);	
	
	$("rcpd-button-inner").prop("href","http://night.org/swat2/playerdb/?user="+getCookie("energyisforwimps-rcpdUsername")+"&pw="+getCookie("energyisforwimps-rcpdPassword"));
	
	$("#settings-form").hide();
	$("#settings-message").show();

    parent.location.reload();
}