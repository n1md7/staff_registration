<script type="text/javascript">$("#bonus").addClass("activeMenu");</script>
<div class="panel panel-default" style="width: 700px;margin:auto;">
  <div class="panel-heading">
    <h3 class="panel-title text-center">ბონუს თანხის დამატება</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label>აირჩიე პერსონალი</label>
            <select name="name" required="" class="form-control">
            <option value="">არჩევა</option>
            <optgroup label="აქტიური პერსონალი">
            <?php 
                foreach($viewmodel[0] as $row):
            ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['firstName'].' '.$row['lastName']; ?></option>
            <?php
                endforeach;
            ?>
            </optgroup>
            </select>
        </div>
        <div class="form-group">
            <label>თანხა /₾</label>
            <input type="number" name="bonus" required="" placeholder="amount" class="form-control" autocomplete="off" min="1" max="5000">
        </div>
        <div class="form-group">
            <label>აღწერა / კომენტარი</label>
            <input type="text" name="description" required="" placeholder="description"  class="form-control toKa" autocomplete="off">
        </div>
        <?php $myCSRF = (new CSRF)->getToken();?>
        <input class="btn btn-primary pull-right" name="addBonus" type="submit" value="დამატება">
    </form>
  </div>
</div>
<br>
<br>

<div class="panel panel-default" style="width: 700px;margin:auto;">
  <div class="panel-heading">
    <h3 class="panel-title text-center">ბონუსად გაცემული თანხები</h3>
  </div>
  <div class="panel-body">
  <form name="searchDeptPerson">
    <input type="search" minlength="2" maxlength="20" title="ძებნა, ჩაწერე მინიმუმ 2 სიმბოლო" placeholder="ჩაწერე სახელი ან გვარი და დააჭირე &crarr; შესვლას" name="searchvalue" class="form-control" style="border: 1px solid #337ab7;">
  </form>
    <hr>  
        <table class="table table-hover table-bordered text-center">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">სახელი</th>
                <th class="text-center">გვარი</th>
                <th class="text-center">ბონუსი</th>
                <th class="text-center">კომენტარი</th>
                <th class="text-center">წაშლა</th>
              </tr>
            </thead>
            <tbody>
                
                    <?php
                        foreach($viewmodel[1] as $count => $value):
                            echo '<tr>';
                                echo  '<td style="vertical-align: middle;">'.($count+1).'</td>';           
                                echo  '<td style="vertical-align: middle;">'.$value['firstName'].'</td>';           
                                echo  '<td style="vertical-align: middle;">'.$value['lastName'].'</td>';           
                                echo  '<td style="vertical-align: middle;">'.$value['value'].' ₾</td>';           
                                echo  '<td style="vertical-align: middle;">'.$value['comment'].'</td>';           
                                ?>
                                <td style="vertical-align: middle;">
                                    <input class="btn btn-danger btn-sm" name="change" type="button" value="გაუქმება" onclick="confirmDelete('<?php echo $value['firstName']; ?>','<?php echo $value['lastName']; ?>', '<?php echo $value['bonID']; ?>')">
                                </td>
                            </tr>
                        <?php
                        endforeach;
                    ?> 
            </tbody>
        </table>
  </div>
</div>

<form method="post" style="display: none;" name="deleteBonus">
    <input type="hidden" name="id">
    <input type="hidden" name="delete" value="true">
    <input type="hidden" name="csrf">
</form>

<script type="text/javascript">
    function confirmDelete(n, l, id){
        deleteBonus.id.value = id;
        deleteBonus.csrf.value = document.getElementsByName('csrf')[0].value
        swal({
          title: "დარწმუნებული ხარ?",
          text:  n+" "+l+"-ს ბონუსი გაუქმდება",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "დიახ, გააუქმე!",
          cancelButtonText: "არა!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            deleteBonus.submit();
          } else {
            swal("გადარჩა", n+" "+l+"-ს ბონუსი გადაურჩა გაუქმებას", "error");
          }
        });
    }
</script>