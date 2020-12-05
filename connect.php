<?php
$connect = mysqli_connect("localhost", "root", "v@run", "test");
$output = '';
if(isset($_POST["query"]))
{
	// $search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM image 
	WHERE name LIKE '%".$_POST["query"]."%'
	";
	$result = mysqli_query($connect, $query);
	echo($result);
	// $output = '<ul class="list-unstyled">';
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			$output .= '<img src="data:image/jpeg;base64,'.base64_encode($row['data'] ).'" height="30px" width="30px" class="img-thumnail" /> <span class="text-muted" style="font-size:20px;">| '.$row["name"].'</span>';

		}
	}
	else
	{
		$output .='Food Not Found';
	}
	echo $output;
}
?>
