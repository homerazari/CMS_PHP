<?php
                 
    define("host", "localhost");
    define("acct", "hazari85_root");
    define("pwd", "Ibabsj21");
    define("dbname", "hazari85_customers");
    define("table", "clients");
    define("hist", "clients_history");


    $cxn = mysqli_connect(host, acct, pwd, dbname);
    $sql_id = "select ID from clients_history order by ID desc limit 1";
    $id_result = mysqli_query($cxn, $sql_id);
    $id_num = mysqli_fetch_assoc($id_result);
    $num = intval($id_num["ID"])+1;
    date_default_timezone_set("America/Los_Angeles");


    $sql_info = "select * from " . table . " where ID = " . $_POST['Clients'];
    $info_results = mysqli_query($cxn, $sql_info);
    $info_spit = mysqli_fetch_assoc($info_results);
                  
    $name = $info_spit['name'];
    $state = $info_spit['state'];
    $phone = $info_spit['phone'];
    $email =  $info_spit['email'];
    $amount = 'NULL';
    $service_f = $_POST['service'];
    $service = floatval($service_f);
    $transaction_f = $_POST['transaction'];
    $transaction = floatval($transaction_f);
    $date = $_POST['date'];
                          
    $sqli_insert = "insert into " . hist . " (ID, name, state, phone, email, amount, service, trans_num, date) values (" . $num . ", '" . $name ."', '" . $state . "', '" . $phone . "', '" . $email . "', '" . $amount . "', '" . $service . "', '" . $transaction . "', '" . $date . "')";
                         #$new_query = mysqli_query($cxn, $sqli_insert);
                 
                     
    if(mysqli_query($cxn, $sqli_insert)){
        header('Location: http://askroxys.com/orders.php');
        exit;                       
      } 
    else{
        echo "ERROR: Could not able to execute ";
                           
        }
        
                     
    mysqli_close($cxn);
?>