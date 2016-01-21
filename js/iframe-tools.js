


function changeURL(url)
{
    window.history.replaceState("object or string", "Title", url);
}
function topButtonClicked(obj)
{
    //change page on portal
    $("#main-content-portal").attr("src",$(obj).attr('value'));
    $('.active').removeClass('active');
    changeURL("?");
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