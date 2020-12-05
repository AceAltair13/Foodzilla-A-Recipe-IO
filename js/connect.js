$(document).ready(function () {
	$('#search').keyup(function () {
		var query = $(this).val();
		if (query != '') {
			$.ajax({
				url:"connect.php",
				method: "POST",
				data: { query: query },
				success: function (data) {
					$('#result').fadeIn();
					$('#result').html(data);


				}
			});
		}
		else {
			$('#result').fadeOut();
			$('#result').html("");
		}
	});
	$('#result').on('click', 'li', function () {
		var click_text = $(this).text().split('|');
		$('#search').val(click_text[1]);
		$('#result').fadeOut();
	});
});
