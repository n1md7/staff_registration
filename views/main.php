<script type="text/javascript">
/*
  creating Spinner before loading new page
  image dimansions 200x200
*/
  function Spinner(self = this){
    this.create = function(){
      this.img = new Image()
      this.img.src = "<?php echo ROOT_URL.'';?>/assets/img/loading.gif"
      this.img.onload = loadImage
      this.img.onerror = function(){
        console.warn("ERROR: Couldn't download " + self.img.src)
      }
      return this
  }

  var loadImage = function(){
    var doc = document, imgDim = [200, 200]
    doc.body.style.overflow = 'hidden'
    var style, appendStyle = '', styleImg, appendStyleImg = ''
    self.transparentDiv = doc.createElement('div')
    self.transparentImg = doc.createElement('img')
    style = {
      position : 'fixed', width : '100%', height : '100%',
      top : 0, left : 0, 'z-index' : 99999,
      'background-color' : 'rgba(0,0,0,0.4)'
    }
    styleImg = {
      top : (window.innerHeight - imgDim[0]) / 2 + 'px',
      left : (window.innerWidth - imgDim[1]) / 2 + 'px',
      position : 'fixed', 'z-index' : 999999
    }
    for(s in style){ appendStyle += s + ':' + style[s] + ';'}
    for(s in styleImg){ appendStyleImg += s + ':' + styleImg[s] + ';'}
    self.transparentImg.src = self.img.src
    self.transparentDiv.setAttribute('style', appendStyle)
    self.transparentImg.setAttribute('style', appendStyleImg)
    doc.body.appendChild(self.transparentDiv)
    doc.body.appendChild(self.transparentImg)
  }

  this.hide = function(){
    document.body.removeChild(this.transparentImg)
    document.body.removeChild(this.transparentDiv)
    document.body.style.overflow = 'auto'
  }
}
</script>
<!DOCTYPE html>
<html>
<head>
	<title>Kodu-Group</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="<?php echo ROOT_URL.'assets/js/entoka.js'; ?>"></script>
  <link rel="stylesheet" href="<?php echo ROOT_URL.'assets/sweetalerts/dist/sweetalert.css'; ?>">
  <script src="<?php echo ROOT_URL.'assets/sweetalerts/dist/sweetalert-dev.js'; ?>"></script>
  <link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo ROOT_URL.'assets/css/style.css'; ?>">
  <link rel="stylesheet" href="<?php echo ROOT_URL.'assets/css/home_index.css'; ?>">


<script type="text/javascript">
var showSpinner = new Spinner().create()

