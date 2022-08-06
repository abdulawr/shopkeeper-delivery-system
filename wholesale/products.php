<?php
include("include/header.php");
$result=DBHelper::get("SELECT * from items WHERE wholesale_id = {$userData["id"]} and status = 0 order by id desc");
?>

<body class="padTop53 " >

     <!-- MAIN WRAPPER -->
    <div id="wrap">
    <?php $pageName="products"; include("include/nav.php");?>
        <!--PAGE CONTENT -->
        <div id="content" style="width: 80%;">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12 " >
                     <h3>Product List</h3>

                    </div>
                </div>

                <hr />

                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Product List
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Images</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Company</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      if($result->num_rows > 0)
                                      {
                                       while($row=$result->fetch_assoc())
                                       {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td>
                                            <img width="60" height="50" src="../<?php echo $row["image"];?>" alt="">
                                            </td>
                                            <td><?php echo $row["name"];?></td>
                                            <td><?php echo $row["quantity"];?></td>
                                            <td class="center"><?php echo $row["price"];?></td>
                                            <td class="center"><?php echo $row["company_name"];?></td>
                                            <td>
                                                 <a href="model/deleteItem.php?id=<?php echo $row["id"];?>" class="btn btn-danger">Delete</a>
                                                 <a href="updateProduct.php?id=<?php echo $row["id"];?>" class="btn btn-warning">Edit</a>
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
