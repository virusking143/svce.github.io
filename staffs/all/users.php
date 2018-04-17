<?php include "admin_header.php"?>

    <div id="wrapper">
    
    <?php
    if($connection)
        echo "connection";
    ?>
 
        <!-- Navigation -->
       
       <?php include "admin_navigation.php"?>
       

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome 
                              <?php 
                             echo $_SESSION['username'];
                            ?>
                        </h1>
                           
                           <?php
                            if(isset($_GET['source'])){
                                $source=$_GET['source'];
                            }else{
                                $source='';
                            }
                        switch($source){
                                
                            case 'add_user';
                                include "add_user.php";
                                break;
                            case 'edit_user';
                                include "edit_user.php";
                                break;
                                
                                 case '200';
                                echo "Nice 200";
                                break;
                                
                                
                            default:
                                include "view_all_users.php";
                        }
                            ?>
                            
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "admin_footer.php"?>