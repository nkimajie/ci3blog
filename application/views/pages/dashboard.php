<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
  </ol>
</nav>

<div class="container">
    <div class="row">
        <div class="dash_icons m-auto" style=" color: dodgerblue;">
            <div class="img1 text-center mt-3">
                <a href="<?= base_url('posts/create') ?>"><i class="fa fa-plus-circle" style="font-size:6rem;"></i></a>
                <a href="<?= base_url('posts/create') ?>"><h5>NEW POST</h5></a>
            </div>
            <div class="img3 text-center mt-3">
                <a href="<?= base_url('dashboard/post') ?>"><i class="fas fa-comments" style="font-size: 6rem;"></i></a>
                <a href="<?= base_url('dashboard/post') ?>"><h5>ALL POST</h5></a>
            </div>
            <div class="img2 text-center mt-3">
                <a href="<?= base_url('dashboard/category') ?>"><i class="far fa-calendar-plus" style="font-size: 6rem;"></i></a>
                <a href="<?= base_url('dashboard/category') ?>"><h5>CREATE/VIEW CATEGORIES</h5></a>
            </div>
            
          
        </div>
    </div>
</div>

