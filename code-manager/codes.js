String.prototype.replaceAt=function(index, character) {
    return this.substr(0, index) + character + this.substr(index+character.length);
}

/*
 var codes = {
 '1':{
 'cookiedata':'class%3D6%26gun%3D2%26armor%3D2%26trait%3D7%26spec%3D5%26talent%3D1%26medal0%3D6%26medal1%3D6%26medal2%3D6%26medal3%3D6%26medal4%3D4%26medal5%3D6%26title0%3D7%26title1%3D7%26title2%3D7%26title3%3D7%26title4%3D7%26title5%3D7%26title6%3D7%26code%3D5450021863734997%26order%3D8'
 'code':'0123456789',
 'class':'1',
 'gun':'1',
 'armor':'1',
 'trait':'1',
 'spec':'1',
 'talent':'1',
 'medals':{
 'rem':'0',
 'lsa':'1',
 'cob':'2',
 'pcc':'3',
 'moh':'4',
 'key':'5',
 },
 'titles': {
 'honorguard':'0',
 'nightmare':'1',
 'extinction':'2',
 'megazilla':'3',
 'deathless':'4',
 'impressive':'5',
 'solo':'6',
 },
 },
 };
 */
function codeStore(codeList){

    function setCookieForCode(i,cookieString){
        if(typeof cookieString !== "undefined" && cookieString.length>=70){
            var codeData = cookieString.split("&");
            var codeString = "";
            $.each(codeData, function(index,element){
                element = element.split("=");
                codeString += element[1];
                if(index!=codeData.length-1){
                    codeString += "/";
                }
            });
            setCookie("energyisforwimps-code"+i,codeString,365);
        }
        else{
            setCookie("energyisforwimps-code"+i,cookieString,365);
        }
    }

    function getCookieForCode(i){
        var cookie = getCookie("energyisforwimps-code"+i);
        if(typeof cookie !== "undefined" && cookie.length<=70){
            cookie = cookie.split("/");
            var codeString = "";
            var keys = [ 'class','gun','armor','trait','spec','talent','medal0','medal1','medal2','medal3','medal4','medal5','title0','title1','title2','title3','title4','title5','title6','code','order' ];
            $.each(keys, function(index,element){
                codeString += element;
                codeString += "=";
                codeString += cookie[index];
                if(index!=keys.length-1){
                    codeString += "&";
                }
            });

            return codeString;
        }
        else{
            setCookieForCode(i,cookie);
            return cookie;
        }
    }


    function save(){
        var i=0;
        $("#code-list").children('li').each(function() {
            i++;
            $(this).attr("order",i);
            codeData = JSON.parse($(this).find(".cookie").text());
            codeData['order']=i;
            cookieString=serializeArray(codeData);
            setCookieForCode(i,cookieString);
        });
        setCookie("energyisforwimps-numCodes", i, 365);

        this.cookieObject = getCodesFromCookies();
    }



    /* function loadCode() (codes.js) */
    function parseURL(url) {
        var a =  document.createElement('a');
        a.href = url;
        return {
            /*
             source: url,
             protocol: a.protocol.replace(':',''),
             host: a.hostname,
             port: a.port,
             query: a.search,
             */
            params: (function(){
                var ret = {},
                    seg = unescape(a.search).replace(/^\?/,'').split('&'),
                    len = seg.length, i = 0, s;
                for (;i<len;i++) {
                    if (!seg[i]) { continue; }
                    s = seg[i].split('=');
                    ret[s[0]] = s[1];
                }
                return ret;
            })()
            /*
             file: (a.pathname.match(/\/([^\/?#]+)$/i) || [,''])[1],
             hash: a.hash.replace('#',''),
             path: a.pathname.replace(/^([^\/])/,'/$1'),
             relative: (a.href.match(/tps?:\/\/[^\/]+(.+)/) || [,''])[1],
             segments: a.pathname.replace(/^\//,'').split('/')
             */
        };
    }

    function serializeArray(codeData){
        var cookieString="";
        var j=0;
        $.each(codeData, function( k, v ) {
            j++;
            if(j!=1){cookieString+="&";}
            cookieString+= k+"="+v;
        });
        return cookieString;
    }

    function getCodesFromCookies(){
        var numCodes= getCookie("energyisforwimps-numCodes");
        var codes = {};
        var i;
        for (i=1; i<= numCodes; i++){
            codes[i] = {};
            var cookieData=getCookieForCode(i);
            var temp = makeObjectFromCookieData(cookieData,i);
            codes[i] = temp[i];
        }
        codes['length'] = i-1;
        console.log(codes);
        return codes;
    }

    function makeObjectFromCookieData(cookieData,i){
        var codes = {};
        var mainKeys = ['code','class','gun','armor','trait','spec','talent','medals','titles'];
        var medalKeys = ['rem','lsa','cob','pcc','moh','key'];
        var titleKeys = ['honorguard','nightmare','extinction','megazilla','deathless','impressive','solo'];
        codes[i] = {};
        if(typeof cookieData !== "undefined"){
            codes[i]['cookiedata'] = escape(cookieData);
            cookieData = parseURL("http://www.google.com/?"+escape(cookieData)).params;
            $.each(mainKeys, function( index, value ) {
                if(value!='medals'&&value!='titles'){
                    codes[i][value] = cookieData[value];
                }else if(value=='medals'){
                    codes[i][value] = {};
                    $.each(medalKeys, function( index, value2 ) {
                        codes[i][value][value2] = cookieData[value.substr(0,value.length-1)+index];
                    });
                }
                else if(value=='titles'){
                    codes[i][value] = {};
                    $.each(titleKeys, function( index, value2 ) {
                        codes[i][value][value2] = cookieData[value.substr(0,value.length-1)+index];
                    });
                }
            });
        }
        return codes;
    }


    /********************************
     * ADD CODE
     *
     *
     *
     * ******************************/
    this.addCodeHTML = function(serializedForm){
        if(typeof serializedForm === 'object' ){
            serializedForm = "codes="+JSON.stringify(serializedForm);
        }

        $.post(
                "code-manager/code.php",
                serializedForm
            ).done(function( data ) {
                $("#code-list").append(data);
                $("#code-list li").unbind('mouseenter mouseleave');
                $("#code-list li").hover(
                    function(){
                        $(this).children(".class-info").addClass( "hover" );
                    }, function() {
                        if( !$(this).find('span').is(':focus') ){
                            $(this).children(".class-info").removeClass( "hover" );
                        }
                    }
                );

            });

    }

    this.addCodeCookie = function(cookie){
        var numCodes = this.cookieObject.length;
        console.log(cookie);
        if(cookie.indexOf(";") > -1){
            var cookie = cookie.split(";");
            delete cookie[cookie.length-1];
            cookie.length=cookie.length-1;
            $.each( cookie, function(index,element){
                if( isNaN(numCodes) ){numCodes=0;}
                else{ numCodes++; }
                element = element.substring(0,element.lastIndexOf("=")+1)+numCodes;
                setCookie("energyisforwimps-numCodes", numCodes, 365);
                setCookieForCode(numCodes, element);
            });
        }
        else if(cookie != false){
            if( isNaN(numCodes) ){numCodes=0;}
            else{ numCodes++; }
            setCookie("energyisforwimps-numCodes", numCodes, 365);
            setCookieForCode(numCodes, cookie);
            var newObject = makeObjectFromCookieData(cookie,numCodes);
            this.cookieObject[numCodes] = newObject[numCodes];
            this.cookieObject.length++;
        }


    }

    /********************************
     * EDIT CODE
     *
     *
     *
     * ******************************/
    this.editCode = function(obj,liObj,newDataNode,dataNodeName){
        var dataObj = liObj.find(".cookie");
        var data = dataObj.text();
        var cookieData = JSON.parse(data);
        if(cookieData[dataNodeName]==newDataNode){

        }
        else if (window.confirm("Are you sure you want to edit this code?")){
            cookieData[dataNodeName]=newDataNode;
            dataObj.text(JSON.stringify(cookieData));
            var cookieString=serializeArray(cookieData);
            setCookieForCode(cookieData['order'],cookieString);
            var temp = makeObjectFromCookieData(cookieString,cookieData['order']);
            this.cookieObject[cookieData['order']] = temp[cookieData['order']];
        }
        else{
            if(obj.is("span")){
                obj.html(cookieData[dataNodeName]);
            }else if(obj.is("img")){
                str = obj.attr("src");
                str = str.replaceAt(str.length-5, cookieData[dataNodeName]);
                obj.attr("src",str);
            }
        }
    }



    /********************************
     * DELETE CODE
     *
     *
     *
     * ******************************/
    //takes in x button
    this.deleteCode = function(button)
    {
        var order = $(button).attr('order');
        var liObj = this.codeList.children("li:nth-child("+order+")");

        var oldNumCodes = this.cookieObject.length;
        var newNumCodes = this.cookieObject.length-1;

        //update numCodes cookie
        setCookie("energyisforwimps-numCodes", newNumCodes, 365);

        //shift remaining cookies
        for (var i = order; i <= newNumCodes; i++){
            var nextCookie  = getCookieForCode((parseInt(i)+1));
            setCookieForCode(i,nextCookie);
        }

        //clear out last cookie
        setCookie("energyisforwimps-code"+oldNumCodes,"",-1);

        //remove html object
        $(liObj).remove();

        //update object
        this.cookieObject = getCodesFromCookies();
    }

    this.cookieObject = getCodesFromCookies();
    this.codeList = codeList;

    if(typeof codeList !== 'undefined'){
        codeList.sortable({
            handle: ".class-portrait",
            axis: "y",
            stop: function( event, ui ) {
                save();
            }
        });
        this.addCodeHTML(this.cookieObject);
    }



}





