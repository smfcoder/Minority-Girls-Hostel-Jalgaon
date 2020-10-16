<?php 

$upload_dir = array( 
    'img'=> 'uploads/', 
); 
 

$imgset = array( 
    'maxsize' => 2000, 
    'maxwidth' => 1024, 
    'maxheight' => 800, 
    'minwidth' => 10, 
    'minheight' => 10, 
    'type' => array('bmp', 'gif', 'jpg', 'jpeg', 'png','pdf','docx','zip','doc','c','cpp','java','rb','xlsx','asm','ppt','ASM','rar','tar','dmg','mdb','sql','php','xml','py','exe','apk','jar','otf','mdj','pptx','odt','rtf','css','js','xhtml'), 
); 
 

define('RENAME_F', 1); 
 

function setFName($p, $fn, $ex, $i){ 
    if(RENAME_F ==1 && file_exists($p .$fn .$ex)){ 
        return setFName($p, F_NAME .'_'. ($i +1), $ex, ($i +1)); 
    }else{ 
        return $fn .$ex; 
    } 
} 
 
$re = ''; 
if(isset($_FILES['upload']) && strlen($_FILES['upload']['name']) > 1) { 
 
    define('F_NAME', preg_replace('/\.(.+?)$/i', '', basename($_FILES['upload']['name'])));   
 
    
    $sepext = explode('.', strtolower($_FILES['upload']['name'])); 
    $type = end($sepext);    
     
   
    $upload_dir = in_array($type, $imgset['type']) ? $upload_dir['img'] : $upload_dir['audio']; 
    $upload_dir = trim($upload_dir, '/') .'/'; 
 
    
    if(in_array($type, $imgset['type'])){ 
        
        list($width, $height) = getimagesize($_FILES['upload']['tmp_name']); 
 
       
    }else{ 
        $re .= 'The file: '. $_FILES['upload']['name']. ' has not the allowed extension type.'; 
    } 
     
     
    $f_name = setFName($_SERVER['DOCUMENT_ROOT'] .'/'. $upload_dir, F_NAME, ".$type", 0); 
    $uploadpath = $upload_dir . $f_name; 
 
   
    if($re == ''){ 
        if(move_uploaded_file($_FILES['upload']['tmp_name'], $uploadpath)) { 
            $CKEditorFuncNum = $_GET['CKEditorFuncNum']; 
            $url = 'https://minorityhostel.gcoej.ac.in/editor/ckeditor/'. $upload_dir . $f_name; 
            $msg = F_NAME .'.'. $type .' successfully uploaded: \\n- Size: '. number_format($_FILES['upload']['size']/1024, 2, '.', '') .' KB'; 
            $re = in_array($type, $imgset['type']) ? "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>":'<script>var cke_ob = window.parent.CKEDITOR; for(var ckid in cke_ob.instances) { if(cke_ob.instances[ckid].focusManager.hasFocus) break;} cke_ob.instances[ckid].insertHtml(\' \', \'unfiltered_html\'); alert("'. $msg .'"); var dialog = cke_ob.dialog.getCurrent();dialog.hide();</script>'; 
        }else{ 
            $re = '<script>alert("Unable to upload the file")</script>'; 
        } 
    }else{ 
        $re = '<script>alert("'. $re .'")</script>'; 
    } 
} 
 

@header('Content-type: text/html; charset=utf-8'); 
echo $re;