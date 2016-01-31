<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Settings</title>
    <link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/popup.css" type="text/css" media="screen" />

    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/cookies.js"></script>

</head>
<form>
<body>
	<div id="popup-wrapper">
        <h1>Settings</h1>
        <div id="settings-form">
            <div>
                <div style="font-size:.8em;">RCPD Name:</div> <input type="text" class="textfield" id="rcpd-name"/><br><br>
                <div style="font-size:.8em;">RCPD Password:</div> <input type="password" class="textfield" id="rcpd-password"/><br><br>
            </div>
            <input type="submit" onclick="javascript:saveSettingsCookies();"/>
         </div>
         <p style="display:none;" id="settings-message">Your RCPD username and Password have already been saved. Click <a href="javascript:eraseCookies();">here</a> to delete your RCPD credentials.</p>
    </div>
</body>
</form>
</html>

<script>
	if(typeof getCookie("energyisforwimps-rcpdUsername") !== "undefined" && typeof getCookie("energyisforwimps-rcpdPassword") !== "undefined" )	
	{
		$("#settings-form").hide();
		$("#settings-message").show();	
	}
</script>