<div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="index.php" class="navbar-brand">
                    <img src="assets/img/logo.png" alt="" />
                        
                        </a>
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="profile.php"><i class="icon-user"></i> User Profile </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="model/signout.php"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>

            </nav>

        </div>
        <!-- END HEADER SECTION -->



        <!-- MENU SECTION -->
       <div id="left" >
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" width="60" height="60" src="../<?php echo $userData["image"]; ?>" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"> <?php echo $userData["name"]; ?></h5>
                    <ul class="list-unstyled user-info">
                        
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                           
                        </li>
                       
                    </ul>
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">

                
                <li class="panel <?php if($pageName=="index") {echo "active";}?>">
                    <a href="index.php" >
                        <i class="icon-table"></i> Orders                       
                    </a>                   
                </li>

                <li class="panel <?php if($pageName=="addProduct") {echo "active";}?>">
                    <a href="addProduct.php" >
                        <i class="icon-plus-sign"></i> Add Product                       
                    </a>                   
                </li>

                <li class="panel <?php if($pageName=="products") {echo "active";}?>">
                    <a href="products.php" >
                        <i class="icon-list-alt"></i> Products                       
                    </a>                   
                </li>

                <li class="panel <?php if($pageName=="History") {echo "active";}?>">
                    <a href="History.php">
                        <i class=" icon-repeat"></i> History                       
                    </a>                   
                </li>

                <li class="panel <?php if($pageName=="SendEmail") {echo "active";}?>">
                    <a href="Send_Email.php" >
                        <i class="icon-envelope-alt"></i> Send Email                       
                    </a>                   
                </li>

                <li class="panel <?php if($pageName=="Chat") {echo "active";}?>">
                    <a href="chat.php" >
                        <i class=" icon-comment"></i> Chat                       
                    </a>                   
                </li>

            </ul>

        </div>