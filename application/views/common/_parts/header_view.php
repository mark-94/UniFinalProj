<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $pagetitle;?></title>
<link href="<?php echo assets_url('css/bootstrap.min.css');?>" rel="stylesheet">
        <!--<link href="assets/css/bootstrap.min.css" rel="stylesheet">-->
        

        <script src="<?php echo assets_url('js/jquery-1.12.1.min.js')?>"></script>
        <script src="<?php echo assets_url('js/bootstrap.min.js')?>"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-inverse navbar-static-top">
                <div class="container">
                <?php if($this->ion_auth->logged_in()){ ?>                
                    <!-- Drop down button for smaller screen sizes usually phones -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="">Project name</a>
                    </div>
                    
                    <div id="navbar" class="collapse navbar-collapse">
                        <!-- Left-aligned menu buttons -->
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                        <!-- Right-aligned menu buttons -->
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Link</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><?php echo anchor('user/logout', 'Logout');?></li>
                                </ul>
                            </li>
                        </ul>
                    </div>                  
                
                <?php }
                else
                { 
                    echo anchor('user/login', 'Treatment App', array('title' => 'treatmeant app','class' =>'navbar-brand')); 
                } ?>
                </div>
            </nav><!--/.nav-collapse -->
        </header>

