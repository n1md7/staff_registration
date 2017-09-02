<script type="text/javascript">$("#checkout").addClass("activeMenu");</script>
<div class="panel panel-default" style="width: 1200px;margin:auto;">
  <div class="panel-heading">
    <h3 class="panel-title">ავანსი</h3>
  </div>
  <div class="panel-body">
    <form name="searchDeptPerson" method="POST" style="overflow: auto;">
      <input type="search" minlength="2" maxlength="20" title="ძებნა, ჩაწერე მინიმუმ 2 სიმბოლო" placeholder="ჩაწერე სახელი ან გვარი და დააჭირე &crarr; შესვლას" name="searchvalue" class="toKa form-control pull-left" style="border: 1px solid #337ab7; width: 40%;margin-right: 10px;">
      <input type="submit" value="ძებნა"  class="btn btn-primary btn-xl pull-left">
    </form> 
      <hr> 
    <?php if(sizeof($viewmodel[0])>0):?>
         <table class="table table-hover table-bordered text-center">
            <thead>
              <tr>
                <th style="vertical-align: middle;" class="text-center">#</th>
                <th style="vertical-align: middle;" class="text-center">სახელი</th>
                <th style="vertical-align: middle;" class="text-center">გვარი</th>
                <th style="vertical-align: middle;" class="text-center">დღე</th>
                <th style="vertical-align: middle;" class="text-center">ხელფასი</th>
                <th style="vertical-align: middle;" class="text-center">დარიცხვა</th>
                <th style="vertical-align: middle;" class="text-center">გამომუშავებული თანხა</th>
                <th style="vertical-align: middle;" class="text-center">ბონუსი</th>
                <th style="vertical-align: middle;" class="text-center">ბლოკირებული თანხა</th>
                <th style="vertical-align: middle;" class="text-center">ვალი</th>
                <th style="vertical-align: middle;" class="text-center">ხელმისაწვდომი თანხა</th>
                <th style="vertical-align: middle;" class="text-center">ანგარიშსწორება</th>
              </tr>
            </thead>
            <tbody>
                    <?php
                        foreach($viewmodel[0] as $count => $row):

                          $salary = 0; $monthly = false;
                          foreach($viewmodel[1] as $row1):
                            if($row1['id'] == $row['jobPost']):
                              $salary = $row1['salary'];
                              if($row1['monthly'] == 0):
                                $money = intval($row['days']) * intval($salary);
                              else:
                                // $money = '&#8765;'.round(($salary / 30) * intval($row['days']), 2);
                                $money = $salary;
                                $monthly = true;
                              endif;
                            /*tviurad da dgiurad egenia dasaxvewi vafshe ar maq jer*/
                            endif;
                          endforeach;
                            echo '<form method="POST" action="'.ROOT_URL.'staff/detailed">';
                            echo '<tr>';
                            echo  '<td style="vertical-align: middle;" data-id="'.$row['id'].'">'.($count+1).'</td>';           
                            echo  '<td style="vertical-align: middle;">'.$row['firstName'].'</td>';           
                            echo  '<td style="vertical-align: middle;">'.$row['lastName'].'</td>';           
                            echo  '<td style="vertical-align: middle;">'.$row['days'].'</td>';           
                            echo  '<td style="vertical-align: middle;">'.$salary.' ₾</td>'; 
                            $bonusValue = 0;
                            foreach ($viewmodel[3] as $key => $value):
                                if($value['user_id'] == $row['id'] /*&& $value['paid'] == 0*/):
                                    $bonusValue += $value['value'];
                                endif;
                            endforeach;          
                            echo  '<td style="vertical-align: middle;">'.($monthly?'თვიურად':'დღიურად').'</td>';           
                            echo  '<td style="vertical-align: middle;">'.$money.' ₾ '.'</td>';
                            $deptVal = 0;
                            $unpaidDept = 0;
                            $dept = [
                                      '<span style="color:red;">-'.$deptVal.'</span>', 
                                      '<span style="color:green;">'.$deptVal.'</span>'
                                    ];
                            foreach ($viewmodel[2] as $key => $value):
                                if($value['user_id'] == $row['id'] && $value['paid'] == 1):
                                    $deptVal += $value['value'];
                                    $dept = [
                                              '<span style="color:red;">'.$deptVal.' ₾</span>', 
                                              '<span style="color:green;">'.$deptVal.'</span>'
                                            ];
                                elseif ($value['user_id'] == $row['id'] && $value['paid'] == 0):
                                  $unpaidDept += $value['value'];
                                endif;
                            endforeach;
                            echo  '<td style="vertical-align: middle;">'.$bonusValue.' ₾</td>'; 
                            if(($money - $deptVal) < 0):
                              $available = ('<span style="color:red;">'.($money - $deptVal + $bonusValue).' ₾</span>');
                            else:
                              $available = ('<span style="color:green;">'.($money - $deptVal + $bonusValue).' ₾</span>');           
                            endif;
                            echo  '<td style="vertical-align: middle;">'.($deptVal==0?$dept[1]:$dept[0]).'</td>';//    jer ar amq        
                            $c_lr = $unpaidDept>0?'red':'green';
                            echo  '<td style="vertical-align: middle;"><span style="color:'.$c_lr.';">'.$unpaidDept.' ₾</span></td>';        
                            echo  '<td style="vertical-align: middle;">'.$available.'</td>';        
                            ?>
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <td style="vertical-align: middle;">
                                <input class="btn btn-primary" name="detail" type="submit" value="დეტალურად">
                            </td>
                            </form>
                            <?php
                      endforeach;
                    ?>
            </tbody>
        </table>
    <?php 
        else:
            echo '<p class="">ვერ მოიძებნა</p>';
        endif;
    ?>
  </div>
</div>

