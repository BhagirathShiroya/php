<?php 

	include_once 'db.php';

	header('Content-type: application/json');
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Headers: *');

	$data = json_decode(file_get_contents('php://input'), true);

	if (isset($data)) {
		$email = $data['email'];
		$password = $data['password'];

		$select_query = "select * from admin_table where email='$email' and password='$password'";
		$sel_data = mysqli_query($con, $select_query);
		$sel_record = mysqli_num_rows($sel_data);
		
		if ($sel_record == 1) {
			$sel_row = mysqli_fetch_assoc($sel_data);
		}
		else
		{
			echo "Invalid password.....";
		}
		print_r(json_encode($sel_row));
	}
?>
