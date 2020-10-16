

  <div class="row">
    <div class="col-lg-6 m-auto">
      <!-- <div class="card m-5"> -->
            <div class="card-header">
              <h2><?= $title; ?></h2>
              <?= validation_errors(); ?>
              <?php if(isset($_GET['post_created'])): ?>
                <div class="alert alert-success" role="alert">Post Successful</div>
              <?php endif; ?>
            </div>
            <div class="card-body">
            <form method="post" action="" class="form-check" enctype="multipart/form-data">
                
              <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" name="title" id="exampleInputEmail1">
              </div>
              <div class="form-group">
                  <label >Body</label>
                  <textarea class="form-control" id="editor1" name="body" rows="5"></textarea>
              </div>
              <div class="form-group">
                <label >Category</label>
                  <select class="form-control" name="category_id">
                      <?php foreach($categories as $cat): ?>
                      <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                      <?php endforeach; ?>
                  </select>
              </div>
              <div class="form-group">
                <label >Upload Image</label>
                <input class="form-control-file" type="file" name="userfile" size="20">
              </div>
              
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Post</button>
            </form>
            </div>
      <!-- </div> -->
    </div>
  </div>
  
