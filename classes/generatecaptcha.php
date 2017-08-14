<?php
class GenerateCaptcha{
	private $arr = array('a','b','c','d','e','f','g','h','i','j','k','l','0','1','2');
	private $generatedCaptcha = "";
	function __construct(){
		session_start();
		header ('content-type: image/png');
		$this->generatedCaptcha = $this->arr[rand(0,14)].$this->arr[rand(0,14)].$this->arr[rand(0,14)].$this->arr[rand(0,14)];
		$_SESSION['captcha'] = $this->generatedCaptcha;
		readfile("../assets/captchas/".$this->generatedCaptcha.".png");
	}
}new GenerateCaptcha();
