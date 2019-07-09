<?php

class ImageManager
{
    public $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public      function imageresize_jpeg($outfile, $infile, $neww, $newh, $quality)
    {
        $source = imagecreatefromjpeg($infile);
        $im1 = imagecreatetruecolor($neww, $newh);
        imagecopyresampled($im1, $source, 0, 0, 0, 0, $neww, $newh, imagesx($source), imagesy($source));
        imagejpeg($im1, $outfile, $quality);
        imagedestroy($source);
        if (imagedestroy($im1)) {
            return true;
        } else {
            return false;
        }
    }

    public     function imageresize_png($outfile, $infile, $neww, $newh, $quality)
    {
        $source = imagecreatefrompng($infile);
        $im1 = imagecreatetruecolor($neww, $newh);
        imagecopyresampled($im1, $source, 0, 0, 0, 0, $neww, $newh, imagesx($source), imagesy($source));
        imagepng($im1, $outfile, $quality);

        imagedestroy($source);
        if (imagedestroy($im1)) {
            return true;
        } else {
            return false;
        }
    }
    public        function imageresize_gif($outfile, $infile, $neww, $newh, $quality)
    {
        $source = imagecreatefromgif($infile);
        $im1 = imagecreatetruecolor($neww, $newh);
        imagecopyresampled($im1, $source, 0, 0, 0, 0, $neww, $newh, imagesx($source), imagesy($source));
        imagegif($im1, $outfile, $quality);
        imagedestroy($source);
        if (imagedestroy($im1)) {
            return true;
        } else {
            return false;
        }
    }






    public function  uploadUpdate($table, $image, $imageId)
    {
        $path = "/files/" . $image["name"];
        $pathMin = "../minfiles/" . $image["name"];
        $copypath = "/files/" . $image["name"];
        $copypathMin = "../minfiles/" . $image["name"];
        $size = $image["size"];
        $type = $image["type"];
     
        if (empty($image["tmp_name"]["name"]) && $image["tmp_name"]) {
            $this->deleteImage($table, $imageId);
            copy($image["tmp_name"], dirname(__DIR__) . trim($copypath, "."));
            $this->db->update($table, ["path" => $path, "minpath" => $pathMin, "id" => $imageId]);
        }
   
        $this->imageResize($size, $type, $copypathMin, $copypath);
    }
    public function imageResize($size, $type, $copypathMin, $copypath)
    {


        if ($size < 10000000000000000) {
            switch ($type) {
                case "image/jpeg":
                    $this->imageresize_jpeg(dirname(__DIR__) . trim($copypathMin, "."), dirname(__DIR__) . trim($copypath, "."), 390, 240, 75);
                    break;
                case "image/png":
                    $this->imageresize_png(dirname(__DIR__) . trim($copypathMin, "."), dirname(__DIR__) . trim($copypath, "."), 390, 240, 5);
                    break;
                case "image/gif":
                    $this->imageresize_gif(dirname(__DIR__) . trim($copypathMin, "."), dirname(__DIR__) . trim($copypath, "."), 390, 240, 75);
                    break;
                default:
                    exit("Загрузите картинку jpg или png или gif");
            }
        } else {
            exit("Загрузите картинку меньшего размера");
        }
    }
    public function uploadStore($table, $image)
    {
        $path = "/files/" . $image["name"];
        $copypath = "/files/" . $image["name"];
        $copypathMin = "../minfiles/" . $image["name"];
        $pathMin = "../minfiles/" . $image["name"];
        $size = $image["size"];
        $type = $image["type"];
     
        copy($image["tmp_name"], dirname(__DIR__) . trim($copypath, "."));

        $this->imageResize($size, $type, $copypathMin, $copypath);
    }




    public function deleteImage($table, $id)
    {

        $user = $this->db->getOne($table, $id);
        $path = $this->db->getPath($table, $user["path"]);
        if (count($path) == 1) {
            if ($user) {
         
                unlink(dirname(__DIR__) . trim($user["path"], "."));
                unlink(dirname(__DIR__) . trim($user["minpath"], "."));
            }
        }
    }
    public function checkImage($table, $id)
    {

        $user = $this->db->getOne($table, $id);

        return $user;
    }
}
