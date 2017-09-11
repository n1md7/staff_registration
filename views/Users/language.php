<script type="text/javascript">$("#language").addClass("activeMenu");</script>
<div class="panel panel-default" style="width: 700px;margin:auto;">
  <div class="panel-heading text-center">
   <span>Choose Your Language</span>
  </div>
  <div class="panel-body">
  <form style="width: 50%;margin: auto;text-align: center;" method="post" action="<?php echo ROOT_URL.'users/language';/*/hide';*/ ?>">
    <select name="lang" class="btn btn-default btn-sm">
    <?php foreach ($viewmodel as $key => $value): ?>
      <option <?php if($_SESSION['user_data']['lang'] == $value['id'])echo 'selected=""'; ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
    <?php endforeach; ?>
    </select>
    <button class="btn btn-warning btn-sm">Save</button>
  </form>
  </div>
</div>
<br>
<div class="panel panel-default" style="width: 700px;margin:auto;">
  <div class="panel-heading text-center">
   <span>SESSION Expiring Time</span>
  </div>
  <div class="panel-body">
  <form style="width: 50%;margin: auto;">
  <div class="input-group" style="width: 50%;float: left;">
    <span class="input-group-addon">Hour: </span>
    <input type='number' class="form-control" min="1" max="24" style="border-bottom-right-radius: 0px;border-top-right-radius: 0px;">
  </div>
  <div class="input-group" style="width: 50%;float: left;">
    <input type='number' class="form-control" min="1" max="24" style="border-bottom-left-radius: 0px;border-top-left-radius: 0px;">
    <span class="input-group-addon">Minute: </span>
  </div>
  <br><br>
    <button class="btn btn-sm btn-warning form-control">Save</button>
  </form>
  </div>
</div>
 

<?php

 ?>