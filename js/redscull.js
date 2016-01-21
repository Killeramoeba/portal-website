var colCur = 0;
var colMax = 1;
var colSize = '32%';
var colSpce = '2%';
rowHighlight = false;

var codes= [];
function addCode(code,hero,gun,armor,trait,spec,talent,key,moh,pcc,cob,lsa,rem,titles){

    var element = [];
    element.code = code;
    element.hero = hero;
    element.gun = gun;
    element.armor = armor;
    element.trait = trait;
    element.spec = spec;
    element.talent = talent;
    element.key = key;
    element.moh = moh;
    element.pcc = pcc;
    element.cob = cob;
    element.lsa = lsa;
    element.rem = rem;
    element.titles=titles;
    codes.push(element);
}


function WriteHeroPlain(name, code, rank, diff, hero, gun, armor, trait, spec, talent, key, moh, pcc, cob, lsa, rem, titles, heroname, index) {

    var config = CfgIcon('gun',gun)+CfgIcon('armor',armor)+CfgIcon('trait',trait)+CfgIcon('spec',spec)+CfgIcon('talent',talent);
    config = config + '<br>' + MedalIcon('key',key)+MedalIcon('moh',moh)+MedalIcon('pcc',pcc)+MedalIcon('cob',cob)+MedalIcon('lsa',lsa)+MedalIcon('rem',rem)
    if (code != '') {
        //maintenance mode
        config = config + TitleIcons(titles);
        config = config + '<br> ' + wrapCode(code, '&nbsp;' + DeleteHeroLink(heroname));
    } else {
        //public listing
        if (titles == '1') {
            config = config + TitleIcon(0, true);
        }
        config = config + '<br>';
    }
    if (name != '') {
        config = config + '<font size=-1 color=ffe888>"'+ name +'"</font>';
    }
    WriteDbRowPlain(HeroIcon(hero,rank,diff), config, index);
}

function WriteHero(name, code, rank, diff, hero, gun, armor, trait, spec, talent, key, moh, pcc, cob, lsa, rem, titles, heroname) {

    addCode(code,hero,gun,armor,trait,spec,talent,key,moh,pcc,cob,lsa,rem,titles);

    var config = CfgIcon('gun',gun)+CfgIcon('armor',armor)+CfgIcon('trait',trait)+CfgIcon('spec',spec)+CfgIcon('talent',talent);
    config = config + '<br>' + MedalIcon('key',key)+MedalIcon('moh',moh)+MedalIcon('pcc',pcc)+MedalIcon('cob',cob)+MedalIcon('lsa',lsa)+MedalIcon('rem',rem)
    if (code != '') {
        //maintenance mode
        config = config + TitleIcons(titles);
        config = config + '<br> ' + wrapCode(code, '&nbsp;' + DeleteHeroLink(heroname));
    } else {
        //public listing
        if (titles == '1') {
            config = config + TitleIcon(0, true);
        }
        config = config + '<br>';
    }
    if (name != '') {
        config = config + '<font size=-1 color=ffe888>"'+ name +'"</font>';
    }
    WriteDbRow(HeroIcon(hero,rank,diff), config);
}

function WriteDbRowPlain(icon, data, index) {
    if (icon == '') {
        icon = PlayerIconEmpty();
        data = '&nbsp';
    }
    if (colCur == 0) {
        rowData = '';//'<div class="table" cellpadding=0 cellspacing=0 border=0 width=100%><div class="table-row" valign=top>';
    }
    colCur = colCur + 1;
    rowData = rowData + '<div class="code-wrapper" index="'+index+'" ><div class="table-cell" align=right>'+icon+'</div><div class="table-cell" width='+colSize+'>' + data + '</div></div>';
    if (colCur < colMax) {
        //rowData = rowData + '<div class="table-cell" width='+colSpce+'></div>';
    } else {
        //rowData = rowData + '</div></div>';
        WriteOldRow('',rowData);
        colCur = 0;
    }
}

function WriteDbRow(icon, data) {
    if (icon == '') {
        icon = PlayerIconEmpty();
        data = '&nbsp';
    }
    if (colCur == 0) {
        rowData = '';//'<div class="table" cellpadding=0 cellspacing=0 border=0 width=100%><div class="table-row" valign=top>';
    }
    colCur = colCur + 1;
    rowData = rowData + '<div class="code-wrapper" ><div class="table-cell" align=right>'+icon+'</div><div class="table-cell" width='+colSize+'>' + data + '</div></div>';
    if (colCur < colMax) {
        //rowData = rowData + '<div class="table-cell" width='+colSpce+'></div>';
    } else {
        //rowData = rowData + '</div></div>';
        WriteOldRow('',rowData);
        colCur = 0;
    }
}

