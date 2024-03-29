<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">JK SHOP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">ຫນ້າຫລັກ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="show_product.php">ສີ້ນຄ້າ</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ແຈ້ງຫລັກຖານການໂອນເງີນ
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="pay_ment.php">ສົ່ງຫລັກຖານການໂອນເງີນ</a></li>
            <li><a class="dropdown-item" href="#">ກວດເບີ່ງສະຖານະການສັ່ງຊື້</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="login.php" >login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="admin/index.php" >Admin</a>
        </li>
      </ul>
      <form class="d-flex" action="show_product.php" method="POST">
        <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      
    </div>
  </div>
</nav>