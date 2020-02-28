
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <?php

                                

                               if(isset($_POST['submit'])){


                                //$refund = stripcslashes($_POST['refund']);
                                    $expense_id = $_GET['id']; 
                                $amount = stripcslashes($_POST['amount']);

                                $staff = stripcslashes($_POST['staff']);


                                 $where='where id = "'.$expense_id.'"';

                                  $table_name = "expenses";

                               $expenses =  getData($dbc,$table_name,$where);

                               $old_amount = $expenses['amount'];

                            //   $refund = $expenses['name'];
                              // echo $old_amount;

                               if($old_amount < $amount){

                                echo'<div class="alert alert-warning">You cannot refund more than what is owed</div>';
                               } elseif($old_amount == $amount) {

                                $where='where id = "'.$expense_id.'"';

                                  $table_name = "expenses";

                                $data = array("amount"=>0,"refund_status"=>1);

                                  updateData($dbc,$data,$table_name,$where);

                                  echo '<div class="alert alert-success"> Refund Successful </div>';

                              }else {

                                $new_amount = ($old_amount -  $amount);

                                 $where='where id = "'.$expense_id.'"';

                                  $table_name = "expenses";

                                $data = array("amount"=>$new_amount,"refund_status"=>0);

                                  updateData($dbc,$data,$table_name,$where);


                                   $data = array("expense_id"=>$expense_id,"amount"=>$amount,"staff_name"=>$staff);

                                    $table = "refund";
                                  $staff = insertData($dbc,$data,$table);

                                    echo '<div class="alert alert-success"> Refund Successful </div>';

                            }

                        }
                                ?>
                    <div class="card-body">
                        <h4 class="col-12">Add Refund.</h4>
                        <form class="form-sample" action="" method="post">
                            <p class="card-description">
                            </p>
                            <b>Refund Info</b>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Amount Spent On Refund</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" required="" name="amount"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name Of Staff Responsible For Refund</label>
                                <div class="col-sm-6">
                                   <select class="js-example-basic-single" name="staff" style= "width: 100%";>
                                       <?php

                                $staff = getAllData($dbc,"staff");

                                foreach($staff as $item) {
                                //    echo $item['filename'];
                                  //  echo $item['filepath'];

                                    // to know what's in $item
                              ?>
                              <option value="<?php echo $item['first_name']; echo ' ';  echo $item['last_name']; ?>"><?php echo $item['first_name']; echo ' '; echo $item['last_name']; ?></option><?php     // echo '<pre>'; var_dump($category);
                                }

                            ?>
                                    </select>

                                </div>
                            </div>
                             <button type="submit" class="btn btn-rounded btn-primary" name="submit">Add Refund</button>
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
