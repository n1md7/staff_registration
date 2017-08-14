<script type="text/javascript">$("#showUsers").addClass("activeMenu");</script>
<div class="panel panel-default" style="width: 700px;margin:auto;">
  <div class="panel-heading">
   <span>All Users</span>
  </div>
  <div class="panel-body">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <?php if($_SESSION['is_admin'] == true): ?>
          <th><?php echo "E-mail"; ?></th>
        <?php endif; ?>
        <th>Registration Date-Time</th>
        <th>Role</th>
        <th>Operation</th>
      </tr>
    </thead>
    <?php 
      $myCSRF = new CSRF;
      $returnToken = $myCSRF->getToken();
    ?>
    <?php 
        foreach($viewmodel as $row):
         ?>
        <tbody>
          <tr>
            <div class="form-group">
              <td><?php echo $row['name']; ?></td>
              <?php if($_SESSION['is_admin'] == true): ?>
              <td><?php echo $row['email']; ?></td>
              <?php endif; ?>
              <td><?php echo $row['reg_date_time']; ?></td>
              <td><?php echo $row['is_admin'] == 1? "Admin":"Basic User"; ?></td>
              <td>
                <?php if($row['email'] != $_SESSION['user_data']['email'] && $_SESSION['is_admin'] == true): ?>
                  <form method="post" action="" >
                  <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                  <?php echo "<input type=\"hidden\" name=\"csrf\" value=\"".$returnToken."\">"; ?> 
                    <button class="btn btn-danger btn-xs"   type="button" onclick="deleteUSer(this)" >Delete</button>
                  </form>
                <?php else: ?>
                    <button class="btn btn-danger btn-xs" disabled="" type="button">Delete</button>
                <?php endif; ?>
              </td>
            </div>
          </tr>
        </tbody>
    <?php 
        endforeach;
     ?>
  </table>
  </div>
</div>
 

<script type="text/javascript">
  function deleteUSer(self){
    swal({
    title: "This user will be DELETED",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "DELETE",
    closeOnConfirm: false
  },
  function(){
    self.parentNode.submit()
  });
  }
</script>