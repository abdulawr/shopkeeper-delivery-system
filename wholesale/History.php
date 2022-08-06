<?php
include("include/header.php");
?>

<body class="padTop53 " >

     <!-- MAIN WRAPPER -->
    <div id="wrap">
    <?php $pageName="History"; include("include/nav.php");?>
        <!--PAGE CONTENT -->
        <div id="content" style="width: 80%;">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12 " >
                     <h3>History</h3>

                    </div>
                </div>

                <hr />

                <?php
                $orders=DBHelper::get("SELECT cart.id,items.name,items.image,items.price,cart.qty from cart INNER JOIN items on cart.item_id = items.id where cart.wholeId = {$userData["id"]} and delivery_status = 1;");
                ?>

                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Completed Orders List
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Quantity</th>
                                            <th>Status</th>
                                          
                                           
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    if($orders->num_rows > 0)
                                    {
                                     while($row=$orders->fetch_assoc())
                                     {
                                      ?>
                                           <tr class="odd gradeX">
                                            <td>
                                            <img src="../<?php echo $row["image"];?>" width="70" height="70" alt="">
                                            </td>
                                            <td><?php echo $row["name"];?></td>
                                            <td>PKR-<?php echo $row["price"] * $row["qty"];?></td>
                                            <td><?php echo $row["qty"];?></td>
                                            <td class="center">Pending</td>
                                            
                                        </tr>
                                      <?php
                                     }
                                    }
                                    else{
                                        ?>
                                       <h2>Nothing to show</h2>
                                        <?php
                                    }
                                    ?>

                                    
                                                                              
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>


            </div>
        </div>
       <!--END PAGE CONTENT -->
    </div>

     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
</body>
    <!-- END BODY-->
    
</html>
