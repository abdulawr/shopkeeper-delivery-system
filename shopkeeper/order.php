<?php include("include/header.php"); ?>  
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
 <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->

  <?php include("include/nav.php"); ?>   
 

 <!-- Cart view section -->
 <section id="cart-view" style="margin-bottom:50px;">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table aa-wishlist-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                       
                       
                        <th>No. Items</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                <?php
                 $id=Encryption::Decrypt($_COOKIE["shopkeeper"]);
                 $result=DBHelper::get("SELECT * from orders WHERE shopkeeper_id = $id");
                if($result->num_rows > 0)
                {
                 while($row=$result->fetch_assoc())
                 {
                  ?>
                  <tr>

                        <td><?php echo $row["number_of_items"];?></td>
                        <td>PKR-<?php echo $row["price"];?></td>
                        <td><?php if($row["status"] == "0"){echo "Pending";}else{echo "Completed";} ?></td>
                        <td><?php echo $row["date"];?></td>
                       
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
             </form>             
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


  <?php include("include/footer.php"); ?>  



  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- To Slider JS -->
  <script src="js/sequence.js"></script>
  <script src="js/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="js/custom.js"></script> 
  

  </body>
</html>