<?php
class upfiles{
    public $upfile = "../../upfile/users/"; //�ϴ�Ŀ¼
    public $small  = "small/"; 
    public $maxsize= 1024000;
    //�ϴ�������ʼ
    function upfile($filename){
        $newname = date("Ymdhs").mt_rand(0,9).mt_rand(0,9).mt_rand(0,9); //ʹ���������ļ���
        $name = $_FILES[$filename]["name"];
		$type = $_FILES[$filename]["type"];
		$size = $_FILES[$filename]["size"];
		$tmp_name = $_FILES[$filename]["tmp_name"];
        
        //�ļ������ж�
      switch ($type) {
				case 'application/vnd.ms-excel' :
					$extend = ".xls";
					break;
				case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' :
					$extend = ".xlsx";
					break;
			}
	    if (empty($extend)) {
	            echo "�ļ����Ͳ���ȷ,ֻ��ʹ��.xls .xlsx ��ʽ!";
	            exit();
			}
        if ($size > $this->maxsize) {
			$maxpr = $maxsize / 1000;
            echo "���棡�����ļ���С���ܳ���" . $maxpr . "K!";
            exit();
		}
        $filename=$newname.$extend;
        if (move_uploaded_file($tmp_name, $this->upfile.$filename)) {
			return $filename;
		}
    }
    
    //�ϴ��������
    
    //��ȡ�ϴ��ļ���Ϣ 
    function getinfo($filename) {
            $file = $this->upfile.$filename;
            return $file;
    }
    //ɾ���ϴ��ļ���Ϣ
    function  del($filename){
    	if(file_exists($this->upfile.$filename)){
    		$result=unlink ($this->upfile.$filename);
    		return  $result;
    	}
    }
}
 ?>