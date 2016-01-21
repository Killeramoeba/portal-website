<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Settings</title>
    <link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/popup.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="screen" />

    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox.js"></script>
    <script type="text/javascript" src="js/iframe-tools.js"></script>

</head>
<script>
    var currentPage = 1;
    var hidden = 1;

    var navWidth = 150;
    var navBorderWidth = 0;

    var animationActive = false;


</script>
<body>
	<div id="popup-wrapper">
        <h1>Upload an Asset</h1>
    	<div style="margin-bottom:4px;">
            <input id="upload-replay-radio" order="4" type="radio" name="option" checked="checked" value="http://night.org/swat2/replays1.11/" />
            <label for="upload-replay-radio">Replay</label>
        </div>
        <div style="margin-bottom:4px;">
            <input id="upload-screenshot-radio" order="5" type="radio" name="option" value="http://night.org/swat2/screenshots/submitss.php" />
            <label for="upload-screenshot-radio">Screenshot</label>
        
        </div>
        <div id="submit-wrapper">
            <a id="upload-ok-box" class="button extend single" onclick="javascript:openFancybox();" data-fancybox-type="iframe"><span class="button-inner">OK</span></a>
            <a class="button extend single" onclick="javascript:closeFancybox();"><span class="button-inner">Cancel</span></a>
        </div>    
    </div>
</body>
</html>