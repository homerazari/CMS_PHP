<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
       <!-- Jquery -->
       <script src="jquery-1.11.3.min.js"></script>

       <!-- Bootstrap CSS -->
       <link href="/bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet">
       <link href="/bootstrap/bootstrap-3.3.6-dist/css/bootstrap.mini.css" rel="stylesheet">
       <link href="/bootstrap/bootstrap-3.3.6-dist/css/bootstrap-theme.css" rel="stylesheet">
       <link href="/bootstrap/bootstrap-3.3.6-dist/css/bootstrap-theme.mini.css" rel="stylesheet">
       <link href="main.css" rel="stylesheet">
       
       <!-- Bootstrap JS -->
       <script src="/bootstrap/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
       <script src="/bootstrap/bootstrap-3.3.6-dist/js/bootstrap.mini.js"></script>
       <script src="/bootstrap/bootstrap-3.3.6-dist/js/npm.js"></script>
      
        <!-- AngularJS -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
       <script src="apps_orders.js"></script>        
        <title>Ask Roxy's</title>
    </head>
    <body>
         <div id="top-pad">
                <?php
                        define("host", "localhost");
                        define("acct", "hazari85_root");
                        define("pwd", "Ibabsj21");
                        define("dbname", "hazari85_customers");
                        define("table", "clients");
			define("hist", "clients_history");
                        
                        $cxn = mysqli_connect(host, acct, pwd, dbname);
        		
                        if ($cxn){
                        echo "<br>";
                        }
                        else {echo "the connection didn't work<br>";}


                        $sqlr = "select * from " . hist;                  
                        $sqlrr = mysqli_query($cxn, $sqlr);  
                        
			$arr = array();
			
			while ($row = mysqli_fetch_assoc($sqlrr)){
			$arr[]= $row;
			
			}
			
			$json_response = json_encode($arr);
                        $fp = fopen("order_results.json", "w");
	
			
			fwrite($fp, $json_response);
			fclose($fp);
                      mysqli_close($cxn);
                       
                      if ($sqli_insert != ""){echo $sqli_insert;}else{echo "";}
                ?>
             
            </div>
        <div class="container" ng-app="myApp" ng-controller="MainController">
            <!-- Client/Orders tabs -->
            <div class="row">
                 <div>
                    <ul class="nav nav-pills">
                        <li class="tabs"><a href="clients.php" >Clients</a></li>
                        <li  class="tabs" id="active">Orders</li>
                    </ul>
                </div>  
            </div>
            <div id="box" class="col-lg-12 col-md-12 col-xs-12">
            <div class="row" id="search">
            <!-- modals buttons --> 
            <div class="col-lg-2 col-md-2 col-xs-5"> 
                <a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="#NewOrder">
                    New Order</a>
            </div>
            
            <div class="col-lg-2 col-md-2 col-xs-5"> 
                <a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="#DelOrder">
                    Delete Order</a>
            </div>  
            
            <!-- search box -->
            <div class="col-lg-8 col-md-8 col-xs-12"> 
                <form class="form-control">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-search"></i>
                            </div>
                            <input type="text" class="col-lg-12 col-md-12 col-xs-12" placeholder="Search Orders" ng-model="searchFish">                           
                        </div>      
                    </div>
                </form>
            </div>
            </div>
            <!-- filter info
            <div class="search">
                <div class="alert alert-info">
                    <p>Sort Type: {{ sortType }}  </p>
                    <p>Sort Reverse: {{ sortReverse }}  </p>
                    <p>Search Query: {{ searchFish }}  </p>
                </div>-->
            <!-- search results -->
            <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <!-- header -->
                <tr>
                    <th>
                        <a href="#" ng-click="sortType = 'ID'; sortReverse = !sortReverse">
                        ID
                        <span ng-show="sortType == 'ID' && !sortReverse" class="fa fa-caret-down"></span>
                        <span ng-show="sortType == 'ID' && sortReverse" class="fa fa-caret-up"></span>
                        </a>
                    </th>
                    <th>
                        <a href="#" ng-click="sortType = 'name'; sortReverse = !sortReverse">
                        Name
                        <span ng-show="sortType == 'name' && !sortReverse" class="fa fa-caret-down"></span>
                        <span ng-show="sortType == 'name' && sortReverse" class="fa fa-caret-up"></span>
                        </a>
                    </th>
                    <th>
                        <a href="#" ng-click="sortType = 'state'; sortReverse = !sortReverse">
                        State
                        <span ng-show="sortType == 'state' && !sortReverse" class="fa fa-caret-down"></span>
                        <span ng-show="sortType == 'state' && sortReverse" class="fa fa-caret-up"></span>
                        </a>
                    </th>
                    <th>
                        <a href="#" ng-click="sortType = 'phone'; sortReverse = !sortReverse">
                        Phone
                        <span ng-show="sortType == 'phone' && !sortReverse" class="fa fa-caret-down"></span>
                        <span ng-show="sortType == 'phone' && sortReverse" class="fa fa-caret-up"></span>
                        </a>
                    </th>
                    <th>
                        <a href="#" ng-click="sortType = 'email'; sortReverse = !sortReverse">
                        Email
                        <span ng-show="sortType == 'email' && !sortReverse" class="fa fa-caret-down"></span>
                        <span ng-show="sortType == 'email' && sortReverse" class="fa fa-caret-up"></span>
                        </a>
                    </th>
                    <th>
                        <a href="#" ng-click="sortType = 'amount'; sortReverse = !sortReverse">
                        Amount
                        <span ng-show="sortType == 'amount' && !sortReverse" class="fa fa-caret-down"></span>
                        <span ng-show="sortType == 'amount' && sortReverse" class="fa fa-caret-up"></span>
                        
                        </a>
                    </th>
                    <!--<th>
                        <a href="#" ng-click="sortType = 'service'; sortReverse = !sortReverse">
                            Service
                        <span ng-show="sortType == 'service' && !sortReverse" class="fa fa-caret-down"></span>
                        <span ng-show="sortType == 'service' && sortReverse" class="fa fa-caret-up"></span>
                      
                        </a>
                    </th> -->
                    <th>
                        <a href="#" ng-click="sortType = 'transaction'; sortReverse = !sortReverse">
                            Transaction ID
                        <span ng-show="sortType == 'transaction' && !sortReverse" class="fa fa-caret-down"></span>
                        <span ng-show="sortType == 'transaction' && sortReverse" class="fa fa-caret-up"></span>
                        
                        </a>
                    </th>
                    <th>
                        <a href="#" ng-click="sortType = 'date'; sortReverse = !sortReverse">
                            Date
                        <span ng-show="sortType == 'date' && !sortReverse" class="fa fa-caret-down"></span>
                        <span ng-show="sortType == 'date' && sortReverse" class="fa fa-caret-up"></span>
                        
                        </a>
                    </th>
                </tr>
                <!-- body -->       
                <tr ng-repeat="d in clients | orderBy:sortType:sortReverse | filter:searchFish">
                    <td>
                        {{ d.ID }}
                    </td>
                    <td>{{ d.name }}</td>
                    <td>{{ d.state }}</td>
                    <td>{{ d.phone }}</td>
                    <td>{{ d.email }}</td>
                   <!--<td>{{ d.amount }}</td> -->
                    <td>{{ d.service }}</td>
                    <td>{{ d.trans_num }}</td>		
                    <td>{{ d.date }}</td>
                </tr>                
            </table>
            </div>   
            </div>
        </div>
        
        
            <!-- Modal Bodies -->   
           