function CfgIcon(name, icon) {
    var tooltip = HintCfg(name, icon);
    return '<img src=http://night.org/swat2/playerdb/pics/'+name+icon+'.gif width=31 height=31 border=0 alt="'+tooltip+'">&nbsp;';
}

function HintCfg(name, val) {
    if (name == 'class')  { return HintClass(val);   }
    if (name == 'gun')    { return HintGun(val);   }
    if (name == 'armor')  { return HintArmor(val); }
    if (name == 'trait')  { return HintTrait(val); }
    if (name == 'spec')   { return HintSpec(val);  }
    if (name == 'talent') { return HintTalent(val);}
    return '';
}

function HintGun(val) {
    if (val == 0) { return 'Assault Rifle'; }
    if (val == 1) { return 'Sniper Rifle'; }
    if (val == 2) { return 'Chaingun'; }
    if (val == 3) { return 'Rocket Launcher'; }
    if (val == 4) { return 'Flamethrower'; }
    if (val == 5) { return 'Laser Rifle'; }
    if (val == 6) { return 'Gatling Laser'; }
    if (val == 7) { return 'Pistols'; }
    return '';
}

function LinkCfg(name, val) {
    if (name == 'class') { return LinkClass(val); }
    if (name == 'gun') { return LinkGun(val); }
    if (name == 'armor') { return LinkArmor(val); }
    if (name == 'trait') { return linkBase+'readmeaftertraits.html'; }
    if (name == 'spec') { return linkBase+'readmeafterspecs.html'; }
    if (name == 'talent') { return linkBase+'readmeaftertalents.html'; }
    return linkBase;
}

function LinkGun(val) {
    var link = '';
    if (val == 0) { link = 'wassault'; } else
    if (val == 1) { link = 'wsniper'; } else
    if (val == 2) { link = 'wchain'; } else
    if (val == 3) { link = 'wrocket'; } else
    if (val == 4) { link = 'wflame'; } else
    if (val == 5) { link = 'wrifle'; } else
    if (val == 6) { link = 'wgatling'; } else
    if (val == 7) { link = 'wpistol'; } else
    { return linkBase+'readmeafterweapons.html'; }
    return linkBase+'readmeafterweapons.html#'+link;
}

var linkBase = 'http://redscull.com/swat/';
function LinkClass(hero) {
    var link = '';
    if (hero =='a'){ link = 'tech'; } else
    if (hero =='b'){ link = 'umbclone'; } else
    if (hero == 0) { link = 'sniper'; } else
    if (hero == 1) { link = 'medic'; } else
    if (hero == 2) { link = 'tact'; } else
    if (hero == 3) { link = 'psy'; } else
    if (hero == 4) { link = 'mav'; } else
    if (hero == 5) { link = 'hvyord'; } else
    if (hero == 6) { link = 'demo'; } else
    if (hero == 7) { link = 'cyborg'; } else
    if (hero == 8) { link = 'pyro'; } else
    if (hero == 9) { link = 'watchman'; } else
    { return linkBase+'readmeafterclasses.html'; }
    return linkBase+'classinfo-'+link+'.htm';
}

function HintArmor(val) {
    if (val == 0) { return 'Light'; }
    if (val == 1) { return 'Medium'; }
    if (val == 2) { return 'Heavy'; }
    if (val == 3) { return 'Advanced'; }
    return '';
}

function LinkArmor(val) {
    var link = '';
    if (val == 0) { link = 'Compact'; } else
    if (val == 1) { link = 'Standard'; } else
    if (val == 2) { link = 'Large'; } else
    if (val == 3) { link = 'Large'; } else
    { return linkBase+'readmeafterarmor.html'; }
    return linkBase+'readmeafterarmor.html#'+link;
}

