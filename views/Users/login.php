<br>
<div class="panel panel-default" style="width: 500px;margin:auto;overflow: hidden;">
  <div class="panel-heading">
    <h3 class="panel-title text-center">სისტემაში შესვლა</h3>
  </div>
  <div class="panel-body">
  <div style="width: 100%;height: 150px;text-align: center;">
    <img src="http://keskia.ge/wp-content/uploads/2017/02/cropped-logo.png" width="150" >
  </div>
  <hr>
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit="setFormSubmitting()">
    	<div class="form-group">
    		<label>ელფოსტა</label>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="E-mail" name="email" value="nimda" aria-describedby="addon0">
          <span class="input-group-addon" id="addon0">@keskia.ge</span>
        </div>
    		<!-- <input type="text" placeholder="E-mail" name="email" value="nimda" class="form-control" /> -->
    	</div>
    	<div class="form-group">
        <label>პაროლი</label>
        <div class="input-group">
          <input type="password" placeholder="Password" name="password" value="nimda" class="form-control" aria-describedby="addon0">
          <span class="input-group-addon" id="addon0"><span class="glyphicon glyphicon-lock"></span></span>
        </div>
        <!-- <input type="password" placeholder="Password" name="password" value="nimda" class="form-control" /> -->
      </div>
      <?php if(isset($_SESSION["login_counter"]) && $_SESSION["login_counter"]>3): ?>
        <div class="form-group">
          <label class="">CAPTCHA - დაამტკიცე რომ შენ ხარ ადამიანი!</label>
          <br>
          <img src="<?php echo ROOT_URL."classes/generatecaptcha.php"; ?>" class="img-rounded" style="width: 100%;height: auto;">
          <hr>
          <input type="text" placeholder="CAPTCHA" name="captcha" class="form-control" />
        </div>
      <?php endif; ?>
      <?php new CSRF(); ?>
      <input class="btn btn-primary btn-xl pull-right" name="submit" type="submit" value="შესვლა"   />
    </form>
  </div>
</div>
