<?php

/////////////////////////////////////////////////// HELPER FUNCTION

// redirect function
function redirect($location)
{
    header("Location: $location");
}

// query function
function query($sql)
{
    global $connection;
    return mysqli_query($connection, $sql);
}

// check query function
function confirm($result)
{
    global $connection;
    if (!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

// escape string function
function escape_string($string)
{
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

// fetch array function
function fetch_array($result)
{
    return mysqli_fetch_array($result);
}

function set_message($msg)
{
    if (!empty($msg)) {
        $_SESSION['message'] = $msg;
    } else {
        $msg = "";
    }
}

function display_message()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

/////////////////////////////////////////////////// FRONT END FUNCTION

// get products

function get_products()
{
    $query = query("SELECT * FROM products");
    confirm($query);

    while ($row=fetch_array($query)) {
        // short description
        $position = 30;
        $text = $row['product_description'];
        $post = substr($text, $position, 1);
        if ($post !=" ") {
            while ($post !=" ") {
                $i=1;
                $position=$position+$i;
                $text = $row['product_description'];
                $post = substr($text, $position, 1);
            }
        }
        $post = substr($text, 0, $position);

        $product = <<< DELIMETER
    <div class="col-sm-4 col-lg-4 col-md-4">
      <div class="thumbnail">
          <a target="_blank" href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" alt=""></a>
          <div class="caption">
              <h4 class="pull-right">&#36;{$row['product_price']}</h4>
              <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
              </h4>
              <p>{$post}</p>
              <a class="btn btn-primary" target="_blank" href="item.php?id={$row['product_id']}">Add to Chart</a>
          </div>
      </div>
  </div>

DELIMETER;
        echo $product;
    }
}

function get_categories()
{
    $result = query("SELECT * FROM categories");
    confirm($result);

    while ($row = fetch_array($result)) {
        $category_links = <<< DELIMETER
      <a href="category.php?id={$row['cat_id']}" class="list-group-item">{$row['cat_title']}</a>
DELIMETER;
        echo $category_links;
    }
}

function get_item($item_id)
{
    $result = query("SELECT * FROM products WHERE product_id =". escape_string($item_id)."");
    confirm($result);

    while ($row=fetch_array($result)) {
        $item = <<< DELIMETER

    <div class="col-md-7">
       <img class="img-responsive" src="{$row['product_image']}" alt="">

    </div>

    <div class="col-md-5">

        <div class="thumbnail">

    <div class="caption-full">
        <h4><a href="#">{$row['product_title']}</a> </h4>
        <hr>
        <h4 class="">&#36;{$row['product_price']}</h4>

    <div class="ratings">

        <p>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star-empty"></span>
            4.0 stars
        </p>
    </div>

        <p>{$row['product_description']}</p>

    <form action="">
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="ADD TO CART">
        </div>
    </form>

    </div>
DELIMETER;

        echo $item;
    }
}

function tab_pane($item_id)
{
    $result = query("SELECT * FROM products WHERE product_id =". escape_string($item_id)."");
    confirm($result);

    while ($row=fetch_array($result)) {
        $tab_pane = <<< DELIMETER
  <div role="tabpanel">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
      <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>

    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home">

  <p></p>
      <p>{$row['product_description']}</p>
      </div>
      <div role="tabpanel" class="tab-pane" id="profile">

    <div class="col-md-6">

         <h3>2 Reviews From </h3>

          <hr>

          <div class="row">
              <div class="col-md-12">
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  Anonymous
                  <span class="pull-right">10 days ago</span>
                  <p>This product was great in terms of quality. I would definitely buy another!</p>
              </div>
          </div>

          <hr>

      </div>


      <div class="col-md-6">
          <h3>Add A review</h3>

       <form action="" class="form-inline">
          <div class="form-group">
              <label for="">Name</label>
                  <input type="text" class="form-control" >
              </div>
               <div class="form-group">
              <label for="">Email</label>
                  <input type="test" class="form-control">
              </div>

          <div>
              <h3>Your Rating</h3>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
          </div>

              <br>

               <div class="form-group">
               <textarea name="" id="" cols="60" rows="10" class="form-control"></textarea>
              </div>

               <br>
                <br>
              <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="SUBMIT">
              </div>
          </form>

      </div>

   </div>

   </div>

  </div>
DELIMETER;
        echo $tab_pane;
    }
}

function get_products_cat($cat_id)
{
    $result = query("SELECT * FROM products WHERE product_category_id =". escape_string($cat_id)."");
    confirm($result);

    while ($row=fetch_array($result)) {

      // short description
        $position = 30;
        $text = $row['product_description'];
        $post = substr($text, $position, 1);
        if ($post !=" ") {
            while ($post !=" ") {
                $i=1;
                $position=$position+$i;
                $text = $row['product_description'];
                $post = substr($text, $position, 1);
            }
        }
        $post = substr($text, 0, $position);

        $product = <<< DELIMETER
        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="{$row['product_image']}" alt="">
                <div class="caption">
                    <h3>{$row['product_title']}</h3>
                    <p>{$post}</p>
                        <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                    </p>
                </div>
            </div>
        </div>
DELIMETER;
        echo $product;
    }
}

function get_products_shop()
{
    $result = query("SELECT * FROM products");
    confirm($result);

    while ($row=fetch_array($result)) {

      // short description
        $position = 30;
        $text = $row['product_description'];
        $post = substr($text, $position, 1);
        if ($post !=" ") {
            while ($post !=" ") {
                $i=1;
                $position=$position+$i;
                $text = $row['product_description'];
                $post = substr($text, $position, 1);
            }
        }
        $post = substr($text, 0, $position);

        $product = <<< DELIMETER
        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="{$row['product_image']}" alt="">
                <div class="caption">
                    <h3>{$row['product_title']}</h3>
                    <p>{$post}</p>
                        <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                    </p>
                </div>
            </div>
        </div>
DELIMETER;
        echo $product;
    }
}

function login_user()
{
    if (isset($_POST['submit'])) {
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);

        $query = query("SELECT * FROM users WHERE username = '{$username}' AND '{$password}'");
        confirm($query);

        if (mysqli_num_rows($query) == 0) {
            $msg = strtoupper("Your Password or Username are wrong");
            set_message($msg);
            redirect("login.php");
        } else {
            set_message("Welcome to Admin Page: {$username} ");
            redirect("admin");
        }
    }
}
