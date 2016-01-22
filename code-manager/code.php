<?php
if(isset($_POST["codes"]))
{
	$codes = json_decode($_POST["codes"], true);
}
else
{
	if(isset($_POST["code"])){
		$_POST["code"] = trim( str_replace ( "-", "",  $_POST["code"] ) );
	}
	$_POST["order"]=$order = isset($_POST["order"])?($_POST["order"]):("error");
	
	$codes = array(
		$order=>array()
	);
	
	$_POST["code"]=$codes[$order]['code']=isset($_POST["code"])&&strlen($_POST["code"])==16?($_POST["code"]):("error");
	$_POST["class"]=$codes[$order]['class']=isset($_POST["class"])&&(strlen($_POST["class"])==1||strlen($_POST["class"])==2)?($_POST["class"]):("error");
	$_POST["gun"]=$codes[$order]['gun']=isset($_POST["gun"])&&strlen($_POST["gun"])==1?($_POST["gun"]):("error");
	$_POST["armor"]=$codes[$order]['armor']=isset($_POST["armor"])&&strlen($_POST["armor"])==1?($_POST["armor"]):("error");
	$_POST["trait"]=$codes[$order]['trait']=isset($_POST["trait"])&&(strlen($_POST["trait"])==1||strlen($_POST["trait"])==2)?($_POST["trait"]):("error");
	$_POST["spec"]=$codes[$order]['spec']=isset($_POST["spec"])&&strlen($_POST["spec"])==1?($_POST["spec"]):("error");
	$_POST["talent"]=$codes[$order]['talent']=isset($_POST["talent"])&&strlen($_POST["talent"])==1?($_POST["talent"]):("error");
	
	$_POST["medal0"]=$codes[$order]['medals']['rem'] = isset($_POST["medal0"])&&strlen($_POST["medal0"])==1?($_POST["medal0"]):("error");
	$_POST["medal1"]=$codes[$order]['medals']['lsa'] = isset($_POST["medal1"])&&strlen($_POST["medal1"])==1?($_POST["medal1"]):("error");
	$_POST["medal2"]=$codes[$order]['medals']['cob'] = isset($_POST["medal2"])&&strlen($_POST["medal2"])==1?($_POST["medal2"]):("error");
	$_POST["medal3"]=$codes[$order]['medals']['pcc'] = isset($_POST["medal3"])&&strlen($_POST["medal3"])==1?($_POST["medal3"]):("error");
	$_POST["medal4"]=$codes[$order]['medals']['moh'] = isset($_POST["medal4"])&&strlen($_POST["medal4"])==1?($_POST["medal4"]):("error");
	$_POST["medal5"]=$codes[$order]['medals']['key'] = isset($_POST["medal5"])&&strlen($_POST["medal5"])==1?($_POST["medal5"]):("error");
	
	$_POST["title0"]=$codes[$order]['titles']['honorguard'] = isset($_POST["title0"])&&strlen($_POST["title0"])==1?($_POST["title0"]):("error");
	$_POST["title1"]=$codes[$order]['titles']['nightmare'] = isset($_POST["title1"])&&strlen($_POST["title1"])==1?($_POST["title1"]):("error");
	$_POST["title2"]=$codes[$order]['titles']['extinction'] = isset($_POST["title2"])&&strlen($_POST["title2"])==1?($_POST["title2"]):("error");
	$_POST["title3"]=$codes[$order]['titles']['megazilla'] = isset($_POST["title3"])&&strlen($_POST["title3"])==1?($_POST["title3"]):("error");
	$_POST["title4"]=$codes[$order]['titles']['deathless'] = isset($_POST["title4"])&&strlen($_POST["title4"])==1?($_POST["title4"]):("error");
	$_POST["title5"]=$codes[$order]['titles']['impressive'] = isset($_POST["title5"])&&strlen($_POST["title5"])==1?($_POST["title5"]):("error");
	$_POST["title6"]=$codes[$order]['titles']['solo'] = isset($_POST["title6"])&&strlen($_POST["title6"])==1?($_POST["title6"]):("error");
	
	$cookieData = $_POST;
	
}

