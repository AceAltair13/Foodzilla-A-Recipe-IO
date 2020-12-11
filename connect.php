<?php
$connect = mysqli_connect("localhost", "root", "", "foodzilla");
$output = '';
if(isset($_POST["query"]))
{
	// $search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM recipes 
	WHERE name LIKE '%".$_POST["query"]."%'
	";
	$result = mysqli_query($connect, $query);
	$output = '<ul class="list-unstyled">';
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			$output .= '<li>
			<div id="resu">
                            <div class="row ml-3 mb-4">
                            <div class="col-12 col-md-10 col-lg-10">
                                <div class="search-result p-2">
                                    <img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" height="100px" width="100px" class="img-thumnail" />
                                    <span class="navbar-brand ml-3" style="color:blue;">' . $row["name"] . '</span>
                                </div>
                            </div>
                            </div>
            </div>
			</li>';
		}
	}
	else
	{
		$output .='<li>
		<h4 class="ml-3">No Search Results Found.</h4>
		<li>';
	}
	$output .='<ul>';
	echo $output;
}
?>
