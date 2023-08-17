<?php include_once('./header.php'); ?>
    <div class="container">
        <div class="row mt-5">
            <h3><?php echo $page_title; ?></h3>
            <div class="col-md-8 mt-3 d-flex justify-content-center">
                <form action="/add-user-new" method="POST" class="w-100">
                    <div class="form-group m-2">
                        <label for="username">User name:</label>
                        <input id="username" type="text" name="username" class="form-control" placeholder="Write user name here..." required>
                    </div>
                    <div class="form-group m-2">
                        <label for="useremail">User email:</label>
                        <input id="useremail" type="email" name="useremail" class="form-control" placeholder="Write user email here..." required>
                    </div>
                    <div class="form-group m-2">
                        <label for="useraddress">User address:</label>
                        <input id="useraddress" type="text" name="useraddress" class="form-control" placeholder="Write user address here...">
                    </div>
                    <div class="form-group m-2">
                        <label for="usertel">User telephone:</label>
                        <input id="usertel" type="text" name="usertel" class="form-control" placeholder="(000)000-00-00">
                    </div>
                    <div class="form-group m-2">
                        <label for="usernotes">Some notes:</label>
                        <input id="usernotes" type="text" name="usernotes" class="form-control" placeholder="Write short notes here...">
                    </div>
                    <div class="form-group m-2 d-flex justify-content-between">
                        <label for="userdept">User department:</label>
                        <select name="userdept" id="userdept" style="background: #fff; border: 1px solid blue; width: 50%;">
                            <?php foreach ($depts_data as $key => $value) {?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add new user</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>