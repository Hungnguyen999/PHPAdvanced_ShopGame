
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
</head>
<body>
<?php 
    session_start();
    $products = array();
    $amounts = array();
    $producers = array();
    $images = array();
    while($row = mysqli_fetch_array($data['gamelist'])){
        array_push($products,$row['Name']);
        array_push($amounts,$row['Price']);
        array_push($producers,$row['Producer']);
        array_push($images,$row['Image']);
    }

    ///Load up session
    if ( !isset($_SESSION["total"]) ) {
        $_SESSION["total"] = 0;
        for ($i=0; $i< count($products); $i++) {
            $_SESSION["qty"][$i] = 0;
            $_SESSION["amounts"][$i] = 0;
       }
    }
    //Add product
    if ( isset($_GET["add"]) )
    {
        $i = $_GET["add"];
        $qty = $_SESSION["qty"][$i] + 1;
        $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
        $_SESSION["cart"][$i] = $i;
        $_SESSION["qty"][$i] = $qty;

    }

     //Reset
     if ( isset($_GET['reset']) )
     {
     if ($_GET["reset"] == 'true')
       {
       unset($_SESSION["qty"]); //The quantity for each product
       unset($_SESSION["amounts"]); //The amount from each product
       unset($_SESSION["total"]); //The total cost
       unset($_SESSION["cart"]); //Which item has been chosen
       }
     }
    
    //Delete
    if ( isset($_GET["delete"]) )
    {
        $i = $_GET["delete"];
        $qty = $_SESSION["qty"][$i];
        $qty--;
        $_SESSION["qty"][$i] = $qty;
        //remove item if quantity is zero
        if ($qty == 0) {
            $_SESSION["amounts"][$i] = 0;
            unset($_SESSION["cart"][$i]);
        }
        else
        {
            $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
        }
    }
 ?>
<?php include_once 'Header.php'?>

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-3">
            <div class="w3-card-4 w3-margin" style="width:100%">
                <div class="w3-display-container" style="height:25%">
                    <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i>Thể loại</div>
                        <ul class="list-group category_block">
                            <li class="list-group-item"><a href="/PHPmvc/application/views/Cart.php">Hành động</a></li>
                            <li class="list-group-item"><a href="category.html">Dễ thương</a></li>
                            <li class="list-group-item"><a href="category.html">Vui nhộn</a></li>
                            <li class="list-group-item"><a href="category.html">Đua xe</a></li>
                            <li class="list-group-item"><a href="category.html">Thể thao</a></li>
                        </ul>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-third w3-center">
                    <?php
                        if ( isset($_SESSION["cart"]) ) {
                        ?>
                        <br/><br/><br/>
                        <div class="row">
                            <div class="col-3">
                                <h2><span class="badge badge-warning badge-lg">Cart Detail</span></h2>
                            </div>
                            <div class="col-3">
                                <a href="/PHPmvc/index.php?url=gameController&reset=true" style="margin: 1.3rem 0 0 12rem;cursor: pointer;" class="badge badge-danger badge-lg">Reset</a>
                            </div>
                        </div>
                        <table>
                            <tr>
                                <th>Product</th>
                                <th width="10px">&nbsp;</th>
                                <th>Qty</th>
                                <th width="10px">&nbsp;</th>
                                <th>Amount</th>
                                <th width="10px">&nbsp;</th>
                                <th>Action</th>
                            </tr>
                        <?php
                        $total = 0;
                        foreach ( $_SESSION["cart"] as $i ) {
                        ?>
                        <tr class="table-warning  table-sm">
                            <td><?php echo( $products[$_SESSION["cart"][$i]] ); ?></td>
                            <td width="10px">&nbsp;</td>
                            <td><?php echo( $_SESSION["qty"][$i] ); ?></td>
                            <td width="10px">&nbsp;</td>
                            <td><?php echo( $_SESSION["amounts"][$i] ); ?></td>
                            <td width="10px">&nbsp;</td>
                            <td><a href="/PHPmvc/index.php?url=gameController&delete=<?php echo($i); ?>">Delete</a></td>
                        </tr>
                        <?php
                        $total = $total + $_SESSION["amounts"][$i];
                        }
                        $_SESSION["total"] = $total;
                        ?>
                            <tr>
                                <td colspan="7">Total : <?php echo($total); ?></td>
                            </tr>
                        </table>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col" style="margin-left: 2.5rem;">

            <h1> In Stock: </h1>
                <div class="row">
                    <?php for ($i=0; $i< count($products); $i++)  {?>
                        <div class="col-6 col-sm-6">
                            <div class="card" style="width:25rem;height:10rem;margin: 0.5rem">
                                <div class="row">
                                    <img src="<?php echo($images[$i]);?>" class="card-img-top" style="width: 10rem;height:8rem;padding-left:1rem;">
                                    <div class="card-body">
                                        <div class="card-text" style="width:14rem;"><strong><?php echo($products[$i]);?></strong></div>
                                        <div class="card-text"><?php echo($amounts[$i]);?></div>
                                        <div class="card-text">Nhà phát hành: <?php echo($producers[$i]);?></div> 
                                        <div class="row">
                                            <div class="card-text">
                                                <a href="index.php?url=gameController/getDetail/<?= $products[$i]; ?>" class="btn btn-primary btn-sm ml-3">Detail</a>
                                            </div>
                                            <div class="card-text ml-1">
                                            <?php if($_SESSION['username'] AND $_SESSION['userrole']==0): ?>
                                                <display></display>
                                                        
                                                            <a class="btn btn-success btn-sm" href="/PHPmvc/index.php?url=gameController&add=<?php echo($i); ?>">Add to cart</a>
                                                        
                                                    <?php else: 
                                                    ?>
                                                <display></display>
                                                    
                                                        <a class="btn btn-warning btn-sm" href="/PHPmvc/application/views/Loginpage.php">Login to add to cart</a>
                                          
                                                <?php endif; ?>
                                            
                                                </div>
                                        </div>         
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }?>
                    </div>
                </div>
            </div>
    </div>
    
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<?php include_once 'Footer.php'?>
</body>

</html>