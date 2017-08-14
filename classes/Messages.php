<?php
class Messages{
	public static function setMsg($text, $type){
		if($type == 'error'){
			$_SESSION['errorMsg'] = $text;
		}else if($type == 'warn') {
			$_SESSION['warnMsg'] = $text;
		}else if($type == 'info') {
			$_SESSION['infoMsg'] = $text;
		}else{
			$_SESSION['successMsg'] = $text;
		}
	}

	public static function display(){
		if(isset($_SESSION['errorMsg'])){
			?>
				<div class="alert alert-danger text-center" style="width:700px;margin:auto;margin-bottom: 10px;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>შეცდომა!</strong>
					<hr>
					<?php echo $_SESSION['errorMsg'];?>
				</div>
				<!-- <script type="text/javascript">swal("Error!", "<?php echo $_SESSION['errorMsg'];?>", "error")</script> -->
			<?php
			unset($_SESSION['errorMsg']);
		}

		if(isset($_SESSION['warnMsg'])){
			?>
				<div class="alert alert-warning text-center" style="width:700px;margin:auto;margin-bottom: 10px;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>გაფრთხილება!</strong>
					<hr>
					<?php echo $_SESSION['warnMsg'];?>
				</div>
			<?php
			unset($_SESSION['warnMsg']);
		}

		if(isset($_SESSION['successMsg'])){
			?>
				<div class="alert alert-success text-center" style="width:700px;margin:auto;margin-bottom: 10px;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>წარმატებით შესრულება!</strong>
					<hr>
					<?php echo $_SESSION['successMsg'];?>
				</div>

			<?php
			unset($_SESSION['successMsg']);
		}

		if(isset($_SESSION['infoMsg'])){
			?>
				<div class="alert alert-success text-center" style="width:700px;margin:auto;margin-bottom: 10px;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>ინფორმაცია!</strong>
					<hr>
					<?php echo $_SESSION['infoMsg'];?>
				</div>
			<?php
			unset($_SESSION['infoMsg']);
		}
	}
}