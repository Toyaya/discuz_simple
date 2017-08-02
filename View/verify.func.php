<?php
// ��װ
/**
 * Ĭ�J�a����λ���ֵ���C�a
 * @param number $type�����������֣�����ĸ,3����+��ĸ,4����
 * @param number $length    ��֤�볤��
 * @param string $codeName  ����session������
 * @param number $pixel     ���ص�
 * @param number $line      �߶�
 * @param number $arc       ����
 * @param number $width     ���
 * @param number $height    �߶�
 * @param string $fontfile  �����ļ�
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
	// 1���֣�2��ĸ��3����+��ĸ��4����
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
			$str = "��,��,��,û,��,��,��,��,��,��,��,��,һ,��,��,ҹ,��,��,��,��,��,��,��,��,ħ,��,��,��,һ,��,��,��,ֻ,˵,û,��,��,��,װ,��,֪,��,��,װ,��,��,֪,��,��,��,��,��,��,��,ҹ,��,��,��,��,һ,��,��,��,ֻ,��,ҹ,��,��,��,��,��,��,��,��,��,��,��,��,��,��,��,��,��,��";
			$arr = explode ( ',', $str );
			$string = join ( '', array_rand ( array_flip ( $arr ), $length ) );
			break;
		default :
			exit ( "�Ƿ�����" );
			break;
	}
	
	//����֤�����session
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
	// ���ŵ�
	if ($pixel > 0) {
		for($i = 1; $i <= $pixel; $i ++) {
			imagesetpixel ( $image, mt_rand ( 0, $width ), mt_rand ( 0, $height ), getRandColor ( $image ) );
		}
	}
	
	// ������
	if ($line > 0) {
		for($i = 1; $i <= $line; $i ++) {
			imageline ( $image, mt_rand ( 0, $width ), mt_rand ( 0, $height ), mt_rand ( 0, $width ), mt_rand ( 0, $height ), getRandColor ( $image ) );
		}
	}
	// ����Բ��
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