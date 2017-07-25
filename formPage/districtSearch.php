<?php
	 $connect = mysqli_connect("localhost","root", "", "votepool");
	 if(isset($_POST["query"]))
	 {
	 	$output = '';
	 	$query = "SELECT * from station WHERE pollingDistrict LIKE '%".$_POST["query"]."%'";
	 	$result = mysqli_query($connect, $query);
	 	$output = '<ul class="list-unstyled">';
	 	if(mysqli_num_rows($result)  > 0)
	 	{
	 		while ($row = mysqli_fetch_array($result)) 
	 		{
	 			$output .='<li>'.$row["pollingDistrict"].'</li>';
	 		}
	 	}
	 	else
	 	{
	 		$output .='<li>Polling District Not Found</li>';
	 	}
	 	$output .='</ul>';
	 	echo $output;
	 }
?>