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
    ein[i].addEventListener('keyup',function (evt) {
        this.value = this.value.replace(/[^0-9]/g, '');
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
btnloading = function({ id = '', status = false, btntext = '', hidebtntext = false}) {
    if(id =='' || id == null) {return false;}
    if(status) {
        var target = document.getElementById(id);
        target.classList.add('sm-loading');
        if (hidebtntext) {
            target.innerHTML = '';
        } else {
            target.innerHTML = 'Loading...';
        }
        target.disabled = true;
    } else {
        var target = document.getElementById(id);
        target.classList.remove('sm-loading');
        target.innerHTML = btntext;
        target.removeAttribute("disabled");
    }
    return false;
}

loadingmore = function(id, status) {
    if(id =='' || id == null) {return false;}
    if(status) {
        const target = document.getElementById(id);
        var inerHtml = '<div id="loadingbar"><div class="loading"><div class="spin"></div></div></div>';
        target.innerHTML += inerHtml;
    } else {
        const target = document.getElementById('loadingbar');
        target.remove();
    }
}


//login
const logineye = document.getElementById('login-password');
if(logineye){
    logineye.addEventListener("click", function() {
        const x = document.getElementById('lpassword');
        if (x.getAttribute("type") === "password") {
            x.setAttribute("type", "text");
            this.innerHTML = '<i class="fal fa-eye-slash"></i>';
        } else {
            x.setAttribute("type", "password");
            this.innerHTML = '<i class="fal fa-eye"></i>';
        }
    });
}

var islogin = false;
function sbtlogin(e) {
    if(!issubmit) {
        e.preventDefault();
        var targetform = e.target.id;
        islogin = true;
        btnloading({
            id : 'btnlogin',
            status : true
        });
        $.ajax({
			type	: "POST",
			cache	: false,
			url		: base_url+"/login",
			data	: $('#'+targetform).serializeArray(),
			success: function(data) {
				if (data.indexOf("error-")<0){
                    if (data == 200) {
                        alert('Login Sukses')
                        window.location.href = base_url;
                    }

                    if (data == 400) {
                        alert('Logi gagal, Email / Password salah')
                        window.location.href = base_url;
                    }
				} else {
					alertform('alert-login', data, 'Error');
                    btnloading({
                        id : 'btnlogin',
                        status : false,
                        btntext : 'Login',
                    });
				}
                islogin = false;
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alertform('alert-login', thrownError, 'Error');
                btnloading({
                    id : 'btnlogin',
                    status : false,
                    btntext : 'Login',
                });
                islogin = false;
			}
		});
    }
}
document.getElementById("formlogin").onsubmit = function(e) {
    sbtlogin(e);
};

//slect2 always above
function setSelect2Above() {
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

};

function redirectBut(targetLink) {
    console.log('s')
    window.open(targetLink);
    return false;
}

function copyToClipboard(copyText) {
    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
  
    /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.value);
    
    /* Alert the copied text */
    console.log("Copied the text: ", copyText.value);
  }