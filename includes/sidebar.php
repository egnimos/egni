
 
               <div class="col-md-4">
               
                
                

                <!-- Blog Search Well -->
                
                <!---Login form-->
                
                  <div class="well">

                    <?php

                    if(!isset($_SESSION['username'])){
                       


                    echo " 
                    <h4 class='text-warning' style='font-size:22px;'>Login</h4>
                    <form action='includes/login.php' method='post'>
        
                       
                        <div class='form-group'>
                        <input type='text' class='form-control' name='username' placeholder='Enter Username'>
                        </div>
                        
                        <div class='input-group'>
                        <input type='password' class='form-control' name='password' placeholder='Enter password'>
                       
                        
                        <spam class='input-group-btn'>
                            
                            <button type='submit' class='btn btn-info' name='login'>Login
                            </button>

                        </spam>

                         </div><br>
                         

                    </form>";
                
                

                }else{
                    # code...

                    if (isset($_SESSION['firstname'])) {
                        # code...
                      $user_firstname = $_SESSION['firstname'];
                

                  echo "<form action ='includes/logout.php' class='logout'>


                    <div class='input-group'>
                   <spam  class='input-group-btn'>

                              <h4 class='text-success'> Welcome to the egnimos <b style='font-size:20px; color: #000;'> {$user_firstname}</b> </h4>       
                            <button type='submit' class='btn btn-warning' name='logout'>Logout
                            </button>
                            
                            
                        </spam>
                        </div>
                        </form>"; 
                }
            }

                    ?>

                    
                
                   
                </div>
                

                
                

                <!-- Blog Categories Well -->
                
                <div class="well" style="box-shadow: 10px 10px 5px grey;">
                   
                   
<!--
                   
                   <?php 
                    // query for the sidebar to show the particular blog of that content which is click in the side bar..
                 
                       $query = "SELECT * FROM categories ";
                    $select_categories = mysqli_query($con, $query);
                        
                        
                    ?>
-->
                    <h4 class="text-success" style="font-size:22px;">Topics for you:</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled"  id = "comments">
                              
                                         <?php
                              
                                
//                                $commentNewCount = $_POST['commentNewCount'];
                    
                  
                        
                                
                                if(mysqli_num_rows($select_categories) > 0){
                                    
                               while($row = mysqli_fetch_assoc($select_categories)){
                               
                                   $cat_title = $row['cat_title'];
                                   $cat_id = $row['cat_id'];
                                   
                                   echo "<li><a class='text-warning' href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                               
                                   
                               }
                                    
                                }else{
                                    
                                    echo "No Categories";
                                }
                                   
                                
                            
                            
                            ?>  
                               
                             
                           
                           
                            </ul>
                        </div>
                    
                        
                        
                        
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        
                        
                        
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "widget.php" ?>

            </div>