/********************************
 * END
 *
 *
 *
 * ******************************/


/*Selecting*/
function selectItem(a){
	var img = a.find('img');
	var input = $("#addcode input[name='"+img.attr("inputname")+"']");
	if( img.css("margin-left") == "0px" ){
		input.val(img.attr("activevalue"));
	}else if(img.css("margin-left") == "1px"){
		input.val(input.attr("defaultvalue"));
	}
}

function selectMedal(a){
	var img = a.find('img');
	var input = img.next();
	if( img.css("margin-left") == "0px" ){
		input.val(input.attr("activevalue"));
	}else if(img.css("margin-left") == "1px"){
		input.val(input.attr("defaultvalue"));
	}
}
function chooseItemForManager(property,index,obj,name){
	if(property != "medal" && property != "title"){
		if($("#"+property+" > a > div:eq("+index+") > img").css('border-left-style') == "solid"){
			$("#"+property+" > a > div:eq("+index+") > img").css("border-style", "none").css("margin","1px");
		}
		else{
			$("#"+property+" > a > div > img").css("border-style", "none").css("margin","1px");
			$("#"+property+" > a > div:eq("+index+") > img").css("border-style", "solid").css("border-width", "1px").css("border-color","yellow").css("margin","0px");
		}
	}
	else{
		if($("#"+property+" > a > div:eq("+index+") > img").css('border-left-style') == "solid"){
			$("#"+property+" > a > div:eq("+index+") > img").css("border-style", "none").css("margin","1px");
		}
		else{
			$("#"+property+" > a > div:eq("+index+") > img").css("border-style", "solid").css("border-width", "1px").css("border-color","yellow").css("margin","0px");
		}
	}
	if(name == "title" || name == "medal"){
		selectMedal(obj);
	}
	else{
		selectItem(obj);
	}
}



