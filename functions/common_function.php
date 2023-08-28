<?php
// include('./includes/connect.php');

// getting products
function getproducts()
{
    global $con;

    // condition to check isset or not
    if (!isset($_GET['Category'])) {
        if (!isset($_GET['brand'])) {

            $select_query = "Select * from `product` order by rand() LIMIT 0,9";
            $result_query = mysqli_query($con, $select_query);
            // $row=mysqli_fetch_assoc($result_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                // $product_keyword=$row['product_keywords'];
                $product_image = $row['product_image1'];
                $product_price = $row['product_price'];
                $bategory_id = $row['Category_id'];
                $brand_id = $row['Brands_id'];
                // echo $product_id;
                echo "<div class='col-md-4 mb-2'>
            <div class='card'>
                <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                </div>
            </div>
        </div>";
            }
        }
    }
}


// getting all product
function get_all_products()
{
    global $con;

    // condition to check isset or not
    if (!isset($_GET['Category'])) {
        if (!isset($_GET['brand'])) {

            $select_query = "Select * from `product` order by rand() LIMIT 0,9";
            $result_query = mysqli_query($con, $select_query);
            // $row=mysqli_fetch_assoc($result_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                // $product_keyword=$row['product_keywords'];
                $product_image = $row['product_image1'];
                $product_price = $row['product_price'];
                $bategory_id = $row['Category_id'];
                $brand_id = $row['Brands_id'];
                // echo $product_id;
                echo "<div class='col-md-4 mb-2'>
            <div class='card'>
                <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                </div>
            </div>
        </div>";
            }
        }
    }
}


// getting unique categories
function get_unique_category()
{
    global $con;
    if (isset($_GET['Category'])) {
        $category_id = $_GET['Category'];
        $select_query = "Select * from `product` where Category_id = $category_id";
        $result_query = mysqli_query($con, $select_query);
        $num_rows = mysqli_num_rows($result_query);
        if ($num_rows == 0) {
            echo "<h2 class='text-center text-danger'>No stock is avalible for this category</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            // $product_keyword=$row['product_keywords'];
            $product_image = $row['product_image1'];
            $product_price = $row['product_price'];
            $bategory_id = $row['Category_id'];
            $brand_id = $row['Brands_id'];
            // echo $product_id;
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
                <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                </div>
            </div>
        </div>";
        }
    }
}

// getting unique Brands
function get_unique_brand()
{
    global $con;
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "Select * from `product` where Brands_id = $brand_id";
        $result_query = mysqli_query($con, $select_query);
        $num_rows = mysqli_num_rows($result_query);
        if ($num_rows == 0) {
            echo "<h2 class='text-center text-danger'>No stock is avalible for this brand</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            // $product_keyword=$row['product_keywords'];
            $product_image = $row['product_image1'];
            $product_price = $row['product_price'];
            $bategory_id = $row['Category_id'];
            $brand_id = $row['Brands_id'];
            // echo $product_id;
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
                <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                </div>
            </div>
        </div>";
        }
    }
}

function getbrands()
{
    global $con;
    $select_brands = "select * from `brands`";
    $result_brands = mysqli_query($con, $select_brands);
    // $row_data=mysqli_fetch_assoc($result_brands);
    // echo $row_data['Brands_title'];
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['Brands_title'];
        $brand_id = $row_data['Brands_id'];
        echo "<li class='nav-item'>
                        <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                    </li>";
    }
}
function getcategorys()
{
    global $con;
    $select_categorys = "select * from `categories`";
    $result_categorys = mysqli_query($con, $select_categorys);
    // $row_data=mysqli_fetch_assoc($result_brands);
    // echo $row_data['Brands_title'];
    while ($row_data = mysqli_fetch_assoc($result_categorys)) {
        $category_title = $row_data['Category_title'];
        $category_id = $row_data['Category_id'];
        echo "<li class='nav-item'>
                        <a href='index.php?Category=$category_id' class='nav-link text-light'>$category_title</a>
                    </li>";
    }
}


