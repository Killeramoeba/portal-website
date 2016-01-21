<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://www-01.sil.org/linguistics/wordlists/english/wordlist/wordsEn.txt");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);
$output = explode( substr($output,1,1), $output );
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1"/>

    <title>Checksum Calculator</title>

<style>
    #differences-container span{padding: 0px 14.9px;border: 1px solid #ccc;}
</style>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script>
    var oa=["_","9","4","8","3","7","2","6","1","5","0","r","s","t","l","m","e","a","i","u","o","n","y","c","d","p","j","k","h","g","x","w","f","v","q","z","b","(","-","[",".","!"]
    var ra=["x","x","x","x","x","x","x","x","x","x","x","R","S","T","L","M","E","A","I","U","O","N","Y","C","D","P","J","K","H","G","X","W","F","V","Q","Z","B",")","-","]",".","!"]

    function HGValues(c){
        for(var i=0;i<=41;i++){
            if (oa[i]==c){
                return i+1;
            }
        }
        for(var i=11;i<=41;i++){
            if (ra[i]==c){
                return i+1;
            }
        }
        return 43

    }

    function Values(c){
        if (c=='a'|| c=='A')
            return 12;
        else if (c=='b'||c=='B')
            return 25;
        else if (c=='c'||c=='C')
            return 23;
        else if (c=='d' || c=='D')
            return 22;
        else if(c=='e'||c=='E')
            return 13;
        else if(c=='f'||c=='F')
            return 36;
        else if(c=='g'||c=='G')
            return 35;
        else if(c=='h'||c=='H')
            return 24;
        else if(c=='i'||c=='I')
            return 14;
        else if(c=='j'||c=='J')
            return 30;
        else if(c=='k'||c=='K')
            return 33;
        else if(c=='l'||c=='L')
            return 32;
        else if(c=='m'||c=='M')
            return 31;
        else if(c=='n'||c=='N')
            return 21;
        else if(c=='o'||c=='O')
            return 15;
        else if(c=='p'||c=='P')
            return 19;
        else if(c=='q'||c=='Q')
            return 37;
        else if(c=='r'||c=='R')
            return 26;
        else if(c=='s'||c=='S')
            return 18;
        else if(c=='t'||c=='T')
            return 20;
        else if(c=='u'||c=='U')
            return 17;
        else if(c=='v'||c=='V')
            return 28;
        else if(c=='w'||c=='W')
            return 34;
        else if(c=='x'||c=='X')
            return 27;
        else if(c=='y'||c=='Y')
            return 16;
        else if(c=='z'||c=='Z')
            return 29;
        else if (c=='0')
            return 9;
        else if (c=='1')
            return 11;
        else if (c=='2')
            return 8;
        else if (c=='3')
            return 10;
        else if (c=='4')
            return 6;
        else if (c=='5')
            return 2;
        else if (c=='6')
            return 3;
        else if (c=='7')
            return 7;
        else if (c=='8')
            return 5;
        else if (c=='9')
            return 4;
        else if (c=='_')
            return 1;
        else if (c=='-')
            return 38;
        else if (c=='!')
            return 39;
        else if (c=='.')
            return 40;
        else if(c=='('||c==')')
            return 41;
        else if(c=='['||c==']')
            return 42;
        else
            return 43;

    }

    //encodes a full name
    function getChecksum(name){
        var  checksumTotal = 0;
        var checksumStringA = "";
        var checksumStringB = "";

        for (var i = 1; i<=name.length; i++){
            var letterValue = HGValues( name.charAt( i-1 ) );
            var coefficient = ( ( i % 3 ) + 1 );
            var placeValue = letterValue*coefficient;
            checksumTotal += placeValue;
            if(i!=1){
                checksumStringA+= "+";
                checksumStringB+= "+";
            }
            checksumStringA += "("+letterValue+"*"+coefficient+")";
            checksumStringB += "("+placeValue+")";
        }
        var checksum = [];
        checksum[0]=checksumTotal;
        checksum[1]=checksumStringA;
        checksum[2]=checksumStringB;
        return checksum;
    }

    function updateResults(obj){
        var name = $(obj).val();
        var checksum = getChecksum(name);
        var resultText = checksum[1]+"="+checksum[0];
        var resultText2 = checksum[2]+"="+checksum[0];
        $("#result").text( resultText );
        $("#result2").text( resultText2 );


        $("#dials-container").empty();
        $("#differences-container").empty();
        var dial = $(".dial:first");



        for(var i=0; i<name.length; i++){
            var dialClone = dial.clone();
            var defaultVal = HGValues( name.substr(i,1) )-1;
            dialClone.val( defaultVal ).attr("coefficient",( ( (i+1) % 3 ) + 1 )).attr("default", defaultVal).appendTo( "#dials-container" );
            $("#differences-container").append("<span coefficient='"+( ( (i+1) % 3 ) + 1 )+"' >0</span>");
        }
        $("#dials-container .dial").show();
        $("#dials-container .dial").change(function(){

            var obj = $(this);


            var currentVal = obj.val();
            var defaultVal = obj.attr("default");
            var diff = defaultVal-currentVal;
            var spans = $("span[coefficient='"+obj.attr("coefficient")+"']");

            obj.attr("diff",diff);

            var totalDiff=0;
            $.each( $( "#dials-container .dial" ), function( k, v ) {
                totalDiff+=parseInt($(v).attr("diff"));
            });

            console.log(spans);
            console.log(totalDiff)
            spans.text(totalDiff);



        });

        $("#list-of-words").empty();

        console.log(getDict(checksum));



    }

    function getDict(sum){
        var obj = <?php echo json_encode($output); ?>;
        $.each(obj, function( k, v ) {
            if(getChecksum(v.substr(1))[0] == sum[0]){
                console.log(v);
                console.log(getChecksum(v)[0]);
                $("#list-of-words").append("<li>"+v.substr(1)+"</li>");
            }
        });
    }


</script>

<body>
<h1>Checksum Calculator</h1>
<input type="text" id="name-input"><button onclick="updateResults('#name-input')" ></button>
<p id="result"></p>
<p id="result2"></p>



    <select class="dial" diff="0" style="display:none;">
        <?php
        $oa=["_","9","4","8","3","7","2","6","1","5","0","r","s","t","l","m","e","a","i","u","o","n","y","c","d","p","j","k","h","g","x","w","f","v","q","z","b","(","-","[",".","!"];
        foreach($oa as $key => $value):
            echo '<option value="'.$key.'" >'.$value.'</option>'; //close your tags!!
        endforeach;
        ?>
    </select>

    <div id="dials-container"></div>

    <div id="differences-container"></div>

    <ul id="list-of-words"></ul>



</body>