<?php echo form_open('users/login'); ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 mx-auto">
            <h2 class="text-center"><?= $tittle ?></h2>
            <div class="form-group">
                <input type="text" name="username" class="form-control"
                placeholder="Enter username" required autofocus>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control"
                placeholder="Enter password" required autofocus>
            </div>
            <button type="submit" class="btn btn-success btn-block">Login</button>
        </div>
    </div>
<?php echo form_close(); ?>