
<?php echo validation_errors(); ?>
<?php echo form_open('users/register');?>
<div class="row">
    <div class="col-md-4 col-md-4 mx-auto">
    <h2 class="text-center"> <?= $tittle ?> </h2>
    <div class="form-group">
        <label >Name</label>
        <input type="text" name="name" class="form-control" plaseholder="name">
    </div>
    <div class="form-group">
        <label >username</label>
        <input type="text" name="username" class="form-control" plaseholder="username">
    </div>
    <div class="form-group">
        <label >Zipcode</label>
        <input type="text" name="zipcode" class="form-control" plaseholder="zipcode">
    </div>
    <div class="form-group">
        <label >email</label>
        <input type="email" name="email" class="form-control" plaseholder="email">
    </div>
    <div class="form-group">
        <label >Password</label>
        <input type="password" name="password" class="form-control" plaseholder="password">
    </div>
    <div class="form-group">
        <label >Confirm Pssword</label>
        <input type="password" name="password2" class="form-control" plaseholder="password2">
    </div>
    <button type="submit" class="btn btn-success btn-block">submit</button>
    </div>
</div>
<?php echo form_close(); ?>