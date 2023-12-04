let getJSON;

(function(){
	getJSON = function(url) {
		return setJSON(url);
	}

	let setJSON = function(url) {
		fetch(url)
		.then( function(response) {
			return response.json();
		})
		.then( function(data) {
			return data;
		})
		.catch( function(error) {
			alert("Error: "+error);
		});
	}
})();