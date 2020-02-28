
<html>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
<?php
if(isset($_POST["submit"])) {

    $name = stripcslashes($_POST['name']);

    //$lastname = stripcslashes($_POST['lastname']);

    $phone = stripcslashes($_POST['phone']);

    $amount = stripcslashes($_POST['amount']);

    $mode = stripcslashes($_POST['mode']);

    $rand = rand();

    $txn_id = $rand;

    $date = date_default_timezone_set('Africa/lagos');
    $today = date('Y-m-d');


    $data = array("name" => $name, "phone" => $phone, "amount" => $amount, "mode" => $mode, "txn_id" => $txn_id, "date" => $today);

    $table = "txn_recieved";

    if ($staff = insertData($dbc, $data, $table)) {
        echo '<div class="alert alert-success"> Transaction Successful </div>';
    } else {
        echo '<div class="alert alert-danger"> Transaction Failed </div>';
    }
}
?>
                        <form class="form-sample" method="post" action="">
                            <p class="card-description">
                                <b>Transaction Info</b>
                            </p>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" >Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" required name="name" placeholder="Enter the name of the customer."/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" >Phone Number</label>
                                <div class="col-sm-6">
                                    <input type="tel" class="form-control" required name="phone" placeholder="Enter the phone number of the customer."/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" >Amount</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" required name="amount" placeholder="Enter the amount of the transaction."/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Mode of payment</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="mode">
                                        <option value="cash">Cash</option>
                                        <option value="transfer">Transfer</option>
                                        <option value="pos">POS</option>
                                    </select>
                                </div>
                            </div><br>
                                <button type="submit" class="btn btn-rounded btn-primary" name="submit">Receive Money</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 grid-margin stretch-card">
                <!--weather card-->

                <!--weather card ends-->
            </div>

        </div>

    </div>