window.addEventListener("load",function(){
    showSpinner.hide()
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
      <a style="padding-top: 22px;font-weight: bold;" class="navbar-brand" href="<?php echo ROOT_URL; ?>">KODU-GrouP</a>
    </div>
   <ul class="nav navbar-nav">
		<!-- <li data-toggle="tooltip" data-placement="bottom" class="navMenu" id="home" title="Home"><a href="<?php echo ROOT_URL; ?>home/"> მთავარი <span class="glyphicon glyphicon-home"></span></a></li> -->
    <li data-toggle="tooltip" data-placement="bottom" class="navMenu" id="allUsers" title="All Staff"><a href="<?php echo ROOT_URL; ?>staff/showStaff"><?php echo $_SESSION['keyWord_array']['MENU_STAFF']; ?> <span class="fa fa-users" ></span></a></li>
    <li data-toggle="tooltip" data-placement="bottom" class="navMenu" id="registration" title="Registration"><a href="<?php echo ROOT_URL; ?>staff/staffRegistration"><?php echo $_SESSION['keyWord_array']['MENU_REGISTRATION']; ?>  <span class="fa fa-check-square-o"></span></a></li>
    <li data-toggle="tooltip" data-placement="bottom" class="navMenu" id="editRegistration" title="Edit Registration"><a href="<?php echo ROOT_URL; ?>staff/editStaff"> <?php echo $_SESSION['keyWord_array']['MENU_REGISTRATION_CHANGE']; ?> <span class="fa fa-pencil-square-o"></span></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
       <li data-toggle="tooltip"  data-placement="bottom" class="navMenu" title="SESSION is going to be destroyed"><a href=""><span id="sessionTimerBadge" title="" class="badge">5</span></a></li>
    <?php if($_SESSION['is_admin'] && $_SESSION['is_super_admin']): ?>
        <li><a href="#"> <b><?php echo $_SESSION['keyWord_array']['TEXT_SUPER_ADMIN']; ?></b> </a></li>
    <?php elseif($_SESSION['is_admin']): ?>
        <li><a href="#"> <b><?php echo $_SESSION['keyWord_array']['TEXT_BASIC_ADMIN']; ?></b> </a></li>
    <?php else: ?>
        <li><a href="#"> <b><?php echo $_SESSION['keyWord_array']['TEXT_BASIC_USER']; ?></b> </a></li>
    <?php endif; ?>
      <li style="padding-top: 6px;">
        <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $_SESSION['keyWord_array']['MENU_OPTIONS']; ?> <i class="fa fa-cogs" aria-hidden="true"></i>
          <span class="caret"></span></button>
          <ul class="dropdown-menu" style="border-top: 1px solid #ccc;">
            <?php if($_SESSION['is_admin']): ?>
              <li class="navMenu" id="checkout" ><a href="<?php echo ROOT_URL; ?>staff/checkout"> <?php echo $_SESSION['keyWord_array']['TEXT_CHECKOUT']; ?> <span style="font-weight: bold;">₾</span></a></li>
              <li class="navMenu" id="dept" ><a href="<?php echo ROOT_URL; ?>staff/dept"> <?php echo $_SESSION['keyWord_array']['MENU_MAKE_A_LONE']; ?> &#x231b;</a></li>
              <li class="navMenu" id="bonus" ><a href="<?php echo ROOT_URL; ?>staff/bonus"> <?php echo $_SESSION['keyWord_array']['MENU_BONUS']; ?> <i class="glyphicon glyphicon-asterisk"></i></a></li>
            <li class="divider"></li>
              <li class="navMenu" id="category" ><a href="<?php echo ROOT_URL; ?>staff/category"> <?php echo $_SESSION['keyWord_array']['MENU_JOB_POSITION']; ?> <span class="glyphicon glyphicon-tasks"></span></a></li>
            <li class="divider"></li>
              <li class="navMenu" id="addStaff" ><a href="<?php echo ROOT_URL; ?>staff/register"> <?php echo $_SESSION['keyWord_array']['MENU_ADD_STAFF']; ?>  <span class="fa fa-user-plus"></span></a></li>
              <li class="navMenu" id="addNewUser" ><a href="<?php echo ROOT_URL; ?>users/register"> <?php echo $_SESSION['keyWord_array']['MENU_ADD_USER']; ?>  <span class="glyphicon glyphicon-plus"></span></a></li>
            <?php endif; ?>
              <li class="navMenu" id="showUsers" ><a href="<?php echo ROOT_URL; ?>users/show"> <?php echo $_SESSION['keyWord_array']['MENU_SHOW_USERS']; ?>  <span class="fa fa-users" ></a></li>
            <li class="divider"></li>
              <li class="navMenu" id="automation" ><a href="<?php echo ROOT_URL; ?>home/automation"> <?php echo $_SESSION['keyWord_array']['MENU_HOME_AUTOMATION']; ?>  <span class="glyphicon glyphicon-equalizer" ></a></li>
            <li class="divider"></li>
              <li class="navMenu" id="language" ><a href="<?php echo ROOT_URL; ?>users/language"><?php echo $_SESSION['keyWord_array']['MENU_CHANGE_LANGUAGE']; ?>  <span class="glyphicon glyphicon-globe" ></a></li>
            <li class="divider"></li>
            <li data-toggle="tooltip" data-placement="bottom"  title="Log Out"><a href="#" onclick="confirmLogout()"> <?php echo $_SESSION['keyWord_array']['MENU_LOG_OUT']; ?>  <span class="glyphicon glyphicon-log-out"></span></a></li>
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










 






/*attach events for loading spinner*/
var loading = (function(forms, navs){
    forms !== undefined ? 
      forms.forEach(function(element){
        element.addEventListener('submit', function(){
          new Spinner().create()
        })
      })
    : null

    navs !== undefined ? 
      navs.forEach(function(element){
        element.addEventListener('click', function(){
          new Spinner().create()
        })
      })
    : null
  })(document.querySelectorAll('form'), document.querySelectorAll('.navMenu'))

/*end attach events for loading spinner*/

/* SESSION timer */
var alertShowed = false
var offline = false
var timerStr = null
var soundInfo = new Audio('<?php echo ROOT_URL.'assets/sounds/info.mp3';?>')
var ses_check = function() {
  var badge = document.getElementById('sessionTimerBadge')
  $.get("<?php echo ROOT_URL.'classes/session_check.php'; ?>", function(data, status){
    if(status == 'success'){
      var min = parseInt(data / 60)
      var sec = parseInt(data % 60)
      if(min <= 0 && sec <= 0){
        badge.innerHTML = 'offline'
        document.title = 'Expired :('
        offline = true
      }
      if(!offline){
        timerStr = (min<10?'0'+min:min)+':'+(sec<10?'0'+sec:sec)
        badge.innerHTML = timerStr
        if(min <= 0 && alertShowed == false){
          soundInfo.play()
          document.title = 'Expiring ' + timerStr
          swal({
            title: 'SESSION Is Going To Be Die',
            text: '<?php echo $_SESSION['user_data']['name']; ?>, Your SESSION will expire less than a minute, do you want to extend it?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Extend Session",
            cancelButtonText: "Log out",
            closeOnConfirm: false
          }, function(isConfirm){
            if(isConfirm){
              $.get("<?php echo ROOT_URL; ?>", function(data, status){
                if(status == 'success'){
                  if(!offline){
                    swal({
                      title:'SESSION extended',
                      type:'success'
                    })
                    document.title = 'Kodu-Group'
                    alertShowed = false
                  }else{
                    swal({
                      title:'Too late my friend',
                      text:'SESSION has been expired',
                      type:'error'
                    })
                  }
                }else{
                  consloe.warn("AJAX failed")
                }
              })
            }else{
               window.location.href = "<?php echo ROOT_URL.'users/logout';?>";
            }
          })
          alertShowed = true
        }else if(alertShowed){
          document.title = 'Expiring ' + timerStr
        }
      }
    }
  });
};


function sesTimer(){
  new ses_check()
  setTimeout(sesTimer, 1000)
}sesTimer()

/*end session timer*/



</script>
<!-- <script type="text/javascript" src="//www.browsealoud.com/plus/scripts/ba.js"></script> -->
</body>
</html>
