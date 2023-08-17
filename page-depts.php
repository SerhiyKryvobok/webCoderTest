<?php include_once('./header.php'); ?>
    <div class="container">
        <div class="row mt-5">
            <h3>Departments table here!</h3>
        </div>
        <div class="row mt-1">
            <form action="/depts-add" method="POST">
                <div class="form-group d-flex">
                    <input type="text" name="deptname" class="form-control" placeholder="Print department name here to add...">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
        <div class="row mt-1">
            <div class="col-10 mt-3 d-flex justify-content-center">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Departments</th>
                    </thead>
                    <tbody>
                        <?php foreach ($depts_data as $key => $value) { ?>
                        <tr>
                            <td><?php echo $key; ?></td>
                            <td><?php echo $value; ?></td>
                            <td>
                                <form action="/depts-add" method="POST" class="m-0 text-center">
                                    <input type="hidden" name="deptid" value="<?php echo $key; ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>