function HintTrait(val) {
    if (val == 0) { return 'Skilled'; }
    if (val == 1) { return 'Gifted'; }
    if (val == 2) { return 'Survivalist'; }
    if (val == 3) { return 'Dragoon'; }
    if (val == 4) { return 'Acrobat'; }
    if (val == 5) { return 'Swift Learner'; }
    if (val == 6) { return 'Healer'; }
    if (val == 7) { return 'Flower Child'; }
    if (val == 8) { return 'Chem. Reliant'; }
    if (val == 9) { return 'Rad. Resistant'; }
    if (val ==10) { return 'Gadgeteer'; }
    if (val ==11) { return 'Prowler'; }
    if (val ==12) { return 'Energizer'; }
    if (val ==13) { return 'Pack Rat'; }
    if (val ==14) { return 'Engineer'; }
    if (val ==15) { return 'Reckless'; }
    return '';
}

function HintSpec(val) {
    if (val == 0) { return 'Weaponry'; }
    if (val == 1) { return 'Power Armor'; }
    if (val == 2) { return 'Energy Cells'; }
    if (val == 3) { return 'Cybernetics'; }
    if (val == 4) { return 'Triage'; }
    if (val == 5) { return 'Chemistry'; }
    if (val == 6) { return 'Leadership'; }
    if (val == 7) { return 'Robotics'; }
    if (val == 8) { return 'Espionage'; }
    return '';
}

function HintTalent(val) {
    if (val == 0) { return 'Courage'; }
    if (val == 1) { return 'Wiring'; }
    if (val == 2) { return 'Running'; }
    if (val == 3) { return 'Spotting'; }
    if (val == 4) { return 'Toughness'; }
    if (val == 5) { return 'Tinkering'; }
    if (val == 6) { return 'Hacking'; }
    return 'Hidden';
}

function MedalIcon(name, val) {
    var tooltip = HintMedal(name,val);
    return '<img src="http://night.org/swat2/playerdb/pics/m'+name+val+'.gif" alt="'+tooltip+'" border=0 width=15 height=12><img http://night.org/pics/empty.gif width=2 height=1>';
}

function HintMedal(name, val) {
    if (val < 1) {
        if (name == 'key') { return 'KEY (unearned)'; }
        if (name == 'moh') { return 'MOH (unearned)'; }
        if (name == 'pcc') { return 'PCC (unearned)'; }
        if (name == 'cob') { return 'COB (unearned)'; }
        if (name == 'lsa') { return 'LSA (unearned)'; }
        if (name == 'rem') { return 'REM (unearned)'; }
        return '(unearned)';
    }
    if (name == 'key') { return 'Key to the City'; }
    if (name == 'moh') { return 'Medal of Honor'; }
    if (name == 'pcc') { return 'Police Combat Cross'; }
    if (name == 'cob') { return 'Commendation Bar'; }
    if (name == 'lsa') { return 'Life Saving Award'; }
    if (name == 'rem') {
        if (val == 3)    { return 'Recognition for Exceptional Merit III'; }
        if (val == 2)    { return 'Recognition for Exceptional Merit II'; }
        return 'Recognition for Exceptional Merit';
    }
    return '';
}

function TitleIcons(titles) {
    var icons = '';
    for (var i=0; i < 7; i++) {
        icons = icons + TitleIcon(i, titles.substr(i,1) == '1');
    }
    return icons;
}

function TitleIcon(id, earned) {
    if (!earned) {
        return '<img src="http://night.org/swat2/playerdb/pics/titd.gif" border=0 width=8 height=12>';//<img http://night.org/pics/empty.gif width=1 height=1>';
    }
    return '<img src="http://night.org/swat2/playerdb/pics/tit'+id+'.gif" border=0 width=8 height=12><img http://night.org/pics/empty.gif width=1 height=1>';
}


function wrapCode(code, utility, pretext, posttext) {
    //wrap the code in a table so that triple-click will select just the code
    if (pretext == null) {
        pretext = '';
    } else {
        pretext = '<div class="table-cell">' + pretext + '</div>';
    }
    if (posttext == null) {
        posttext = '';
    } else {
        posttext = '<div class="table-cell">' + posttext + '</div>';
    }
    if (utility == null) {
        utility = '';
    }
    code = formatCode(code);
    utility = '<div class="table-cell">' + CopyHeroLink(code) + utility + '</div>';
    return '<div class="table" cellpadding=0 cellspacing=0 border=0 align=top><div class="table-row" valign=bottom>'+pretext+'<div class="table-cell"><font face=FixedSys><span class="rankcode">' + code + '</span></font></div>' + utility + posttext + '</div></div>';
}
function DeleteHeroLink(heroname) {
    var tooltip = 'Delete Hero';
    return '';//<a href=index.php?p=delete&heroname='+heroname+' title="'+tooltip+'"><img src=http://night.org/swat2/playerdb/pics/del.gif border=0 alt="'+tooltip+'" width=9 height=9></a>';
}

