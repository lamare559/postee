<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
    <title>POSTEE CRUD APP</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#">POSTEE</a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <?php if(!$this->session->userdata('logged_in')): ?>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-value="page-top" href="<?php echo base_url(); ?>users/register">Sign Up</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-value="service" href="<?php echo base_url(); ?>users/login">Sign In</a>
                    </li>
                    <?php endif; ?>
                    <?php if($this->session->userdata('logged_in')): ?>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-value="service" href="<?php echo base_url(); ?>posts/index">Home</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-value="service" href="<?php echo base_url(); ?>posts/myposts">MyPosts</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-value="service" href="<?php echo base_url(); ?>posts/create">Create Post</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-value="service" href="<?php echo base_url(); ?>users/logout">Sign Out</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1 justify-content-end">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-uppercase" data-value="service" href="#"><?php echo $this->session->userdata('username'); ?></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php if($this->session->flashdata('post_created')): ?>
        <p class="alert alert-success"><?php echo $this->session->flashdata('post_created'); ?></p>
    <?php endif; ?>

    <?php if($this->session->flashdata('post_updated')): ?>
        <p class="alert alert-success"><?php echo $this->session->flashdata('post_updated'); ?></p>
    <?php endif; ?>

    <?php if($this->session->flashdata('signup')): ?>
        <p class="alert alert-success"><?php echo $this->session->flashdata('signup'); ?></p>
    <?php endif; ?>

    <?php if($this->session->flashdata('signin')): ?>
        <p class="alert alert-success"><?php echo $this->session->flashdata('signin'); ?></p>
    <?php endif; ?>

    <?php if($this->session->flashdata('login_failed')): ?>
        <p class="alert alert-danger"><?php echo $this->session->flashdata('login_failed'); ?></p>
    <?php endif; ?>

    <?php if($this->session->flashdata('logout')): ?>
        <p class="alert alert-success"><?php echo $this->session->flashdata('logout'); ?></p>
    <?php endif; ?>

    <?php if($this->session->flashdata('post_deleted')): ?>
        <p class="alert alert-success"><?php echo $this->session->flashdata('post_deleted'); ?></p>
    <?php endif; ?>
