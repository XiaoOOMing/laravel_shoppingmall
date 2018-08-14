<?php

namespace App\Tools\Validatecode;

class Validatecode
{
    //随机因子
    private $charset = 'abcdefghjkmnprstuvwxyzABCDEFGJKMNPRSTUVWXYZ23456789';
    private $code;
    private $codeLen = 4;

    private $width = 110;
    private $heigh = 45;
    private $img; //图像

    private $font; //字体
    private $fontsize = 20;

    public function __construct()
    {
        $this->font = public_path() . '/font/georgiab.ttf';
        $this->img  = imagecreatetruecolor($this->width, $this->heigh);
    }

    //生成随机码
    private function createCode()
    {
        $_len = strlen($this->charset) - 1;
        for ($i = 0; $i < $this->codeLen; $i++) {
            $this->code .= $this->charset[mt_rand(0, $_len)];
        }
    }

    //生成背景
    private function createBg()
    {

        $color = imagecolorallocate($this->img, mt_rand(157, 255), mt_rand(157, 255), mt_rand(157, 255));
        imagefilledrectangle($this->img, 0, $this->heigh, $this->width, 0, $color);

    }

    //生成文字
    private function createFont()
    {
        $_x = $this->width / $this->codeLen;
        $_y = $this->heigh / 2;
        for ($i = 0; $i < $this->codeLen; $i++) {
            $color = imagecolorallocate($this->img, mt_rand(0, 156), mt_rand(0, 156), mt_rand(0, 156));
            imagettftext($this->img, $this->fontsize, mt_rand(-30, 30), $_x * $i + mt_rand(3, 5), $_y + mt_rand(2, 4), $color, $this->font, $this->code[$i]);
        }
    }

    //生成线条，雪花
    private function createLine()
    {
        for ($i = 0; $i < 15; $i++) {
            $color = imagecolorallocate($this->img, mt_rand(0, 156), mt_rand(0, 156), mt_rand(0, 156));
            imageline($this->img, mt_rand(0, $this->width), mt_rand(0, $this->heigh), mt_rand(0, $this->width), mt_rand(0, $this->heigh), $color);
        }
        for ($i = 0; $i < 150; $i++) {
            $color = imagecolorallocate($this->img, mt_rand(200, 255), mt_rand(200, 255), mt_rand(200, 255));
            imagestring($this->img, mt_rand(1, 5), mt_rand(0, $this->width), mt_rand(0, $this->heigh), '#', $color);
        }
    }

    //输出图像
    private function outPut()
    {
        header('Content-Type: image/png');
        imagepng($this->img);
        imagedestroy($this->img);
    }

    //对外生成
    public function doImg()
    {

        $this->createBg(); //1.创建验证码背景
        $this->createCode(); //2.生成随机码
        $this->createLine(); //3.生成线条和雪花
        $this->createFont(); //4.生成文字
        $this->outPut(); //5.输出验证码图像
    }

    //获取验证码
    public function getCode()
    {
        return strtolower($this->code);
    }

}
