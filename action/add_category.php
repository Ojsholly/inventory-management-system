
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <?php
              if(isset($_POST["submit"]))
              {


                $category = stripcslashes($_POST['category']);

                $description = stripcslashes($_POST['description']);

                  $table = 'category';
                

                $data_exist = data_exist($table,'category_name',$category);

                     if($data_exist)

                            {
                            echo "<div class='alert alert-warning'> Category Already exists  </div>";
                           }

                   else {

                $data = array("category_name"=>$category,"description"=>$description);

                $table = "category";
                $categories = insertData($dbc,$data,$table);


                echo '<div class="alert alert-success"> New category successfully added. </div>';
              }
    }
              ?>
              <form class="form-sample" method="post" action="">
                <p class="card-description">
                  <b>Category Info</b>
                </p>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" >Category Name</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" required name="category" placeholder="Enter the name of the category."/>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Category Description</label>
                  <div class="col-sm-6">
                    <textarea class="form-control" rows="7" name="description" placeholder="Enter a description of the category."></textarea>
                  </div>
                </div>
                <button type="submit" class="btn btn-rounded btn-primary" name="submit">Save Category</button>
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
