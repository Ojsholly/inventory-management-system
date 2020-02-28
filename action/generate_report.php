
<html>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-car">
                <div class="card">
                    <div class="card-body">
                        <?php if(isset($_GET['message'])) echo '<div class = "alert alert-warning">'. $_GET['message'] .'</div>'?>
          <form class="form-sample" method="post" action="report.php">
                            <p class="card-description" style="text-weight: 400px;">
                                <b>Generate Report</b>
                            </p>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" >Select Report</label>
                                <div class="col-sm-6">
                                    <select name="report" style= "width: 100%";>
                                        <option value="1">Sales Report</option>
                                        <option value="2">Staff Report</option>
                                        <option value="3">Product Report</option>
                                        <option value="6">Refunds Report</option>
                                        <option value="7">Expense Report</option>
                                        <option value="4">Money Given Report</option>
                                        <option value="5">Money Received Report</option>


                                    </select>
                                </div>
                            </div><br>

              <div class="form-group row">
                  <label class="col-sm-1 col-form-label" >Start Date</label>
                  <div class="col-sm-3">
                      <input type="date" id="" name="start_date" value="<?php echo date('Y-m-d')?>">
                  </div>

                  <label class="col-sm-1 col-form-label" >End Date</label>
                  <div class="col-sm-3">
                      <input type="date" id="" name="end_date" value="<?php echo date('Y-m-d')?>">

                  </div>


              </div>

                            <button type="submit" class="btn btn-rounded btn-primary" name="submit">Generate</button>

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

