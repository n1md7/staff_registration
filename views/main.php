<!DOCTYPE html>
<html>
<head>
	<title>ქესკია</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="<?php echo ROOT_URL.'assets/js/entoka.js'; ?>"></script>
  <link rel="stylesheet" href="<?php echo ROOT_URL.'assets/sweetalerts/dist/sweetalert.css'; ?>">
  <script src="<?php echo ROOT_URL.'assets/sweetalerts/dist/sweetalert.min.js'; ?>"></script>
  <script src="<?php echo ROOT_URL.'assets/sweetalerts/dist/sweetalert-dev.js'; ?>"></script>
  <link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo ROOT_URL.'assets/css/style.css'; ?>">
  <link rel="stylesheet" href="<?php echo ROOT_URL.'assets/css/home_index.css'; ?>">


 <script type="text/javascript">
 window.addEventListener("load",function(){
   // swal("Here's a message!")
 });
 </script>
</head>
<body style="padding: 0;">
<!-- <nav class="navbar navbar-default navbar-fixed-top"> -->
<?php if(isset($_SESSION['is_logged_in'])): ?>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a style="padding-top: 22px;font-weight: bold;" class="navbar-brand" href="<?php echo ROOT_URL; ?>">ქესკია</a>
    </div>
   <ul class="nav navbar-nav">
		<li data-toggle="tooltip" data-placement="bottom" class="navMenu" id="home" title="Home"><a href="<?php echo ROOT_URL; ?>home/"> მთავარი <span class="glyphicon glyphicon-home"></span></a></li>
		<li data-toggle="tooltip" data-placement="bottom" class="navMenu" id="allUsers" title="All Staff"><a href="<?php echo ROOT_URL; ?>staff/showStaff"> პერსონალი <span class="fa fa-users" ></span></a></li>
		<li data-toggle="tooltip" data-placement="bottom" class="navMenu" id="registration" title="Registration"><a href="<?php echo ROOT_URL; ?>staff/staffRegistration"> აღრიცხვა <span class="fa fa-check-square-o"></span></a></li>
		<li data-toggle="tooltip" data-placement="bottom" class="navMenu" id="editRegistration" title="Edit Registration"><a href="<?php echo ROOT_URL; ?>staff/editStaff"> შეცვლა <span class="fa fa-pencil-square-o"></span></a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php if($_SESSION['is_admin']): ?>
        <li><a href="#"> <b>ადმინისტრატორი</b> </a></li>
    <?php else: ?>
        <li><a href="#"> <b>მომხმარებელი</b> </a></li>
  	<?php endif; ?>
      <li style="padding-top: 6px;">
        <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">ოფციები <i class="fa fa-cogs" aria-hidden="true"></i>
          <span class="caret"></span></button>
          <ul class="dropdown-menu" style="border-top: 1px solid #ccc;">
            <?php if($_SESSION['is_admin']): ?>
              <li class="navMenu" id="checkout" ><a href="<?php echo ROOT_URL; ?>staff/checkout"> ანგარიშსწორება <span style="font-weight: bold;">₾</span></a></li>
              <li class="navMenu" id="dept" ><a href="<?php echo ROOT_URL; ?>staff/dept"> ავანსად გაცემა &#x231b;</a></li>
              <li class="navMenu" id="bonus" ><a href="<?php echo ROOT_URL; ?>staff/bonus"> ბონუსები <i class="glyphicon glyphicon-asterisk"></i></a></li>
            <li class="divider"></li>
              <li class="navMenu" id="category" ><a href="<?php echo ROOT_URL; ?>staff/category"> თანამდებობა <span class="glyphicon glyphicon-tasks"></span></a></li>
            <li class="divider"></li>
              <li class="navMenu" id="addStaff" ><a href="<?php echo ROOT_URL; ?>staff/register"> პერსონალის დამატება <span class="fa fa-user-plus"></span></a></li>
              <li class="navMenu" id="addNewUser" ><a href="<?php echo ROOT_URL; ?>users/register"> მომხმარებლის დამატება <span class="glyphicon glyphicon-plus"></span></a></li>
            <?php endif; ?>
              <li class="navMenu" id="showUsers" ><a href="<?php echo ROOT_URL; ?>users/show"> მომხმარებლები <span class="fa fa-users" ></a></li>
            <li class="divider"></li>
              <li class="navMenu" id="automation" ><a href="<?php echo ROOT_URL; ?>home/automation"> სახლის ავტომატიზაცია <span class="glyphicon glyphicon-equalizer" ></a></li>
            <li class="divider"></li>
            <li data-toggle="tooltip" data-placement="bottom"  title="Log Out"><a href="#" onclick="confirmLogout()"> გამოსვლა <span class="glyphicon glyphicon-log-out"></span></a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>
<?php endif; ?>


<div class="container-fluid background-staff" style="overflow: hidden; padding:20px 10px 20px 10px;background:rgb(249,249,249); width: 100%;height: auto;min-height: 500px;">
	<!-- <div class="well"> -->
    <?php Messages::display(); ?>
    <?php require($view); ?>
	<!-- </div> -->
</div>
<footer class="footer" style="background-color: rgba(245,245,245,1);padding: 40px;">
  <div class="container" >
    <p class="text-muted">© 2017 KESKIA.GE ALL RIGHTS RESERVED</p>
  </div>
</footer>
<script type="text/javascript" src="<?php echo ROOT_URL; ?>assets/js/forbtjq.js"></script>
<script type="text/javascript" src="<?php echo ROOT_URL; ?>assets/js/restricLoad.js"></script>

<script type="text/javascript">
  function confirmLogout(){
    swal({
    title: "არსებული სესიის განადგურება",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "განადგურება",
    closeOnConfirm: false
  },
  function(){
    window.location.href = "<?php echo ROOT_URL.'users/logout';?>";
  });
  }
</script>

</body>
</html>
