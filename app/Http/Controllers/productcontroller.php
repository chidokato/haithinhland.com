<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\product;
use App\city;
use App\district;

class productcontroller extends Controller
{
    //
    public function getlist()
    {
        $product = product::orderBy('id','desc')->get();
    	$stt = product::count();
    	return view('admin.product.list',['stt'=>$stt,'product'=>$product]);
    }

    public function getadd()
    {
        $data = category::select('id','name','parent')->where('sort_by',1)->get()->toArray();
        $city = city::all();
        $district = district::all();
    	return view('admin.product.add',['data'=>$data,'city'=>$city,'district'=>$district]);
    }

    public function postadd(Request $Request)
    {
    	// echo $Request->name;
        $now = getdate();
    	$this->validate($Request,
    		[
                'name' => 'Required|min:3|max:150',
    			'cat_id' => 'Required'
    		],
    		[
    			// 'name.Required'=>'Lỗi ! Bạn chưa nhập tên',
    			// 'name.min'=>'Lỗi ! Tên phải nhập có độ dài từ 5 -> 150 ký tự',
    			// 'name.max'=>'Lỗi ! Tên phải nhập có độ dài từ 5 -> 150 ký tự',
    		] );
    	$product = new product;
        $product->name = $Request->name;
        $product->slug = changeTitle($Request->name);
        $product->cat_id = $Request->cat_id;
        $product->address = $Request->address;
        $product->dis_id = $Request->dis_id;
        $product->price = $Request->price;
        $product->investor = $Request->investor;
        $product->complete = $Request->complete;
        $product->hotline = $Request->hotline;
        $product->status = $Request->status;
        $product->hot = $Request->hot;
        $product->tag = $Request->tag;
        $product->detail = $Request->detail;
        $product->content = $Request->content;
        $product->content1 = $Request->content1;
        $product->content2 = $Request->content2;
        $product->content3 = $Request->content3;
        $product->content4 = $Request->content4;
        $product->content5 = $Request->content5;
        $product->content6 = $Request->content6;
        $product->heading = $Request->heading;
        $product->heading1 = $Request->heading1;
        $product->heading2 = $Request->heading2;
        $product->heading3 = $Request->heading3;
        $product->heading4 = $Request->heading4;
        $product->heading5 = $Request->heading5;
        $product->heading6 = $Request->heading6;
        $product->date = $now["mday"] . "-" . $now["mon"] . "-" . $now["year"];
        $product->title = $Request->title;
        $product->description = $Request->description;
        $product->desc_size = $Request->left;
        $product->keywords = $Request->keywords;
        $product->robot = $Request->robot;
        
        if($Request->img)
    	{
    		$product->img = $Request->img;
    	}
    	
        $product->save();

        return redirect('admin/product/list')->with('Alerts','Thành công');

    }

    public function getaddimg($id)
    {
        $data = category::select('id','name','parent')->where('sort_by',1)->get()->toArray();

        return view('admin.product.add',['data'=>$data]);
    }

    public function getedit($id)
    {
        $data = product::find($id);
        $datacategory = category::select('id','name','parent')->where('sort_by',1)->get()->toArray();
        $city = city::all();
        $district = district::all();
    	return view('admin.product.edit',['data'=>$data,'datacategory'=>$datacategory,'city'=>$city,'district'=>$district]);
    }

    public function postedit(Request $Request,$id)
    {
        $now = getdate();        
        $this->validate($Request,
            [
                'name' => 'Required|min:3|max:150',
                'cat_id' => 'Required'
            ],
            [
                // 'name.Required'=>'Lỗi ! Bạn chưa nhập tên',
                // 'name.unique'=>'Lỗi ! trùng tên',
                // 'name.min'=>'Lỗi ! Tên phải nhập có độ dài từ 3 -> 50 ký tự',
                // 'name.max'=>'Lỗi ! Tên phải nhập có độ dài từ 3 -> 50 ký tự',
            ] );
        $product = product::find($id);
        $product->name = $Request->name;
        $product->slug = $Request->slug;
        $product->cat_id = $Request->cat_id;
        $product->address = $Request->address;
        $product->dis_id = $Request->dis_id;
        $product->price = $Request->price;
        $product->investor = $Request->investor;
        $product->complete = $Request->complete;
        $product->hotline = $Request->hotline;
        $product->status = $Request->status;
        $product->hot = $Request->hot;
		$product->tag = $Request->tag;
        $product->detail = $Request->detail;
        $product->heading = $Request->heading;
        $product->heading1 = $Request->heading1;
        $product->heading2 = $Request->heading2;
        $product->heading3 = $Request->heading3;
        $product->heading4 = $Request->heading4;
        $product->heading5 = $Request->heading5;
        $product->heading6 = $Request->heading6;
        $product->content = $Request->content;
        $product->content1 = $Request->content1;
        $product->content2 = $Request->content2;
        $product->content3 = $Request->content3;
        $product->content4 = $Request->content4;
        $product->content5 = $Request->content5;
        $product->content6 = $Request->content6;
        $product->date_up = $now["mday"] . "-" . $now["mon"] . "-" . $now["year"];
        $product->title = $Request->title;
        $product->description = $Request->description;
        $product->desc_size = $Request->left;
        $product->keywords = $Request->keywords;
        $product->robot = $Request->robot;

        if($Request->img)
        {
            $product->img = $Request->img;
        }

        $product->save();

        return redirect('admin/product/edit/'.$id)->with('Alerts','Thành công');
    }

    public function getdelete($id)
    {
        $product = product::find($id);
        $product->delete();

        return redirect('admin/product/list')->with('Alerts','Thành công');
    }
}
