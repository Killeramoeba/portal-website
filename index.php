<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1"/>

<title>Energy is for Wimps</title>

<LINK REL="SHORTCUT ICON" HREF="images/web-ico.gif">
<link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="screen" />

<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.fancybox.js"></script>
<script type="text/javascript" src="js/cookies.js"></script>
<script type="text/javascript" src="code-manager/codes.js"></script>
<script type="text/javascript" src="js/build.js"></script>
    <script type="text/javascript" src="js/iframe-tools.js"></script>

<?php
//grab back end vars
$page = isset($_GET["page"])? $_GET["page"]:0;
$box = isset($_GET["box"])? $_GET["box"]:0;
$hidden = isset($_GET["hidden"])? $_GET["hidden"]:0;
?>
<script>

    var defaultPage = <?=$page?>;
    var defaultBox = <?=$box?>;
    var defaultHidden = <?=$hidden?>;


    var myCodes;
	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
		BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
		iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
		Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
		Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
		any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};



	var currentPage = defaultPage;
	var hidden = defaultHidden;
	
	var navWidth = 150;
	var navBorderWidth = 0;
	
	var animationActive = false;

	
	//initialize
	$(function(){
		
		if( isMobile.any() ) 
		{
			$("html, body, #nav-wrapper, #main-content, #main-content-portal").addClass("mobile-containers");
			$("#fixed-buttons-container").addClass("mobile-fixed-buttons-container");
			$("#hide-button").addClass("mobile-hide-button");
		}
		
		//ONCLICKS AND MISC MUTATORS
		//initialize content width
		$("#main-content").css("width",$(window).width()-navWidth+"px");
		
		//add onclicks to icons and wrappers of links
		$(".link-icon").click(function(event){$(event.target).next().click();});
		$(".list-link-wrapper").click(function(event){$(event.target).children("a").click();});

		//initialize fancybox
		$(".fancybox-link4").fancybox({
			minWidth	: 515,
			minHeight	: 430,
			maxWidth	: 515,
			maxHeight	: 430,
			fitToView	: false,
			width		: '100%',
			height		: '90%',
			autoSize	: true,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none',
			overlayShow	: 'false',
			afterClose	: function() {
				$("#code-adder").html("");				
			},
			afterShow : function() {
				$(".fancybox-overlay.fancybox-overlay-fixed").addClass("addcode").draggable();
			}
			
		});

		//hidden
		if(defaultHidden)
		{
			$('#button-wrapper').hide();
			$('#nav').hide();
			$("#nav-wrapper").css("left", 0).width(0);
			$("#main-content").width($(window).width()-navBorderWidth+"px").css("margin-left","0");
			$("#hide-button").text(">>").css("left", navBorderWidth);
		}

        //set rcpd pw/user
		if(typeof getCookie("energyisforwimps-rcpdUsername") !== "undefined" && typeof getCookie("energyisforwimps-rcpdPassword") !== "undefined" )	
		{
			$("#rcpd-button").attr("value","http://night.org/swat2/playerdb/?user="+getCookie("energyisforwimps-rcpdUsername")+"&pw="+getCookie("energyisforwimps-rcpdPassword"));
		}

        //default page
        if(defaultPage==1){

            $("#link1").click();
        }
        else if(defaultPage==2){
            $("#link2").click();
        }
        else if(defaultPage==3){
            $("#link3").click();
        }
        else{
            $("#rcpd-button").click();
        }


        myCodes = new codeStore($( "#code-list" ));



    });
	
	//update width of content on window resize
	$(window).resize(function(){	
		if(!hidden)
		$("#main-content").css("width",$(window).width()-navWidth+"px");
		else
		$("#main-content").css("width",$(window).width()-navBorderWidth+"px");
	});
	

	
</script>

