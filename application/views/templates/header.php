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
                    <li class="nav-item create-toggler">
                        <a class="nav-link">CREATE</a>
                        <div class="create-section">
                        <a class="nav-link" href="<?php echo base_url(); ?>posts/create">POST</a>
                        <a class="nav-link" href="<?php echo base_url(); ?>categories/create">CATEGORY</a>
                        </div>
                    <li class="nav-item mx-3"><a href="<?php echo base_url(); ?>about" class="nav-link">ABOUT</a></li>
                </ul>
            </div>

        </div>
    </nav>
    <div class="container">