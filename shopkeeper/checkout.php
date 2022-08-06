<?php
date_default_timezone_set('Asia/Karachi');
//60 seconds = 1 minutes
ini_set('max_execution_time', 60);
include_once("include/header.php");
$total=0;
$shopkeeper=Encryption::Decrypt($_COOKIE["shopkeeper"]);
$result=DBHelper::get("SELECT items.name,cart.qty,items.price from cart INNER JOIN items on cart.item_id = items.id WHERE cart.shopkeeper_id=$shopkeeper and cart.status=0;");

$shopkeeper_id=Encryption::Decrypt($_COOKIE["shopkeeper"]);

define('JAZZCASH_MERCHANT_ID', 'MC17711');
define('JAZZCASH_PASSWORD', 'x3v1zu6t23');
define('JAZZCASH_INTEGERITY_SALT', 'zd9y890u40');
define('JAZZCASH_RETURN_URL', 'http://localhost/shopkeeper_delivery_system/shopkeeper/model/getJazzCashResponse.php');

define('JAZZCASH_CURRENCY_CODE', 'PKR');
define('JAZZCASH_LANGUAGE', 'EN');
define('JAZZCASH_API_VERSION_1', '1.1');
//define('JAZZCASH_API_VERSION_2', '2.0');

define('JAZZCASH_HTTP_POST_URL', 'https://sandbox.jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform/');
 

