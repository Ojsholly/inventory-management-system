
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php if(isset($_GET['message'])) echo '<div class = "alert alert-warning">'. $_GET['message'] .'</div>'?>
                        <?php if(isset($_GET['failed'])) echo '<div class = "alert alert-warning">'. $_GET['failed'] .'</div>'?>
                        <h4 class="col-12">Refund Product.</h4>
                        <form class="form-sample" action="view_product_refund.php" method="get">
                            <p class="card-description">
                            </p>
                            <b>Refund Info</b>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Transaction ID</label>
                                <div class="col-sm-6">
                                    <input type="text" value="" class="form-control" required="" name="txn_id" placeholder="Enter Transaction ID"/>
                                </div>
                            </div>
                             <button type="submit" class="btn btn-rounded btn-primary" >View Products</button>
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
