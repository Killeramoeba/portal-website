<link rel="stylesheet" type="text/css" href="css/popup.css">
<link rel="stylesheet" type="text/css" href="css/gen.css">
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/build.js"></script>

<?php
if(isset($_GET["class"]))
$class = $_GET["class"];
else
$class = 0;

if(isset($_GET["gun"]))
$gun = $_GET["gun"];
else
$gun = 0;

if(isset($_GET["armor"]))
$armor = $_GET["armor"];
else
$armor = 0;

if(isset($_GET["traitStart"]))
$traitStart = $_GET["traitStart"];
else
$traitStart = 0;

if(isset($_GET["traitEnd"]))
$traitEnd = $_GET["traitEnd"];
else
$traitEnd = 0;

if(isset($_GET["specStart"]))
$specStart = $_GET["specStart"];
else
$specStart = 0;

if(isset($_GET["specEnd"]))
$specEnd = $_GET["specEnd"];
else
$specEnd = 0;

if(isset($_GET["talent"]))
$talent = $_GET["talent"];
else
$talent = 0;
?>
<script>


var desiredClass = <?=$class?>;
var desiredGun = <?=$gun?>;
var desiredArmor = <?=$armor?>;
var traitStart = <?=$traitStart?>;
var traitEnd = <?=$traitEnd?>;
var specStart = <?=$specStart?>;
var specEnd = <?=$specEnd?>;
var desiredTalent = <?=$talent?>;
var userInput = [desiredClass, desiredGun, desiredArmor, traitStart, traitEnd, specStart, specEnd, desiredTalent];
	

$(function(){
	chooseItem("class", userInput[0]);
	chooseItem("gun", userInput[1]);
	chooseItem("armor", userInput[2]);
	chooseItem("trait", userInput[3]);
	chooseItem("trait2", userInput[4]);
	chooseItem("spec", userInput[5]);
	chooseItem("spec2", userInput[6]);
	chooseItem("talent", userInput[7]);
	generate(userInput);
});

function generate(userInput)
{
	
	var desiredClass = userInput[0];
	var desiredGun = userInput[1];
	var desiredArmor = userInput[2];
	var traitStart = userInput[3];
	var traitEnd = userInput[4];
	var specStart = userInput[5];
	var specEnd = userInput[6];
	var desiredTalent = userInput[7];
	
	var masterString = "";
	
	for(l=traitStart;l<=traitEnd;l++)
	{		
		masterString += "<div class='traitContainer'>";					
		for(m=specStart;m<=specEnd;m++)
		{					
			var string = "<div>";
			var linkname = "";

			string += "<a class='rcpd-link' href='http://night.org/swat2/playerdb/index.php?p=gen";
			
			if(desiredClass==10)
			string+="&class=a";	
			else
			string+="&class="+(desiredClass);
			
			
			string+="&gun="+(desiredGun);
			string+="&armor="+(desiredArmor);
			string+="&trait="+(l);
			string+="&spec="+(m);
			string+="&talent="+(desiredTalent)+"'>";
			
			linkname +="<img src='images/rcpd/classes/class"+(desiredClass)+".gif' />";
			linkname +="<img src='images/rcpd/guns/gun"+(desiredGun)+".gif' />";
			linkname +="<img src='images/rcpd/armor/armor"+(desiredArmor)+".gif' />";
			linkname +="<img src='images/rcpd/trait/trait"+(l)+".gif' />";
			linkname +="<img src='images/rcpd/spec/spec"+(m)+".gif' />";
			linkname +="<img src='images/rcpd/talent/talent"+(desiredTalent)+".gif' />";
										
			string += linkname+"</a>";
			string +="</div>";
			
			masterString += string;
		}
		masterString += "</div>";
			
	}
	
	
	window.history.pushState("object or string", "Title", "?class="+userInput[0]+"&gun="+userInput[1]+"&armor="+userInput[2]+"&traitStart="+userInput[3]+"&traitEnd="+userInput[4]+"&specStart="+userInput[5]+"&specEnd="+userInput[6]+"&talent="+userInput[7]);
	$("#links").html(masterString);

}
</script>
<div id="left-side">
	<div class="row-wrapper">
        <div id="class" class= "itemRow1">
            <p class="text">Class:</p>
            <?php
            for ($i=0;$i<11;$i++)
            {
            ?>	
                <a href="javascript: chooseItem('class',<?=$i?>)">
                    <div class="img"><img src="images/rcpd/classes/class<?=$i?>.gif"/></div>
                </a>
            <?php
            }
            ?>
        </div>
        
        <div id="gun" class= "itemRow1">
            <p class="text">gun:</p>
            <?php
            for ($i=0;$i<7;$i++)
            {
            ?>
                <a href="javascript: chooseItem('gun',<?=$i?>)">
                    <div class="img"><img src="images/rcpd/guns/gun<?=$i?>.gif"/></div>
                </a>
            <?php
            }
            ?>
        </div>
    
        
    </div>
    <div class="row-wrapper">   
        <div id="armor" class= "itemRow1">
            <p class="text">Armor:</p>
            <?php
            for ($i=0;$i<4;$i++)
            {
            ?>
                <a href="javascript: chooseItem('armor',<?=$i?>)">
                    <div class="img"><img src="images/rcpd/armor/armor<?=$i?>.gif"/></div>
                </a>
            <?php
            }
            ?>
        </div>
        <div id="talent" class= "itemRow2">
            <p class="text">Talent:</p>
            <?php
            for ($i=0;$i<7;$i++)
            {
            ?>
                <a href="javascript: chooseItem('talent',<?=$i?>)">
                    <div class="img"><img src="images/rcpd/talent/talent<?=$i?>.gif"/></div>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="row-wrapper">
        <div id="trait" class= "itemRow2">
            <p class="text">Trait Start:</p>
            <?php
            for ($i=0;$i<16;$i++)
            {
            ?>
                <a href="javascript: chooseItem('trait',<?=$i?>)">
                    <div class="img"><img src="images/rcpd/trait/trait<?=$i?>.gif"/></div>
                </a>
            <?php
            }
            ?>
        </div>
   
        <div id="trait2" class= "itemRow2">
            <p class="text">Trait End:</p>
            <?php
            for ($i=0;$i<16;$i++)
            {
            ?>
                <a href="javascript: chooseItem('trait2',<?=$i?>)">
                    <div class="img"><img src="images/rcpd/trait/trait<?=$i?>.gif"/></div>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="row-wrapper">
        <div id="spec" class= "itemRow2">
            <p class="text">Spec Start:</p>
            <?php
            for ($i=0;$i<9;$i++)
            {
            ?>
                <a href="javascript: chooseItem('spec',<?=$i?>)">
                    <div class="img"><img src="images/rcpd/spec/spec<?=$i?>.gif"/></div>
                </a>
            <?php
            }
            ?>
        </div>
        <div id="spec2" class= "itemRow2">
            <p class="text">Spec End:</p>
            <?php
            for ($i=0;$i<9;$i++)
            {
            ?>
                <a href="javascript: chooseItem('spec2',<?=$i?>)">
                    <div class="img"><img src="images/rcpd/spec/spec<?=$i?>.gif"/></div>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
    
    
    <div class="button" style="display:block;    margin: 10px; clear:both;  width:128px;">
		<a onclick="javascript:generate(getUserInput());" class="text">Generate List</a>
	</div>
</div>

<div id="links">
</div>