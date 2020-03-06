<?php

include('database.php');

global $dbc;

if (isset($_POST['product_name']) && !empty($_POST['product_name'])) {
    $product_name = $_POST['product_name'];
    $product_data = getDataNew($dbc, "products", "WHERE name LIKE '%" . $product_name . "%' AND stock_count > 0 LIMIT 1");
    if (is_array($product_data) && count($product_data) > 0) {
        echo json_encode($product_data);
    } else {
        echo json_encode([]);
    }
}

if (isset($_POST['values']) && isset($_POST['date_to_send']) && isset($_POST['payment_method']) && isset($_POST['randStr'])) {
    $values = $_POST['values'];
    $values = json_decode($values);

    $count = 0;
    $values_count = count($values);

    //$date_to_send = $_POST['date_to_send'];
    date_default_timezone_set('Africa/Lagos');
    $date_to_send = date('Y-m-d');
    $payment_method = $_POST['payment_method'];

    $txn_id = $_POST['randStr'];

    foreach ($values as $value) {
        $name = $value->name;
        $quantity = $value->quantity;
        $price = $value->price;

        $sql1 = "SELECT * FROM products WHERE name = '" . $name . "'";
        $result = mysqli_query($dbc, $sql1);
        $row = mysqli_fetch_array($result);
        $id = $row['id'];


        $sql = "INSERT INTO sales (txn_id, products, product_id, quantity, total, payment_method, when_sold)
              VALUES (
              '" . $txn_id . "',
              '" . mysqli_real_escape_string($dbc, $name) . "',
              '" . $id . "',
              '" . mysqli_real_escape_string($dbc, $quantity) . "',
              '" . mysqli_real_escape_string($dbc, $price) . "',
              '" . mysqli_real_escape_string($dbc, $payment_method) . "',
              '" . mysqli_real_escape_string($dbc, $date_to_send) . "'
              )";

        $result = mysqli_query($dbc, $sql);
        if ($result) {
            $name = trim($name);
            $decrement_sql = "UPDATE products SET stock_count = stock_count - " . $quantity . " WHERE name LIKE '%" . $name . "%'";

            $decrement_res = mysqli_query($dbc, $decrement_sql);
            if ($decrement_res) {
                $count++;
            }
        }
    }

    if ($count == $values_count) {
        echo json_encode(['status' => 1, "message" => "Completed"]);
    } elseif ($count < $values_count && $count > 0) {
        echo json_encode(['status' => -1, "message" => "Partly Completed"]);
    } else {
        echo json_encode(['status' => 0, "message" => "Failed"]);
    }
}

function get_from_table($table, $column_name, $deleted)
{
    global $dbc;
    $sql = "SELECT * FROM $table WHERE  $column_name = '$deleted'";
    $result = mysqli_query($dbc, $sql);
    return $result;
}

function data_exist($table, $column_name, $name)
{
    global $dbc;

    $sql = "SELECT * FROM $table WHERE  $column_name = '$name'";

    $query = mysqli_query($dbc, $sql);
    $count_rows = mysqli_num_rows($query);

    return $count_rows;
}

function getDataNew($dbc, $table_name, $where = '')
{
    $new_arr = array();
    if ($where != '') {
        $sql = "select * from " . $table_name . " " . $where;
    }
    // exit(print_r($sql));
    $resp = mysqli_query($dbc, $sql);

    // exit(print_r($resp));

    if (mysqli_num_rows($resp) > 0) {
        while ($row = mysqli_fetch_assoc($resp)) {
            $new_arr[] = $row;
        }
        //        foreach (mysqli_fetch_assoc($resp) as $key => $value) {
        //            $new_arr[$key] = $value;
        //        }
        return $new_arr;
    } else {
        return $new_arr;
    }
}

function getData($dbc, $table_name, $where = '', $limit = false)
{
    $new_arr = array();
    if ($where == '') {
        # code...
        $sql = "select * from $table_name limit 1";
    } else {
        $sql = "select * from " . $table_name . " " . $where . " limit 1";
    }

    // exit(print_r($sql));
    $resp = mysqli_query($dbc, $sql);

    // exit(print_r($resp));

    if (mysqli_num_rows($resp) > 0) {
        foreach (mysqli_fetch_assoc($resp) as $key => $value) {
            $new_arr[$key] = $value;
        }
        return $new_arr;
    } else {
        return $new_arr;
    }
}

function insertData($dbc, $data, $table_name)
{
    $sql = "INSERT INTO `$table_name` SET
    ";

    $insert_string = '';

    $length = count($data);
    $count = 1;
    foreach ($data as $key => $value) {
        if ($count == $length) {

            $insert_string = $insert_string . $key . '=' . '"' . $value . '"';
        } else {
            $insert_string = $insert_string . $key . '=' . '"' . $value . '",';
        }
        $count = $count + 1;
    }
    $sql = $sql . $insert_string;


    // exit(print_r($sql));


    $resp = mysqli_query($dbc, $sql);
    return true;
}

