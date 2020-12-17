<?php
$connect = mysqli_connect("localhost", "root", "v@run", "foodzilla");
$output = '';
if (isset($_POST["query"])) {
	$query = "
	SELECT * FROM recipes 
	WHERE name LIKE '%" . $_POST["query"] . "%'
	";
	$result = mysqli_query($connect, $query);
	$output = '<ul class="list-unstyled">';
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result)) {
			$output .= '<li>
			<div id="resu">
                <div class="row ml-2 mb-4">
                <div class="col-lg-10 col-md-8">
                    <div class="search-result p-2">
                        <img width="100px" height="100px" class="rounded" src="data:' . $row['mime'] . ';base64,' . base64_encode($row['image']) . '"/>
						<a class="navbar-brand ml-3" href=./recipe.php?query=' .$row["rid"]. '>' . $row["name"] . '</a>
                    </div>
                </div>
                </div>
            </div>
			</li>';
		}
	} else {
		$output .= "<li class='ml-4'>
		<img src='./assets/images/empty_result.svg' height='200px' class='mt-4' />
		<h4 class='ml-3 mt-2'>No Search Results Found.</h4>
		<li>";
	}
	$output .= '<ul>';
	echo $output;
}
