<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top navbar-scrooll" data-spy="affix"
  data-offset-top="197">
  <div class="container-fluid">
    <img src="lib/upload/ui/logo.png" style="width:65px">
    <a class="navbar-brand" href="#" style="color:white">DREAMY BOOKS</a>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
        </li>
        <li class="nav-item" id="btn_sign">
          <a class="nav-link" href="lib/view/login.php">Sign In</a>
        </li>
        <li class="nav-item" id="btn_reg">
          <a class="nav-link" href="lib/view/register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="lib/view/about.php">About</a>
        </li>

        <!-- Drop Down List in Navigation Bar -->
        <li class="nav-item dropdown">
        <div class="form-group">
                    <select class="form-select"  style="background-color:#272B30; border: none; color: 969F9A; cursor: pointer; position: center; margin: 3;" name="productCategory" id="productCategory" placeholder="Add Picture">
                    <option value="0">All Products</option>
                    <option value="Books / Writing">Books / Writing</option>
                    <option value="Drawing items">Drawing items</option>
                    <option value="School books">School books</option>
                    <option value="Writing items">Writing items</option>
                    <option value="Papers">Papers</option>
                    <option value="Cardboard">Cardboard</option>
                    <option value="Mathematical tools">Mathematical tools</option>
                    <option value="Polithin">Polythene</option>
                    <option value="Binding tools">Binding tools</option>
                    <option value="Preschool items">Preschool items</option>
                    <option value="School items">School items</option>
                    <option value="Bags">Bags</option>
                    <option value="toys">toys</option>
                    <option value="Wool Items">Wool Items</option>
                    <option value="Electronic Items">Electronic Items</option>
                    <option value="Party Items">Party Items</option>
                    <option value="Plastic items">Plastic items</option>
                    <option value="Muiltimeadia Iems">Multimedia Items</option>
                </select>
            </div>
        </li>
        <li class="nav-item dropdown">
        <div class="form-group">
                    <select class="form-select"  style="background-color:#272B30; border: none; color: 969F9A; cursor: pointer; position: center; margin: 3;" name="productCategory" id="bookCategory" >
                    <option value="0">All Books</option>
                    <option value="Reading books-Novels">Reading books-Novels</option>
                    <option value="Reading books-Translations">Reading books-Translations</option>
                    <option value="Reading books-Educational books">Reading books-Educational books</option>
                    <option value="Reading books-Religious books">Reading books-Religious books</option>
                    <option value="Reading books-Children books">Reading books-Children books</option>
                    
                </select>
            </div>
        </li>
      </ul>

      <!-- Search bar in Navigation Bar -->
        <form class="d-flex my-0 mx-1">
          <input class="form-control mx-1 my-0" style="border-radius: 25px;"  type="search" name="searchData" id="searchData" placeholder="search">
        </form>
        <a href="lib/view/cart.php" class=" my-0 mx-0">
          <button type="submit" name="cart" id="cart"  style="border-radius: 25px;" class="btn btn-warning my-0 mx-1">
            <i class="fas fa-shopping-cart"></i>
            <span id='cart_count' style="text-color:white; font-size:20px;" class=''></span>
          </button>
        </a>
        <ul class="navbar-nav">
        <li class="nav-item dropdown" id="btn_user">
          <a class="nav-link dropdown-toggle dropstart" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true"
            aria-expanded="false"><i class="far fa-user" style="color:#47DBF3"></i></a>
            <div class="dropdown-menu" id="drop0001">
            <a class="dropdown-item" href="lib/view/design.php">My Orders</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="lib/function/logout.php"  style="color:red"><i
                class="fas fa-sign-out-alt"></i>Sign Out</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>