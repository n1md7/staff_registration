<script type="text/javascript">$("#allUsers").addClass("activeMenu");</script>
<?php 
$myCSRF = new CSRF;
$returnToken = $myCSRF->getToken();
?>
<div class="panel panel-default" style="width: 1000px;margin:auto;">
  <div class="panel-heading">
    <h3 class="panel-title text-center" style="vertical-align: middle;"><a style="float:left;" href="<?php echo ROOT_URL; ?>staff/showStaff"><span class="glyphicon glyphicon-menu-left"></span> უკან</a><b><?php echo $viewmodel[0]["firstName"]." ".$viewmodel[0]["lastName"]; ?>-ს მონაცემები</b></h3>
    <input type="hidden" id="userId" value="<?php echo $viewmodel[0]['id']; ?>">
  </div>
  <div class="panel-body" style="box-sizing: border-box;">
   <table class="table table-hover table-bordered">
    <tbody>
      <tr>
        <td class="text-right" style="width: 50%;vertical-align: middle;">სახელი:</td>
        <?php if($_SESSION['is_admin'] == False): ?>
          <td><?php echo $viewmodel[0]["firstName"]; ?></td>
        <?php else: ?>  
          <td>
            <div style="width: 70%;float: left;">
              <input type="text" disabled="" value="<?php echo $viewmodel[0]['firstName']; ?>" class="form-control dataIn" name="firstName">
            </div>
            <div style="width: 30%;float: left;padding-left: 5px;">
              <input type="button" class="btn btn-primary edit" value="Edit" name="" onclick="enableButtons(this)">
              <input type="button" class="btn btn-success update" value="Update" disabled="" onclick="updateData(this)" name="">
            </div>
          </td>
        <?php endif; ?>  
      </tr>
      <tr>
        <td class="text-right" style="vertical-align: middle;">გვარი:</td>
        <?php if($_SESSION['is_admin'] == False): ?>
          <td><?php echo $viewmodel[0]["lastName"]; ?></td>
        <?php else: ?>  
          <td>
            <div style="width: 70%;float: left;">
              <input type="text" disabled="" value="<?php echo $viewmodel[0]['lastName']; ?>" class="form-control dataIn" name="lastName">
            </div>
            <div style="width: 30%;float: left;padding-left: 5px;">
              <input type="button" class="btn btn-primary edit" value="Edit" name="" onclick="enableButtons(this)">
              <input type="button" class="btn btn-success update" value="Update" disabled="" onclick="updateData(this)" name="">
            </div>
          </td>
        <?php endif; ?>  
      </tr>
      <tr>
        <td class="text-right" style="vertical-align: middle;">მამის სახელი:</td>
        <?php if($_SESSION['is_admin'] == False): ?>
          <td><?php echo $viewmodel[0]["fathersName"]; ?></td>
        <?php else: ?>  
          <td>
            <div style="width: 70%;float: left;">
              <input type="text" disabled="" value="<?php echo $viewmodel[0]['fathersName']; ?>" class="form-control dataIn" name="fathersName">
            </div>
            <div style="width: 30%;float: left;padding-left: 5px;">
              <input type="button" class="btn btn-primary edit" value="Edit" name="" onclick="enableButtons(this)">
              <input type="button" class="btn btn-success update" value="Update" disabled="" onclick="updateData(this)" name="">
            </div>
          </td>
        <?php endif; ?>  
      </tr>
      <tr>
        <td class="text-right" style="vertical-align: middle;">პირადი ნომერი:</td>
        <?php if($_SESSION['is_admin'] == False): ?>
          <td><?php echo $viewmodel[0]["personalNumber"]; ?></td>
        <?php else: ?>  
          <td>
            <div style="width: 70%;float: left;">
              <input type="number" disabled="" value="<?php echo $viewmodel[0]['personalNumber']; ?>" class="form-control dataIn" name="personalNumber">
            </div>
            <div style="width: 30%;float: left;padding-left: 5px;">
              <input type="button" class="btn btn-primary edit" value="Edit" name="" onclick="enableButtons(this)">
              <input type="button" class="btn btn-success update" value="Update" disabled="" onclick="updateData(this)" name="">
            </div>
          </td>
        <?php endif; ?>  
      </tr>
      <tr>
        <td class="text-right" style="vertical-align: middle;">დაბადების თარიღი:</td>
        <?php if($_SESSION['is_admin'] == False): ?>
          <td><?php echo $viewmodel[0]["dateOfBirth"]; ?></td>
        <?php else: ?>  
          <td>
            <div style="width: 70%;float: left;">
              <input type="date" disabled="" value="<?php echo $viewmodel[0]['dateOfBirth']; ?>" class="form-control dataIn" name="dateOfBirth">
            </div>
            <div style="width: 30%;float: left;padding-left: 5px;">
              <input type="button" class="btn btn-primary edit" value="Edit" name="" onclick="enableButtons(this)">
              <input type="button" class="btn btn-success update" value="Update" disabled="" onclick="updateData(this)" name="">
            </div>
          </td>
        <?php endif; ?>  
      </tr>
      <tr>
        <td class="text-right" style="vertical-align: middle;">მობ. ნომერი:</td>
        <?php if($_SESSION['is_admin'] == False): ?>
          <td><?php echo $viewmodel[0]["phoneNumber"]; ?></td>
        <?php else: ?>  
          <td>
            <div style="width: 70%;float: left;">
              <input type="number" disabled="" value="<?php echo $viewmodel[0]['phoneNumber']; ?>" class="form-control dataIn" name="phoneNumber">
            </div>
            <div style="width: 30%;float: left;padding-left: 5px;">
              <input type="button" class="btn btn-primary edit" value="Edit" name="" onclick="enableButtons(this)">
              <input type="button" class="btn btn-success update" value="Update" disabled="" onclick="updateData(this)" name="">
            </div>
          </td>
        <?php endif; ?>  
      </tr>
      <tr>
        <td class="text-right" style="vertical-align: middle;">ელ-ფოსტა:</td>
        <?php if($_SESSION['is_admin'] == False): ?>
          <td><?php echo $viewmodel[0]["email"]; ?></td>
        <?php else: ?>  
          <td>
            <div style="width: 70%;float: left;">
              <input type="email" disabled="" value="<?php echo $viewmodel[0]['email']; ?>" class="form-control dataIn" name="email">
            </div>
            <div style="width: 30%;float: left;padding-left: 5px;">
              <input type="button" class="btn btn-primary edit" value="Edit" name="" onclick="enableButtons(this)">
              <input type="button" class="btn btn-success update" value="Update" disabled="" onclick="updateData(this)" name="">
            </div>
          </td>
        <?php endif; ?>  
      </tr>
      <tr>
        <td class="text-right" style="vertical-align: middle;">საკონტაქტო პირის ნომერი:</td>
        <?php if($_SESSION['is_admin'] == False): ?>
          <td><?php echo $viewmodel[0]["contactNumber"]; ?></td>
        <?php else: ?>  
          <td>
            <div style="width: 70%;float: left;">
              <input type="number" disabled="" value="<?php echo $viewmodel[0]['contactNumber']; ?>" class="form-control dataIn" name="contactNumber">
            </div>
            <div style="width: 30%;float: left;padding-left: 5px;">
              <input type="button" class="btn btn-primary edit" value="Edit" name="" onclick="enableButtons(this)">
              <input type="button" class="btn btn-success update" value="Update" disabled="" onclick="updateData(this)" name="">
            </div>
          </td>
        <?php endif; ?>  
      </tr>
      <tr>
        <td class="text-right" style="vertical-align: middle;">მოქალაქეობა:</td>
        <?php if($_SESSION['is_admin'] == False): ?>
          <td><?php echo $viewmodel[0]["residence"]; ?></td>
        <?php else: ?>  
          <td>
            <div style="width: 70%;float: left;">
              <input type="text" disabled="" value="<?php echo $viewmodel[0]['residence']; ?>" class="form-control dataIn" name="residence">
            </div>
            <div style="width: 30%;float: left;padding-left: 5px;">
              <input type="button" class="btn btn-primary edit" value="Edit" name="" onclick="enableButtons(this)">
              <input type="button" class="btn btn-success update" value="Update" disabled="" onclick="updateData(this)" name="">
            </div>
          </td>
        <?php endif; ?>  
      </tr>
      <tr>
        <td class="text-right" style="vertical-align: middle;">თანამდებობა:</td>
        <?php if($_SESSION['is_admin'] == False): ?>
          <td><?php echo $viewmodel[0]["jobPost"]; ?></td>
        <?php else: ?>  
          <td>
            <div style="width: 70%;float: left;">
              <select  disabled="" class="form-control dataIn" name="jobPost">
                <optgroup label="არჩეულია">
                  <option selected="" value="<?php echo $viewmodel[1]['id']; ?>"><?php echo $viewmodel[1]['name']; ?></option>                
                </optgroup>
                <optgroup label="თანამდებობები">
              <?php 
                foreach ($viewmodel[2] as $key => $value):
              ?>
                <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>                
              <?php    
                endforeach;
              ?>
                </optgroup>
            </select>
            </div>
            <div style="width: 30%;float: left;padding-left: 5px;">
              <input type="button" class="btn btn-primary edit" value="Edit" name="" onclick="enableButtons(this)">
              <input type="button" class="btn btn-success update" value="Update" disabled="" onclick="updateData(this)" name="">
            </div>
          </td>
        <?php endif; ?>  
      </tr>
      <tr>
        <td class="text-right" style="vertical-align: middle;">სქესი:</td>
        <?php if($_SESSION['is_admin'] == False): ?>
          <td><?php echo $viewmodel[0]["gender"]; ?></td>
        <?php else: ?>  
          <td>
            <div style="width: 70%;float: left;">
              <select  disabled="" class="form-control dataIn" name="gender">
              <?php 
                if($viewmodel[0]['gender']==1):
                    $gender = "Male";
                else:
                    $gender = "Female";
                  endif;
              ?>
                <option value="<?php echo $viewmodel[0]['gender']; ?>" selected=""><?php echo $gender; ?></option>                
                <option value="1">მამრობითი</option>                
                <option value="2">მდედრობითი</option>                
            </select>
            </div>
            <div style="width: 30%;float: left;padding-left: 5px;">
              <input type="button" class="btn btn-primary edit" value="Edit" name="" onclick="enableButtons(this)">
              <input type="button" class="btn btn-success update" value="Update" disabled="" onclick="updateData(this)" name="">
            </div>
          </td>
        <?php endif; ?>  
      </tr>
      <tr>
        <td class="text-right" style="vertical-align: middle;">კომენტარი:</td>
        <?php if($_SESSION['is_admin'] == False): ?>
          <td><?php echo $viewmodel[0]["comment"]; ?></td>
        <?php else: ?>  
          <td>
            <div style="width: 70%;float: left;">
              <textarea style="resize: vertical;" disabled="" name="comment" class="form-control dataIn"><?php echo $viewmodel[0]['comment']; ?></textarea>
            </div>
            <div style="width: 30%;float: left;padding-left: 5px;">
              <input type="button" class="btn btn-primary edit" value="Edit" name="" onclick="enableButtons(this)">
              <input type="button" class="btn btn-success update" value="Update" disabled="" onclick="updateData(this)" name="">
            </div>
          </td>
        <?php endif; ?>  
      </tr>

    </tbody>
  </table>
  <tr>
  <div>
    <?php if($_SESSION['is_admin'] == true): ?>
     <?php if($viewmodel[0]['active'] == 1): ?>
      <form method="post" action="<?php echo ROOT_URL.'staff/showStaff/'; ?>">
        <input type="hidden" name="deactivateID" value="<?php echo $viewmodel[0]['id']; ?>">
        <?php echo "<input type=\"hidden\" name=\"csrf\" value=\"".$returnToken."\">"; ?> 
        <button class="btn btn-danger btn-lg" style="float: right;">პერსონალის დეაქტივირება <?php //echo $viewmodel[0]['firstName']; ?></button>
      </form>
      <?php else: ?>  
      <form method="post" action="<?php echo ROOT_URL.'staff/showStaff/'; ?>">
        <input type="hidden" name="deactivateID" value="<?php echo $viewmodel[0]['id']; ?>">
        <?php echo "<input type=\"hidden\" name=\"csrf\" value=\"".$returnToken."\">"; ?> 
        <button class="btn btn-success btn-lg" style="float: right;">პერსონალის აქტივირება <?php //echo $viewmodel[0]['firstName']; ?></button>
      </form>
      <?php endif; ?>  
    <?php endif; ?>  
  </div>
  </tr>
  </div>
