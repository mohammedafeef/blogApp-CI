<html>
    <head>
        <link rel="stylesheet" href="https://bootswatch.com/4/journal/bootstrap.min.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/journal/bootstrap.min.css" integrity="sha384-QDSPDoVOoSWz2ypaRUidLmLYl4RyoBWI44iA5agn6jHegBxZkNqgm2eHb6yZ5bYs" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/style.css">
    </head>
    <body>
    <nav class="navbar navbar-inverse navbar-dark bg-dark">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url();?>">codinghomo</a>
            </div>
            <div class="navbar-nav d-inline-flex" id="navbar" >
                <ul class='navbar mr-auto list-unstyled'>
                    <li class="nav-item mx-3"><a href="<?php echo base_url(); ?>/" class="nav-link">HOME</a></li>
                    <li class="nav-item mx-3"><a href="<?php echo base_url(); ?>posts" class="nav-link">POSTS</a></li>
                    <li class="nav-item mx-3"><a href="<?php echo base_url(); ?>categories" class="nav-link">CATEGORIES</a></li>
                    <li class="nav-item mx-3"><a href="<?php echo base_url(); ?>about" class="nav-link">ABOUT</a></li>
                    <?php if(!$this->session->userdata('logged_in')): ?>
                    <li class="nav-item mx-3"><a href="<?php echo base_url(); ?>users/register" class="nav-link">SIGN-UP</a></li>
                    <li class="nav-item mx-3"><a href="<?php echo base_url(); ?>users/login" class="nav-link">LOG-IN</a></li>
                    <?php endif; ?>
                    <?php if($this->session->userdata('logged_in')): ?>
                    <li class="nav-item create-toggler">
                        <a class="nav-link">CREATE</a>
                        <div class="create-section">
                        <a class="nav-link" href="<?php echo base_url(); ?>posts/create">POST</a>
                        <a class="nav-link" href="<?php echo base_url(); ?>categories/create">CATEGORY</a>
                        </div>
                    </li>
                    <li class="nav-item mx-3"><a href="<?php echo base_url(); ?>users/logout" class="nav-link">LOGOUT</a></li>
                    <?php endif; ?>
                </ul>
            </div>

        </div>
    </nav>
    <div class="container">
    <!-- flash msg -->
        <?php if($this->session->flashdata('user_registered')): ?>
            <p class='alert alert-success'>
            <?php echo $this->session->
            flashdata('user_registered');unset($_SESSION['user_registered']); ?></p>
        <?php endif; ?>
        <?php if($this->session->flashdata('post_created')): ?>
            <p class='alert alert-success'>
            <?php echo $this->session->
            flashdata('post_created');unset($_SESSION['post_created']); ?></p>
        <?php endif; ?>
        <?php if($this->session->flashdata('post_updated')): ?>
            <p class='alert alert-success'>
            <?php echo $this->session->
            flashdata('post_updated');unset($_SESSION['post_updated']); ?></p>
        <?php endif; ?>
        <?php if($this->session->flashdata('post_deleted')): ?>
            <p class='alert alert-success'>
            <?php echo $this->session->
            flashdata('post_deleted');unset($_SESSION['post_deleted']); ?></p>
        <?php endif; ?>
        <?php if($this->session->flashdata('user_login')): ?>
            <p class='alert alert-success'>
            <?php echo $this->session->
            flashdata('user_login');unset($_SESSION['user_login']); ?></p>
        <?php endif; ?>
        <?php if($this->session->flashdata('user_login_failed')): ?>
            <p class='alert alert-success'>
            <?php echo $this->session->
            flashdata('user_login_failed');unset($_SESSION['user_login_failed']); ?></p>
        <?php endif; ?>
        <?php if($this->session->flashdata('user_logedout')): ?>
            <p class='alert alert-success'>
            <?php echo $this->session->
            flashdata('user_logedout');unset($_SESSION['user_logedout']); ?></p>
        <?php endif; ?>
