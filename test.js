$.ajax({
	type: 'get',
	url: 'http://apm.andersenlab.com/api/?search=clients',
	data: {
		id: 2
	},
	success: function (res) {
		console.info(res);
	},
	error: function (err) {
		console.error(err);
	}
});