?>
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


  <?php include_once("include/nav.php");?>


 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
          <div action="">
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">

                  <script>
                   document.cookie = "myJavascriptVar = MWALLET";
                  </script>

                  <?php
                  $i=0;
                  if($result->num_rows > 0)
                  {
                    $total=0;

                    while($row=$result->fetch_assoc())
                    {
                      $total+=$row["price"] * $row["qty"];
                      $i++;
                    }

                    //get formatted price. remove period(.) from the price
                    $temp_amount 	= $total*100;
                    $amount_array 	= explode('.', $temp_amount);
                    $pp_Amount 		= $amount_array[0];
                    //NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
                     //NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
                    //2.
                    //get the current date and time
                    $DateTime 		= new DateTime();
                    $pp_TxnDateTime = $DateTime->format('YmdHis');
                    //NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN

                    //NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
                    //3.
                    //to make expiry date and time add one hour to current date and time
                    $ExpiryDateTime = $DateTime;
                    $ExpiryDateTime->modify('+' . 1 . ' hours');
                    $pp_TxnExpiryDateTime = $ExpiryDateTime->format('YmdHis');
                    //NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN


                    //NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
                    //4.
                    //make unique transaction id using current date
                    $pp_TxnRefNo = 'T'.$pp_TxnDateTime;
                    //NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN

                    $post_data =  array(
                      "pp_Version" 			=> JAZZCASH_API_VERSION_1,
                      "pp_TxnType" 			=> $_COOKIE["myJavascriptVar"],
                      "pp_Language" 			=> JAZZCASH_LANGUAGE,
                      "pp_MerchantID" 		=> JAZZCASH_MERCHANT_ID,
                      "pp_SubMerchantID" 		=> "",
                      "pp_Password" 			=> JAZZCASH_PASSWORD,
                      "pp_BankID" 			=> "TBANK",
                      "pp_ProductID" 			=> "RETL",
                      "pp_TxnRefNo" 			=> $pp_TxnRefNo,
                      "pp_Amount" 			=> $pp_Amount,
                      "pp_TxnCurrency" 		=> JAZZCASH_CURRENCY_CODE,
                      "pp_TxnDateTime" 		=> $pp_TxnDateTime,
                      "pp_BillReference" 		=> "billRef",
                      "pp_Description" 		=> "Description of transaction",
                      "pp_TxnExpiryDateTime" 	=> $pp_TxnExpiryDateTime,
                      "pp_ReturnURL" 			=> JAZZCASH_RETURN_URL,
                      "pp_SecureHash" 		=> "",
                      "ppmpf_1" 				=> $i,
                      "ppmpf_2" 				=> $shopkeeper_id,
                      "ppmpf_3" 				=> "3",
                      "ppmpf_4" 				=> "4",
                      "ppmpf_5" 				=> "5",
                    );


                    //NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
                  //5.
                  //$sorted_string
                  //make an alphabetically ordered string using $post_data array above
                  //and skip the blank fields in $post_data array
                  $sorted_string  = JAZZCASH_INTEGERITY_SALT . '&';
                  $sorted_string .= $post_data['pp_Amount'] . '&';
                  $sorted_string .= $post_data['pp_BankID'] . '&';
                  $sorted_string .= $post_data['pp_BillReference'] . '&';
                  $sorted_string .= $post_data['pp_Description'] . '&';
                  $sorted_string .= $post_data['pp_Language'] . '&';
                  $sorted_string .= $post_data['pp_MerchantID'] . '&';
                  $sorted_string .= $post_data['pp_Password'] . '&';
                  $sorted_string .= $post_data['pp_ProductID'] . '&';
                  $sorted_string .= $post_data['pp_ReturnURL'] . '&';
                  $sorted_string .= $post_data['pp_TxnCurrency'] . '&';
                  $sorted_string .= $post_data['pp_TxnDateTime'] . '&';
                  $sorted_string .= $post_data['pp_TxnExpiryDateTime'] . '&';
                  $sorted_string .= $post_data['pp_TxnRefNo'] . '&';
                  $sorted_string .= $post_data['pp_TxnType'] . '&';
                  $sorted_string .= $post_data['pp_Version'] . '&';
                  $sorted_string .= $post_data['ppmpf_1'] . '&';
                  $sorted_string .= $post_data['ppmpf_2'] . '&';
                  $sorted_string .= $post_data['ppmpf_3'] . '&';
                  $sorted_string .= $post_data['ppmpf_4'] . '&';
                  $sorted_string .= $post_data['ppmpf_5'];

                  //sha256 hash encoding
                  $pp_SecureHash = hash_hmac('sha256', $sorted_string, JAZZCASH_INTEGERITY_SALT);
                  //NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN

                  $post_data['pp_SecureHash'] =  $pp_SecureHash;

                    ?>
                  <!-- Billing Details -->
                  <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Billing Details
                          </a>
                        </h4>
                      </div>

                      <form id="collapseThree" class="panel-collapse collapse in" method="POST" action="<?php echo JAZZCASH_HTTP_POST_URL;?>" >
                        <div class="panel-body">
                          
                          <input type="hidden" name="pp_Version" value="<?php echo $post_data['pp_Version'];?>">
                          <input type="hidden" name="pp_TxnType" value="<?php echo $post_data['pp_TxnType'];?>">
                          <input type="hidden" name="pp_Language" value="<?php echo $post_data['pp_Language'];?>">
                          <input type="hidden" name="pp_MerchantID" value="<?php echo $post_data['pp_MerchantID'];?>">
                          <input type="hidden" name="pp_SubMerchantID" value="<?php echo $post_data['pp_SubMerchantID'];?>">
                          <input type="hidden" name="pp_Password" value="<?php echo $post_data['pp_Password'];?>">
                          <input type="hidden" name="pp_BankID" value="<?php echo $post_data['pp_BankID'];?>">
                          <input type="hidden" name="pp_ProductID" value="<?php echo $post_data['pp_ProductID'];?>">
                          
                          <input type="hidden" name="pp_TxnRefNo" value="<?php echo $post_data['pp_TxnRefNo'];?>">
                          <input type="hidden" name="pp_Amount" value="<?php echo $post_data['pp_Amount'];?>">
                          <input type="hidden" name="pp_TxnCurrency" value="<?php echo $post_data['pp_TxnCurrency'];?>">
                          <input type="hidden" name="pp_TxnDateTime" value="<?php echo $post_data['pp_TxnDateTime'];?>">
                          <input type="hidden" name="pp_BillReference" value="<?php echo $post_data['pp_BillReference'];?>">
                          <input type="hidden" name="pp_Description" value="<?php echo $post_data['pp_Description'];?>">
                          <input type="hidden" name="pp_TxnExpiryDateTime" value="<?php echo $post_data['pp_TxnExpiryDateTime'];?>">
                          <input type="hidden" name="pp_ReturnURL" value="<?php echo $post_data['pp_ReturnURL'];?>">
                          <input type="hidden" name="pp_SecureHash" value="<?php echo $post_data['pp_SecureHash'];?>">
                          <input type="hidden" name="ppmpf_1" value="<?php echo $post_data['ppmpf_1'];?>">
                          <input type="hidden" name="ppmpf_2" value="<?php echo $post_data['ppmpf_2'];?>">
                          <input type="hidden" name="ppmpf_3" value="<?php echo $post_data['ppmpf_3'];?>">
                          <input type="hidden" name="ppmpf_4" value="<?php echo $post_data['ppmpf_4'];?>">
                          <input type="hidden" name="ppmpf_5" value="<?php echo $post_data['ppmpf_5'];?>">

                         <!--  <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <select onchange="getval(this);" id="paymentOption">
                                  <option value="MWALLET">Mobile Account</option>
                                  <option value="MPAY">Credit/Debit Card</option>
                                </select>
                              </div>                             
                            </div>                            
                          </div> -->
                             
                          <div class="row">
                            
                            <input type="submit" value="Placed order" class="aa-browse-btn">

                          </div>                                    
                        </div>
                      </form>
                    </div>
                    <?php
                  }
                  ?>
                                    
                                       
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Order Summary</h4>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $total=0;
                      $shopkeeper=Encryption::Decrypt($_COOKIE["shopkeeper"]);
                      $result=DBHelper::get("SELECT items.name,cart.qty,items.price from cart INNER JOIN items on cart.item_id = items.id WHERE cart.shopkeeper_id=$shopkeeper and cart.status=0;");
                      while($row=$result->fetch_assoc())
                      {
                        ?>
                      <tr>
                          <td><?php echo $row["name"];?> <strong> x  <?php echo $row["qty"];?></strong></td>
                          <td>PKR-<?php echo $row["price"] * $row["qty"];?></td>
                        </tr>
                        <?php
                        $total+=$row["price"] * $row["qty"];
                      }
                     ?>  
                       
                      </tbody>
                      <tfoot>
                         <tr>
                          <th>Total</th>
                          <td>PKR-<?php echo $total;?></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>                 
                </div>
              </div>
            </div>
          </div>
         </div>

         <hr>
         <h1>Jazz Cash Testing Data</h1>

         <h2>Mobile Account Testing</h2>
         <p><b>Mobile Number</b>  -- 03123456789</p>
         <p><b>CNIC last 6 digits</b>  -- 345678</p>
         <p><b>Response</b>  -- Successful</p>

         <hr>

        <!--  <h2>Credit Card Testing Data</h2>
         <p><b>Expiry Date : </b>You can enter any current or future value for MM/YYYY.</p>
         <p><b>CSC/CVV : </b> You can enter any 3 digit.</p>
         <h3>Card 1</h3>
         <p><b>Card Number:  </b>5123456789012346</p>
         <p><b>Token Number:  </b>9580698967588146</p>
        

        <h3>Card 2</h3>
        <p><b>Card Number:  </b>5542860001000224</p>
         <p><b>Token Number:  </b>9267942831060522</p>
       

        <h3>Card 3</h3>
        <p><b>Card Number:  </b>4508750015741019</p>
        <p style="margin-bottom: 40px;"><b>Token Number:  </b>9948270167485049</p> -->
        

       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

  <?php include_once("include/footer.php");?>


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