function updateData($dbc, $data, $table_name, $where)
{
    $sql = "UPDATE `$table_name` SET
    ";

    $update_string = '';

    $length = count($data);
    $count = 1;
    foreach ($data as $key => $value) {
        if ($count == $length) {

            $update_string = $update_string . $key . '=' . '"' . $value . '"';
        } else {
            $update_string = $update_string . $key . '=' . '"' . $value . '",';
        }
        $count = $count + 1;
    }
    $sql = $sql . $update_string . " " . $where;
    // exit(print_r($sql));


    $resp = mysqli_query($dbc, $sql);
}

function generate_random($length = 12, $seedling_prefix = "token_")
{

    $seed = range('A', 'Z');
    $seed3 = range('a', 'z');
    $seed2 = range(0, 9);
    $seed = array_merge(array_merge($seed, $seed3, $seed2));
    $seedlings = $seedling_prefix;
    $i = 0;
    while ($i < $length) {
        $seedlings = $seedlings . $seed[array_rand($seed)];
        $i = $i + 1;
    }
    return $seedlings;
}

function generate_pin($length = 12, $seedling_prefix = "pin_")
{

    $seed = range('A', 'Z');
    $seed3 = range('a', 'z');
    $seed2 = range(0, 9);
    $seed = array_merge(array_merge($seed, $seed3, $seed2));
    $seedlings = $seedling_prefix;
    $i = 0;
    while ($i < $length) {
        $seedlings = $seedlings . $seed[array_rand($seed)];
        $i = $i + 1;
    }
    return $seedlings;
}

function getAllData($dbc, $table_name, $where = '')
{
    $new_arr = array();
    if ($where == '') {
        # code...
        $sql = "select * from $table_name ";
    } else {
        $sql = "select * from " . $table_name . " " . $where . " ";
    }

    // exit(print_r($sql));
    $resp = mysqli_query($dbc, $sql);

    // exit(print_r($resp));

    if (mysqli_num_rows($resp) > 0) {
        while ($row = mysqli_fetch_array($resp)) {
            array_push($new_arr, $row);
        }
        return $new_arr;
    } else {
        return $new_arr;
    }
}

function redirect_to($location)
{
    return header("Location:" . $location);
}

function get_from_db($table)
{
    global $dbc;
    $sql = "SELECT * FROM " . $table;
    $result = mysqli_query($dbc, $sql);
    return $result;
}

function get_from_another_table($category_id, $column_name, $table)
{
    global $dbc;
    $sql = "SELECT * FROM $table WHERE  $column_name = '" . $category_id . "'";
    $result = mysqli_query($dbc, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

function insert_db($product_array, $quantity_array, $total)
{
    global $dbc;
    date_default_timezone_set('Africa/Lagos');
    $when_sold = date('Y-m-d h:i:sa');
    $who_sold = '';
    $query = "INSERT INTO sales(products, quantity, total, who_sold, when_sold)
                    VALUE ('" . $product_array . "',
                           '" . $quantity_array . "',
                           '" . $total . "',
                           '" . $who_sold . "',
                           '" . $when_sold . "')";
    $result = mysqli_query($dbc, $query);
    if ($result) {
        return ['status' => 1, 'message' => '<div class = "alert alert-success">Checked Successfully</div>'];
    } else {
        return ['status' => 0, 'message' => '<div class = "alert alert-danger">Failed</div>'];
    }
}

function insert_refund($row, $price)
{

    global $dbc;
    date_default_timezone_set('Africa/Lagos');
    $when_refund = date('Y-m-d');
    $query = "INSERT INTO product_refund (product_id, product, quantity, amount, txn_id, who, why_return, date_bought, date_refunded)
                    VALUE ('" . $row['product_id'] . "',
                           '" . $row['products'] . "',
                           '" . $_POST['quantity'] . "',
                           '" . $price . "',
                           '" . $row['txn_id'] . "',
                           '" . mysqli_real_escape_string($dbc, $_POST['who']) . "',
                           '" . mysqli_real_escape_string($dbc, $_POST['why']) . "',
                           '" . $row['when_sold'] . "',
                           '" . $when_refund . "')";
    $result = mysqli_query($dbc, $query);
    if ($result) {
        return true;
    }
}

function update_stock($row)
{
    global $dbc;
    $sql = "UPDATE products SET stock_count = stock_count + '" . $_POST['quantity'] . "' WHERE id = '" . $row['product_id'] . "'";
    $result = mysqli_query($dbc, $sql);
    if ($result) {
        return true;
    }
}

function update_quantity($sales_price)
{
    global $dbc;
    $sql = "UPDATE sales SET quantity = quantity - '" . $_POST['quantity'] . "', total = '" . $sales_price . "' WHERE sales_id = '" . $_POST['sales_id'] . "'";
    $result = mysqli_query($dbc, $sql);
    if ($result) {
        return true;
    }
}

function delete_sales_refunded()
{
    global $dbc;
    $new_sales = get_from_table('sales', 'sales_id', $_POST['sales_id']);
    $row = mysqli_fetch_assoc($new_sales);
    if ($row['quantity'] == 0) {
        $sql = "DELETE FROM sales WHERE sales_id = '" . $_POST['sales_id'] . "'";
        $result = mysqli_query($dbc, $sql);
        return $result;
    }
}

function count_category_frequencies($category_id)
{
    global $dbc;
    $sql = "SELECT COUNT(category_id) FROM products";
}
