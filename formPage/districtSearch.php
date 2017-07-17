<?php
	 $connect = mysqli_connect("localhost","root", "", "votepool");
	 if(isset($_POST["query"]))
	 {
	 	$output = '';
	 	$query = "SELECT * from seats WHERE electrolDistrict LIKE '%".$_POST["query"]."%'";
	 	$result = mysqli_query($connect, $query);
	 	$output = '<ul class="list-unstyled">';
	 	if(mysqli_num_rows($result)  > 0)
	 	{
	 		while ($row = mysqli_fetch_array($result)) 
	 		{
	 			$output .='<li>'.$row["electrolDistrict"].'</li>';
	 		}
	 	}
	 	else
	 	{
	 		$output .='<li>District Not Found</li>';
	 	}
	 	$output .='</ul>';
	 	echo $output;
	 }
?>