setHeight  = function()
{	
	const target = document.getElementsByClassName('img-portrait');
	var maxWidth = 0, maxHeight = 0;
	for (var i = 0; i < target.length; i++) {
        target[i].removeAttribute("style");
    }

	for (var i = 0; i < target.length; i++) {
        var itemHeight = parseInt(target[i].offsetHeight);
        if ( itemHeight > maxHeight ) 
			maxHeight = itemHeight;				
    }
    for (var i = 0; i < target.length; i++) {
        target[i].style.height = maxHeight+'px';
    }
}
setHeight();
window.addEventListener("resize", setHeight);