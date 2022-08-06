<?php
include("include/header.php");
$totalProduct=DBHelper::get("SELECT COUNT(id) as 'product' FROM items where wholesale_id={$userData["id"]}")->fetch_assoc()["product"];
$totalEmail=DBHelper::get("SELECT COUNT(id) as 'total' from contact WHERE wholeId = {$userData["id"]}")->fetch_assoc()["total"];
$totalOrder=DBHelper::get("SELECT COUNT(id) as 'total' from cart where wholeId = {$userData["id"]}")->fetch_assoc()["total"];
$totalActivteOrder=DBHelper::get("SELECT COUNT(id) as 'total' from cart where wholeId = {$userData["id"]} and delivery_status = 0")->fetch_assoc()["total"];

?>
<!-- END HEAD -->

    <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap" >
    
        <!-- HEADER SECTION -->
        <?php $pageName="index"; include("include/nav.php");?>
        <!--END MENU SECTION -->

        <!--PAGE CONTENT -->
        <div id="content" style="width: 81%;">
             
            <div class="inner" style="min-height: 700px;">
                
                 <!--BLOCK SECTION -->
                 <div class="row" style="margin-top: 25px;">
                    <div class="col-lg-12">
                        <div style="text-align: center;">
                           
                            <a class="quick-btn" href="#">
                                <i class="icon-check icon-2x"></i>
                                <span> Products</span>
                                <span class="label label-danger"><?php echo $totalProduct; ?></span>
                            </a>

                            <a class="quick-btn" href="#">
                                <i class="icon-envelope icon-2x"></i>
                                <span>Messages</span>
                                <span class="label label-success"><?php echo $totalEmail; ?></span>
                            </a>
                            <a class="quick-btn" href="#">
                                <i class="icon-signal icon-2x"></i>
                                <span>Orders</span>
                                <span class="label label-warning">+<?php echo $totalOrder; ?></span>
                            </a>
                            <a class="quick-btn" href="#">
                                <i class="icon-external-link icon-2x"></i>
                                <span>Active</span>
                                <span class="label btn-metis-2"><?php echo $totalActivteOrder; ?></span>
                            </a>
                            <a class="quick-btn" href="#">
                                <i class="icon-lemon icon-2x"></i>
                                <span>History</span>
                                <span class="label btn-metis-4"><?php echo $totalOrder-$totalActivteOrder; ?></span>
                            </a>
                                                       
                        </div>

                    </div>

                </div>
                  <!--END BLOCK SECTION -->
                <hr />    
                
                <?php
                $orders=DBHelper::get("SELECT cart.id,items.name,items.image,items.price,cart.qty from cart INNER JOIN items on cart.item_id = items.id where cart.wholeId = {$userData["id"]} and delivery_status = 0 order by cart.id desc");
                ?>
                
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Orders List
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
                                          
                                            <th>Action</th>
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
                                            <td>
                                            <a href="orderDetails.php?id=<?php echo $row["id"];?>" class="btn btn-primary">Details</a>                                    
                                            </td>
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

   <?php include("include/footer.php");?>


<script>
    setInterval(()=>{
       location.reload();
    },10000)
</script>