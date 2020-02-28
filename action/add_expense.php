
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                     <?php

                               if(isset($_POST['submit'])){


                                $expenses = stripcslashes($_POST['expenses']);

                                $amount = stripcslashes($_POST['amount']);

                                $staff = stripcslashes($_POST['staff']);


                                 $data = array("name"=>$expenses,"amount"=>$amount,"staff_name"=>$staff);

                                $table = "expenses";
                                $staff = insertData($dbc,$data,$table);


                                    echo '<div class="alert alert-success"> Form Submitted </div>';

                            }

                                ?>
                          <div class="card-body">
                    <div class="card-body">
                        <h4 class="col-12">Add Expense.</h4>
                        <form class="form-sample" method="post" action="">
                            <p class="card-description">
                            </p>
                            <b>Expense Info</b>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Expense</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" required="" name="expenses"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Amount Spent On Expense</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" required="" name="amount"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name Of Staff Responsible For Expense</label>
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
                              <button type="submit" class="btn btn-rounded btn-primary" name="submit">Add Expense</button>
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
