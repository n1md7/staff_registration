<script type="text/javascript">$("#allUsers").addClass("activeMenu");</script>
<div class="panel panel-default" style="width: 1200px;margin:auto;position: relative;">
  <div class="panel-heading">
    <form method="post" action="">
    <div style="width: 500px;height: 36px;box-sizing: border-box;">
        <input type="search" placeholder="search here" name="searchvalue" class="form-control" style="border: 1px solid #337ab7;width: 400px; float: left;border-bottom-right-radius: 0px;border-top-right-radius: 0px;">
        <input type="submit" name="search" value="search" class="form-control btn btn-primary" style="width: 100px;float: left;border-bottom-left-radius: 0px;border-top-left-radius: 0px;">
      </div>
    </form>
       <select name="asc" class="btn btn-default" style="position: absolute; right: 100px; top: 0;margin-top: 10px;margin-right: 10px; " >
         <option value="1">ASC</option>
         <option value="2">DESC</option>
       </select>

        <div style="position: absolute; right: 0; top: 0;margin-top: 10px;margin-right: 10px; " class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Sort By <span class="glyphicon glyphicon-filter"></span>
          <span class="caret"></span></button>
          <ul class="dropdown-menu" style="border-top: 1px solid #ccc;">
            <li><a href="#">Condition</a></li>
            <li><a href="?sort=date&asc=1">Hire Date</a></li>
          </ul>
        </div>
  </div>
  <div class="panel-body">
  <table class="table table-hover table-bordered text-center" id="tbHd">
    <thead>
      <tr>
        <th class="text-center">სახელი</th>
        <th class="text-center">გვარი</th>
        <th class="text-center">მობ.ნომერი</th>
        <th class="text-center">თანამდებობა</th>
        <th class="text-center">სტატუსი</th>
        <th class="text-center">დეტალური ინფორმაცია</th>
      </tr>
    </thead>
    <?php 

/*     foreach ($viewmodel[2] as $oneArray): //პირველი ჩანაწერი
                        $key = $oneArray[0]; $value = $oneArray[1]; $id = $oneArray[2];
                        $keyVal = isset($_GET['lang'])&&$_GET['lang']=="meg"?"<b>".$key."</b> - ".$value:"<b>".$value."</b> - ".$key;
                            echo "<parent onmouseout=\"parentTagIMgHideUnhide(this,'hidden');\" onmouseover=\"parentTagIMgHideUnhide(this,'visible');\">";
                            for($i=0; $i<count($arrayExplodeFinal);$i++){
                                echo  "<span class=\"fontSmall\">".$arrayExplodeFinal[$i]."</span>";
                                if(count($arrayExplodeFinal)>$i+1)
                                    echo "<em class=\"findWord\">".$getVar."</em>";
                            } 
                            echo "<img style=\"visibility:hidden;\" onclick=\"setEditFeatureToelements(this);\" value=\"".$id."\" class=\"edit\" src=\"http://icons.iconarchive.com/icons/custom-icon-design/mono-general-2/512/edit-icon.png\" width=\"10\">";
                            echo "<hr class=\"separatorDataHr\">";
                            echo "</parent>";
                         
     endforeach;
*/









      $myCSRF = new CSRF;
      $returnToken = $myCSRF->getToken();
      $lastId = 0;
      $firstId = "";
      if(sizeof($viewmodel[0])>0):
        foreach($viewmodel[0] as $row):
          // $fname = explode($row['firstName'], $viewmodel[2]);
          // $lname = explode($row['lastName'], $viewmodel[2]);
          // $flen = strlen($fname[0]);
          // $llen = strlen($lname[0]);
          // $ffname = str_replace($fname[0], "", $row['firstName']);
          // $llname = str_replace($lname[0], "", $row['lastName']);
          // $f = strlen($viewmodel[2]) != $flen ? '' : $fname[0];
          // $l = strlen($viewmodel[2]) != $llen ? '' : $lname[0];
          // $fname = '<u>'.$f. '</u>'.$ffname;
          // $lname = '<u>'.$l. '</u>'.$llname;
         ?>
        <tbody>
          <tr class="<?php //echo $row['active'] == 1?'success':'danger'; ?>">
            <form method="post" action="<?php echo ROOT_URL.'staff/showOneStaff/'; ?>"  >
              <div class="form-group">
                <td style="vertical-align: middle;"><?php echo /*$fname;*/$row['firstName']; ?></td>
                <td style="vertical-align: middle;"><?php echo /*$lname;*/$row['lastName']; ?></td>
                <td style="vertical-align: middle;"><?php 
                  $ns = strval($row['phoneNumber']); 
                  $spi = [3, 2, 2, 2];
                  $format = (substr($ns,0,$spi[0])).'-'.(substr($ns,$spi[0],$spi[1])).'-'.(substr($ns,$spi[0]+$spi[1],$spi[2])).'-'.(substr($ns,$spi[0]+$spi[1]+$spi[2],$spi[3]));
                  echo $format;
                ?></td>
                <?php $firstId = empty($firstId) ? $row['id'] : $firstId; ?>
                <?php $lastId = $row['id']; ?>
                <td style="vertical-align: middle;">
                <?php 
                  foreach($viewmodel[1] as $row1):
                    if($row1['id'] == $row['jobPost']):
                      echo $row1['name'];
                    endif;
                  endforeach;
                ?>
                </td>
                <td style="vertical-align: middle;"><?php echo $row['active'] == 1 ? '<span style="color:#3c763d;">აქტიური &#x25B2;</span>' : '<span style="color:#a94442;;">არააქტიური  &#x25BC;</span>'; ?></td>
                <?php echo "<input type=\"hidden\" name=\"csrf\" value=\"".$returnToken."\">"; ?> 
                <td style="vertical-align: middle;"><button type="submit" value="<?php echo $row['id']; ?>" name="id"  class="btn btn-primary">ინფორმაციის ნახვა</button></td>
              </div>
            </form>
          </tr>
        </tbody>
    <?php 
        endforeach;
      else:
        echo "<h5 class='text-center'>no data</h5><script>document.getElementById('tbHd').style.display='none';</script>";
      endif;
     ?>
  </table>
  <hr>
<div>
  <?php 
    $model = new StaffModel();
    $returnVal = $model->getRowQuantity();
    $rows_in_db = $returnVal["rows"];
  ?>
  <form method="post">
    <ul class="pager">
      <li class="previous"><a href="<?php echo ROOT_URL.'staff/showStaff/'.((($firstId-11)>=0)?($firstId-11):(0)); ?>">წინა</a></li>
      <?php for($count = 0; $count <= ($rows_in_db/10); $count ++): ?>
        <li><a href="<?php echo ROOT_URL.'staff/showStaff/'.(($count)*10); ?>"><?php echo $count+1; ?></a></li>
      <?php endfor; ?>
      <li class="next"><a href="<?php echo ROOT_URL.'staff/showStaff/'.$lastId; ?>">შემდეგი</a></li>
    </ul>
  </form>
</div>
  </div>
</div>
<?php    
//echo $_GET['id'];
 ?>