</div>

<script type="text/javascript">
  function enableButtons(element){
    var myEl = element.parentElement.parentElement.getElementsByClassName('dataIn')[0];
    var myElUpdate = element.parentElement.parentElement.getElementsByClassName('update')[0];
    element.setAttribute("disabled","");
    myEl.removeAttribute("disabled");
    myEl.focus();
    myEl.addEventListener("keyup",function(){
      myElUpdate.removeAttribute("disabled");
      myElUpdate.value = "Update";
    });
    myEl.addEventListener("change",function(){
      myElUpdate.removeAttribute("disabled");
      myElUpdate.value = "Update";
    });
  }

function updateData(element){
  element.value = "...";
  var myElement = element.parentElement.parentElement.getElementsByClassName('dataIn')[0];
  var edit = element.parentElement.parentElement.getElementsByClassName('edit')[0];
  var xhttp = new XMLHttpRequest();
  var data = new FormData();
  data.append("ajaxId", document.getElementById('userId').value);
  data.append("name", myElement.getAttribute("name"));
    data.append("data", myElement.value);
  // alert(myElement.name+" "+myElement.value+" "+document.getElementById('userId').value);
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          element.value = "Updated";
          element.setAttribute("disabled","");
          edit.removeAttribute("disabled");
          myElement.setAttribute("disabled","");
        }
      };
      xhttp.open("post", window.location.href, true);
      xhttp.send(data);

}

</script>