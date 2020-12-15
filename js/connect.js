$(document).ready(function () {
	$('#dataentry').keyup(function () {
		var query = $(this).val();
		if (query != '') {
			$.ajax({
				url:"./connect.php",
				method: "POST",
				data: { query: query },
				success: function (data) {
					$('#suggestion_out').fadeIn();
					$('#suggestion').html(data);
				}
			});
		}
		else {
			$('#suggestion_out').fadeOut();
			$('#suggestion').html("");
		}
	});
});
