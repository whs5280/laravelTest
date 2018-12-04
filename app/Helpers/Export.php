<?php
/**
 * 导出数据helper
 */

namespace App\Helpers;

class Export{
    private static function excelHeader($fields, $filename, $unset = []) {
        header('Content-type:application/octet-stream');
        header('Accept-Ranges:bytes');
        header('Content-type:application/vnd.ms-excel');
        header('Content-Disposition:attachment;filename=' . (strtr($filename, array(' ' => '_')) . '_' . time()) . '.xls');
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: 0');

        // 导出xls 开始
        foreach ($fields as $field => $val) {
            if (in_array($field, $unset)){
                continue;
            }
            echo iconv('UTF-8', 'GB2312//ignore', strtr(strip_tags($val), array('<br/>' => ' '))) . "\t";
        }
        echo "\n";
    }

    public static function excel($fields, $list, $header = true, $filename = 'export', $unset = [], $convert = []) {
        set_time_limit(0);
        if ($header) {
            self::excelHeader($fields, $filename, $unset);
        }

        $t = "\t";
        foreach ($list as $key => $val) {
            $content = '';
            foreach ($fields as $field => $v) {
                if (in_array($field, $unset)) {
                    continue;
                }
                if (isset($val[$field])) {
                    $val[$field] = strip_tags($val[$field]);
                    if (is_numeric($val[$field]) || !$val[$field]) {
                        $content .= $val[$field] . $t;
                    } else {
                        if (in_array($field, $convert)) {
                            if (strpos($val[$field], '&#039') !== false) {
                                $content .= '"' . mb_convert_encoding($val[$field], 'UTF-8', 'HTML-ENTITIES') . '"' . $t;
                            } else {
                                $content .= '"' .$val[$field]. '"' . $t;
                            }
                        } else {
                            $content .= mb_convert_encoding($val[$field], 'GBK', 'UTF-8') . $t;
                        }
                    }
                } else {
                    $content .= '0' . $t;
                }
            }
            echo $content .= "\n";
        }
        exit;
    }
}