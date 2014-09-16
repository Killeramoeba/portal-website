<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Settings</title>
<link rel="stylesheet" type="text/css" href="css/popup.css" />
<link rel="stylesheet" type="text/css" href="css/addcode.css" />
</head>
<body>
<script>
function selectItem(a){
	img = a.children().children('img');
	input = $("#addcode input[name='"+img.attr("inputname")+"']");
	if( img.css("margin") == "1px" ){
		input.val(img.attr("activevalue"));
	}else if(img.css("margin") == "0px"){
		input.val(input.attr("defaultvalue"));
	}
}

function selectMedal(a){	
	img = a.children().children('img');
	input = img.next();
	if( img.css("margin") == "1px" ){
		input.val(input.attr("activevalue"));
	}else if(img.css("margin") == "0px"){
		input.val(input.attr("defaultvalue"));
	}
}
</script>
	<div id="popup-wrapper">
    	<p>Click anywhere and hold to drag.</p>
    	<form id="addcode">
    	<div class="row-wrapper">
        	
            <div id="class" class= "itemRow">
                <?php for ($i=0;$i<11;$i++){ ?>	
                    <a href="javascript: chooseItem('class',<?=$i?>);" onclick="selectItem($(this))">
                        <div class="img">
                        	<img src="images/rcpd/classes/class<?=$i?>.gif" activevalue="<?=$i?>" inputname="class" />
                        </div>
                    </a>
                <?php } ?>
                <input type="hidden" name="class" value="11" defaultvalue="11" >
            </div>
            
            <div id="gun" class= "itemRow">
                <?php for ($i=0;$i<7;$i++){ ?>
                    <a href="javascript: chooseItem('gun',<?=$i?>);" onclick="selectItem($(this))">
                        <div class="img">
                        	<img src="images/rcpd/guns/gun<?=$i?>.gif" activevalue="<?=$i?>" inputname="gun" />
                        </div>
                    </a>
                <?php } ?>
                <input type="hidden" name="gun" value="7" defaultvalue="7" >
            </div>
        
            
            <div id="armor" class= "itemRow">
                <?php for ($i=0;$i<4;$i++){ ?>
                    <a href="javascript: chooseItem('armor',<?=$i?>);" onclick="selectItem($(this))">
                        <div class="img">
                            <img src="images/rcpd/armor/armor<?=$i?>.gif" activevalue="<?=$i?>" inputname="armor" />                            
                        </div>
                    </a>
                <?php } ?>
                <input type="hidden" name="armor" value="4" defaultvalue="4" >
            </div>
        </div>
        <div class="row-wrapper">
            
        
            <div id="trait" class= "itemRow">
                <?php for ($i=0;$i<16;$i++){ ?>
                    <a href="javascript: chooseItem('trait',<?=$i?>);" onclick="selectItem($(this))">
                        <div class="img">
                        	<img src="images/rcpd/trait/trait<?=$i?>.gif" activevalue="<?=$i?>" inputname="trait" />                            
                        </div>
                    </a>
                <?php } ?>
                <input type="hidden" name="trait" value="16" defaultvalue="16" >
            </div>
            
            <div id="spec" class= "itemRow">
                <?php for ($i=0;$i<9;$i++){ ?>
                    <a href="javascript: chooseItem('spec',<?=$i?>);" onclick="selectItem($(this))">
                        <div class="img">
                        	<img src="images/rcpd/spec/spec<?=$i?>.gif" activevalue="<?=$i?>" inputname="spec" />                            
                        </div>
                    </a>
                <?php } ?>
                <input type="hidden" name="spec" value="9" defaultvalue="9" >                
            </div>

            <div id="talent" class= "itemRow">
                <?php for ($i=0;$i<7;$i++){ ?>
                    <a href="javascript: chooseItem('talent',<?=$i?>);" onclick="selectItem($(this))">
                        <div class="img">
                        	<img src="images/rcpd/talent/talent<?=$i?>.gif" activevalue="<?=$i?>" inputname="talent" />                            
                        </div>
                    </a>
                <?php } ?>
                <input type="hidden" name="talent" value="7" defaultvalue="7" >
            </div>
            
            </div>
        	<div class="row-wrapper">
        

            <div id="medal" class= "itemRow">
				<?php for ($i=0;$i<6;$i++){ ?>
                    <a href="javascript: chooseItem('medal',<?=$i?>);" onclick="selectMedal($(this));">
                        <div class="img">
                            <img src="images/rcpd/medals/medal<?=$i?>.gif" />
                            <input type="hidden" name="medal<?=$i?>" value="6" defaultvalue="6" activevalue="<?=$i?>" >
                        </div>
                    </a>
                <?php } ?>
            </div>
            <div id="title" class= "itemRow">
                <?php for ($i=0;$i<7;$i++){ ?>
                    <a href="javascript: chooseItem('title',<?=$i?>);" onclick="selectMedal($(this));">
                        <div class="img">
                            <img src="images/rcpd/titles/title<?=$i?>.gif" />
                            <input type="hidden" name="title<?=$i?>" value="7" defaultvalue="7" activevalue="<?=$i?>" >
                        </div>
                    </a>
                <?php } ?>
            </div>
            <div class= "itemRow">
            	<input id="code-input" type="text" name="code" placeholder="code">
            </div>
            <input type="hidden" name="order" value="0" >
            <script>
				$("#addcode input[name='order']").val($("#code-list").children().length+1);
            </script>
        </div>
        </form>
        <div class="row-wrapper last">        	
            <div id="submit-wrapper">
            	<a onclick="processCookie(addCode($('form#addcode').serialize()))" class="button extend single"><span class="button-inner">OK</span></a>
            </div>
        </div>
        </div>
    </div>
</body>
</html>