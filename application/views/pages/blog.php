<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
  </ol>
</nav>


<!-- Page Content -->
<div class="container">

 
  <div class="row">
  <?php foreach($posts as $post): ?>
    <div class="col-lg-4 col-sm-6 mb-4">
      <div class="card h-100">
        <a href="<?php echo site_url('/posts/'. $post['slug']); ?>"><img class="card-img-top" src="<?= site_url(); ?>assets/images/posts/<?= $post['postimage'] ?>" alt=""></a>
        <div class="card-body">
        <small class="post-date">Posted On: <?= $post['created_at'] ?><strong> In: <?= $post['name']; ?></strong></small><br>
          <h4 class="card-title">
            <a href="<?php echo site_url('/posts/'. $post['slug']); ?>"><?= $post['title'] ?></a>
          </h4>
          <p class="card-text"><?= word_limiter($post['body'], 15) ?></p>
          <p><a href="<?php echo site_url('/posts/'. $post['slug']); ?>" class="btn btn-primary ">Read More</a></p>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
  <!-- /.row -->

  <!-- Pagination -->
  <!-- <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
    </li>
  </ul>

</div> -->
<!-- /.container -->