<script type="text/javascript">$("#dept").addClass("activeMenu");</script>
<div class="panel panel-default" style="width: 700px;margin:auto;">
  <div class="panel-heading">
    <h3 class="panel-title">ავანსად თანხის გაცემა</h3>
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
            <input type="number" name="dept" required="" placeholder="amount" class="form-control" autocomplete="off" min="1" max="5000">
        </div>
        <div class="form-group">
            <label>აღწერა / კომენტარი</label>
            <input type="text" name="description" required="" placeholder="description"  class="form-control toKa" autocomplete="off">
        </div>
        <?php 
            $myCSRF = new CSRF;
            $returnToken = $myCSRF->getToken();
        ?>
        <input class="btn btn-primary pull-right" name="addDept" type="submit" value="დამატება">
    </form>
  </div>
</div>
<br>
<br>

<div class="panel panel-default" style="width: 700px;margin:auto;">
  <div class="panel-heading">
    <h3 class="panel-title">ავანსად გაცემული თანხები</h3>
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
                <th class="text-center">ვალი</th>
                <th class="text-center">მდგომარეობა</th>
                <th class="text-center">კომენტარი</th>
                <th class="text-center">ვალის დაბრუნება</th>
              </tr>
            </thead>
            <tbody>
                    <?php
                        $doPay = [
                                    '<span style="color:red;">გადასახდელია</span>', 
                                    '<span style="color:green;">გადახდილია</span>'
                                ];
                        foreach($viewmodel[1] as $count => $value):
                            echo '<tr>';
                            echo  '<td style="vertical-align: middle;" data-id="'.$row['id'].'">'.($count+1).'</td>';           
                            echo  '<td style="vertical-align: middle;">'.$value['firstName'].'</td>';           
                            echo  '<td style="vertical-align: middle;">'.$value['lastName'].'</td>';           
                            echo  '<td style="vertical-align: middle;">'.$value['value'].' ₾</td>';           
                            echo  '<td style="vertical-align: middle;">'.($value['paid']==1?$doPay[1]:$doPay[0]).'</td>';           
                            echo  '<td style="vertical-align: middle;">'.$value['comment'].'</td>';           
                            ?>
                            <td style="vertical-align: middle;">
                            <?php if($value['paid'] == 1): ?>   
                                <input class="btn btn-default" disabled="" data-toggle="modal" data-target="#changeMyModal" name="change" type="button" value="გადახდილია">
                            <?php else: ?>
                                <input class="btn btn-primary" data-toggle="modal" data-target="#changeMyModal" name="change" type="button" value="გადახდა">
                            <?php endif; ?>
                            </td>
                            <?php
                        endforeach;
                    ?>
            </tbody>
        </table>
  </div>
</div>