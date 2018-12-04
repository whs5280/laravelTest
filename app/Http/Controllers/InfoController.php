<?php

namespace App\Http\Controllers;

use App\Helpers\Import;
use App\Info;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Helpers\Export;

class InfoController extends BaseController
{
    /*
     * 全部信息
     */
    public function index(Request $request){
        $infos = Info::all();
        $export = $request->input("export", "");
        //导出数据
        if ($export === 'xls'){
            $header = [
                'id' => 'Id',
                'title' => 'Title',
                'content' => 'Content',
                'author' => 'Author',
                'time' => 'Time',
            ];
            $reportArr = [];
            foreach ($infos as $k => $v) {
                $reportArr[] = $v;
            }
            Export::excel($header, $reportArr);
        }
        return view('info',compact('infos'));
    }

    /*
     * 单个信息
     */
    public function detail($id){
        //$info = DB::table('infos')->where('id',$id)->first();
        $info = Info::where('id',$id)->first();
        return view('detail',compact('info'));
    }

    /*
     * 删除
     */
    public function detele($id){
        $info = DB::table('infos')->where('id',$id)->delete();
        return view('info',compact('infos'));
    }

    /*
     * 找ID
     */
    public function editor(Request $request,$id = NULL){
        if(isset($id)){
            //$info = Info::find($id);
            $info = DB::table('infos')->find($id);
        }else{
            $info = new Info();
        }
        return view('editor',compact('info'));
    }

    /*
     * 增加或更新
     */
    public function insert(Request $request,$id = NULL){
        if(isset($id)){
            //
        }
    }

    /*
     * import
     */
    public function import(Request $request){
        $import = $request->input("import", "");
        if ($import === 'xls'){
            Import::import();
        }
    }

}
