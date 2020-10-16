<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CI3 Blog</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.css.js"></script>
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a551bd7de4.js" crossorigin="anonymous"></script>
</head> 
<body> 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
  <a class="navbar-brand" href="<?= base_url(); ?>">CodeIgniter 3 Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    
    <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
    <?php foreach($head as $cat): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('categories/posts/'.$cat['id']); ?>"><?= $cat['name']; ?><span class="sr-only">(current)</span></a>
      </li>
      <?php endforeach; ?>
     
    </ul>
    <?php if($this->session->userdata('isLoggedIn')): ?>
      <span class="navbar-text">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('users/logout') ?>">Log Out</a>
      </li>
    </ul>
    </span>
    <?php else: ?>
      <span class="navbar-text">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('users/login') ?>">LogIn</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('users/register') ?>">Register</a>
      </li>
    </ul>
    </span>
    <?php endif; ?>
    
  </div>

  
</nav>



<div class="container">