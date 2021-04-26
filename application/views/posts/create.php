<h2><?= $tittle ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('posts/create'); ?>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tittle</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name ="tittle" placeholder="enter the tittle">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Blog content</label>
    <textarea name="body" class="form-control" id="editor1" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="categories">Categories</label>
    <select name="category_id" class="form-control">
    <?phP foreach($categories as $category) :?>
    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
    <?php endforeach ?>
    </select>
  </div>
  <div class="form-group">
      <label for="uploadImage">Upload Image </label>
      <input name="userfile" type="file" size="20"/>
  </div>
  <div>
  <button type="submit" class="btn btn-success">submit</button>
  </div>
</form>