<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theme;

class themecontroller extends Controller
{
    //
    public function getlist()
    {
        $logo = theme::where('note','logo')->get();
        $banner = theme::where('note','banner')->get();
        $slide = theme::where('note','slide')->get();
        $banner1 = theme::where('note','1')->get();
        $banner2 = theme::where('note','2')->get();
        $banner3 = theme::where('note','3')->get();
        return view('admin.theme.list',[
            'logo'=>$logo,
            'banner'=>$banner,
            'slide'=>$slide,
            'banner1'=>$banner1,
            'banner2'=>$banner2,
            'banner3'=>$banner3
            ]);
    }

    public function getadd()
    {
        return view('admin.theme.add');
    }

    public function postadd(Request $Request)
    {
        $this->validate($Request,
            [
                'name' => 'Required|min:3|max:50',
            ],
            [
                // 'name.Required'=>'Lỗi ! Bạn chưa nhập tên',
                // 'name.unique'=>'Lỗi ! trùng tên',
                // 'name.min'=>'Lỗi ! Tên phải nhập có độ dài từ 3 -> 50 ký tự',
                // 'name.max'=>'Lỗi ! Tên phải nhập có độ dài từ 3 -> 50 ký tự',
            ] );
        $theme = new theme;
        $theme->name = $Request->name;
        $theme->note = $Request->note;
        $theme->link = $Request->link;
        if ($Request->img) {
            $theme->img = $Request->img;
        }
        
        $theme->save();

        return redirect('admin/theme/list')->with('Alerts','Thành công');

    }

    public function getedit($id)
    {
        $theme = theme::findOrFail($id)->toArray();
        return view('admin.theme.edit',['theme'=>$theme]);
    }

    public function postedit(Request $Request,$id)
    {
        $theme = theme::find($id);
        $this->validate($Request,
            [
                'name' => 'Required|min:3|max:50',
            ],
            [
            ] );

        $theme->name = $Request->name;
        $theme->note = $Request->note;
        $theme->link = $Request->link;
        if ($Request->img) {
            $theme->img = $Request->img;
        }

        $theme->save();

        return redirect('admin/theme/edit/'.$id)->with('Alerts','Thành công');
    }

    public function getdelete($id)
    {
        $theme = theme::find($id);
        $theme->delete();

        return redirect('admin/theme/list')->with('Alerts','Thành công');
    }
}
