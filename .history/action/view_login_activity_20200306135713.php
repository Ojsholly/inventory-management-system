<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Login ACtivity</h4>

                        <div class="table-responsive">
                            <table id="table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>IP Address</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    $login = get_from_db('login_activity');
                                    while ($row = mysqli_fetch_array($login)) :
                                        $count++;
                                        $first_name = get_from_another_table($row['username'], 'first_name', 'staff');
                                        $last_name = get_from_another_table($row['username'], 'last_name', 'staff');
                                    ?>
                                    <tr>
                                        <td><?php echo $count ?></td>
                                        <td><?php echo $first_name . " " . $last_name ?>
                                        </td>
                                        <td><?php echo $row['username'] ?></td>
                                        <td><?php echo $row['ip_address'] ?></td>
                                        <td><?php echo $row['time'] ?></td>

                                        <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
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
