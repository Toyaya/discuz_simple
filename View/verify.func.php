<?php
// 封装
/**
 * 默認產生４位數字的驗證碼
 * @param number $type　　　１数字，２字母,3数字+字母,4汉子
 * @param number $length    验证码长度
 * @param string $codeName  存入session的名字
 * @param number $pixel     像素点
 * @param number $line      线段
 * @param number $arc       弧线
 * @param number $width     宽度
 * @param number $height    高度
 * @param string $fontfile  字体文件
 * @return void         
 */
function getVerify($type=1,$length=4,$codeName='verifyCode',$pixel=50,$line=3,$arc=2,$width=80,$height=30,$fontfile='fonts/SIMHEI.TTF') {
/* 	$width = 200;
	$height = 50; */
	$image = imagecreatetruecolor ( $width, $height );
	$white = imagecolorallocate ( $image, 255, 255, 255 );
	imagefilledrectangle ( $image, 0, 0, $width, $height, $white );
	function getRandColor($image) {
		return imagecolorallocate ( $image, mt_rand ( 0, 255 ), mt_rand ( 0, 255 ), mt_rand ( 0, 255 ) );
	}
	// 1数字；2字母；3数字+字母；4汉子
/* 	$type = 2;
	$length = 4; */
	switch ($type) {
		case 1 :
			$string = join ( '', array_rand ( range ( 0, 9 ), $length ) );
			break;
		case 2 :
			$string = join ( '', array_rand ( array_flip ( array_merge ( range ( 'a', 'z' ), range ( 'A', 'Z' ) ) ), $length ) );
			break;
		case 3 :
			$string = join ( '', array_rand ( array_flip ( array_merge ( range ( 0, 9 ), range ( 'a', 'z' ), range ( 'A', 'Z' ) ) ), $length ) );
			break;
		case 4 :
			$str = "或,许,她,没,有,走,出,内,心,的,阴,霾,一,到,深,夜,就,会,释,放,自,己,的,恶,魔,变,成,另,一,个,自,她,只,说,没,事,后,我,装,作,知,道,又,装,作,不,知,道,静,静,的,看,着,黑,夜,沉,沦,的,另,一,个,橘,子,只,是,夜,尽,天,明,她,若,无,其,事,的,样,子,真,得,好,令,人,心,疼";
			$arr = explode ( ',', $str );
			$string = join ( '', array_rand ( array_flip ( $arr ), $length ) );
			break;
		default :
			exit ( "非法参数" );
			break;
	}
	
	//将验证码存入session
	session_start();
	$_SESSION['verifyCode']=strtoupper($string);
	
	
	for($i = 0; $i < $length; $i ++) {
		$size = mt_rand ( 15, 20);
		$angle = mt_rand ( - 15, 15 );
		$x = 10 + ceil ( $width / $length ) * $i;
		$y = mt_rand ( ceil ( $height / 2 ), $height - 5 );
		$color = getRandColor ( $image );
		//$fontfile = 'fonts/font1.TTF';
		$text = mb_substr ( $string, $i, 1, 'utf-8' );
		imagettftext ( $image, $size, $angle, $x, $y, $color, $fontfile, $text );
	}
/* 	$pixel = 50;
	$line = 3;
	$arc = 2; */
	// 干扰点
	if ($pixel > 0) {
		for($i = 1; $i <= $pixel; $i ++) {
			imagesetpixel ( $image, mt_rand ( 0, $width ), mt_rand ( 0, $height ), getRandColor ( $image ) );
		}
	}
	
	// 干扰线
	if ($line > 0) {
		for($i = 1; $i <= $line; $i ++) {
			imageline ( $image, mt_rand ( 0, $width ), mt_rand ( 0, $height ), mt_rand ( 0, $width ), mt_rand ( 0, $height ), getRandColor ( $image ) );
		}
	}
	// 干扰圆弧
	if ($arc > 0) {
		for($i = 1; $i <= $arc; $i ++) {
			imagearc ( $image, mt_rand ( 0, $width / 2 ), mt_rand ( 0, $height / 2 ), mt_rand ( 0, $width ), mt_rand ( 0, $height ), mt_rand ( 0, 360 ), mt_rand ( 0, 360 ), getRandColor ( $image ) );
		}
	}
	
	header ( 'content-type:image/png' );
	imagepng ( $image );
	imagedestroy ( $image );
}
getVerify(3,4,100,3);
?>