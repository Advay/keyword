<div class="container">
<div class="col-lg-12 WelcomeUser">
<h1>Welcome <?php echo $data['User']['first_name'].' '.$data['User']['last_name']?></h1>
<div class="col-lg-3 DashboardMenu">

<?php echo $this->element('left_navigation');?>
</div>

<div class="col-lg-9 DashboardName">
<h1>Welcome To Dashboard</h1>
<h3><?php echo $data['Storage']['name'] ?> Storage</h3>
</div>

</div>
</div>