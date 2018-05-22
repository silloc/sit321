<?php
class upfiles{
    public $upfile = "../../upfile/users/"; //上传目录
    public $small  = "small/"; 
    public $maxsize= 1024000;
    //上传方法开始
    function upfile($filename){
        $newname = date("Ymdhs").mt_rand(0,9).mt_rand(0,9).mt_rand(0,9); //使用日期做文件名
        $name = $_FILES[$filename]["name"];
		$type = $_FILES[$filename]["type"];
		$size = $_FILES[$filename]["size"];
		$tmp_name = $_FILES[$filename]["tmp_name"];
        
        //文件类型判断
      switch ($type) {
				case 'application/vnd.ms-excel' :
					$extend = ".xls";
					break;
				case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' :
					$extend = ".xlsx";
					break;
			}
	    if (empty($extend)) {
	            echo "文件类型不正确,只能使用.xls .xlsx 格式!";
	            exit();
			}
        if ($size > $this->maxsize) {
			$maxpr = $maxsize / 1000;
            echo "警告！导入文件大小不能超过" . $maxpr . "K!";
            exit();
		}
        $filename=$newname.$extend;
        if (move_uploaded_file($tmp_name, $this->upfile.$filename)) {
			return $filename;
		}
    }
    
    //上传方法完成
    
    //获取上传文件信息 
    function getinfo($filename) {
            $file = $this->upfile.$filename;
            return $file;
    }
    //删除上传文件信息
    function  del($filename){
    	if(file_exists($this->upfile.$filename)){
    		$result=unlink ($this->upfile.$filename);
    		return  $result;
    	}
    }
}
 ?>