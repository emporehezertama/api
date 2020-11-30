<?php

namespace App\Http\Controllers;

use App\Models\BaseSetting;
use App\Models\BaseUsers;
use App\Models\CrmModule;
use App\Models\CrmModuleAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class CrmController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function insertModule(Request $request) 
    {
        if($request->get('db_name')!=null) {
            Config::set("database.connections.mysql", [
                "driver" => "mysql",
                "host" => env('DB_HOST'),
                "database" => $request->get('db_name'),
                "username" => env('DB_USERNAME'),
                "password" => env('DB_PASSWORD')
            ]);
        }
        $data                   = new CrmModule();
        $data->project_id       = $request->get('project_id');
        $data->project_name     = $request->get('project_name');
        $data->client_name      = $request->get('client_name');
        $data->crm_product_id   = $request->get('crm_product_id');
        if($request->get('limit_user') > 0){
            $data->limit_user       = $request->get('limit_user');
        }
        $data->modul_name       = $request->get('modul_name');
        $data->save();
        return response()->json(['status' => "success", "project_name" => $data->project_name], 201);
    }

    public function insertUser(Request $request) 
    {
        if($request->get('db_name')!=null) {
            Config::set("database.connections.mysql", [
                "driver" => "mysql",
                "host" => env('DB_HOST'),
                "database" => $request->get('db_name'),
                "username" => env('DB_USERNAME'),
                "password" => env('DB_PASSWORD')
            ]);
        }
        $data                   = new BaseUsers();
        $data->nik              = $request->get('user_name');
        $data->password         = $request->get('password');
        $data->access_id        = 3; //login admin
        $data->project_id       = $request->get('project_id');
        $data->save();
//        $crmModules = CrmModule::all();
//        foreach ($crmModules as $module){
//            $newAdminModule = new CrmModuleAdmin();
//            $newAdminModule->user_id = $data->id;
//            $newAdminModule->product_id = $module->crm_product_id;
//            $newAdminModule->save();
//        }
        BaseSetting::create(['key'=>'mail_address','value'=>'noreply-emporeht@gmail.com','project_id'=>$request->get('project_id')]);
        BaseSetting::create(['key'=>'struktur_organisasi','value'=>'3','project_id'=>$request->get('project_id')]);
        BaseSetting::create(['key'=>'language','value'=>'en','project_id'=>$request->get('project_id')]);
        BaseSetting::create(['key'=>'app_debug','value'=>'false','project_id'=>$request->get('project_id')]);
        BaseSetting::create(['key'=>'bpjs_jkk_company','value'=>'0.24','project_id'=>$request->get('project_id')]);
        BaseSetting::create(['key'=>'bpjs_jkm_company','value'=>'0.3','project_id'=>$request->get('project_id')]);
        BaseSetting::create(['key'=>'bpjs_jht_company','value'=>'3.7','project_id'=>$request->get('project_id')]);
        BaseSetting::create(['key'=>'bpjs_pensiun_company','value'=>'2','project_id'=>$request->get('project_id')]);
        BaseSetting::create(['key'=>'bpjs_kesehatan_company','value'=>'4','project_id'=>$request->get('project_id')]);
        BaseSetting::create(['key'=>'bpjs_jaminan_jht_employee','value'=>'2','project_id'=>$request->get('project_id')]);
        BaseSetting::create(['key'=>'bpjs_jaminan_jp_employee','value'=>'1','project_id'=>$request->get('project_id')]);
        BaseSetting::create(['key'=>'bpjs_kesehatan_employee','value'=>'1','project_id'=>$request->get('project_id')]);
        return response()->json(['status' => "success"], 201);
    }

    public function updateModule(Request $request)
    {
        //delete dulu data dri crm module yang sudah ada kemudian nanti insert yang baru
        if($request->get('db_name')!=null) {
            Config::set("database.connections.mysql", [
                "driver" => "mysql",
                "host" => env('DB_HOST'),
                "database" => $request->get('db_name'),
                "username" => env('DB_USERNAME'),
                "password" => env('DB_PASSWORD')
            ]);
        }
        CrmModule::where([
            'project_id'=>$request->get('project_id'),
            'crm_product_id'=>$request->get('crm_product_id')
        ])->delete();

        $data                   = new CrmModule();
        $data->project_id       = $request->get('project_id');
        $data->project_name     = $request->get('project_name');
        $data->client_name      = $request->get('client_name');
        $data->crm_product_id   = $request->get('crm_product_id');
        if($request->get('limit_user') > 0){
            $data->limit_user       = $request->get('limit_user');
        }
        $data->modul_name       = $request->get('modul_name');
        $data->save();

        return response()->json(['status' => "success", "project_name" => $data->project_name], 201);
    }
    public function deleteModule(Request $request)
    {
        //delete dulu data dri crm module yang sudah ada kemudian nanti insert yang baru
        if($request->get('db_name')!=null) {
            Config::set("database.connections.mysql", [
                "driver" => "mysql",
                "host" => env('DB_HOST'),
                "database" => $request->get('db_name'),
                "username" => env('DB_USERNAME'),
                "password" => env('DB_PASSWORD')
            ]);
        }
        CrmModule::where([
            'project_id'=>$request->get('project_id'),
            'crm_product_id'=>$request->get('crm_product_id')
        ])->delete();

        CrmModuleAdmin::join('users as u', 'user_id','=','u.id')
            ->where([
                'product_id'=>$request->get('crm_product_id'),
                'u.project_id'=>$request->get('project_id')
             ])->delete();

        return response()->json(['status' => "success"], 201);
    }
}
