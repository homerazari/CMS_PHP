<?php

	define("host", "localhost");
	define("acct", "hazari85_root");
	define("pwd", "Ibabsj21");
	define("dbname", "hazari85_customers");
	define("table", "clients");
	define("hist", "clients_history");

	$cxn = mysqli_connect(host, acct, pwd, dbname);
        $sql_info = "select * from " . table . " where ID = " . $_POST['Orders'];
        $info_results = mysqli_query($cxn, $sql_info);
        $info_spit = mysqli_fetch_assoc($info_results);

	$query = "delete from " . hist . " where ID = " . $_POST['Orders'];

			if(mysqli_query($cxn, $query)){
				flush();
                                header("Location: http://www.askroxys.com/orders.php");
                                die('should have redirected by now');
			}
			else { printf("connect failed: ", mysqli_connect_error());}
			break;

         
                      
                    mysqli_close($cxn);
                  ?>
