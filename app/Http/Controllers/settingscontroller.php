<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class SettingController extends Controller
{
    public function index() {
        $maintenance = DB::table('configurations')->where('name', '=', 'maintenance')->get();
        $maintenanceSetting = false;
        if($maintenance[0]->value == 'on') {
            $maintenanceSetting = true;
        }
        return view('setting', [
            'maintenanceSetting' => $maintenanceSetting
        ]);
    }
    public function update() {
        if(request('maintenance') == 'on') {
            DB::table('configurations')
                ->where('name', '=', 'maintenance')
                ->update(['value' => 'on']);
        } else {
            DB::table('configurations')
                ->where('name', '=', 'maintenance')
                ->update(['value' => 'off']);
        }
        return redirect('/settings');
    }
}