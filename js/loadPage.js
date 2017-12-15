function loadPage(id, push) {
	$.post('requestPage.php', {page: id}, function(data){
		data = JSON.parse(data);

		if(!data.error){
			$('.container').html(data.data)
			sessionStorage.setItem('lastPage', id);
			if(push == undefined || push == true) history.pushState({page: id}, id, "");
		}
		else {
			console.error("Failed to load page id= ", id)
		}

	})
	$('.button-collapse').sideNav('hide');
}