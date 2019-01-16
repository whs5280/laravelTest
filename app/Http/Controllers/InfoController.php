<?php

namespace App\Http\Controllers;

use App\Helpers\Import;
use App\Info;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Helpers\Export;
use Maatwebsite\Excel\Excel;

class InfoController extends BaseController
{
    /*
     * 全部信息
     */
    public function index(Request $request){
        $export = $request->input("export", "");
        $add = $request->input("add", "");

        if ($export === 'xls'){
            $infos = Info::all();
        }else{
            $infos = Info::paginate(20);
        }
        //批量添加(200)
        if ($add === 'add'){
            $this->batch_add();
        }

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
        $info = Info::where('id',$id)->first();
        return view('detail',compact('info'));
    }

    /*
     * 批量增加数据
     */
    public function batch_add(){

        $date = date("Y-m-d H:i:s");
        $all_array = [];
        $add_array = [
            'title' => 'test',
            'content' => '这是一个新的数据',
            'author' => 'mobpower',
            'time' => $date,
        ];
        for ($i = 1; $i <= 200; $i++){
            array_push($all_array,$add_array);
        }
        $result = DB::table('infos')->insert($all_array);
        if (!$result){
            DB::rollBack();
        }
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
        if(!$request->hasFile('file')){
            exit('上传文件为空！');
        }
        $filePath = '';
        //获取上传文件
        $res = [];
        Excel::load($filePath ,function ($reader){
            $reader = $reader->all();
            $res = $reader->toArray();
            $result = DB::table('infos')->insert($res);
        });

        return Redirect::to('/info')->withSuccess('导入成功');
    }

}