// searching product function

function search_product()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "Select * from `product` where product_keywords like '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_rows = mysqli_num_rows($result_query);
        if ($num_rows == 0) {
            echo "<h2 class='text-center text-danger'>No results match. No products found on this category!</h2>";
        }
        // $row=mysqli_fetch_assoc($result_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            // $product_keyword=$row['product_keywords'];
            $product_image = $row['product_image1'];
            $product_price = $row['product_price'];
            $bategory_id = $row['Category_id'];
            $brand_id = $row['Brands_id'];
            // echo $product_id;
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
                <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                </div>
            </div>
        </div>";
        }
    }
}


// VIEW DETAILS FUNCTION
function views_details()
{
    global $con;

    // condition to check isset or not
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['Category'])) {
            if (!isset($_GET['brand'])) {
                $product_id = $_GET['product_id'];
                $select_query = "Select * from `product` where product_id=$product_id";
                $result_query = mysqli_query($con, $select_query);
                // $row=mysqli_fetch_assoc($result_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    // $product_keyword=$row['product_keywords'];
                    $product_image = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];
                    $product_price = $row['product_price'];
                    $bategory_id = $row['Category_id'];
                    $brand_id = $row['Brands_id'];
                    // echo $product_id;
                    echo "<div class='col-md-4 mb-2'>
            <div class='card'>
                <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='index.php' class='btn btn-secondary'>Go Home</a>
                </div>
            </div>
        </div>
        
        <div class='col-md-8'>
                        <!-- related card -->
                        <div class='row'>
                            <div class='col-md-12'>
                                <h4 class='text-center text-info mb-5'>Related Products</h4>
                            </div>
                            <div class='col-md-6'>
                            <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                            </div>
                            <div class='col-md-6'>
                            <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                            </div>
                        </div>
                    </div>";
                }
            }
        }
    }
}

//get ip address function
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


// cart function
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "Select * from `cart_details` where ip_address='$ip' and product_id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_rows = mysqli_num_rows($result_query);
        if ($num_rows > 0) {
            echo "<script>alert('This item is already present inside cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "insert into `cart_details` (product_id,ip_address,quantity,date) values ($get_product_id,'$ip',0, NOW() ) ";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('Item is added to cart succesfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";

        }
    }
}

// function to get cart item number
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip = getIPAddress();
        $select_query = "Select * from `cart_details` where ip_address='$ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart = mysqli_num_rows($result_query);
    }else {
        global $con;
        $ip = getIPAddress();
        $select_query = "Select * from `cart_details` where ip_address='$ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart = mysqli_num_rows($result_query);

        }
        echo $count_cart;
}


// total cart price
function total_cart_price(){
    global $con;
    $ip = getIPAddress();
    $total=0;
    $cart_query="select * from `cart_details` where ip_address='$ip'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_product="select * from `product` where product_id='$product_id'";
        $result_product=mysqli_query($con,$select_product);
        while($row_product_price=mysqli_fetch_array($result_product)){
            $product_price=array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total+=$product_values;
        }
    }
    echo $total;

}


// get user order details
function get_user_order(){
    global $con;
    $user_name=$_SESSION['username'];
    $get_details="select * from `user_table` where username='$user_name'";
    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_acount'])){
        if(!isset($_GET['my_order'])){
        if(!isset($_GET['delete_account'])){
            $get_orders="select * from `user_orders` where user_id=$user_id and order_status='pending'";
            $result_order_query=mysqli_query($con,$get_orders);
            $row_count=mysqli_num_rows($result_order_query);
            if($row_count>0){
                echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count</span> pending orders.</h3>
                <p class='text-center'><a href='profile.php?my_order' class='text-dark'>Order Details</a></p>";
            }else{
                echo "<h3 class='text-center text-success mt-5 mb-2'>You have zero pending orders.</h3>
                <p class='text-center'><a href='../index.php' class='text-dark'>Explore Product</a></p>";

            }

        }
    }
    }
}

}
