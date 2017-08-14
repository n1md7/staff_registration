<script type="text/javascript">$("#registration").addClass("activeMenu");</script>
<link rel="stylesheet" href="<?php echo ROOT_URL.'assets/css/staff_reg.css'; ?>">
<div class="panel panel-default registration-staff" style="width: 1200px;margin:auto;position: relative;">
  <div class="panel-heading text-center ">
    მუშა-პერსონალის აღრიცხვა
  </div>
  <?php Messages::setMsg('მონიშნე ყველა ვინც დღეს არ არის სამუშაო ადგილზე', 'info'); ?>
  <?php Messages::setMsg('თუ რამე პრობლემა შეიქმნა უნრალოდ გამოლოგინდი და ისევ შედი :D', 'info'); ?>
  
  <div class="panel-body">
      <form method="post" action="<?php echo ROOT_URL.'staff/staffRegistration'; ?>"  onsubmit="setFormSubmitting()">
      <input type="hidden" name="register" value="JHKHklhjsdkj">
        <table class="table table-hover table-bordered text-center ">
          <?php  
            $myCSRF = new CSRF;
            $returnToken = $myCSRF->getToken();
            echo "<input type=\"hidden\" name=\"csrf\" value=\"".$returnToken."\">";
            if(sizeof($viewmodel)>0):
          ?>
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">სახელი</th>
              <th class="text-center">გვარი</th>
              <th class="text-center">თანამდებობა</th>
              <th class="text-center">კომენტარი</th>
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
                      <td style="vertical-align: middle;" data-id="<?php echo $row['id']; ?>"><?php echo $key+1; ?></td>
                      <td style="vertical-align: middle;"><?php echo $row['firstName']; ?></td>
                      <td style="vertical-align: middle;"><?php echo $row['lastName']; ?></td>
                      <td style="vertical-align: middle;">
                        <?php 
                          foreach($viewmodel[2] as $data):
                            if($data['id'] == $row['jobPost']):
                              echo $data['name'];
                              break;
                            endif;
                          endforeach;
                        ?>
                      </td>

                      <td style="vertical-align: middle;">
                        <textarea class="addComentHere <?php if(strlen($row['comment'])>0)echo 'alert-info'; ?> toKa" placeholder="დაამატე კომენტარი..." name="data[array<?php echo $key; ?>][comment]"><?php if(isset($_SESSION['regDone'])){echo $row['comment'];}; ?></textarea>
                      </td>
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
           ?><tr>
             <td colspan="7">
              <textarea placeholder="საერთო კომენტარი" class="combinedComment <?php if(strlen($viewmodel[1]['text'])>0)echo 'alert-info'; ?> toKa" name="dailyComment"><?php if(isset($_SESSION['regDone'])){
                  echo $viewmodel[1]['text'];}; 
                ?></textarea>
             </td>
           </tr><?php
            else:
              echo "<h5 class='text-center'>არ არის აქტიური პერსონალი</h5>";
            endif;
           ?>
          </tbody>
        </table>
      <button type="submit" class="btn btn-success btn-lg" style="float: right;" <?php if(isset($_SESSION['regDone'])) echo 'disabled=""'; ?>>აღრიცხვა</button>
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