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

<?php
$page = isset($_GET["page"])? $_GET["page"]:1;
$box = isset($_GET["box"])? $_GET["box"]:0;
$hidden = isset($_GET["hidden"])? $_GET["hidden"]:0;
?>
<script>
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

	//grab back end vars
	var defaultPage = <?=$page?>;
	var defaultBox = <?=$box?>;
	var defaultHidden = <?=$hidden?>;
	
	var currentPage = defaultPage;
	var hidden = defaultHidden;
	
	var navWidth = 150;
	var navBorderWidth = 0;
	
	var animationActive = false;
	
	function openFancybox(href)
	{
		if(typeof href !== 'undefined')
		{
			_href= href;
			$("#upload-ok-box").attr("href", _href);
		}
		else
		{
			_href = $('input[name=option]:checked').val();
			$("#upload-ok-box").attr("href", _href);
			$.fancybox.close( true );
		}
			
		$("#upload-ok-box").fancybox({
			minWidth	: 400,
			minHeight	: 500,
			maxWidth	: 1044,
			maxHeight	: 768,
			fitToView	: false,
			width		: '100%',
			height		: '90%',
			autoSize	: true,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none',
			afterClose	: function() {
				changeURL("?page="+currentPage);
			}
		}).click();
		changeURL("?page="+currentPage+"&box=2");
		
		
	}
	function closeFancybox()
	{
		$.fancybox.close();
	}
	
	
	function changeURL(url)
	{
		window.history.replaceState("object or string", "Title", url);
	}
	function toTopButtonClicked()
	{
		$("html,body").scrollTop(0);
	}
	function topButtonClicked(tag)
	{
		changeURL("?page="+currentPage+"&box="+$(tag).attr("order"));
	}
	//when #hide-button is clicked
	function hideButtonClicked()
	{
		if($("#hide-button").text()== "<<" && !animationActive)
		{
			//update var
			hidden = 1;
			//change url
			changeURL("?page="+currentPage+"&hidden="+hidden);
			animationActive = true;
			
			$("#nav-wrapper").animate({
				left: "-"+(navWidth-navBorderWidth)+"px"
			}, 600, "linear", function() {
				$("#main-content").width($(window).width()-navBorderWidth+"px").css("margin-left","0");
				$("#hide-button").text(">>");
				$(this).width(0).css("left","0");
				$('#button-wrapper').hide();
				$('#nav').hide();
				animationActive=false;
			});
			
			
		}
		else if($("#hide-button").text()== ">>" && !animationActive )
		{
			//update var
			hidden = 0;
			//change url
			changeURL("?page="+currentPage+"&hidden="+hidden);
			animationActive = true;
			
			$("#main-content").width($(window).width()-navWidth+"px").css("margin-left","150px");
			
			$("#nav-wrapper").css("left","-"+(navWidth-navBorderWidth)+"px");
			$("#hide-button");
			$('#button-wrapper').show();
			$('#nav').show();
							
			$("#nav-wrapper").animate({
				left: 0
			}, 600, "linear", function() {
				$("#hide-button").text("<<").attr("style","");
				
			  	animationActive=false;
			}).width(navWidth).attr("style","");
			
			
		}
	}
	
	
	//when a link is clicked this function updates the main-content-portal or iframe
	function linkClicked(obj)
	{
		//grab current page number
		currentPage = $(obj).attr("id").substring(4,5);
		
		//set remove old active and add new
		$('.active').removeClass('active');
		$("#nav > .list-link-wrapper:nth-child("+currentPage+")").addClass('active');
		
		//change page on portal		
		$("#main-content-portal").attr("src",$(obj).attr('value'));
		
		//change url
		changeURL("?page="+currentPage);
		
		
	}
	
	//initialize
	$(function(){
		
		if( isMobile.any() ) 
		{
			$("html, body, #nav-wrapper, #main-content, #main-content-portal").addClass("mobile-containers");
			$("#fixed-buttons-container").addClass("mobile-fixed-buttons-container");
			$("#to-top-button").addClass("mobile-to-top-button");
			$("#hide-button").addClass("mobile-hide-button");
		}
		
		//ONCLICKS AND MISC MUTATORS
		//initialize content width
		$("#main-content").css("width",$(window).width()-navWidth+"px");
		
		//add onclicks to icons and wrappers of links
		$(".link-icon").click(function(event){$(event.target).next().click();});
		$(".list-link-wrapper").click(function(event){$(event.target).children("a").click();});

		//initialize fancybox
		$(".fancybox-link").fancybox({
			minWidth	: 740,
			minHeight	: 500,
			maxWidth	: 1044,
			maxHeight	: 768,
			fitToView	: false,
			width		: '100%',
			height		: '90%',
			autoSize	: true,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none',
			overlayShow	: 'false',
			afterClose	: function() {
				changeURL("?page="+currentPage);
				
			}
		});
		$(".fancybox-link2").fancybox({
			minWidth	: 300,
			minHeight	: 150,
			maxWidth	: 300,
			maxHeight	: 150,
			fitToView	: false,
			width		: '100%',
			height		: '90%',
			autoSize	: true,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none',
			overlayShow	: 'false',
			afterClose	: function() {
				changeURL("?page="+currentPage);
			}
		});
		$(".fancybox-link3").fancybox({
			minWidth	: 300,
			minHeight	: 300,
			maxWidth	: 300,
			maxHeight	: 300,
			fitToView	: false,
			width		: '100%',
			height		: '90%',
			autoSize	: true,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none',
			overlayShow	: 'false',
			afterClose	: function() {
				changeURL("?page="+currentPage);
				
			}
		});
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
				$(".fancybox-wrap.fancybox-desktop.fancybox-type-ajax.fancybox-opened").attr("onclick", "swapzindex(this);");
				$("#code-adder").html('<div class="draggable fancybox-overlay fancybox-overlay-fixed rcpd" style="width: auto; height: auto; display: block;"><div onclick="swapzindex(this);" tabindex="-1" class="fancybox-wrap fancybox-desktop fancybox-type-iframe fancybox-opened" style="width: 772px; height: auto; position: absolute; top: 20px; left: 20px; opacity: 1; overflow: visible;"><span style="color: rgb(255, 255, 255);position: absolute;z-index: 99;font-size: 1.4em;cursor: pointer;height: 28px;padding: 10px 20px;background-color: #333;border: 1px solid #555;border-radius: 5px;">Click and hold to drag</span><div class="fancybox-skin" style="padding: 15px; width: auto; height: auto;"><div class="fancybox-outer"><div class="fancybox-inner" style="overflow: auto; width: 740px; height: 401px;"><iframe  scrolling="auto" frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" hspace="0" vspace="0" class="fancybox-iframe" name="fancybox-frame1383379016664" id="fancybox-frame1383379016664" src="http://night.org/swat2/playerdb/"></iframe></div></div><div class="fancybox-title fancybox-title-float-wrap"><span class="child">RCPD Code Manager</span></div><a href="javascript:;" class="fancybox-item" title="Close"></a></div></div></div>');
				$( ".draggable" ).draggable();
			}
			
		});
		
		//DEFAULT ACTIONS
		//open box if user requests		
		if( defaultBox == 1 || defaultBox == 2 || defaultBox == 3 )
		{
			$(".button[order='" + defaultBox + "']").click();
		}		
		else if( defaultBox == 4 )
		{
			openFancybox("http://night.org/swat2/replays1.11/");
			
		}	
		else if( defaultBox == 5 )
		{
			openFancybox("http://night.org/swat2/screenshots/submitss.php");
			
		}	
				
		//page
		$("#nav > .list-link-wrapper:nth-child("+defaultPage+")").addClass('active'); //active class on nav item for css
		$("#main-content-portal").attr("src",$("#nav > .list-link-wrapper:nth-child("+defaultPage+") > a").attr("value")); //change page
		
		//hidden
		if(defaultHidden)
		{
			$('#button-wrapper').hide();
			$('#nav').hide();
			$("#nav-wrapper").css("left", 0).width(0);
			$("#main-content").width($(window).width()-navBorderWidth+"px").css("margin-left","0");
			$("#hide-button").text(">>").css("left", navBorderWidth);
		}
		
		if(typeof getCookie("energyisforwimps-rcpdUsername") !== "undefined" && typeof getCookie("energyisforwimps-rcpdPassword") !== "undefined" )	
		{
			$("#rcpd-button").prop("href","http://night.org/swat2/playerdb/?user="+getCookie("energyisforwimps-rcpdUsername")+"&pw="+getCookie("energyisforwimps-rcpdPassword"));
		}
		
		$( ".sortable" ).sortable({ 
			handle: ".class-portrait",
			axis: "y",
			stop: function( event, ui ) {
				i=0;				
				$("#code-list").children('li').each(function() {
					cookieString="";
					i++;
					$(this).attr("order",i);
					codeData = JSON.parse($(this).find(".cookie").text());
					codeData['order']=i;
					j=0;
					$.each(codeData, function( k, v ) {
						j++;
						if(j!=1){cookieString+="&";}
						cookieString+= k+"="+v;						
					});				
					setCookie("energyisforwimps-code"+i,cookieString,365);				
				});
				setCookie("energyisforwimps-numCodes", i, 365);			
			}
		});
		
		loadcodes();
		
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
                <a title="RCPD Code Manager" alt="RCPD Code Manager" onclick="javascript:topButtonClicked(this);" order="1"  id="rcpd-button" class="button fancybox-link" data-fancybox-type="iframe"  href="http://night.org/swat2/playerdb/">
                            <div id="rcpd-button-inner" class="button-inner icon"></div>
                </a>
                <a title="Upload" alt="Upload" onclick="javascript:topButtonClicked(this);" order="2" class="button fancybox.ajax fancybox-link2" id="upload-button" href="upload.php" >
                            <div id="upload-button-inner" class="button-inner icon"></div>
                </a>
                <a title="Settings" alt="Settings" onclick="javascript:topButtonClicked(this);" order="3" class="button fancybox.ajax fancybox-link3" id="settings-button" href="settings.php" >
                    <div id="settings-button-inner" class="button-inner icon"></div>  
                </a>    
            </div>

            <a title="RCPD Ranks" alt="RCPD Ranks" onclick="javascript:topButtonClicked(this);" class="button extend fancybox-link" data-fancybox-type="iframe"  href="http://night.org/swat2/playerdb/index.php?p=view">
                <span id="rcpd-button-inner" class="button-inner icon"></span><span class="button-inner">RCPD Ranks</span>
            </a>

            <ul id="nav">
                <li class="list-link-wrapper">
                    <div class="link-icon"></div>
                    <a alt="Redscull's Forum" title="Redscull's Forum" onclick="javascript:linkClicked(this)" value="http://redscull.com/forum/" id="link1">Redscull</a>
                </li>
                <li class="list-link-wrapper">
                    <div class="link-icon"></div>
                    <a alt="Clan 151 Forum" title="Clan 151 Forum" onclick="javascript:linkClicked(this)" value="http://energyisforwimps.getdanny.com/forum/" id="link2">151</a>
                </li>
                <li class="list-link-wrapper">
                    <div class="link-icon"></div>
                    <a alt="Clan XLR8 Forum" title="Clan XLR8 Forum" onclick="javascript:linkClicked(this)" value="http://teller55.net/forum" id="link3">XLR8</a>
                </li>
                <li class="list-link-wrapper">
                    <div class="link-icon"></div>
                    <a alt="Clan RS Forum" title="Clan RS Forum" onclick="javascript:linkClicked(this)" value="http://clan-swat.superforo.net/" id="link4">RS(Chile)</a>
                </li>
                <li class="list-link-wrapper">
                    <div class="link-icon"></div>
                    <a alt="Official SWAT Wiki" title="Official SWAT Wiki" onclick="javascript:linkClicked(this)" value="http://swatam.wikispaces.com/" id="link5">Wiki</a>
                </li>
        		<li class="list-link-wrapper">
                    <div class="link-icon"></div>
                    <a alt="Official SWAT Website" title="Official SWAT Website" onclick="javascript:linkClicked(this)" value="http://redscull.com/swat/readmeafter.html" id="link6">SWAT Website</a>
                </li>				
        		<li class="list-link-wrapper">
                    <div class="link-icon"></div>
                    <a alt="SWAT Vent Status" title="SWAT Vent Status" onclick="javascript:linkClicked(this)" value="http://www.ventrilo.com/status.php?hostname=vent64.light-speed.com&amp;port=7177" id="link7">Vent Status</a>
                </li>
            </ul>
            
                
            
            <ul id="code-list" onclick="swapzindex(this)" class="sortable">
            	
            </ul>
       
        <a class="button extend single fancybox-link4" data-fancybox-type="ajax"  href="code-manager/add.php"><span class="button-inner">Add</span></a>
            
            
    </div>
        
    <div id="main-content">
        <iframe frameborder="0" id="main-content-portal" src=""></iframe>
    </div>
    
    <div id="fixed-buttons-container">
        <div onclick="toTopButtonClicked();" id="to-top-button" class="fixed-button">^</div>
        <div onclick="hideButtonClicked();" id="hide-button" class="fixed-button"><<</div>
    </div>
    
</div>

<div id="code-adder">
</div>

</body>
</html>
