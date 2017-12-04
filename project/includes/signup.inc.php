<?php
	
	if (strcmp($signuptype,"Seller")==0){
		$tableName="Seller";
		$searchId="SellerId";
		if(isset($_POST['submit'])){ 
		echo "it is CLICKED";
		include_once "dbh.inc.php";
		$uid=mysqli_real_escape_string($conn,$_POST['uid']);
		$password= mysqli_real_escape_string($conn,$_POST['password']);
		$firstname=mysqli_real_escape_string($conn,$_POST['firstname']);
		$lastname=mysqli_real_escape_string($conn,$_POST['lastname']);
		$address=mysqli_real_escape_string($conn,$_POST['address']);
		$email=mysqli_real_escape_string($conn,$_POST['email']);
		$phone=mysqli_real_escape_string($conn,$_POST['phone']); 
		if(!preg_match("/^[0-9]/",$uid)){
			header("Location: ../signup.php? signup=invalid");
			exit();
		}
		else{
			$sql_seller= "SELECT * FROM seller WHERE SellerId". " = ".$uid;
			$result_seller=mysqli_query($conn,$sql_seller);
			$resultCheck_seller=mysqli_num_rows($result_seller);
			if($resultCheck_seller>=1){
				echo "seller Id already exists!";
				header( "refresh:5;url=signup.php?statust=error&msg=Id already exists!" );	
				exit();
			}
			else{
				$sql="INSERT INTO  $tableName (SellerId,Password,FirstName, LastName,  Address, Email, PhoneNumber) VALUES ($uid,'$password', '$firstname', '$lastname', '$address', '$email', '$phone');";
				mysqli_query($conn,$sql);
				echo "successfully signed up, redirecting you to homepage ......";
				header( "refresh:5;url=homepage.php" );	
				exit();
			}
		 }
		
		}	
	}
	else if (strcmp($signuptype,"Customer")==0){
		$tableName="Customer";
		$searchId="CustomerId";
		if(isset($_POST['submit'])){ 
			echo "it is CLICKED";
			include_once "dbh.inc.php";
			$uid=mysqli_real_escape_string($conn,$_POST['uid']);
			$password=mysqli_real_escape_string($conn,$_POST['password']);
			$firstname=mysqli_real_escape_string($conn,$_POST['firstname']);
			$lastname=mysqli_real_escape_string($conn,$_POST['lastname']);
			$address=mysqli_real_escape_string($conn,$_POST['address']);
			$email=mysqli_real_escape_string($conn,$_POST['email']);
			$phone=mysqli_real_escape_string($conn,$_POST['phone']); 
			if(!preg_match("/^[0-9]/",$uid)){
				header("Location: ../signup.php? signup=invalid");
				exit();
			}
			else{
				$sql_customer= "SELECT * FROM customer WHERE CustomerId". " = ".$uid;
				$result_customer=mysqli_query($conn,$sql_customer);
				$resultCheck_customer=mysqli_num_rows($result_customer);
				if($resultCheck_customer>=1){
					echo "customer Id already exists!";
					header( "refresh:5;url=signup.php?statust=error&msg=Id already exists!" );	
					exit();
				}
				else{
					$sql="INSERT INTO  $tableName (CustomerId,Password,FirstName, LastName,  Address, Email, PhoneNumber) VALUES ($uid,'$password', '$firstname', '$lastname', '$address', '$email', '$phone');";
					mysqli_query($conn,$sql);
					echo "successfully signed up, redirecting you to homepage ......";
					header( "refresh:5;url=homepage.php" );	
					exit();
				}
		
			}
		}	
	}
	if (strcmp($signuptype,"Employee")==0){
		$tableName="Employee";
		$searchId="EmployeeId";
		if(isset($_POST['submit'])){ 
			echo "it is CLICKED";
			include_once "dbh.inc.php";
			$uid=mysqli_real_escape_string($conn,$_POST['uid']);
			$password=mysqli_real_escape_string($conn,$_POST['password']);
			$firstname=mysqli_real_escape_string($conn,$_POST['firstname']);
			$lastname=mysqli_real_escape_string($conn,$_POST['lastname']);
			$address=mysqli_real_escape_string($conn,$_POST['address']);
			$email=mysqli_real_escape_string($conn,$_POST['email']);
			$phone=mysqli_real_escape_string($conn,$_POST['phone']); 
			$role=mysqli_real_escape_string($conn,$_POST['role']); 
			$datejoined= date("Y-m-d H:i:s"); 
			if(!preg_match("/^[0-9]/",$uid)){
			header("Location: ../signup.php? signup=invalid");
			exit();
		}
		else{
				$sql_employee= "SELECT * FROM employee WHERE EmployeeId". " = ".$uid;
				$result_employee=mysqli_query($conn,$sql_employee);
				$resultCheck_employee=mysqli_num_rows($result_employee);
				if($resultCheck_employee>=1){
					echo "employee Id already exists!";
					header( "refresh:5;url=signup.php?statust=error&msg=Id already exists!" );	
					exit();
				}
				else{
					$sql="INSERT INTO  $tableName (EmployeeId,Password,FirstName, LastName,  Address, Email, PhoneNumber) VALUES ($uid,'$password', '$firstname', '$lastname', '$address', '$email', '$phone');";
					mysqli_query($conn,$sql);
					echo "successfully signed up, redirecting you to homepage ......";
					header( "refresh:5;url=homepage.php" );	
					exit();
				}
			}
		}	
	}		
		
	
?>