function formatCode(code) {
    return code.substring(0,4) + '-' + code.substring(4,8) + '-' + code.substring(8,12) + '-' + code.substring(12,16);
}

function CopyHeroLink(code) {
    return '<span class="copycode" style="display:none">&nbsp;<img src=http://night.org/swat2/playerdb/pics/copy.gif onClick="CopyCode(\''+code+'\');" border=0 alt=Copy title="Copy to Clipboard"></span>';
}


function HeroIcon(icon, rank, diff) {
    var br = '<br>';
    var blank = '';//<img http://night.org/pics/empty.gif width=3 height=3>';
    var tooltip = HintClass(icon);
    var hero = '<img src=http://night.org/swat2/playerdb/pics/class'+icon+'.gif width=31 height=31 border=0 alt="'+tooltip+'">';
    return hero+br+LogoIcon(icon)+blank+RankIcon(rank,diff);
}



function HintClass(hero) {
    if (hero =='a'){ return 'Tech Ops'; }
    if (hero =='b'){ return 'Umbrella Clone'; }
    if (hero == 0) { return 'Covert Sniper'; }
    if (hero == 1) { return 'Field Medic'; }
    if (hero == 2) { return 'Tactician'; }
    if (hero == 3) { return 'Psychologist'; }
    if (hero == 4) { return 'Maverick'; }
    if (hero == 5) { return 'Heavy Ordnance'; }
    if (hero == 6) { return 'Demolitions'; }
    if (hero == 7) { return 'Cyborg'; }
    if (hero == 8) { return 'Pyrotechnician'; }
    if (hero == 9) { return 'Watchman'; }
    return '';
}

function LogoIcon(icon) {
    var tooltip = HintClass(icon);
    return '<img src="http://night.org/swat2/playerdb/pics/logo'+icon+'.gif" alt="'+tooltip+'" border=0 width=15 height=15>';
}

function RankIcon(rank, diff) {
    var tooltip = RankDesc(rank)+DiffDesc(rank,diff);
    return '<img src="http://night.org/swat2/playerdb/pics/rank'+rank+diff+'.gif" alt="'+tooltip+'" border=0 width=12 height=14 align=top>';
}


function RankDesc(rank) {
    if (rank == 12) { return 'Legendary Hero'; }
    if (rank == 11) { return 'National Hero'; }
    if (rank == 10) { return 'Chief'; }
    if (rank == 9) { return 'Deputy Chief'; }
    if (rank == 8) { return 'Commander'; }
    if (rank == 7) { return 'Captain'; }
    if (rank == 6) { return 'Lieutenant'; }
    if (rank == 5) { return 'Sergeant'; }
    if (rank == 4) { return 'Detective'; }
    if (rank == 3) { return 'Officer III'; }
    if (rank == 2) { return 'Officer II'; }
    if (rank == 1) { return 'Officer I'; }
    return 'Cadet';
}

function DiffDesc(rank, diff) {
    if (rank >11) { return ' (12/12)'; }
    if (diff > 3) { return ' ('+rank+'/11)'; }
    if (diff > 2) { return ' ('+rank+'/10)'; }
    if (diff > 1) { return ' ('+rank+'/9)'; }
    if (diff > 0) { return ' ('+rank+'/6)'; }
    return ' ('+rank+'/3)';
}


function WriteOldRow(Name, Description) {
    var lite = '';
    if (rowHighlight) { lite = ' bgcolor=202020'; }
    rowHighlight = !rowHighlight;
    //document.writeln('<div class="table-row"'+lite+' valign=top><div class="table-cell" width=5>&nbsp;</div><div class="table-cell" align=right width=1%><b>'+Name+'</b></div><div class="table-cell" width=10>&nbsp;</div><div class="table-cell">');


    //document.writeln(Description);
    $(".code-list").append(Description);

    //document.writeln('</div></div>');
    //document.writeln('<div class="table-row"'+lite+' height=5><div class="table-cell"></div><div class="table-cell"></div><div class="table-cell"></div><div class="table-cell"></div></div>');
}