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
       <script src="apps.js"></script>        
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
                        
                        $cxn = mysqli_connect(host, acct, pwd, dbname);
        		
                        if ($cxn){
                        echo "<br>";
                        }
                        else {echo "the connection didn't work<br>";}


                        $sqlr = "select * from " . table;                  
                        $sqlrr = mysqli_query($cxn, $sqlr);  
                        
			$arr = array();
			
			while ($row = mysqli_fetch_assoc($sqlrr)){
			$arr[]= $row;
			
			}
			
			$json_response = json_encode($arr);
                        $fp = fopen("results.json", "w");
	
			
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
                        <li class="tabs" id="active">Clients</li>
                        <li  class="tabs"><a href="orders.php" >Orders</a></li>
                    </ul>
                </div>  
            </div>
            <div id="box" class="col-lg-12 col-md-12 col-xs-12">
            <div class="row" id="search">
            <!-- modals buttons -->
            <div class="col-lg-2 col-md-2 col-xs-5"> 
                <a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="#addClient">
                    Add Client</a>
            </div>
            
            <div class="col-lg-2 col-md-2 col-xs-5"> 
                <a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="#editClient">
                    Edit Client</a>
            </div>  
            <!-- search box -->
            <div class="col-lg-8 col-md-8 col-xs-12"> 
                <form class="form-control">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-search"></i>
                            </div>
                            <input type="text" class="col-lg-12 col-md-12 col-xs-12" placeholder="Search Clients" ng-model="searchFish">                           
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
                        <a href="#" ng-click="sortType = 'sex'; sortReverse = !sortReverse">
                        Sex
                        <span ng-show="sortType == 'sex' && !sortReverse" class="fa fa-caret-down"></span>
                        <span ng-show="sortType == 'sex' && sortReverse" class="fa fa-caret-up"></span>
                        </a>
                    </th>
                    <th>
                        <a href="#" ng-click="sortType = 'birth'; sortReverse = !sortReverse">
                        Birthdate
                        <span ng-show="sortType == 'birth' && !sortReverse" class="fa fa-caret-down"></span>
                        <span ng-show="sortType == 'birth' && sortReverse" class="fa fa-caret-up"></span>
                        </a>
                    </th>
                    <th>
                        <a href="#" ng-click="sortType = 'age'; sortReverse = !sortReverse">
                        Age
                        <span ng-show="sortType == 'age' && !sortReverse" class="fa fa-caret-down"></span>
                        <span ng-show="sortType == 'age' && sortReverse" class="fa fa-caret-up"></span>
                        </a>
                    </th>
                    <th>
                        <a href="#" ng-click="sortType = 'state'; sortReverse = !sortReverse">
                        <span ng-show="sortType == 'state' && !sortReverse" class="fa fa-caret-down"></span>
                        <span ng-show="sortType == 'state' && sortReverse" class="fa fa-caret-up"></span>
                        State
                        </a>
                    </th>
                    <th>
                        <a href="#" ng-click="sortType = 'phone'; sortReverse = !sortReverse">
                        <span ng-show="sortType == 'phone' && !sortReverse" class="fa fa-caret-down"></span>
                        <span ng-show="sortType == 'phone' && sortReverse" class="fa fa-caret-up"></span>
                        Phone
                        </a>
                    </th>
                    <th>
                        <a href="#" ng-click="sortType = 'email'; sortReverse = !sortReverse">
                        <span ng-show="sortType == 'email' && !sortReverse" class="fa fa-caret-down"></span>
                        <span ng-show="sortType == 'email' && sortReverse" class="fa fa-caret-up"></span>
                        Email
                        </a>
                    </th>
                </tr>
                <!-- body -->       
                <tr ng-repeat="d in clients | orderBy:sortType:sortReverse | filter:searchFish">
                    <td>
                        {{ d.ID }}
                    </td>
                    <td>{{ d.name }}</td>
                    <td>{{ d.sex }}</td>
                    <td>{{ d.birth }}</td>
                    <td>{{ d.age }}</td>
                    <td>{{ d.state }}</td>
                    <td>{{ d.phone }}</td>
                    <td>{{ d.email }}</td>
                </tr>                
            </table>
            </div>   
            </div>
        </div>
        
        
            <!-- Modal Bodies -->   
            
