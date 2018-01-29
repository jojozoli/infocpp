function loadPage(id, push) {
	$('.container').html("<div class='green white-text center'>Betöltés...</div>")
	$.post('requestPage.php', {page: id}, function(data){

		data = JSON.parse(data);

		if(!data.error){
			$('.container').html(data.data)
			document.title = $(data.data).filter('title').text()
			sessionStorage.setItem('lastPage', id);
			if(push == undefined || push == true) history.pushState({page: id}, id, "");
		}
		else {
			$('.container').html("<div class='red white-text center'>Hiba a betöltés során</div>")
		}

	}).fail(function(){
		$('.container').html("<div class='red white-text center'>Hiba a betöltés során</div>")
	})
	$('.button-collapse').sideNav('hide');
}