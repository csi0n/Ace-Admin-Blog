<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/9/15
 * Time: 20:10
 */
/**
 * 判断是否为多维数组
 */
if (!function_exists('isDoubleArray')) {
    function isDoubleArray($array)
    {
        if (is_array($array)) {
            foreach ($array as $v) {
                if (is_array($v)) {
                    return true;
                    break;
                }
            }
            return false;
        }
        return false;
    }
}
if (!function_exists('array_order_by')) {
    function array_order_by()
    {
        $args = func_get_args();
        $data = array_shift($args);
        foreach ($args as $n => $field) {
            if (is_string($field)) {
                $tmp = array();
                foreach ($data as $key => $row)
                    $tmp[$key] = $row[$field];
                $args[$n] = $tmp;
            }
        }
        $args[] = &$data;
        call_user_func_array('array_multisort', $args);
        return array_pop($args);
    }
}
if (!function_exists('is_debug')) {
    function is_debug()
    {
        return config('app.debug');
    }
}
if (!function_exists('upload')) {
    function upload($file, $saveFolder)
    {
        $allowedExtensions = [
            'jpg', 'jpeg', 'png',
        ];
        $extension = $file->getClientOriginalExtension();
        /*判断后缀是否合法*/
        if (in_array($extension, $allowedExtensions)) {
            $image = Image::make($file);
            /*保存图片*/
            $upload_path = 'resource/' . $saveFolder . '/' . date('Y-m-d') . '/';
            $mysql_save_path = $saveFolder . '/' . date('Y-m-d') . '/';
            $path = storage_path($upload_path);
            if (!is_dir($path)) {
                mkdir($path, 0766, true);
            }
            $filename = uniqid() . time() . '.' . $extension;
            $image->save($path . $filename);
            $returnData = [
                'result' => true,
                'msg' => '上传成功',
                'local' => $mysql_save_path . $filename,
                'extension' => $extension,
            ];
        } else {
            $returnData = [
                'result' => false,
                'msg' => '上传图片格式不正确',
            ];
        }
        return $returnData;
    }
}
if( !function_exists('null_to_empty') ){
    function null_to_empty(&$arr)
    {
        foreach ($arr as $key => $value) {
            if (is_array($value)) {
                null_to_empty($arr[$key]);
            } else {
                $value = trim($value);
                if (is_null($value)) {
                    $arr[$key] = '';
                } else{
                    $arr[$key] = $value;
                }
            }
        }
        return $arr;
    }
}