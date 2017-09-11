<script type="text/javascript">$("#addStaff").addClass("activeMenu");</script>

<div class="panel panel-default" style="width: 500px;margin:auto;">
  <div class="panel-heading">
    <h3 class="panel-title">პერსონალის რეგისტრაცია</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>"  >
    	<div class="form-group">
            <label>სახელი *</label><br>
            <input data-toggle="tooltip" required="" data-placement="right" title="First Name" type="text" name="firstName" placeholder="First Name" class="form-control toKa" autocomplete="off" >
        </div>
         <div class="form-group">
            <label>გვარი *</label><br>
            <input data-toggle="tooltip" required="" data-placement="right" title="Last Name" type="text" name="lastName" placeholder="Last Name" class="form-control toKa" autocomplete="off" >
        </div>
         <div class="form-group">
            <label>მამის სახელი</label><br>
            <input data-toggle="tooltip" data-placement="right" title="Father's Name" type="text" name="fathersName" placeholder="Father's Name" class="form-control toKa has-warning" >
        </div>
         <div class="form-group">
            <label>პირადი ნომერი *</label><br>
            <input data-toggle="tooltip" required="" data-placement="right" title="Personal Number" type="number" name="personalNumber" placeholder="Personal Number" class="form-control toKa has-feedback" >
        </div>
         <div class="form-group">
            <label>დაბადების თარიღი *</label><br>
            <input data-toggle="tooltip" required="" data-placement="right" title="Date Of Birth" type="date" name="dateOfBirth" placeholder="Name" class="form-control toKa" autocomplete="off" >
        </div>
         <div class="form-group">
            <label>მობ.ნომერი *</label><br>
            <input data-toggle="tooltip" required="" data-placement="right" title="Mobile Number" type="number" name="phoneNumber" placeholder="Mobile Number" class="form-control toKa" autocomplete="off" >
        </div>
         <div class="form-group">
            <label>ელფოსტა</label><br>
            <input data-toggle="tooltip" data-placement="right" title="E-mail" type="email" name="email" placeholder="E-mail" class="form-control" autocomplete="off" >
        </div>
         <div class="form-group">
            <label>საკონტაქტო პირის ნომერი</label><br>
            <input data-toggle="tooltip" data-placement="right" title="Contact Number" type="number" name="contactNumber" placeholder="Contact Number" class="form-control toKa" autocomplete="off" >
        </div>
         <div class="form-group">
            <label>მოქალაქეობა *</label><br>
            <input data-toggle="tooltip" required="" data-placement="right" title="Place Of Residence" type="text" name="residence" placeholder="Place Of Residence" class="form-control toKa" autocomplete="off" >
        </div>
         <div class="form-group">
            <label>თანამდებობა *</label><br>
            <select data-toggle="tooltip" required="" data-placement="right" title="Salary Depends On Job Position" name="jobPost" placeholder="Job Position" class="form-control toKa" autocomplete="off">
            <?php 
              if(sizeof($viewmodel)>0):
                foreach($viewmodel as $row):
            ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>                
            <?php
                endforeach;
              endif;
              ?>
            </select>
        </div>
         <div class="form-group">
            <label data-toggle="tooltip" data-placement="right" title="Gender">სქესი *</label><br>
            <label class="radio-inline">
                <input type="radio" name="gender" value="1">მამრობითი
            </label>
            <label class="radio-inline">
                <input type="radio" name="gender" value="2">მდედრობითი
            </label>
        </div>
         <div class="form-group">
            <textarea data-toggle="tooltip" data-placement="right" title="Comment" name="comment" placeholder="კომენტარი..." class="form-control" autocomplete="off" ></textarea>
        </div>
        <?php new CSRF(); ?>
    	<input class="btn btn-primary pull-right form-control" name="submit" type="submit" value="შენახვა" >
    </form>
  </div>
</div>