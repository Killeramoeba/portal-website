<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1"/>
    <title>Energy is for Wimps</title>

    <style>
        body { background-color: #000000; color: #FFFFFF;
            font-family: Arial, Verdana, Helvetica, sans-serif; }
        a:link { color: #99E362; }
        a:active { color: #00FF00; }
        a:visited { color: #69B926; }
        a:hover	{ text-decoration: underline; color: #ffcc00; }

        input.mainoption {
            background-color: #000000;
            font-weight: bold;
            border: 1px solid;
            border-color: #393908;
            color: #ffe888;
        }

        input.entry {
            color: #FFFFFF;
            border-width: 0;
            background: 0;
        }
        .table-cell{
            float:left;
        }
        .table-row{
            display:block;
            overflow:hidden;
        }
        .code-wrapper{
            float:left;
            overflow:hidden;
            margin:10px;
        }
        .code-wrapper.hover{
            outline:2px solid #FF0000;
            cursor:crosshair;
        }
        td.active{
            outline:1px solid yellow;
        }
    </style>
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="screen" />

    <script type="text/javascript" src="js/cookies.js"></script>
    <script type="text/javascript" src="js/redscull.js"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="code-manager/codes.js"></script>



<body>
<h1 id="heroes">heroes</h1>




<div id="filter-container" style=
"overflow: auto; padding: 10px; height: 331px; width: 583px; border: 1px solid rgb(204, 204, 204); position: absolute; z-index: 10001; top: 5px; left: 5px; background-color: rgb(0, 0, 0); background-repeat: no-repeat;">
<table border="0" cellpadding="0" cellspacing="12">
<tr valign="top">
    <td>
        <table class="class-filters" border="0" cellpadding="0" cellspacing="0">
            <tr align="center" valign="middle">
                <td height="35" id="class0" width="35"><img alt=
                                                            "Covert Sniper" height="31" src=
                                                            "http://night.org/swat2/playerdb/pics/class0.gif"
                                                            title="Covert Sniper" width="31"></td>
                <td height="35" id="class1" width="35"><img alt=
                                                            "Field Medic" height="31" src=
                                                            "http://night.org/swat2/playerdb/pics/class1.gif"
                                                            title="Field Medic" width="31"></td>
                <td height="35" id="class2" width="35"><img alt=
                                                            "Tactician" height="31" src=
                                                            "http://night.org/swat2/playerdb/pics/class2.gif"
                                                            title="Tactician" width="31"></td>
                <td height="35" id="class3" width="35"><img alt=
                                                            "Psychologist" height="31" src=
                                                            "http://night.org/swat2/playerdb/pics/class3.gif"
                                                            title="Psychologist" width="31"></td>
            </tr>
            <tr align="center" valign="middle">
                <td height="35" id="class4" width="35"><img alt=
                                                            "Maverick" height="31" src=
                                                            "http://night.org/swat2/playerdb/pics/class4.gif"
                                                            title="Maverick" width="31"></td>
                <td height="35" id="class5" width="35"><img alt=
                                                            "Heavy Ordnance" height="31" src=
                                                            "http://night.org/swat2/playerdb/pics/class5.gif"
                                                            title="Heavy Ordnance" width="31"></td>
                <td height="35" id="class6" width="35"><img alt=
                                                            "Demolitions" height="31" src=
                                                            "http://night.org/swat2/playerdb/pics/class6.gif"
                                                            title="Demolitions" width="31"></td>
                <td height="35" id="class7" width="35"><img alt=
                                                            "Cyborg" height="31" src=
                                                            "http://night.org/swat2/playerdb/pics/class7.gif"
                                                            title="Cyborg" width="31"></td>
            </tr>
            <tr align="center" valign="middle">
                <td height="35" id="class8" width="35"><img alt=
                                                            "Pyrotechnician" height="31" src=
                                                            "http://night.org/swat2/playerdb/pics/class8.gif"
                                                            title="Pyrotechnician" width="31"></td>
                <td height="35" id="class9" width="35"><img alt=
                                                            "Watchman" height="31" src=
                                                            "http://night.org/swat2/playerdb/pics/class9.gif"
                                                            title="Watchman" width="31"></td>
                <td height="35" id="classa" width="35"><img alt=
                                                            "Tech Ops" height="31" src=
                                                            "http://night.org/swat2/playerdb/pics/classa.gif"
                                                            title="Tech Ops" width="31"></td>
                <td height="35" id="classb" width="35"><img alt=
                                                            "Umbrella Clone" height="31" src=
                                                            "http://night.org/swat2/playerdb/pics/classb.gif"
                                                            title="Umbrella Clone" width="31"></td>
            </tr>
        </table>
    </td>
    <td>
        <table class="gun-filters" border="0" cellpadding="0" cellspacing="0">
            <tr align="center" valign="middle">
                <td height="35" id="gun0" width="35"><img alt=
                                                          "Assault Rifle" height="31" src=
                                                          "http://night.org/swat2/playerdb/pics/gun0.gif" title=
                                                          "Assault Rifle" width="31"></td>
                <td height="35" id="gun1" width="35"><img alt=
                                                          "Sniper Rifle" height="31" src=
                                                          "http://night.org/swat2/playerdb/pics/gun1.gif" title=
                                                          "Sniper Rifle" width="31"></td>
                <td height="35" id="gun2" width="35"><img alt=
                                                          "Chaingun" height="31" src=
                                                          "http://night.org/swat2/playerdb/pics/gun2.gif" title=
                                                          "Chaingun" width="31"></td>
                <td height="35" id="gun3" width="35"><img alt=
                                                          "Rocket Launcher" height="31" src=
                                                          "http://night.org/swat2/playerdb/pics/gun3.gif" title=
                                                          "Rocket Launcher" width="31"></td>
            </tr>
            <tr align="center" valign="middle">
                <td height="35" id="gun4" width="35"><img alt=
                                                          "Flamethrower" height="31" src=
                                                          "http://night.org/swat2/playerdb/pics/gun4.gif" title=
                                                          "Flamethrower" width="31"></td>
                <td height="35" id="gun5" width="35"><img alt=
                                                          "Laser Rifle" height="31" src=
                                                          "http://night.org/swat2/playerdb/pics/gun5.gif" title=
                                                          "Laser Rifle" width="31"></td>
                <td height="35" id="gun6" width="35"><img alt=
                                                          "Gatling Laser" height="31" src=
                                                          "http://night.org/swat2/playerdb/pics/gun6.gif" title=
                                                          "Gatling Laser" width="31"></td>
                <td height="35" id="gun7" width="35"><img alt="Pistols"
                                                          height="31" src=
                    "http://night.org/swat2/playerdb/pics/gun7.gif" title=
                                                          "Pistols" width="31"></td>
            </tr>
        </table>
    </td>
    <td>
        <table class="armor-filters" border="0" cellpadding="0" cellspacing="0">
            <tr align="center" valign="middle">
                <td height="35" id="armor0" width="35"><img alt="Light"
                                                            height="31" src=
                    "http://night.org/swat2/playerdb/pics/armor0.gif"
                                                            title="Light" width="31"></td>
                <td height="35" id="armor1" width="35"><img alt=
                                                            "Medium" height="31" src=
                                                            "http://night.org/swat2/playerdb/pics/armor1.gif"
                                                            title="Medium" width="31"></td>
                <td height="35" id="armor2" width="35"><img alt="Heavy"
                                                            height="31" src=
                    "http://night.org/swat2/playerdb/pics/armor2.gif"
                                                            title="Heavy" width="31"></td>
                <td height="35" id="armor3" width="35"><img alt=
                                                            "Advanced" height="31" src=
                                                            "http://night.org/swat2/playerdb/pics/armor3.gif"
                                                            title="Advanced" width="31"></td>
            </tr>
        </table>
    </td>
</tr>
<tr valign="top">
<td>
    <table class="trait-filters" border="0" cellpadding="0" cellspacing="0">
        <tr align="center" valign="middle">
            <td height="35" id="trait0" width="35"><img alt=
                                                        "Skilled" height="31" src=
                                                        "http://night.org/swat2/playerdb/pics/trait0.gif"
                                                        title="Skilled" width="31"></td>
            <td height="35" id="trait1" width="35"><img alt=
                                                        "Gifted" height="31" src=
                                                        "http://night.org/swat2/playerdb/pics/trait1.gif"
                                                        title="Gifted" width="31"></td>
            <td height="35" id="trait2" width="35"><img alt=
                                                        "Survivalist" height="31" src=
                                                        "http://night.org/swat2/playerdb/pics/trait2.gif"
                                                        title="Survivalist" width="31"></td>
            <td height="35" id="trait3" width="35"><img alt=
                                                        "Dragoon" height="31" src=
                                                        "http://night.org/swat2/playerdb/pics/trait3.gif"
                                                        title="Dragoon" width="31"></td>
        </tr>
        <tr align="center" valign="middle">
            <td height="35" id="trait4" width="35"><img alt=
                                                        "Acrobat" height="31" src=
                                                        "http://night.org/swat2/playerdb/pics/trait4.gif"
                                                        title="Acrobat" width="31"></td>
            <td height="35" id="trait5" width="35"><img alt=
                                                        "Swift Learner" height="31" src=
                                                        "http://night.org/swat2/playerdb/pics/trait5.gif"
                                                        title="Swift Learner" width="31"></td>
            <td height="35" id="trait6" width="35"><img alt=
                                                        "Healer" height="31" src=
                                                        "http://night.org/swat2/playerdb/pics/trait6.gif"
                                                        title="Healer" width="31"></td>
            <td height="35" id="trait7" width="35"><img alt=
                                                        "Flower Child" height="31" src=
                                                        "http://night.org/swat2/playerdb/pics/trait7.gif"
                                                        title="Flower Child" width="31"></td>
        </tr>
        <tr align="center" valign="middle">
            <td height="35" id="trait8" width="35"><img alt=
                                                        "Chem. Reliant" height="31" src=
                                                        "http://night.org/swat2/playerdb/pics/trait8.gif"
                                                        title="Chem. Reliant" width="31"></td>
            <td height="35" id="trait9" width="35"><img alt=
                                                        "Rad. Resistant" height="31" src=
                                                        "http://night.org/swat2/playerdb/pics/trait9.gif"
                                                        title="Rad. Resistant" width="31"></td>
            <td height="35" id="trait10" width="35"><img alt=
                                                         "Gadgeteer" height="31" src=
                                                         "http://night.org/swat2/playerdb/pics/trait10.gif"
                                                         title="Gadgeteer" width="31"></td>
            <td height="35" id="trait11" width="35"><img alt=
                                                         "Prowler" height="31" src=
                                                         "http://night.org/swat2/playerdb/pics/trait11.gif"
                                                         title="Prowler" width="31"></td>
        </tr>
        <tr align="center" valign="middle">
            <td height="35" id="trait12" width="35"><img alt=
                                                         "Energizer" height="31" src=
                                                         "http://night.org/swat2/playerdb/pics/trait12.gif"
                                                         title="Energizer" width="31"></td>
            <td height="35" id="trait13" width="35"><img alt=
                                                         "Pack Rat" height="31" src=
                                                         "http://night.org/swat2/playerdb/pics/trait13.gif"
                                                         title="Pack Rat" width="31"></td>
            <td height="35" id="trait14" width="35"><img alt=
                                                         "Engineer" height="31" src=
                                                         "http://night.org/swat2/playerdb/pics/trait14.gif"
                                                         title="Engineer" width="31"></td>
            <td height="35" id="trait15" width="35"><img alt=
                                                         "Reckless" height="31" src=
                                                         "http://night.org/swat2/playerdb/pics/trait15.gif"
                                                         title="Reckless" width="31"></td>
        </tr>
    </table>
</td>
<td>
    <table class="spec-filters" border="0" cellpadding="0" cellspacing="0">
        <tr align="center" valign="middle">
            <td height="35" id="spec0" width="35"><img alt=
                                                       "Weaponry" height="31" src=
                                                       "http://night.org/swat2/playerdb/pics/spec0.gif" title=
                                                       "Weaponry" width="31"></td>
            <td height="35" id="spec1" width="35"><img alt=
                                                       "Power Armor" height="31" src=
                                                       "http://night.org/swat2/playerdb/pics/spec1.gif" title=
                                                       "Power Armor" width="31"></td>
            <td height="35" id="spec2" width="35"><img alt=
                                                       "Energy Cells" height="31" src=
                                                       "http://night.org/swat2/playerdb/pics/spec2.gif" title=
                                                       "Energy Cells" width="31"></td>
            <td height="35" id="spec3" width="35"><img alt=
                                                       "Cybernetics" height="31" src=
                                                       "http://night.org/swat2/playerdb/pics/spec3.gif" title=
                                                       "Cybernetics" width="31"></td>
        </tr>
        <tr align="center" valign="middle">
            <td height="35" id="spec4" width="35"><img alt="Triage"
                                                       height="31" src=
                "http://night.org/swat2/playerdb/pics/spec4.gif" title=
                                                       "Triage" width="31"></td>
            <td height="35" id="spec5" width="35"><img alt=
                                                       "Chemistry" height="31" src=
                                                       "http://night.org/swat2/playerdb/pics/spec5.gif" title=
                                                       "Chemistry" width="31"></td>
            <td height="35" id="spec6" width="35"><img alt=
                                                       "Leadership" height="31" src=
                                                       "http://night.org/swat2/playerdb/pics/spec6.gif" title=
                                                       "Leadership" width="31"></td>
            <td height="35" id="spec7" width="35"><img alt=
                                                       "Robotics" height="31" src=
                                                       "http://night.org/swat2/playerdb/pics/spec7.gif" title=
                                                       "Robotics" width="31"></td>
        </tr>
        <tr align="center" valign="middle">
            <td height="35" id="spec8" width="35"><img alt=
                                                       "Espionage" height="31" src=
                                                       "http://night.org/swat2/playerdb/pics/spec8.gif" title=
                                                       "Espionage" width="31"></td>
        </tr>
    </table>
</td>
<td>
    <table class="talent-filters" border="0" cellpadding="0" cellspacing="0">
        <tr align="center" valign="middle">
            <td height="35" id="talent0" width="35"><img alt=
                                                         "Courage" height="31" src=
                                                         "http://night.org/swat2/playerdb/pics/talent0.gif"
                                                         title="Courage" width="31"></td>
            <td height="35" id="talent1" width="35"><img alt=
                                                         "Wiring" height="31" src=
                                                         "http://night.org/swat2/playerdb/pics/talent1.gif"
                                                         title="Wiring" width="31"></td>
            <td height="35" id="talent2" width="35"><img alt=
                                                         "Running" height="31" src=
                                                         "http://night.org/swat2/playerdb/pics/talent2.gif"
                                                         title="Running" width="31"></td>
            <td height="35" id="talent3" width="35"><img alt=
                                                         "Spotting" height="31" src=
                                                         "http://night.org/swat2/playerdb/pics/talent3.gif"
                                                         title="Spotting" width="31"></td>
        </tr>
        <tr align="center" valign="middle">
            <td height="35" id="talent4" width="35"><img alt=
                                                         "Toughness" height="31" src=
                                                         "http://night.org/swat2/playerdb/pics/talent4.gif"
                                                         title="Toughness" width="31"></td>
            <td height="35" id="talent5" width="35"><img alt=
                                                         "Tinkering" height="31" src=
                                                         "http://night.org/swat2/playerdb/pics/talent5.gif"
                                                         title="Tinkering" width="31"></td>
            <td height="35" id="talent6" width="35"><img alt=
                                                         "Hacking" height="31" src=
                                                         "http://night.org/swat2/playerdb/pics/talent6.gif"
                                                         title="Hacking" width="31"></td>
        </tr>
    </table>
    <table class="medal-filters">
        <tr>
            <td height="12" id="key1" width="16"><img alt=
                                                      "Key to the City" border="0" height="12" src=
                                                      "http://night.org/swat2/playerdb/pics/mkey1.gif" title=
                                                      "Key to the City" width="15"></td>
            <td height="12" id="moh1" width="16"><img alt=
                                                      "Medal of Honor" border="0" height="12" src=
                                                      "http://night.org/swat2/playerdb/pics/mmoh1.gif" title=
                                                      "Medal of Honor" width="15"></td>
            <td height="12" id="pcc1" width="16"><img alt=
                                                      "Police Combat Cross" border="0" height="12" src=
                                                      "http://night.org/swat2/playerdb/pics/mpcc1.gif" title=
                                                      "Police Combat Cross" width="15"></td>
            <td height="12" id="cob1" width="16"><img alt=
                                                      "Commendation Bar" border="0" height="12" src=
                                                      "http://night.org/swat2/playerdb/pics/mcob1.gif" title=
                                                      "Commendation Bar" width="15"></td>
            <td height="12" id="lsa1" width="16"><img alt=
                                                      "Life Saving Award" border="0" height="12" src=
                                                      "http://night.org/swat2/playerdb/pics/mlsa1.gif" title=
                                                      "Life Saving Award" width="15"></td>
            <td height="12" id="rem1" width="16"><img alt=
                                                      "Recognition for Exceptional Merit" border="0" height=
                                                      "12" src=
                                                      "http://night.org/swat2/playerdb/pics/mrem1.gif" title=
                                                      "Recognition for Exceptional Merit" width="15"></td>
        </tr>
        <tr>
            <td height="12" id="key0" width="16"><img alt=
                                                      "KEY (unearned)" border="0" height="12" src=
                                                      "http://night.org/swat2/playerdb/pics/mkey0.gif" title=
                                                      "KEY (unearned)" width="15"></td>
            <td height="12" id="moh0" width="16"><img alt=
                                                      "MOH (unearned)" border="0" height="12" src=
                                                      "http://night.org/swat2/playerdb/pics/mmoh0.gif" title=
                                                      "MOH (unearned)" width="15"></td>
            <td height="12" id="pcc0" width="16"><img alt=
                                                      "PCC (unearned)" border="0" height="12" src=
                                                      "http://night.org/swat2/playerdb/pics/mpcc0.gif" title=
                                                      "PCC (unearned)" width="15"></td>
            <td height="12" id="cob0" width="16"><img alt=
                                                      "COB (unearned)" border="0" height="12" src=
                                                      "http://night.org/swat2/playerdb/pics/mcob0.gif" title=
                                                      "COB (unearned)" width="15"></td>
            <td height="12" id="lsa0" width="16"><img alt=
                                                      "LSA (unearned)" border="0" height="12" src=
                                                      "http://night.org/swat2/playerdb/pics/mlsa0.gif" title=
                                                      "LSA (unearned)" width="15"></td>
            <td height="12" id="rem0" width="16"><img alt=
                                                      "REM (unearned)" border="0" height="12" src=
                                                      "http://night.org/swat2/playerdb/pics/mrem0.gif" title=
                                                      "REM (unearned)" width="15"></td>
        </tr>
    </table>
    <table class="title-filters">
        <tr>
            <td id="dot01"><img alt="Honor Guard" border="0" height="12" src="http://night.org/swat2/playerdb/pics/tit0.gif" title="Honor Guard" width="8"></td>
            <td id="dot11"><img alt="Nightmare" border="0" height="12" src="http://night.org/swat2/playerdb/pics/tit1.gif" title="Nightmare" width="8"></td>
            <td id="dot21"><img alt="Extinction" border="0" height="12" src="http://night.org/swat2/playerdb/pics/tit2.gif" title="Extinction" width="8"></td>
            <td id="dot31"><img alt="Megazilla" border="0" height="12" src="http://night.org/swat2/playerdb/pics/tit3.gif" title="Megazilla" width="8"></td>
            <td id="dot41"><img alt="Deathless" border="0" height="12" src="http://night.org/swat2/playerdb/pics/tit4.gif" title="Deathless" width="8"></td>
            <td id="dot51"><img alt="Impressive" border="0" height="12" src="http://night.org/swat2/playerdb/pics/tit5.gif" title="Impressive" width="8"></td>
            <td id="dot61"><img alt="Solo" border="0" height="12" src="http://night.org/swat2/playerdb/pics/tit6.gif" title="Solo" width="8"></td>
        </tr>
        <tr>
            <td id="dot00"><img alt="Non-Honor Guard" border="0" height="12" src="http://night.org/swat2/playerdb/pics/titd.gif" title="Non-Honor Guard" width="8"></td>
            <td id="dot10"><img alt="Nightmare (unearned)" border="0" height="12" src="http://night.org/swat2/playerdb/pics/titd.gif" title="Nightmare (unearned)" width="8"></td>
            <td id="dot20"><img alt="Extinction (unearned)" border="0" height="12" src="http://night.org/swat2/playerdb/pics/titd.gif" title="Extinction (unearned)" width="8"></td>
            <td id="dot30"><img alt="Megazilla (unearned)" border="0" height="12" src="http://night.org/swat2/playerdb/pics/titd.gif" title="Megazilla (unearned)" width="8"></td>
            <td id="dot40"><img alt="Deathless (unearned)" border="0" height="12" src="http://night.org/swat2/playerdb/pics/titd.gif" title="Deathless (unearned)" width="8"></td>
            <td id="dot50"><img alt="Impressive (unearned)" border="0" height="12" src="http://night.org/swat2/playerdb/pics/titd.gif" title="Impressive (unearned)" width="8"></td>
            <td id="dot60"><img alt="Solo (unearned)" border="0" height="12" src="http://night.org/swat2/playerdb/pics/titd.gif" title="Solo (unearned)" width="8"></td>
        </tr>
    </table>
</td>
<td>
    <!--
    <ul id="sortOrder">
        <li style="position: relative;" type="none"><input class="mainoption" type="button" value="Rank"></li>
        <li style="position: relative;" type="none"><input class="mainoption" type="button" value="Medals"></li>
        <li style="position: relative;" type="none"><input class="mainoption" type="button" value="Class"></li>
        <li style="position: relative;" type="none"><input class="mainoption" type="button" value="Trait"></li>
        <li style="position: relative;" type="none"><input class="mainoption" type="button" value="Spec"></li>
    </ul>
    -->
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="12">
    <tr>
        <td><font color="#FFE888" size="-1">Results:</font> <font color="#FFE888" id="resultNum" size="-1">209</font></td>
        <!--<td><font color="#FFE888" size="-1">Uniques:</font> <font color="#FFE888" id="uniqueNum" size="-1">201</font></td>-->
    </tr>
</table>
</div>





<div class="code-list">
<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://night.org/swat2/playerdb/?user=".$_COOKIE['energyisforwimps-rcpdUsername']."&pw=".$_COOKIE['energyisforwimps-rcpdPassword']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);
$pos1 = strpos($output, "WriteHero(");
$pos2 = strrpos($output, "WriteHero(")+94;
$output = substr($output, $pos1, $pos2-$pos1 );
echo "<script>";
echo $output;
echo "</script>";
?>
</div>

<script>
    //console.log(codes);

    $( ".code-wrapper" ).hover(
        function() {
            $( this ).addClass( "hover" );
        }, function() {
            $( this ).removeClass( "hover" );
        }
    );

    var myCodes = new codeStore();

    $( ".code-wrapper" ).click(
        function(){


            code = codes[$(this).prevAll().length-1];
            //console.log(code);

            if(code.hero=="a")
                code.hero=10;
            else if(code.hero=="b")
                code.hero=11;

            serializedCode="class="+code.hero+"&gun="+code.gun+"&armor="+code.armor+"&trait="+code.trait+"&spec="+code.spec+"&talent="+code.talent+"&medal0="+(code["rem"]>=1?0:6)+"&medal1="+(code["lsa"]==1?1:6)+"&medal2="+(code["cob"]==1?2:6)+"&medal3="+(code["pcc"]==1?3:6)+"&medal4="+(code["moh"]==1?4:6)+"&medal5="+(code["key"]==1?5:6)+"&title0="+(code["titles"].substring(0,1)==1?0:7)+"&title1="+(code["titles"].substring(1,2)==1?1:7)+"&title2="+(code["titles"].substring(2,3)==1?2:7)+"&title3="+(code["titles"].substring(3,4)==1?3:7)+"&title4="+(code["titles"].substring(4,5)==1?4:7)+"&title5="+(code["titles"].substring(5,6)==1?5:7)+"&title6="+(code["titles"].substring(6,7)==1?6:7)+"&code="+code.code;
            myCodes.addCodeHTML(serializedCode);
            myCodes.addCodeCookie(serializedCode);
        }
    );

    $(function() {
        $( "#filter-container" ).draggable();
    });


    filters ={
        classFilters:$("#filter-container .class-filters"),
        gunFilters:$("#filter-container .gun-filters"),
        armorFilters:$("#filter-container .armor-filters"),
        traitFilters:$("#filter-container .trait-filters"),
        specFilters:$("#filter-container .spec-filters"),
        talentFilters:$("#filter-container .talent-filters"),
        medalFilters:$("#filter-container .medal-filters"),
        titleFilters:$("#filter-container .title-filters")
    }

    //onclick for selecting filter
    function selectFilter(filters, findID){

        selectedFilter = $(filters).find(findID);
        parentTable = selectedFilter.parent().parent().parent();
        parentTable.removeAttr("data")

        //for each filter
        filters.find("td").each(function(){
            //if not the filter clicked on
            if($(this).attr("id") != selectedFilter.attr("id")){
                //remove class
                $(this).removeAttr("class");
            }
        });

        //if active
        if(selectedFilter.hasClass("active")){
            //make inactive
            selectedFilter.removeClass("active");
        }
        //if inactive
        else{
            //make active
            selectedFilter.addClass("active");

            //add attr data to parent table
            parentTable.attr("data",selectedFilter.attr("id"))
        }

        filterIt();

    }

    //register onclick with each filter button
    jQuery.each(filters, function(k,v){
        $(v).find("td").click(function(){
            selectFilter(v, "#"+$(this).attr("id"));
        });
    });

    function filterIt(){
        filtersArray = [];
        jQuery.each( filters ,function(k,v){
            if (typeof v.attr("data") !== "undefined"){
                filtersArray.push(v.attr("data"));
            }
            else{
                filtersArray.push("");
            }

        });

        //console.log(filtersArray);

        codesToShow = {};

        jQuery.each(codes,function(k,v){
            if (
                    (v.hero == filtersArray[0].slice(-1) || filtersArray[0] == "" ) &&
                    (v.gun == filtersArray[1].slice(-1) || filtersArray[1] == "" ) &&
                    (v.armor == filtersArray[2].slice(-1) || filtersArray[2] == "" ) &&
                    (v.trait == filtersArray[3].slice(5) || filtersArray[3] == "" ) &&
                    (v.spec == filtersArray[4].slice(-1) || filtersArray[4] == "" ) &&
                    (v.talent == filtersArray[5].slice(-1) || filtersArray[5] == "" ) &&
                    (v[filtersArray[6].slice(0,3)] == filtersArray[6].slice(3) || filtersArray[6] == "" ) &&
                    (v.titles[filtersArray[7].slice(3,4)] == filtersArray[7].slice(4,5) || filtersArray[7] == "" )
            ){

                codesToShow[k] = v;
            }

        });



        $(".code-list").empty();

        jQuery.each(codesToShow,function(k,v){
            WriteHeroPlain('', v.code, "12", "4", v.hero, v.gun, v.armor, v.trait, v.spec, v.talent, v.key, v.moh, v.pcc, v.cob, v.lsa, v.rem, v.titles, v.code, k);
        });
        //console.log($( ".code-wrapper" ));


        $( ".code-wrapper" ).hover(
            function() {
                $( this ).addClass( "hover" );
            }, function() {
                $( this ).removeClass( "hover" );
            }
        );


        $( ".code-wrapper" ).click(
            function(){


                code = codes[$(this).attr("index")];
                //console.log(code);

                if(code.hero=="a")
                    code.hero=10;
                else if(code.hero=="b")
                    code.hero=11;

                serializedCode="class="+code.hero+"&gun="+code.gun+"&armor="+code.armor+"&trait="+code.trait+"&spec="+code.spec+"&talent="+code.talent+"&medal0="+(code["rem"]>=1?0:6)+"&medal1="+(code["lsa"]==1?1:6)+"&medal2="+(code["cob"]==1?2:6)+"&medal3="+(code["pcc"]==1?3:6)+"&medal4="+(code["moh"]==1?4:6)+"&medal5="+(code["key"]==1?5:6)+"&title0="+(code["titles"].substring(0,1)==1?0:7)+"&title1="+(code["titles"].substring(1,2)==1?1:7)+"&title2="+(code["titles"].substring(2,3)==1?2:7)+"&title3="+(code["titles"].substring(3,4)==1?3:7)+"&title4="+(code["titles"].substring(4,5)==1?4:7)+"&title5="+(code["titles"].substring(5,6)==1?5:7)+"&title6="+(code["titles"].substring(6,7)==1?6:7)+"&code="+code.code;
                myCodes.addCodeHTML(serializedCode);
                myCodes.addCodeCookie(serializedCode);
            }
        );

        Object.size = function(obj) {
            var size = 0, key;
            for (key in obj) {
                if (obj.hasOwnProperty(key)) size++;
            }
            return size;
        };


        console.log(Object.size(codesToShow));
        $("#resultNum").text(Object.size(codesToShow));
    }

</script>
</body>

