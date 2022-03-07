var base_url = window.location.origin;
//set image height
setHeight  = function()
{	
	const target = document.getElementsByClassName('img-portrait');
	var maxWidth = 0, maxHeight = 0;
    //remove all attribute 'style' in this class
	for (var i = 0; i < target.length; i++) {
        target[i].removeAttribute("style");
    }
    // get the highest image height comparison in this class
	for (var i = 0; i < target.length; i++) {
        var itemHeight = parseInt(target[i].offsetHeight);
        if ( itemHeight > maxHeight ) 
			maxHeight = itemHeight;				
    }
    //set heigh all image in this class
    for (var i = 0; i < target.length; i++) {
        target[i].style.height = maxHeight+'px';
    }
}
setHeight();
window.addEventListener("resize", setHeight);

//regex input number
const ein = document.getElementsByClassName('input-number');
for (var i = 0; i < ein.length; i++) {
    ein[i].addEventListener('keypress',function (evt) {
        this.value = this.value.replace(/[^+0-9]/, '');
    });
}

// nav tab show hide
navTabs = function($id)
{
    const tabs = document.getElementById($id);
    tabs.addEventListener('click',function(e) {
        e = e || window.event;
        //remove class active in nav tabs
        if (document.querySelector('#'+$id+' li.active') !== null) {
            document.querySelector('#'+$id+' li.active').classList.remove('active');
        }
        //add class active in tabs click
        e.target.className += " active";
        //get id target in attribute data-target
        var dt = e.target.getAttribute('data-target');
        if (dt !== null) {
            var target = document.getElementById(dt);
            //get parent id from child
            var parent = target.parentNode.id;
            //remove class active form child
            if (document.querySelector('#'+ parent +' .active') !== null) {
                document.querySelector('#'+ parent +' .active').classList.remove('active');
            }
            //add class active / show target 
            target.classList.add('active');
        }
    });
}

//info error form
alertform = function(id, alertinfo, status) {
    if(alertinfo =='' || alertinfo == null) { return false;} 
    if(id =='' || id == null) {return false;} 
    var innerhtml = '<span>'+ alertinfo +'</span><button type="button" class="close alert-close" data-target="'+ id +'" >&times;</span></button>';
    var target = document.getElementById(id);
    target.classList.add('alert');
    target.classList.add('alert-dismissible');
    target.classList.add('mt-2');
    if(status.toLowerCase() == 'success') {
        target.classList.add('alert-success');
    } else {
        target.classList.add('alert-warning');
    }
    target.innerHTML += innerhtml;

    const alertclose = document.getElementsByClassName('alert-close');
    for (var i = 0; i < alertclose.length; i++) {
        alertclose[i].addEventListener('click',function (e) {
            var dt = e.target.getAttribute('data-target');
            var target = document.getElementById(dt);
            target.innerHTML = '';
            target.removeAttribute("class");
        });
    }
}

//change loading button submit
btnloading = function(id, status, btntxt) {
    if(id =='' || id == null) {return false;}
    console.log(id); 
    if(status) {
        var target = document.getElementById(id);
        target.classList.add('sm-loading');
        target.innerHTML = 'Loading...';
        target.disabled = true;
    } else {
        var target = document.getElementById(id);
        target.classList.remove('sm-loading');
        target.innerHTML = btntxt;
        target.removeAttribute("disabled");
    }
}

//slect2 always above

$( document ).ready(function() {
    var Defaults = $.fn.select2.amd.require('select2/defaults');
    $.extend(Defaults.defaults, {
        dropdownPosition: 'auto'
    });
    var AttachBody = $.fn.select2.amd.require('select2/dropdown/attachBody');
    var _positionDropdown = AttachBody.prototype._positionDropdown;
    AttachBody.prototype._positionDropdown = function() {
        var $window = $(window);
        var isCurrentlyAbove = this.$dropdown.hasClass('select2-dropdown--above');
        var isCurrentlyBelow = this.$dropdown.hasClass('select2-dropdown--below');
        var newDirection = null;
        var offset = this.$container.offset();
        offset.bottom = offset.top + this.$container.outerHeight(false);
        var container = {
            height: this.$container.outerHeight(false)
        };
        container.top = offset.top;
        container.bottom = offset.top + container.height;
        var dropdown = {
            height: this.$dropdown.outerHeight(false)
        };
        var viewport = {
            top: $window.scrollTop(),
            bottom: $window.scrollTop() + $window.height()
        };
        var enoughRoomAbove = viewport.top < (offset.top - dropdown.height);
        var enoughRoomBelow = viewport.bottom > (offset.bottom + dropdown.height);
        var css = {
            left: offset.left,
            top: container.bottom
        };
        // Determine what the parent element is to use for calciulating the offset
        var $offsetParent = this.$dropdownParent;
        // For statically positoned elements, we need to get the element
        // that is determining the offset
        if ($offsetParent.css('position') === 'static') {
            $offsetParent = $offsetParent.offsetParent();
        }
        var parentOffset = $offsetParent.offset();
        css.top -= parentOffset.top
        css.left -= parentOffset.left;
        var dropdownPositionOption = this.options.get('dropdownPosition');
        if (dropdownPositionOption === 'above' || dropdownPositionOption === 'below') {
            newDirection = dropdownPositionOption;
        } else {
            if (!isCurrentlyAbove && !isCurrentlyBelow) {
                newDirection = 'below';
            }
            if (!enoughRoomBelow && enoughRoomAbove && !isCurrentlyAbove) {
                newDirection = 'above';
            } else if (!enoughRoomAbove && enoughRoomBelow && isCurrentlyAbove) {
                newDirection = 'below';
            }
        }
        if (newDirection == 'above' ||
            (isCurrentlyAbove && newDirection !== 'below')) {
            css.top = container.top - parentOffset.top - dropdown.height;
        }
        if (newDirection != null) {
            this.$dropdown
                .removeClass('select2-dropdown--below select2-dropdown--above')
                .addClass('select2-dropdown--' + newDirection);
            this.$container
                .removeClass('select2-container--below select2-container--above')
                .addClass('select2-container--' + newDirection);
        }
        this.$dropdownContainer.css(css);
    };

});