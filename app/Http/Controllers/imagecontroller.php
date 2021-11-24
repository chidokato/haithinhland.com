<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\image;

class imagecontroller extends Controller
{
    public function getlist($id)
    {
    	$product = product::findOrFail($id);
    	$imagelist = image::where('product_id','=',$id)->get()->toArray();
    	return view('admin.image.list',['product'=>$product,'imagelist'=>$imagelist]);
    }

    public function postadd(Request $Request,$id)
    {
    	$this->validate($Request,
    		[
                'name' => 'Required',
                'img' => 'Required'
    		],
    		[
    		] );
    	$image = new image;
        $image->name = $Request->name;
        $image->product_id = $id;
        if($Request->img)
        {
            $image->img = $Request->img;
        }
        
        $image->save();

        return redirect('admin/image/list/'.$id)->with('Alerts','Thành công');

    }

    public function getedit($id,$pid)
    {
        $product = product::findOrFail($pid);
        $image = image::findOrFail($id);
        $imagelist = image::where('product_id','=',$pid)->get()->toArray();
    	return view('admin.image.edit',['image'=>$image,'product'=>$product,'imagelist'=>$imagelist]);
    }

    public function postedit(Request $Request,$id,$pid)
    {
        $this->validate($Request,
            [
                'name' => 'Required',
            ],
            [
            ] );
        $image = image::find($id);
        $image->name = $Request->name;
        $image->product_id = $pid;
    	if($Request->img)
    	{
    		$image->img = $Request->img;
    	}

        $image->save();

        return redirect('admin/image/list/'.$pid)->with('Alerts','Thành công');
    }

    public function getdelete($id,$pid)
    {
        $image = image::find($id);
        $image->delete();

        return redirect('admin/image/list/'.$pid)->with('Alerts','Thành công');
    }
}
