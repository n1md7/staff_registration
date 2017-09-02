<script type="text/javascript">$("#category").addClass("activeMenu");</script>
<div class="panel panel-default" style="width: 1000px;margin:auto;">
  <div class="panel-heading">
    <h3 class="panel-title">კომპანიაში არსებული თანამდებობების სია/კატეგორია</h3>
  </div>
  <div class="panel-body">
    <?php if(sizeof($viewmodel)>0):?>
         <table class="table table-hover table-bordered text-center">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">დასახელება</th>
                <th class="text-center">აღწერა</th>
                <th class="text-center">ხელფასი</th>
                <th class="text-center">დარიცხვა</th>
                <th class="text-center">ცვლილება</th>
                <th class="text-center">წაშლა</th>
              </tr>
            </thead>
            <tbody>
                    <?php
                        foreach($viewmodel as $row):
                            echo '<tr>';
                            echo  '<td style="vertical-align: middle;">'.$row['id'].'</td>';           
                            echo  '<td style="vertical-align: middle;">'.$row['name'].'</td>';           
                            echo  '<td style="vertical-align: middle;">'.$row['description'].'</td>';           
                            echo  '<td style="vertical-align: middle;">'.$row['salary'].' ₾</td>';           
                            echo  '<td style="vertical-align: middle;">'.($row['monthly']==1?"თვიურად":"დღიურად").'</td>';           
                            ?>
                            <td style="vertical-align: middle;">
                                <input class="btn btn-warning" data-toggle="modal" data-target="#changeMyModal" name="change" type="button" value="შეცვლა" onclick="updateCatById(<?php echo $row['id']; ?>,'<?php echo $row['name']; ?>','<?php echo $row['salary']; ?>','<?php echo $row['description']; ?>','<?php echo $row['monthly']; ?>')">
                            </td>
                            <td style="vertical-align: middle;">
                                <input class="btn btn-danger" name="delete" type="button" value="წაშლა" onclick="deleteById(<?php echo  $row['id']; ?>,'<?php echo  $row['name']; ?>')">
                            </td>
                            <?php
                        endforeach;
                    ?>
            </tbody>
        </table>
    <?php 
        else:
            echo 'არ არის კატეგორია';
        endif;
    ?>
  </div>
</div>
<br>

<div class="panel panel-default" style="width: 700px;margin:auto;">
  <div class="panel-heading">
    <h3 class="panel-title">კატეგორიის დამატება</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label>დასახელება</label>
            <input type="text" name="name" required="" placeholder="Name" class="form-control toKa" autocomplete="off" />
        </div>
        <div class="form-group">
            <label>ხელფასი/₾</label>
            <input type="number" name="salary" required="" placeholder="salary" class="form-control toKa" autocomplete="off" min="1" max="5000" />
        </div>
        <div class="form-group">
            <label>ხელფასის დარიცხვა</label><br>
            <label class="radio-inline"><input type="radio" value="0" name="monthly" required="true">დღიურად</label>
            <label class="radio-inline"><input type="radio" value="1" name="monthly" required="true">თვიურად</label>
        </div>
        <div class="form-group">
            <label>აღწერა</label>
            <input type="text" name="description" required="" placeholder="description"  class="form-control toKa" autocomplete="off" />
        </div>
        <?php 
            $myCSRF = new CSRF;
            $returnToken = $myCSRF->getToken();
        ?>
        <input class="btn btn-primary pull-right" name="addCategory" type="submit" value="დამატება" />
    </form>
  </div>
</div>



<!-- Modal form for edit category -->
  <div class="modal fade" id="changeMyModal" role="dialog">
    <form action="" method="POST" name="updateForm">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center">კატეგორიის ცვლილება</h4>
            </div>
            <div class="modal-body">
            <input type="hidden" name="updateCategory">
            <input type="hidden" name="id">
                <div class="form-group">
                    <label>დასახელება</label>
                    <input type="text" name="name" required="true" placeholder="Name" class="form-control toKa" autocomplete="off" />
                </div>
                <div class="form-group">
                    <label>ხელფასი/₾</label>
                    <input type="number" name="salary" required="true" placeholder="Salary" class="form-control toKa" autocomplete="off" min="1" max="5000" />
                </div>
                <div class="form-group">
                    <label>ხელფასის დარიცხვა</label><br>
                    <label class="radio-inline"><input type="radio" value="0" name="monthly" required="true">დღიურად</label>
                    <label class="radio-inline"><input type="radio" value="1" name="monthly" required="true">თვიურად</label>
                </div>
                <div class="form-group">
                    <label>აღწერა</label>
                    <textarea type="text" name="description" required="true" placeholder="Description" class="form-control toKa" autocomplete="off"></textarea>
                </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="csrf" value="">
              <button type="submit" class="btn btn-primary pull-right">შენახვა</button>
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">დახურვა</button>
            </div>
          </div>
          
        </div>
    </form>
  </div>




<!-- form for delete -->
<form method="post" action="" style="display: none;" name="deleteCategory">
    <input type="hidden" name="delete" value="true">
    <input type="hidden" name="id" value="">
    <input type="hidden" name="name" value="">
    <input type="hidden" name="csrf" value="">
</form>

<script type="text/javascript">
    function deleteById(id, cat){
        deleteCategory.id.value = id;
        deleteCategory.name.value = cat;
        deleteCategory.csrf.value = document.getElementsByName('csrf')[0].value
        swal({
          title: "დარწმუნებული ხარ?",
          text: "კატეგორია '"+cat+"' წაიშლება მონაცემთა ბაზიდან",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "დიახ, წაშალე!",
          cancelButtonText: "არა!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            deleteCategory.submit();
          } else {
            swal("გადარჩა", "კატეგორია '"+cat+"' გადაურჩა წაშლას", "error");
          }
        });
    }



    function updateCatById(id, name, salary, description, monthly){
        updateForm.id.value = id;
        updateForm.name.value = name;
        updateForm.salary.value = salary;
        updateForm.description.value = description;
        monthly==1?(updateForm.monthly[1].checked = true):(updateForm.monthly[0].checked = true)
        updateForm.csrf.value = document.getElementsByName('csrf')[0].value
    }
</script>