</head>
<body>


	<div id="page-wrapper"> 
    	
    	<div id="nav-wrapper">
            <h4 style="color: rgb(255, 255, 255); text-align: center; background-color: rgb(18, 52, 86); border: 1px solid rgb(0, 0, 0); box-shadow: 1px 1px 0px 0px rgb(0, 0, 0); padding: 5px 0px; margin: 0px;">Swat: Aftermath<br>Gateway</h4>
            <div id="button-wrapper">
                <a title="RCPD Code Manager" alt="RCPD Code Manager" onclick="javascript:topButtonClicked(this);" order="1"  id="rcpd-button" class="button" value="http://night.org/swat2/playerdb/">
                            <div id="rcpd-button-inner" class="button-inner icon"></div>
                </a>
                <a title="Settings" alt="Settings" onclick="javascript:topButtonClicked(this);" order="2" class="button" id="settings-button" value="settings.php" >
                    <div id="settings-button-inner" class="button-inner icon"></div>  
                </a>
                <a class="button extend single" value="add-codes.php" order="3" onclick="javascript:topButtonClicked(this);"><span class="button-inner">&nbsp;+&nbsp;</span></a>
            </div>


            <ul id="nav">
                <li class="list-link-wrapper">
                    <div class="link-icon redsculls-forum"></div>
                    <a alt="Redscull's Forum" title="Redscull's Forum" onclick="javascript:linkClicked(this)" value="http://redscull.com/forum/" id="link1">Redscull</a>
                </li>
                <li class="list-link-wrapper">
                    <div class="link-icon forum-151"></div>
                    <a alt="Clan 151 Forum" title="Clan 151 Forum" onclick="javascript:linkClicked(this)" value="http://151.webdev3.com/" id="link2">151</a>
                </li>
        		<li class="list-link-wrapper">
                    <div class="link-icon vent-status"></div>
                    <a alt="SWAT Vent Status" title="SWAT Vent Status" onclick="javascript:linkClicked(this)" value="http://www.ventrilo.com/status.php?hostname=vent64.light-speed.com&amp;port=7177" id="link3">Vent Status</a>
                </li>
            </ul>
            
                
            
            <ul id="code-list">
            	
            </ul>

            <script>
                function downloadCodes(filename, text) {
                    var classes=["Sniper","Medic","Tactician","Psychologist","Maverick","Heavy Ordinance","Demolitions","Cyborg","Pyrotechnician","Watchman","Tech Ops","Umbrella Clone"];
                    var weapons=["Assault Rifle","Sniper Rifle","Chaingun","Rocket Launcher","Flamethrower","Laser Rifle","Gattling Laser","Dual Pistols"];
                    var armors=["Light","Medium","Heavy","Advanced"];
                    var traits=["Skilled","Gifted","Survivalist","Dragoon","Acrobat","Swift Learner","Healer","Flower Child","Chem Reliant","Rad Resistant","Gadgeteer","Prowler","Energizer","Pack Rat","Engineer","Reckless"];
                    var specs=["Weaponry","Power Armor","Energy Cells","Cybernetics","Triage","Chemistry","Leadership","Robotics","Espionage"];
                    var talents=["Courage","Wiring","Running","Spotting","Toughness","Tinkering","Hacking"];
                    var medals=['REM','LSA','COB','PCC','MOH','KEY','---'];
                    var titles=['Honorguard','Nightmare','Extinction','Megazilla','Deathless','Impressive','Solo','---']

                    myCodes2 = myCodes;
                    var mystring = "";
                    delete myCodes2.cookieObject.length;
                    mystring += ("=======================================================");
                    $.each(myCodes2.cookieObject, function( index, element ) {
                        mystring += ("\r\n");
                        mystring += ("\r\n");
                        cookie = getCookie("energyisforwimps-code"+index);
                        cookie = cookie.split("/");
                        mystring += (classes[cookie[0]]+"/");
                        mystring += (weapons[cookie[1]]+"/");
                        mystring += (armors[cookie[2]]+"/");
                        mystring += (traits[cookie[3]]+"/");
                        mystring += (specs[cookie[4]]+"/");
                        mystring += (talents[cookie[5]]);
                        mystring += ("\r\n");
                        mystring += (medals[cookie[11]]+"/");
                        mystring += (medals[cookie[10]]+"/");
                        mystring += (medals[cookie[9]]+"/");
                        mystring += (medals[cookie[8]]+"/");
                        mystring += (medals[cookie[7]]+"/");
                        mystring += (medals[cookie[6]]);
                        mystring += ("\r\n");
                        mystring += (titles[cookie[12]]+"/");
                        mystring += (titles[cookie[13]]+"/");
                        mystring += (titles[cookie[14]]+"/");
                        mystring += (titles[cookie[15]]+"/");
                        mystring += (titles[cookie[16]]+"/");
                        mystring += (titles[cookie[17]]+"/");
                        mystring += (titles[cookie[18]]);
                        mystring += ("\r\n");
                        mystring += (myCodes2.cookieObject[index]['code'].substring(0, 4)+"-"+myCodes2.cookieObject[index]['code'].substring(4, 8)+"-"+myCodes2.cookieObject[index]['code'].substring(8, 12)+"-"+myCodes2.cookieObject[index]['code'].substring(12, 16));
                        mystring += ("\r\n");
                        mystring += ("\r\n");
                        mystring += ("=======================================================");
                    });

                    text = mystring;

                    var element = document.createElement('a');
                    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
                    element.setAttribute('download', filename);

                    element.style.display = 'none';
                    document.body.appendChild(element);

                    element.click();

                    document.body.removeChild(element);
                }

                function downloadBackup(filename, text) {

                    myCodes2 = myCodes;
                    var mystring = "";
                    delete myCodes2.cookieObject.length;
                    $.each(myCodes2.cookieObject, function( index, element ) {
                        mystring+= ""+(unescape(element.cookiedata)+";");
                    });

                    text = mystring;

                    var element = document.createElement('a');
                    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
                    element.setAttribute('download', filename);

                    element.style.display = 'none';
                    document.body.appendChild(element);

                    element.click();

                    document.body.removeChild(element);
                }


            </script>
            <button onclick="downloadCodes('swat-codes.txt', 'test')">Download Text</button>

            <button onclick="downloadBackup('swat-codes-export.txt', 'test')">export</button>
            <a href="import-codes.html"><button >import</button></a>



        </div>
        
    <div id="main-content">
        <iframe frameborder="0" id="main-content-portal" src=""></iframe>
    </div>
    
    <div id="fixed-buttons-container">
        <div onclick="hideButtonClicked();" id="hide-button" class="fixed-button"><<</div>
    </div>
    
</div>

<div id="code-adder">
</div>

</body>
</html>