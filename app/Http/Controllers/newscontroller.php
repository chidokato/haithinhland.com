<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\news;
use App\category;

class newscontroller extends Controller
{
    //
    public function getlist()
    {
        
    	$news = news::orderBy('id','desc')->paginate(10);
    	return view('admin.news.list',['news'=>$news]);
    }

    public function getadd()
    {
        $data = category::select('id','name','parent')->where('sort_by',2)->get()->toArray();
    	return view('admin.news.add',['data'=>$data]);
    }

    public function postadd(Request $Request)
    {
    	// echo $Request->name;
        $now = getdate();
    	$this->validate($Request,
    		[
                'name' => 'Required|min:3|max:150',
    		],
    		[
    			// 'name.Required'=>'Lỗi ! Bạn chưa nhập tên',
    			// 'name.min'=>'Lỗi ! Tên phải nhập có độ dài từ 5 -> 150 ký tự',
    			// 'name.max'=>'Lỗi ! Tên phải nhập có độ dài từ 5 -> 150 ký tự',
    		] );
    	$news = new news;
    	$news->cat_id = $Request->cat_id;
    	$news->user = 'admin';
    	$news->name = $Request->name;
        $news->slug = changeTitle($Request->name);
        $news->detail = $Request->detail;
        $news->content = $Request->content;
        $news->status = $Request->status;
        $news->hot = $Request->hot;
        $news->tag = $Request->tag;
        $news->title = $Request->title;
        $news->description = $Request->description;
        $news->desc_size = $Request->left;
        $news->keywords = $Request->keywords;
    	$news->robot = $Request->robot;
        $news->date = $now["mday"] . "-" . $now["mon"] . "-" . $now["year"];
        if($Request->img)
    	{
    		$news->img = $Request->img;
    	}
        
        $news->save();

        return redirect('admin/news/list')->with('Alerts','Thành công');

    }

    public function getedit($id)
    {
        $datacategory = category::select('id','name','parent')->where('sort_by',2)->get()->toArray();
        $news = news::findOrFail($id)->toArray();
    	return view('admin.news.edit',['news'=>$news,'datacategory'=>$datacategory]);
    }

    public function postedit(Request $Request,$id)
    {
        $now = getdate();        
        $this->validate($Request,
            [
                'name' => 'Required|min:3|max:150',
            ],
            [
                // 'name.Required'=>'Lỗi ! Bạn chưa nhập tên',
                // 'name.unique'=>'Lỗi ! trùng tên',
                // 'name.min'=>'Lỗi ! Tên phải nhập có độ dài từ 3 -> 50 ký tự',
                // 'name.max'=>'Lỗi ! Tên phải nhập có độ dài từ 3 -> 50 ký tự',
            ] );
        $news = news::find($id);
        $news->cat_id = $Request->cat_id;
        $news->user = 'admin';
        $news->name = $Request->name;
        $news->slug = $Request->slug;
        //$news->img = 'img';
        $news->detail = $Request->detail;
        $news->content = $Request->content;
        //$news->hits = 0;
        $news->status = $Request->status;
        $news->hot = $Request->hot;
		$news->tag = $Request->tag;
        $news->title = $Request->title;
        $news->description = $Request->description;
        $news->desc_size = $Request->left;
        $news->keywords = $Request->keywords;
        $news->robot = $Request->robot;
        $news->date_up = $now["mday"] . "-" . $now["mon"] . "-" . $now["year"];
        if($Request->img)
        {
            $news->img = $Request->img;
        }

        $news->save();

        return redirect('admin/news/edit/'.$id)->with('Alerts','Thành công');
    }

    public function getdelete($id)
    {
        $news = news::find($id);
        $news->delete();

        return redirect('admin/news/list')->with('Alerts','Thành công');
    }
}
