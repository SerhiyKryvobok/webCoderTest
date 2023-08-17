<?php include_once('./header.php'); ?>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <h3><?php echo $page_title; ?></h3>
            <div class="col-12 mt-3 mb-5 d-flex justify-content-center">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Notes</th>
                        <th>Department</th>
                    </thead>
                    <tbody>
                        <?php foreach ($dbdata as $user) { ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['adress']; ?></td>
                            <td><?php echo $user['tel']; ?></td>
                            <td><?php echo $user['notes']; ?></td>
                            <td><?php echo $user['dep']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>