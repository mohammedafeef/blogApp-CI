<h2><?= $tittle ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('categories/create'); ?>
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name ="name" placeholder="Enter the category name">
  </div>
  <div>
  <button type="submit" class="btn btn-success">submit</button>
  </div>
</form>