<div id="addClient" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> New Client </h4>
      </div>
      <div class="modal-body">
         
          <form id="newClient" method="post" action="post_new.php">
              <div class="form-group">
                  <div class="row">
                      <div class="col-xs-4">
                          <label class="control-label">Name</label>
                          <input required title="Please type first and last name" type="text" class="form-control" name="name" />                          
                      </div>
                      
                      <div class="col-xs-4 selectContainer">
                          <label class="control-label">Sex</label>
                          <select class="form-control" name="sex">
                              <option value="">Choose a gender</option>
                              <option value="m" name="sex">Male</option>
                              <option value="f" name="sex">Female</option>
                          </select>
                      </div>
                  </div>  
              </div>
              
              <div class="form-group">
                  <div class="row">
                      <div class="col-xs-2">
                          <label class="control-label">Birth Date</label>
                          <input required title="Please type 2 digits for month" type="text" pattern="[?=.*\d]{2}" class="form-control" name="month" placeholder="month" />
                      </div>
                      <div class="col-xs-2">
                          <label class="control-label"></label>
                          <input required title="Please type 2 digits for day" pattern="[?=.*\d]{2}" type="text" class="form-control" name="day" placeholder="day" />
                      </div>
                      <div class="col-xs-4">
                          <label class="control-label"></label>
                          <input required title="Please type 4 digits for year" pattern="[?=.*\d]{4}" type="text" class="form-control col-xs-4" name="year" placeholder="year" />
                      </div>
                      <div class="col-xs-2">
                          <label class="control-label">State</label>
                          <input required title="Please type 2 letters for State" pattern="[a-zA-Z]{2}" type="text" class="form-control" name="state" placeholder="2 letters" />
                      </div>        
                  </div>
              </div>
              
                <div class="form-group">
                  <div class="row">
                      <div class="col-xs-2">
                          <label class="control-label">Phone</label>
                          <input required title="Please type area code" pattern="[?=.*\d]{3}" type="text" class="form-control" name="area" placeholder="(xxx)" />
                      </div>
                      <div class="col-xs-2">
                          <label class="control-label"></label>
                          <input required title="Please type 3 digits for prefix" pattern="[?=.*\d]{3}" type="text" class="form-control" name="prefix" placeholder="prefix" />
                      </div>
                      <div class="col-xs-3">
                          <label class="control-label"></label>
                          <input required title="Please type 4 digits for suffix" pattern="[?=.*\d]{4,}" type="text" class="form-control col-xs-4" name="suffix" placeholder="4 digits" />
                      </div>
                      <div class="col-xs-5">
                          <label class="control-label">Email</label>
                          <input required type="email" class="form-control" name="email" placeholder="xxxx@xxx.com" />
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
            
    <!-- Modal 2 edit client -->
    <div id="editClient" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Edit Client </h4>
                </div>
                <div class="modal-body">
                    <form id="editClient" method="post" action="post_edit.php">
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
                            </div>
                            <div class="row">     
                                <div class="col-xs-4">
                                    <label class="control-label">Name</label>
                                    <input type="text" class="form-control" name="name" />
                                    <button type="submit" class="btn btn-default" name="edit" value="name_s">Update</button>
                                </div>

                            </div>
                            <div class="row">     
                                <div class="col-xs-2">
                                    <label class="control-label">Birth Date</label>
                                    <input type="text" title="Please type 2 digits for month" pattern="[?=.*\d]{2}" class="form-control" name="month" placeholder="month" />
                                </div>
                                <div class="col-xs-2">
                                    <label class="control-label"></label>
                                    <input type="text" title="Please type 2 digits for day" pattern="[?=.*\d]{2}" class="form-control" name="day" placeholder="day" />
                                </div>
                                <div class="col-xs-4">
                                    <label class="control-label"></label>
                                    <input type="text" title="Please type 2 digits for year" pattern="[?=.*\d]{4}" class="form-control col-xs-4" name="year" placeholder="year" />
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-default" name="edit" value="birth_s">Update</button>
                            </div>
                            <div class="row">     
                                <div class="col-xs-2">
                                    <label class="control-label">State</label>
                                    <input type="text" title="Please type 2 letters for State" pattern="[a-zA-Z]{2}" class="form-control" name="state"/>
                                    <button type="submit" class="btn btn-default" name="edit" value="state_s">Update</button>
                                </div>

                            </div>
                            <div class='row'>
                                <div class="col-xs-2">
                                    <label class="control-label">Phone</label>
                                    <input type="text" title="Please type area code" pattern="[?=.*\d]{3}" class="form-control" name="area" placeholder="(xxx)" />
                                </div>
                                <div class="col-xs-2">
                                    <label class="control-label"></label>
                                    <input type="text" title="Please type 3 digits for prefix" pattern="[?=.*\d]{3}" class="form-control" name="prefix" placeholder="prefix" />
                                </div>
                                <div class="col-xs-3">
                                    <label class="control-label"></label>
                                    <input type="text" title="Please type 4 digits for suffix" pattern="[?=.*\d]{4,}" class="form-control col-xs-4" name="suffix" placeholder="4 digits" />
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-default" name="edit" value="phone_s">Update</button>
                            </div>
                            <div class="row">     
                                <div class="col-xs-4">
                                    <label class="control-label">Email</label>
                                    <input type="email" class="form-control" name="email"/>
                                    <button type="submit" class="btn btn-default" name="edit" value="email_s">Update</button>
                                </div>

                            </div>
                            
                        </div>
                        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </form>        
                </div>
            </div>
        </div>
    </div>         
            
            
    </body>
</html>
