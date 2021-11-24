<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\city;
use App\district;

class locationcontroller extends Controller
{
    public function getlist()
    {
    	$city = city::all();
    	// $district = district::all();
    	return view('admin.location.list',['city'=>$city]);
    }

    public function getaddcity()
    {
        //$data = city::select('id','city_name','parent_id')->get()->toArray();
        //print_r($data);
    	return view('admin.location.addcity');
    }

    public function postaddcity(Request $Request)
    {
    	$now = getdate();
    	$this->validate($Request,
    		[
    			'name' => 'Required|unique:tbl_city,name|min:3|max:50'
    		],
    		[
    			// 'name.Required'=>'Lỗi ! Bạn chưa nhập tên',
    			// 'name.min'=>'Lỗi ! Tên phải nhập có độ dài từ 3 -> 50 ký tự',
    			// 'name.max'=>'Lỗi ! Tên phải nhập có độ dài từ 3 -> 50 ký tự',
    		] );
    	$city = new city;
        $city->name = $Request->name;
        $city->slug = changeTitle($Request->name);
        $city->view = $Request->view;
        $city->date = $now["mday"] . "-" . $now["mon"] . "-" . $now["year"];
        $city->title = $Request->title;
        $city->description = $Request->description;
        $city->keywords = $Request->keywords;
    	$city->robot = $Request->robot;
        $city->save();
        return redirect('admin/location/list')->with('Alerts','Thành công');
    }

    public function getadddistrict()
    {
        $city = city::all();
        //print_r($data);
    	return view('admin.location.adddistrict',['city'=>$city]);
    }

    public function postadddistrict(Request $Request)
    {
    	// echo $Request->name;
    	$now = getdate();
    	$this->validate($Request,
    		[
    			'name' => 'Required|unique:tbl_district,name|min:3|max:50'
    		],
    		[
    			// 'name.Required'=>'Lỗi ! Bạn chưa nhập tên',
    			// 'name.min'=>'Lỗi ! Tên phải nhập có độ dài từ 3 -> 50 ký tự',
    			// 'name.max'=>'Lỗi ! Tên phải nhập có độ dài từ 3 -> 50 ký tự',
    		] );
    	$district = new district;
        $district->name = $Request->name;
        $district->city_id = $Request->city_id;
        $district->slug = changeTitle($Request->name);
        $district->view = $Request->view;
        $district->date = $now["mday"] . "-" . $now["mon"] . "-" . $now["year"];
        $district->title = $Request->title;
        $district->description = $Request->description;
        $district->keywords = $Request->keywords;
    	$district->robot = $Request->robot;
        $district->save();
        return redirect('admin/location/list')->with('Alerts','Thành công');
    }

    public function geteditcity($id)
    {
        $city = city::find($id);
        //$cityparent = city::select('id','city_name','parent_id')->get();
        //$city = city::find($id);
    	return view('admin.location.editcity',['city'=>$city]);
    }

    public function posteditcity(Request $Request,$id)
    {
    	$now = getdate();
        
        $this->validate($Request,
            [
                'name' => 'Required|min:3|max:50'
            ],
            [
                // 'name.Required'=>'Lỗi ! Bạn chưa nhập tên',
                // 'name.unique'=>'Lỗi ! trùng tên',
                // 'name.min'=>'Lỗi ! Tên phải nhập có độ dài từ 3 -> 50 ký tự',
                // 'name.max'=>'Lỗi ! Tên phải nhập có độ dài từ 3 -> 50 ký tự',
            ] );
        $city = city::find($id);
        $city->name = $Request->name;
        $city->slug = changeTitle($Request->name);
        $city->view = $Request->view;
        $city->date = $now["mday"] . "-" . $now["mon"] . "-" . $now["year"];
        $city->title = $Request->title;
        $city->description = $Request->description;
        $city->keywords = $Request->keywords;
    	$city->robot = $Request->robot;
        $city->save();
        return redirect('admin/location/editcity/'.$id)->with('Alerts','Thành công');
    }

    public function geteditdistrict($id)
    {
        $district = district::find($id);
        //$cityparent = city::select('id','city_name','parent_id')->get();
        $city = city::all();
    	return view('admin.location.editdistrict',['district'=>$district,'city'=>$city]);
    }

    public function posteditdistrict(Request $Request,$id)
    {
    	$now = getdate();
        
        $this->validate($Request,
            [
                'name' => 'Required|min:3|max:50'
            ],
            [
                // 'name.Required'=>'Lỗi ! Bạn chưa nhập tên',
                // 'name.unique'=>'Lỗi ! trùng tên',
                // 'name.min'=>'Lỗi ! Tên phải nhập có độ dài từ 3 -> 50 ký tự',
                // 'name.max'=>'Lỗi ! Tên phải nhập có độ dài từ 3 -> 50 ký tự',
            ] );
        $district = district::find($id);
        $district->name = $Request->name;
        $district->city_id = $Request->city_id;
        $district->slug = changeTitle($Request->name);
        $district->view = $Request->view;
        $district->date = $now["mday"] . "-" . $now["mon"] . "-" . $now["year"];
        $district->title = $Request->title;
        $district->description = $Request->description;
        $district->keywords = $Request->keywords;
    	$district->robot = $Request->robot;
        $district->save();
        return redirect('admin/location/editdistrict/'.$id)->with('Alerts','Thành công');
    }

    public function getdeletecity($id)
    {
        $city = city::find($id);
        $city->delete();

        return redirect('admin/location/list')->with('Alerts','Thành công');
    }
    public function getdeletedistrict($id)
    {
        $district = district::find($id);
        $district->delete();

        return redirect('admin/location/list')->with('Alerts','Thành công');
    }
}
