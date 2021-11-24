<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\matbangtoa;
use App\matbangcan;
use App\product;

class c_matbang extends Controller
{
    public function getlist($id)
    {
    	$product = product::findOrFail($id);
    	return view('admin.matbang.list',['product'=>$product]);
    }

    public function postadd(Request $Request,$id)
    {
    	$this->validate($Request,
    		[
                'img' => 'Required'
    		],
    		[
    		] );
    	$matbangtoa = new matbangtoa;
        $matbangtoa->name = $Request->name;
        $matbangtoa->p_id = $id;
        if($Request->img)
        {
            $matbangtoa->img = $Request->img;
        }
    	
        $matbangtoa->save();
        return redirect('admin/matbang/list/'.$id)->with('Alerts','Thành công');
    }

    public function postadd2(Request $Request,$id)
    {
    	$this->validate($Request,
    		[
                'img' => 'Required'
    		],
    		[
    		] );
    	$matbangcan = new matbangcan;
        $matbangcan->name = $Request->name;
        $matbangcan->mb_id = $Request->mb_id;
        if($Request->img)
        {
            $matbangcan->img = $Request->img;
        }
        $matbangcan->save();
        return redirect('admin/matbang/list/'.$id)->with('Alerts','Thành công');
    }

    public function getedit($id,$pid)
    {
        $product = product::findOrFail($pid);
        $matbang = matbangtoa::findOrFail($id);
    	return view('admin.matbang.edit',['matbang'=>$matbang,'product'=>$product]);
    }

    public function getedit2($id,$pid)
    {
        $product = product::findOrFail($pid);
        $matbang = matbangcan::findOrFail($id);
    	return view('admin.matbang.edit2',['matbang'=>$matbang,'product'=>$product]);
    }

    public function postedit(Request $Request,$id,$pid)
    {
        $this->validate($Request,
            [
            ],
            [
            ] );
        $matbang = matbangtoa::find($id);
        $matbang->name = $Request->name;
        $matbang->p_id = $pid;
        if($Request->img)
        {
            $matbang->img = $Request->img;
        }

        $matbang->save();

        return redirect('admin/matbang/list/'.$pid)->with('Alerts','Thành công');
    }

    public function postedit2(Request $Request,$id,$pid)
    {
        $this->validate($Request,
            [
            ],
            [
            ] );
        $matbang = matbangcan::find($id);
        $matbang->name = $Request->name;
        $matbang->mb_id = $Request->mb_id;
        if($Request->img)
        {
            $matbang->img = $Request->img;
        }

        $matbang->save();

        return redirect('admin/matbang/list/'.$pid)->with('Alerts','Thành công');
    }

    public function getdelete($id,$pid)
    {
        $matbang = matbangtoa::find($id);
        $matbang->delete();
        return redirect('admin/matbang/list/'.$pid)->with('Alerts','Thành công');
    }

    public function getdelete2($id,$pid)
    {
        $matbang = matbangcan::find($id);
        $matbang->delete();
        return redirect('admin/matbang/list/'.$pid)->with('Alerts','Thành công');
    }
}
