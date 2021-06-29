// JScript File

function HideScript(obj)
{

	if(document.getElementById(obj).style.display == 'none')
	{
		document.getElementById(obj).style.display = 'block';			
		if(obj=='IDHide') SetHide('block');
		if(obj=='IDHide1') SetHide1('block');
		if(obj=='IDHide2') SetHide2('block');
		if(obj=='IDHide3') SetHide3('block');
		if(obj=='IDHide4') SetHide4('block');
		if(obj=='IDHide5') SetHide5('block');
		if(obj=='IDHide6') SetHide6('block');
		if(obj=='IDHide7') SetHide7('block');
		if(obj=='IDHide8') SetHide8('block');
		if(obj=='IDHide9') SetHide9('block');
		if(obj=='IDHide19') SetHide19('block');
		if(obj=='IDHide20') SetHide20('block');
	}else{
		document.getElementById(obj).style.display = 'none';
		if(obj=='IDHide') SetHide('none');
		if(obj=='IDHide1') SetHide1('none');
		if(obj=='IDHide2') SetHide2('none');
		if(obj=='IDHide3') SetHide3('none');
		if(obj=='IDHide4') SetHide4('none');
		if(obj=='IDHide5') SetHide5('none');
		if(obj=='IDHide6') SetHide6('none');
		if(obj=='IDHide7') SetHide7('none');
		if(obj=='IDHide8') SetHide8('none');
		if(obj=='IDHide9') SetHide9('none');
		if(obj=='IDHide19') SetHide19('none');
		if(obj=='IDHide20') SetHide20('none');
	}

}
function SetHide(staus)
{		
	set('Hide',staus);   
}
function SetHide1(staus)
{		
	set('Hide1',staus);   
}
function SetHide2(staus)
{		
	set('Hide2',staus);   
}
function SetHide3(staus)
{		
	set('Hide3',staus);   
}
function SetHide4(staus)
{		
	set('Hide4',staus);   
} 
function SetHide5(staus)
{		
	set('Hide5',staus);   
}
function SetHide5(staus)
{		
	set('Hide5',staus);   
}
function SetHide6(staus)
{		
	set('Hide6',staus);   
}
function SetHide7(staus)
{		
	set('Hide7',staus);   
} 
function SetHide8(staus)
{		
	set('Hide8',staus);   
}
function SetHide9(staus)
{		
	set('Hide9',staus);   
}
function SetHide19(staus)
{		
	set('Hide19',staus);   
}	
function SetHide20(staus)
{		
	set('Hide20',staus);   
}	

function GetAllDefault()
{		
	if(GetCookie('Hide')!= null)
	{
		if(GetCookie('Hide') == 'block')
		{
			document.getElementById('IDHide').style.display = 'block';	
		}else{
			document.getElementById('IDHide').style.display = 'none';					
		}
	}
	if(GetCookie('Hide1')!= null)
	{
		if(GetCookie('Hide1') == 'block')
		{
			document.getElementById('IDHide1').style.display = 'block';	
		}else{
			document.getElementById('IDHide1').style.display = 'none';					
		}
	}
	if(GetCookie('Hide2')!= null)
	{
		if(GetCookie('Hide2') == 'block')
		{
			document.getElementById('IDHide2').style.display = 'block';	
		}else{
			document.getElementById('IDHide2').style.display = 'none';					
		}
	}
	if(GetCookie('Hide3')!= null)
	{
		if(GetCookie('Hide3') == 'block')
		{
			document.getElementById('IDHide3').style.display = 'block';	
		}else{
			document.getElementById('IDHide3').style.display = 'none';					
		}
	}
	if(GetCookie('Hide4')!= null)
	{
		if(GetCookie('Hide4') == 'block')
		{
			document.getElementById('IDHide4').style.display = 'block';	
		}else{
			document.getElementById('IDHide4').style.display = 'none';					
		}
	}
	if(GetCookie('Hide5')!= null)
	{
		if(GetCookie('Hide5') == 'block')
		{
			document.getElementById('IDHide5').style.display = 'block';	
		}else{
			document.getElementById('IDHide5').style.display = 'none';					
		}
	}
	if(GetCookie('Hide6')!= null)
	{
		if(GetCookie('Hide6') == 'block')
		{
			document.getElementById('IDHide6').style.display = 'block';	
		}else{
			document.getElementById('IDHide6').style.display = 'none';					
		}
	}
	if(GetCookie('Hide7')!= null)
	{
		if(GetCookie('Hide7') == 'block')
		{
			document.getElementById('IDHide7').style.display = 'block';	
		}else{
			document.getElementById('IDHide7').style.display = 'none';					
		}
	}
	if(GetCookie('Hide8')!= null)
	{
		if(GetCookie('Hide8') == 'block')
		{
			document.getElementById('IDHide8').style.display = 'block';	
		}else{
			document.getElementById('IDHide8').style.display = 'none';					
		}
	}
	if(GetCookie('Hide9')!= null)
	{
		if(GetCookie('Hide9') == 'block')
		{
			document.getElementById('IDHide9').style.display = 'block';	
		}else{
			document.getElementById('IDHide9').style.display = 'none';					
		}
	}
	if(GetCookie('Hide19')!= null)
	{
		if(GetCookie('Hide19') == 'block')
		{
			document.getElementById('IDHide19').style.display = 'block';	
		}else{
			document.getElementById('IDHide19').style.display = 'none';					
		}
	}
	if(GetCookie('Hide20')!= null)
	{
		if(GetCookie('Hide20') == 'block')
		{
			document.getElementById('IDHide20').style.display = 'block';	
		}else{
			document.getElementById('IDHide20').style.display = 'none';					
		}
	}
}
			
var expDays = 30;
var exp = new Date(); 
exp.setTime(exp.getTime() + (expDays*24*60*60*1000));
function set(obj,favStaus)
{
	SetCookie (obj, favStaus,exp);
}
function getCookieVal (offset) 
{  
	var endstr = document.cookie.indexOf (";", offset);  
	if (endstr == -1)    
		endstr = document.cookie.length;  
	return unescape(document.cookie.substring(offset, endstr));
}
function GetCookie (name) 
{  
	var arg = name + "=";  
	var alen = arg.length;  
	var clen = document.cookie.length;  
	var i = 0;  
	while (i < clen) 
	{    
		var j = i + alen;    
		if (document.cookie.substring(i, j) == arg)      
			return getCookieVal (j);    
		i = document.cookie.indexOf(" ", i) + 1;    
		if (i == 0) break;   
	}  
	return null;
}
function SetCookie (name, value) 
{  
	var argv = SetCookie.arguments;  
	var argc = SetCookie.arguments.length;  
	var expires = (argc > 2) ? argv[2] : null;  
	var path = (argc > 3) ? argv[3] : null;  
	var domain = (argc > 4) ? argv[4] : null;  
	var secure = (argc > 5) ? argv[5] : false;  
	document.cookie = name + "=" + escape (value)+  
	((expires == null) ? "" : ("; expires=" + expires.toGMTString())) + 
	((path == null) ? "" : ("; path=" + path)) +  
	((domain == null) ? "" : ("; domain=" + domain)) +    
	((secure == true) ? "; secure" : "");
}