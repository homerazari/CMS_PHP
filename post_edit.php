<?php

	define("host", "localhost");
	define("acct", "hazari85_root");
	define("pwd", "Ibabsj21");
	define("dbname", "hazari85_customers");
	define("table", "clients");

	$cxn = mysqli_connect(host, acct, pwd, dbname);
	$user = $_POST['Clients'];
	$base = "select * from " . table . " where ID = " . $user;
	$birth = $_POST['year'] . "-".$_POST['month'] ."-". $_POST['day'];
	$phone = $_POST['area'] . "-".$_POST['prefix'] ."-". $_POST['suffix'];

	switch ($_POST['edit']) {
		
		case 'name_s':
			#echo $base;
			$query = "update " . table . " set name = '" . $_POST['name'] . "' where ID = " . $user;

			if(mysqli_query($cxn, $query)){
				#echo "success";
				header('Location: clients.php');
			}
			else { printf("connect failed: ", mysqli_connect_error());}
			break;

		case 'birth_s':
			#echo $base;
			$query = "update " . table . " set birth = '" . $birth . "' where ID = " . $user;

			if(mysqli_query($cxn, $query)){
				mysqli_query($cxn, "update clients  set age = datediff(current_date, birth )/365.25");
				header('Location: clients.php');
			}
			else { printf("connect failed: ", mysqli_connect_error());}
			break;

		case 'state_s':
			#echo $base;
			$query = "update " . table . " set state = '" . $_POST['state'] . "' where ID = " . $user;

			if(mysqli_query($cxn, $query)){
				#echo "success";
				header('Location: clients.php');
			}
			else { printf("connect failed: ", mysqli_connect_error());}
			break;

		case 'phone_s':
			#echo $base;
			$query = "update " . table . " set phone = '" . $phone . "' where ID = " . $user;

			if(mysqli_query($cxn, $query)){
				#echo "success";
				header('Location: clients.php');
			}
			else { printf("connect failed: ", mysqli_connect_error());}
			break;

		case 'email_s':
			#echo $base;
			$query = "update " . table . " set email = '" . $_POST['email'] . "' where ID = " . $user;

			if(mysqli_query($cxn, $query)){
				#echo "success";
				header('Location: clients.php');
			}
			else { printf("connect failed: ", mysqli_connect_error());}
			break;
}
		  	
/*
                  $sql_id = "select ID from clients order by ID desc limit 1";
                  $id_result = mysqli_query($cxn, $sql_id);
                  $id_num = mysqli_fetch_assoc($id_result);
                  $num = intval($id_num["ID"])+1;
                  echo $num;
                  $name = $_POST['name'];
                          $sex = $_POST['sex'];
                          $birth = $_POST['year'] . "-".$_POST['month'] ."-". $_POST['day'];
                          $state = $_POST['state'];
                          $phone = $_POST['area'] . "-".$_POST['prefix'] ."-". $_POST['suffix'];
                          $email = $_POST['email'];
                          $age = "datediff(current_date, " . "$birth" . ")/365.25";
                          $sqli_insert = "insert into " . table . " (ID, name, sex, birth, state, phone, email) values (" . $num . ", '" . $name ."', '" . $sex . "', '" . $birth . "', '" . $state . "', '" . $phone . "', '" . $email .  "')";
                         #$new_query = mysqli_query($cxn, $sqli_insert);
                  
                      
                      if(mysqli_query($cxn, $sqli_insert)){
                        mysqli_query($cxn, "update clients  set age = datediff(current_date, birth )/365.25");
			header('Location: clients.php');
			exit;
                        
                        
                        } else{
                            echo "ERROR: Could not able to execute ";
                            
                            }*/
         
                      
                    mysqli_close($cxn);
                  ?>