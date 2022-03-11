var page = 2, isload = false;
    
$(window).scroll(function () {
    if ($(window).scrollTop() >= $(document).height() - $(window).height() - 2000) {
        if (!isload) {
            infinteLoadMore();
            page++;
        }
    }
});
function infinteLoadMore() {
    if (!isload) {
        isload = true;
        loadingmore('listpromo', true);
        $.ajax({
			type	: "GET",
			cache	: false,
            dataType:'html',
			url		: base_url+"/promosi/getmoredata",
            data    : 'page='+page,
			success: function(response) {
                if (response.indexOf("error-")<0){
                    if(response != null && response != '') {
                        var target = document.getElementById('listpromo');
                        target.innerHTML += response;
                        isload = false;
                    }
                }
                loadingmore('listpromo', false);
			},
			error: function (xhr, ajaxOptions, thrownError) {
				console.log('Error'+ thrownError);
                isload = false;
                loadingmore('listpromo', false);
			}
		});
    }
}
//end load more data