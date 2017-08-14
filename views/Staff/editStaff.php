<script type="text/javascript">$("#editRegistration").addClass("activeMenu");</script>
<link rel="stylesheet" href="<?php echo ROOT_URL.'assets/css/staff_reg.css'; ?>">
<div class="panel panel-default registration-staff" style="width: 1200px;margin:auto;position: relative;">
  <div class="panel-heading">
    მუშა-პერსონალის აღრიცხვის რედაქტირება
  </div>
  <?php Messages::setMsg('მონიშნე ყველა ვინც დღეს არ არის სამუშაო ადგილზე', 'info'); ?>
  
  <div class="panel-body">
      <form method="post" action="<?php echo ROOT_URL.'staff/staffRegistration'; ?>"  onsubmit="setFormSubmitting()">
      <input type="hidden" name="register" value="JHKHklhjsdkj">
        <table class="table table-hover table-bordered text-center">
          <?php  
            $myCSRF = new CSRF;
            $returnToken = $myCSRF->getToken();
            echo "<input type=\"hidden\" name=\"csrf\" value=\"".$returnToken."\">";
            if(sizeof($viewmodel)>0):
          ?>
          <thead>
            <tr>
              <th class="text-center">Firstname</th>
              <th class="text-center">Lastname</th>
              <th class="text-center">Last Activity</th>
              <!-- <th class="text-center" style="display: none;">YES</th> -->
              <th class="text-center">YES</th>
              <th class="text-center">NO</th>
            </tr>
          </thead>
              <tbody>
            <?php
              foreach($viewmodel[0] as $key => $row):
             ?>
                <tr>
                    <div class="form-group">
                      <td style="vertical-align: middle;"><?php echo $row['firstName']; ?></td>
                      <td style="vertical-align: middle;"><?php echo $row['lastName']; ?></td>

                      <td style="vertical-align: middle;"><textarea placeholder="Add comment here" name="data[array<?php echo $key; ?>][comment]"><?php if(isset($_SESSION['regDone'])){echo $row['comment'];}; ?></textarea></td>
                      <td style="vertical-align: middle;"> 
                          <input  type="checkbox" class="checkItYes" name="data[array<?php echo $key; ?>][yes]"  <?php if(!isset($_SESSION['regDone'])){echo 'checked=""';} ?><?php if(isset($row['isnot_absent']) && $row['isnot_absent']==1){echo 'checked=""';} ?> value="<?php echo $row['id']; ?>">
                      </td>
                      <td style="vertical-align: middle;"> 
                          <input class="checkIt" type="checkbox" name="data[array<?php echo $key; ?>][no]"  <?php if(isset($row['isnot_absent']) && $row['isnot_absent']==0){echo 'checked=""';} ?> value="<?php echo $row['id']; ?>">
                      </td>
                    </div>
                </tr>
          <?php 
              endforeach;
            else:
              echo "<h5 class='text-center'>არ არის აქტიური პერსონალი</h5>";
            endif;
           ?>
           <tr>
             <td colspan="4">
              <textarea placeholder="Comment" name="dailyComment"><?php if(isset($_SESSION['regDone'])){echo $viewmodel[1]['text'];}; ?></textarea>
             </td>
           </tr>
              </tbody>
        </table>
      <button type="submit" class="btn btn-success btn-lg" style="float: right;">Submit</button>
    </form>
  </div>
</div>
<?php    
//echo $_GET['id'];
 ?>
<script type="text/javascript">

  var els = document.querySelectorAll(".checkIt")
  for (var i = els.length - 1; i >= 0; i--) {
    els[i].onclick = function(){
      if(this.checked == true){
        this.parentNode.parentNode.querySelector("input[type=checkbox").checked = false;
      }else{
        this.parentNode.parentNode.querySelector("input[type=checkbox").checked = true;
      }
    }
  }

  var elsYs = document.querySelectorAll(".checkItYes")
  for (var i = elsYs.length - 1; i >= 0; i--) {
    elsYs[i].onclick = function(){
      if(this.checked == true){
        this.parentNode.parentNode.querySelectorAll("input[type=checkbox")[1].checked = false;
      }else{
        this.parentNode.parentNode.querySelectorAll("input[type=checkbox")[1].checked = true;
      }
    }
  }


</script>