<?php

namespace App\Http\Controllers;

use App\Models\BaseUsers;
use App\Models\CrmModule;
use App\Models\CrmModuleAdmin;
use App\Models\UsersMhr;
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
        $data->access_id        = 1; //login admin
        $data->project_id       = $request->get('project_id');
        $data->save();
        $crmModules = CrmModule::all();
        foreach ($crmModules as $module){
            $newAdminModule = new CrmModuleAdmin();
            $newAdminModule->user_id = $data->id;
            $newAdminModule->product_id = $module->crm_product_id;
            $newAdminModule->save();
        }
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
        CrmModule::where('project_id',$request->get('project_id'))->delete();

        $data                   = new CrmModule();
        $data->project_id       = $request->get('project_id');
        $data->project_name     = $request->get('project_name');
        $data->client_name      = $request->get('client_name');
        //$data->user_name        = $request->get('user_name');
        //$data->password         = $request->get('password');
        $data->crm_product_id   = $request->get('crm_product_id');
        if($request->get('limit_user') > 0){
            $data->limit_user       = $request->get('limit_user');
        }
        $data->modul_name       = $request->get('modul_name');
        $data->save();

        return response()->json(['status' => "success", "project_name" => $data->project_name], 201);
    }
}
