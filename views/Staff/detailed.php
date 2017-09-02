<html>
<head>   
<link href="../assets/css/calendar.css" type="text/css" rel="stylesheet" />
<link href="../assets/css/detailed.css" type="text/css" rel="stylesheet" />
</head>
<body>
		<?php
			$output = '';
			for ($y = 2017; $y <= 2017; $y ++) { 
				for ($m = 1; $m <= 12; $m ++) { 
					$output .= (new Calendar())->show($m, $y);
					if($m % 2 == 0){
						echo '<div class="cal_container">'
								.$output.
							'</div>';
						$output = '';
					}
				}
			}

		echo $viewmodel;
		?>
</body>
</html>       

