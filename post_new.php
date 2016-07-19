<?php
                  
                  define("host", "localhost");
                        define("acct", "hazari85_root");
                        define("pwd", "Ibabsj21");
                        define("dbname", "hazari85_customers");
                        define("table", "clients");


                  $cxn = mysqli_connect(host, acct, pwd, dbname);
                  $sql_id = "select ID from clients order by ID desc limit 1";
                  $id_result = mysqli_query($cxn, $sql_id);
                  $id_num = mysqli_fetch_assoc($id_result);
                  $num = intval($id_num["ID"])+1;
                
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
                            
                            }
         
                      
                    mysqli_close($cxn);
                  ?>
