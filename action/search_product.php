
<html>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-car">
                <div class="card">
                    <div class="card-body">
          <form class="form-sample" method="post" action="">
                            <p class="card-description">
                                <b>Search Product</b>
                            </p>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" >Category Name</label>
                                <div class="col-sm-6">
                                    <select class="js-example-basic-single" name="country" style= "width: 100%";>
                                        <option value="">Search Product</option>
                                       <?php
                                       $product = get_from_db('products');
                                       while ($row=mysqli_fetch_assoc($product)){
                                           echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                       }
                                       ?>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-rounded btn-primary" name="submit">Sell Product</button>
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

