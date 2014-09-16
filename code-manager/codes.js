function processCookie(cookie, savecookie)
{
	if(cookie != false)
	{
		var numCodes= getCookie("energyisforwimps-numCodes");
		if(numCodes !== 'undefined' && !isNaN(numCodes)){
			numCodes++;
		}else{
			numCodes=1;
		}
		
		if(typeof savecookie === "undefined")
		{
			setCookie("energyisforwimps-numCodes", numCodes, 365);
			setCookie("energyisforwimps-code"+numCodes, cookie, 365);
		}
		addcode(cookie);
	}
		
}
function loadcodes()
{
	var numCodes= getCookie("energyisforwimps-numCodes");
	var tempCode;
	for (i=1; i<= numCodes; i++)
	{
		tempCode=getCookie("energyisforwimps-code"+i);
		if(typeof tempCode !== "undefined")
		{
			addCode(tempCode)
		}
	}
}


function addCode(serializedForm)
{
	$.post( 
		"code-manager/code.php", 
		serializedForm
	).done(function( data ) { 
		$("#code-list").append(data);
		$("#code-list li").unbind('mouseenter mouseleave');
		$("#code-list li").hover(
		  function() {
			$( this ).children(".class-info").addClass( "hover" );
		  }, function() {
			$( this ).children(".class-info").removeClass( "hover" );
		  }
		);
	});
	
	return serializedForm;
	
}

function deletecode(object)
{
	obj = $(object).parent().parent();
	 //get order
	  var order = $(obj).attr('order');
	  $(obj).remove();
	  
	  numCodes = getCookie("energyisforwimps-numCodes");
	  var newNumCodes = getCookie("energyisforwimps-numCodes")-1;
	  setCookie("energyisforwimps-numCodes", newNumCodes, 365);
	  
	  for (var i = order; i <= newNumCodes; i++)
	  {
        var nextCookie  = getCookie("energyisforwimps-code"+(parseInt(i)+1));
	  	setCookie("energyisforwimps-code"+i,nextCookie,365);
		
	  }

		setCookie("energyisforwimps-code"+numCodes,"",-1);
		
}

function swapzindex(obj)
{
	if($(obj).parent().hasClass('rcpd'))
	{
		$('.rcpd').css('z-index',"99");
		$('.addcode').css('z-index',"98");
	}
	else if($(obj).parent().hasClass('addcode'))
	{
		$('.addcode').css('z-index',"99");
		$('.rcpd').css('z-index',"98");
	}
}