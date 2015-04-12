<?php  //error_reporting(0); ?>
  <div id="head-nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="fa fa-gear"></span>
        </button>
        <a class="navbar-brand" href="#"><span>ICRAF INTERN MANAGEMENT & CAPACITY BUILDING INFORMATION SYSTEM </span></a>
      </div>

      <div class="navbar-collapse ">

       <?php  if( strpos($_SERVER['REQUEST_URI'],'index.php')){
          ?>
            <ul class="nav navbar-nav">
       
          <li ><a href="<?php echo base_url(); ?>">Home</a></li>
          <li class="active"><a href="<?php echo base_url('index.php/user'); ?>">Dashboard</a></li>

        </ul>
    <?php   

        } 
        else { ?>
        <ul class="nav navbar-nav">
       
          <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
          <li><a href="<?php echo base_url('index.php/user'); ?>">Dashboard</a></li>

        </ul>

        <?php } ?>
<?php if (strlen($profile['0']['username']) > 1 ){ ?>
        <ul class="nav navbar-nav navbar-right user-nav">
      <li class="dropdown profile_menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img alt="" src="<?php echo $profile['0']['user_avatar'];?>" height="40px" /><?php echo $profile['0']['username'] ;?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="">My Account</a></li>
          <li><a href="">Profile</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo base_url('index.php/user/logout') ;?>">Sign Out</a></li>
        </ul>
      </li>
    </ul>     
<?php } ?>

      </div><!--/.nav-collapse -->
    </div>
  </div>
