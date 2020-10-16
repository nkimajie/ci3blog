<div class="mt-5 card">
    <h2><?= $post['title']; ?></h2>
    <small class="post-date">Posted On: <?= $post['created_at']; ?></small><br>
    <img class="card-img-top m-auto" src="<?= site_url(); ?>assets/images/posts/<?= $post['postimage'] ?>" style="width: 50%;" alt=""><br><br>
    <div class="post_body">
    <?= $post['body']; ?>
    </div>

</div>

<div class="container">
    <div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card m-5">
            <div class="card-header">
                <h2 class="text-center">Add Comment</h2>
                <?php  if(validation_errors()): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>

                <?php endif; ?>
                <?php
                    if(isset($_GET['comment_submitted'])): ?>
                    <div class="alert alert-success text-center" role="alert">
                        Comment Submited Successfully
                    </div>

                    <?php endif; ?>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('comments/create/'.$post['id']) ?>">
                    <div class="form-group">
                        <label">Name</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label">Email</label>
                        <input class="form-control" type="text" name="email">
                    </div>
                    <div class="form-group">
                        <label >Body</label>
                        <textarea class="form-control" name="body" rows="3"></textarea>
                    </div>
                    <input type="hidden" name="slug" value="<?= $post['slug']; ?>">
                    <button class="btn btn-success">Submit</button>

                </form>
            </div>

        </div>

    </div>
    </div>
</div>

<h2>Comments</h2>
<?php if($comment): ?>
<?php foreach($comment as $comments): ?>

<div class="media border p-3">
  <div class="media-body">
    <h4><?= $comments['name'] ?><small><i>Posted on: <?= $comments['created_at'] ?></i></small></h4>
    <p><?= $comments['body']; ?> </p>
  </div>
</div>
<?php endforeach; ?>
<?php else: ?>
    <h2>No Comment To Display</h2>

<?php endif; ?>