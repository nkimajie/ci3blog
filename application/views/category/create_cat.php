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
        <?php if(isset($_GET['success'])): ?>
            <div class="alert alert-success" role="alert">Category Created</div>
        <?php endif; ?>
    <div class="form-group">
        <input class="form-control" type="text" name="name">
    </div>
    <button class="btn btn-primary">Create</button>
    </form>
    
    </div>
    
    </div>

</div>

<div class="">
    <div class="row">
        <div class="col">
            <div class="card m-5">
                <div class="card-header">
                    <h2 class="text-center text-dark"><?= $display_title; ?></h2>
                    <?php if(isset($_GET['deleted'])): ?>
                        <div class="alert alert-danger text-center" role="alert">Category Deleted</div>
                    <?php endif; ?>
                    <?php if(isset($_GET['edit_success'])): ?>
                        <div class="alert alert-success text-center" role="alert">Category Edited</div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>S/N</th>
                            <th>Categoiers</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>

                        <?php $i = 1; foreach($categories as $cat): ?>

                            <tbody>
                                <td><?= $i++ ?></td>
                                <td><?= $cat['name'] ?></td>
                                <td><a href="<?= base_url('category/edit/') ?><?= $cat['id'] ?>" class="btn btn-primary">Edit</a></td>
                                <td><a href="<?= base_url('category/delete/') ?><?= $cat['id'] ?>" class="btn btn-danger">Delete</a></td>
                            </tbody>

                        <?php endforeach; ?>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>

