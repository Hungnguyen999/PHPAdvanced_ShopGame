 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  <a class="navbar-brand" href="#">HưngGamingShop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?php if($_SESSION['username'] AND $_SESSION['userrole']==0): ?>
      <display></display>
          <li class="nav-item active">
            <div class="row">
              
              <a class="btn btn-warning ml-3" href="/PHPmvc/index.php?url=userController/Logout">Logout <span class="sr-only">(current)</span></a>
              <strong><p style="margin: 6px 0 0 1rem;">Hello, <?php echo $_SESSION['name']?></p></strong>
            </div>
            
          </li>
        <?php else: 
          ?>
      <display ></display>
          <li class="nav-item active">
            <a class="nav-link" href="/PHPmvc/application/views/Loginpage.php">Đăng nhập <span class="sr-only">(current)</span></a>
          </li>
      

      <?php endif; ?>
    </ul>
    <form class="form-inline my-2 my-lg-0 mr-3">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <button type="button" class="btn btn-warning">
      Cart <span class="badge badge-light">4</span>
    </button>
  </div>
  </div>
</nav>
</div>
