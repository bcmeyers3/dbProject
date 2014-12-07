function startTime() {
		var today=new Date();
		var h=today.getHours();
		var m=today.getMinutes();
		var s=today.getSeconds();
		var time= ( h < 12 ) ? "AM" : "PM";
		h = ( h > 12 ) ? h - 12 : h;
		m=checkTime(m);
		s=checkTime(s);
		document.getElementById('txt').innerHTML=h+":"+m+":"+s+" "+time;
		t=setTimeout(function(){startTime()},500);
	}
	function checkTime(i) {
	if (i<10) {
 		i="0" + i; 
		}
	return i; 
	}