<div id="NewOrder" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> New Order </h4>
      </div>
      <div class="modal-body">
         
          <form id="NewOrder" method="post" action="post_new_orders.php">
              <div class="form-group">
              	<div class="row">     
                	<div class="col-xs-4 selectContainer">
                        	<label class="control-label">Client</label>
                                <select class="form-control" name="Clients">
                                	<option value="">Clients</option>
                                        <?php                      
                                              $cxn = mysqli_connect(host, acct, pwd, dbname);
                                              $list = "select * from " . table . " order by ID asc";
                                              $list_q = mysqli_query($cxn, $list);
                                              while ($opt = mysqli_fetch_assoc($list_q)){
                                                  echo "<option value=" . $opt['ID'] . ">" . $opt['ID'] . "</option>";
                                                  
                                                 
                                              }
                                               mysqli_close($cxn);
                                               
                                        ?>
                               </select>
                         </div>
              	</div
              </div>

              <div class="form-group">
                  <div class="row">
                  	<div class="col-xs-4">
                          <label class="control-label">Service</label>
                          <select class="form-control" name="service">
			  	<option value="">Services</option>
				<option value="100">$100</option>
				<option value="60">$60</option>
			  </select>
                      	</div>     
                       
                  </div>
              </div>

              <!--
              <div class="form-group">
                  <div class="row">
                  	<div class="col-xs-4">
                          <label class="control-label">Amount</label>
                          <input required title="Please type amount paid" type="text" class="form-control" name="amount" placeholder="$" />
                      	</div>     
                       
                  </div>
              </div>
              
              -->

              <div class="form-group">
                  <div class="row">
                  	<div class="col-xs-4">
                          <label class="control-label">Transaction ID</label>
                          <input required title="Please type bitcoin ID" type="text" class="form-control" name="transaction" placeholder="bitcoin ID" />
                      	</div>     
                       
                  </div>
              </div>
              

              <div class="form-group">
                  <div class="row">
                  	<div class="col-xs-5">
                          <label class="control-label">Date of Service</label>
                          <input required title="Please select date of service" type="date" class="form-control" name="date" />
                      	</div>     
                       
                  </div>
              </div>

              
              <div>
                  <button type="submit" class="btn btn-default">Submit</button>
                  
              </div>
              
          </form>          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
        </div>     
        </div>
    </div>
   
    <!-- Modal 2 delete order -->
<div id="DelOrder" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> New Order </h4>
      </div>
      <div class="modal-body">
         
          <form id="DelOrder" method="post" action="post_edit_orders.php">
              <div class="form-group">
              	<div class="row">     
                	<div class="col-xs-4 selectContainer">
                        	<label class="control-label">Orders</label>
                                <select class="form-control" name="Orders">
                                	<option value="">IDs</option>
                                        <?php                      
                                              $cxn = mysqli_connect(host, acct, pwd, dbname);
                                              $dist = "select * from " . hist . " order by ID asc";
                                              $dist_q = mysqli_query($cxn, $dist);
                                              while ($opt = mysqli_fetch_assoc($dist_q)){
                                                  echo "<option value=" . $opt['ID'] . ">" . $opt['ID'] . "</option>";
                                                  
                                                 
                                              }
                                               mysqli_close($cxn);
                                               
                                        ?>
                               </select>
                         </div>
                </div>
              </div>
              <div>
                <button type="submit" class="btn btn-default">Submit</button>  
              </div>    
          </form>          
      </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </div>     


    </body>
</html>
