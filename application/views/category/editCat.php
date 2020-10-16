<div class="row mt-5">
    
    <div class="col-lg-6 m-auto">

    <div class="card-header">
    <h2><?= $title ?></h2>
    </div>
    <div class="card-body">
    <form action="" method="post">
        <?php if(validation_errors()): ?>
            <div class="alert alert-warning" role="alert"><?= validation_errors() ?></div>
        <?php endif; ?>

    <div class="form-group">
        <input type="hidden" name="id" value="<?= $post['id']; ?>">
        <input class="form-control" type="text" value="<?= $post['name']; ?>" name="name">
    </div>
    <button class="btn btn-primary">Update</button>
    </form>
    
    </div>
    
    </div>