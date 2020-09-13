<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

<?php include_once 'BaseViews/Header.php'?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i>Thể loại</div>
                    <ul class="list-group category_block">
                        <li class="list-group-item"><a href="category.html">Hành động</a></li>
                        <li class="list-group-item"><a href="category.html">Dễ thương</a></li>
                        <li class="list-group-item"><a href="category.html">Vui nhộn</a></li>
                        <li class="list-group-item"><a href="category.html">Đua xe</a></li>
                        <li class="list-group-item"><a href="category.html">Thể thao</a></li>
                    </ul>
            </div>
       
            <div class="col">
                <div class="row">
                    <?php foreach ($games as $key) {?>
                        <div class="col-6 col-sm-6">
                            <div class="card" style="width:25rem;height:10rem;margin: 0.5rem">
                                <div class="row">
                                    <img src="https://gamek.mediacdn.vn/2018/8/10/photo-1-15338673586381056290400.jpg" class="card-img-top" style="width: 10rem;height:8rem;padding-left:1rem;">
                                    <div class="card-body">
                                        <div class="card-text" style="width:14rem;"><strong><?php echo $key->Name;?></strong></div>
                                        <div class="card-text"><?php echo $key->Price;?></div>
                                        <div class="card-text">Nhà phát hành: <?php echo $key->Producer;?></div> 
                                        <div class="row">
                                            <a href="index.php?name=<?= $key->Name; ?>" class="badge badge-primary ml-3">Detail</a>
                                            <div class="card-text ml-1">
                                                <span class="badge badge-info">Mua ngay</span>
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
<?php include_once 'BaseViews/Footer.php'?>
</body>

</html>