function stringToJSON($s){
	$s = str_replace ( '=' , '":"' , $s );
	$s = str_replace ( '&' , '","' , $s );	
	return '{"'.$s.'"}';
}


/*
$codes = array(
	'1'=>array(
		'code'=>'0123456789',
		'class'=>'1',
		'gun'=>'1',
		'armor'=>'1',
		'trait'=>'1',
		'spec'=>'1',
		'talent'=>'1',
		'medals'=>array(
			'rem'=>'0',
			'lsa'=>'1',
			'cob'=>'2',
			'pcc'=>'3',
			'moh'=>'4',
			'key'=>'5',
		),
		'titles'=>array(
			'honorguard'=>'0',
			'nightmare'=>'1',
			'extinction'=>'2',
			'megazilla'=>'3',
			'deathless'=>'4',
			'impressive'=>'5',
			'solo'=>'6',
		),
	),
);
*/
/*
echo "<pre>";
print_r($codes);
echo "</pre>";
*/

?>

<?php if(isset($codes)): ?>
	<?php $i=1;foreach($codes as $codenum => $codevars):if($codenum!="length"): ?>
    <li order="<?php echo $codenum ?>">
        <div><img class="class-portrait" src="images/rcpd/classes/class<?php echo $codevars['class'] ?>.gif"><img class="specs" src="images/rcpd/guns/gun<?php echo $codevars['gun'] ?>.gif"><img class="specs" src="images/rcpd/armor/armor<?php echo $codevars['armor'] ?>.gif"><img class="specs" src="images/rcpd/trait/trait<?php echo $codevars['trait'] ?>.gif"><img class="specs" src="images/rcpd/spec/spec<?php echo $codevars['spec'] ?>.gif"><img class="specs" src="images/rcpd/talent/talent<?php echo $codevars['talent'] ?>.gif"></div>
        <div class="class-info">
            <span contenteditable='true' onblur="$(this).html( jQuery.trim($(this).text()).replace(/-/g,'') );myCodes.editCode($(this),$(this).parent().parent(),$(this).text(),'code');"><?php echo $codevars['code'] ?></span>
            <div class="class-info-inner medals">
                <?php $j=0;foreach($codevars['medals'] as $medal): ?>
                <img class="medals" onclick="if($(this).attr('src')=='images/rcpd/medals/medal6.gif'){$(this).attr('src','images/rcpd/medals/medal<?php echo $j ?>.gif')}else{$(this).attr('src','images/rcpd/medals/medal6.gif')}myCodes.editCode($(this),$(this).parent().parent().parent(),$(this).attr('src').charAt($(this).attr('src').length-5),'medal<?php echo $j ?>');" src="images/rcpd/medals/medal<?php echo $medal ?>.gif">
                <?php $j++;endforeach; ?>
            </div>
            <div class="class-info-inner titles">
                <?php $j=0;foreach($codevars['titles'] as $title): ?>
                <img class="titles" onclick="if($(this).attr('src')=='images/rcpd/titles/title7.gif'){$(this).attr('src','images/rcpd/titles/title<?php echo $j ?>.gif')}else{$(this).attr('src','images/rcpd/titles/title7.gif')}myCodes.editCode($(this),$(this).parent().parent().parent(),$(this).attr('src').charAt($(this).attr('src').length-5),'title<?php echo $j ?>');" src="images/rcpd/titles/title<?php echo $title ?>.gif">
                <?php $j++;endforeach; ?>
            </div>
            <div onclick="myCodes.deleteCode(this);" class="ui-icon-circle-close" ></div>
        </div>
        <span style="display:none;" class="cookie"><?php echo isset($cookieData)?json_encode($cookieData):stringToJSON($codes[$i]['cookiedata']); ?></span>
    </li>
    <?php $i++;endif;endforeach; ?>
<?php else: ?>
	<p>error</p>
<?php endif; ?>