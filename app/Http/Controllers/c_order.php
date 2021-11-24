<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;

class c_order extends Controller
{
    public function getlist()
    {
    	$order = order::orderBy('id','desc')->get();
        $count = order::where('view',0)->count();
        $stt = order::count();
    	return view('admin.order.list',['order'=>$order, 'count'=>$count, 'stt'=>$stt ]);
    }

    public function check($id)
    {
        $order = order::find($id);
        $order->view = 1;
        $order->save();

        return redirect('admin/order/list/')->with('Alerts','Check thành công');
    }

    public function getdelete($id)
    {
        $order = order::find($id);
        $order->delete();
        return redirect('admin/order/list/')->with('Alerts','Thành công');
    }
}
