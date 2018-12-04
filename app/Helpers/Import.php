<?php
/**
 * 导入数据helper
 */

namespace App\Helpers;

class Import{
    public function import(){
        $filePath = 'storage\exports/'.iconv('UTF-8', 'GBK', 'test').'.xls';
        Excel::load($filePath, function($reader) {
            $data = $reader->all();
            dd($data);
        });
    }
}