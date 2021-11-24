<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;

class categorycontroller extends Controller
{
    public function getlist()
    {
        $cat_data = category::orderBy('views','asc')->get();
    	return view('admin.category.list',[
            'cat_data'=>$cat_data
        ]);
    }

    public function getadd($id)
    {
        $data = category::select('id','name','parent')->where('sort_by',$id)->get()->toArray();
        //print_r($data);
    	return view('admin.category.add',['data'=>$data,'id'=>$id]);
    }

    public function postadd(Request $Request,$id)
    {
    	$now = getdate();
    	$this->validate($Request,
    		[
    			'name' => 'Required|unique:tbl_category,name|min:3|max:50'
    		],
    		[
    			// 'name.Required'=>'Lỗi ! Bạn chưa nhập tên',
    			// 'name.min'=>'Lỗi ! Tên phải nhập có độ dài từ 3 -> 50 ký tự',
    			// 'name.max'=>'Lỗi ! Tên phải nhập có độ dài từ 3 -> 50 ký tự',
    		] );
    	$category = new category;
        $category->name = $Request->name;
        $category->sort_by = $id;
        $category->parent = $Request->parent_id;
    	$category->user = 'admin';
        $category->slug = changeTitle($Request->name);
        $category->views = $Request->view;
        $category->content = $Request->content;
        $category->title = $Request->title;
        $category->description = $Request->description;
        $category->keywords = $Request->keywords;
    	$category->robot = $Request->robot;
    	$category->date = $now["mday"] . "-" . $now["mon"] . "-" . $now["year"];
        $category->save();

        return redirect('admin/category/list')->with('Alerts','Thành công');

    }

    public function getedit($id)
    {
        $data = category::findOrFail($id)->toArray();
        $categoryparent = category::select('id','name','parent')->where('sort_by',$data['sort_by'])->get();
        //$category = category::find($id);
    	return view('admin.category.edit',['data'=>$data,'categoryparent'=>$categoryparent]);
    }

    public function postedit(Request $Request,$id)
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
        $category = category::find($id);
        $category->name = $Request->name;
        $category->parent = $Request->parent;
    	$category->user = 'admin';
        $category->slug = $Request->slug;
        $category->views = $Request->view;
        $category->content = $Request->content;
        $category->title = $Request->title;
        $category->description = $Request->description;
        $category->keywords = $Request->keywords;
    	$category->robot = $Request->robot;
    	$category->date_up = $now["mday"] . "-" . $now["mon"] . "-" . $now["year"];
        $category->save();

        return redirect('admin/category/edit/'.$id)->with('Alerts','Thành công');
    }

    public function getdelete($id)
    {
        $category = category::find($id);
        $category->delete();

        return redirect('admin/category/list')->with('Alerts','Thành công');
    }
}