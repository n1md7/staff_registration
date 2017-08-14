<script type="text/javascript">$("#addNewUser").addClass("activeMenu");</script>
<div class="panel panel-default" style="width: 500px;margin:auto;">
  <div class="panel-heading">
    <h3 class="panel-title">მომხმარებლის რეგისტრაცია</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit="setFormSubmitting()">
    	<div class="form-group">
    		<label>სახელი</label>
    		<input type="text" name="name" placeholder="Name" class="form-control toKa" autocomplete="off" />
    	</div>
    	<div class="form-group">
    		<label>ელფოსტა</label>
    		<input type="text" name="email" placeholder="Email" class="form-control toKa" autocomplete="off" />
    	</div>
    	<div class="form-group">
            <label>პაროლი</label>
            <input type="password" name="password" placeholder="Password"  class="form-control" autocomplete="off" />
        </div>
        <div class="form-group">
            <label>გაიმეორე პაროლი</label>
            <input type="password" name="passwordre" placeholder="Re-type password" class="form-control" autocomplete="off" />
        </div>
        <div class="form-group">
            <label>იყოს ადმინისტრატორი?</label><br>
            <label class="radio-inline">
                <input type="radio" name="is_admin" value="1">დიახ
            </label>
            <label class="radio-inline">
                <input type="radio" name="is_admin" value="2">არა
            </label>
        </div>
        <?php new CSRF(); ?>
    	<input class="btn btn-primary form-control" name="submit" type="submit" value="Submit" />
    </form>
  </div>
</div>