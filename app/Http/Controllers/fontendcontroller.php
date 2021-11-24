<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theme;
use App\setting;
use App\news;
use App\image;
use App\category;
use App\product;
use App\city;
use App\district;
use App\order;
use Mail;

class fontendcontroller extends Controller
{
    function __construct()
    {
        $head_logo = theme::take(1)->where('note','logo')->orderBy('id','desc')->get();
        $head_banner = theme::take(1)->where('note','banner')->orderBy('id','desc')->get();
        $head_setting = setting::where('id',1)->first();
        $head_category = category::orderBy('views','asc')->get();
        $head_city = city::all();
        $news = news::take(9)->orderBy('id','desc')->get();
        $banner1 = theme::take(3)->where('note',1)->get();
		$hotproduct = product::take(8)->where('hot',1)->orderBy('id','desc')->get();

        view()->share( [
            'head_logo'=>$head_logo,
			'hotproduct'=>$hotproduct,
            'head_banner'=>$head_banner,
            'head_setting'=>$head_setting,
            'news'=>$news,
            'banner1'=>$banner1,
            'head_city'=>$head_city,
            'head_category'=>$head_category
        ]);
    }

    public function home()
    {
		$activemenu = '';
        $home_slide = theme::where('note','slide')->orderBy('id','desc')->get();
		$home_category = category::where('sort_by',1)->orderBy('views','asc')->get();
        $tintuc = news::where('cat_id',39)->orderBy('id','desc')->take(2)->get();
        
        return view('pages.home',[
            'activemenu'=>$activemenu,
            'home_slide'=>$home_slide,
            'home_category'=>$home_category,
            'tintuc'=>$tintuc
            ]);
    }

    public function sitemap()
    {
        $sitemap_category = category::all();
        $sitemap_product = product::all();
        $sitemap_news = news::all();
        return response()->view('pages.sitemap', [
            'sitemap_category' => $sitemap_category,
            'sitemap_product' => $sitemap_product,
            'sitemap_news' => $sitemap_news
            ])->header('Content-Type', 'text/xml');
    }

    public function contact()
    {
		$activemenu = 'lien-he';
		$category = category::where('slug','lien-he')->first();
        return view('pages.contact', [
			'activemenu'=>$activemenu,
			'category'=>$category,
		]);
    }

    public function category($curl)
    {
		$activemenu = $curl;
        $category = category::where('slug',$curl)->first();
        $cat_id = $category["id"];
        
        if ($category["sort_by"]==1) {
            if($category["parent"] == 0)
            {
                $product = product::join('tbl_category', 'tbl_category.id', '=', 'tbl_product.cat_id')
                    ->select('tbl_product.*')
                    ->Where(function ($query) use ($cat_id){
                        return $query->where('status','1')->Where('cat_id',$cat_id);
                    })
                    ->orWhere(function ($query) use ($cat_id){
                        return $query->where('status','1')->Where('parent',$cat_id);
                    })
                    ->orWhere('parent',$cat_id)
                    ->orderBy('id','desc')
                    ->paginate(15);
            }
            else
            {
                $product = product::join('tbl_category', 'tbl_category.id', '=', 'tbl_product.cat_id')
                    ->select('tbl_product.*')
                    ->where('cat_id',$cat_id)->where('status','1')->orderBy('id','desc')->paginate(12);
            }
            return view('pages.product',['activemenu'=>$activemenu, 'category'=>$category,'product'=>$product]);
        }

        if ($category["sort_by"]==2) {
            if($category["parent"] == 0)
            {
                $news = news::join('tbl_category', 'tbl_category.id', '=', 'tbl_news.cat_id')
                    ->select('tbl_news.*')
                    ->Where(function ($query) use ($cat_id){
                        return $query->where('status','1')->Where('cat_id',$cat_id);
                    })
                    ->orWhere(function ($query) use ($cat_id){
                        return $query->where('status','1')->Where('parent',$cat_id);
                    })
                    ->orWhere('parent',$cat_id)
                    ->orderBy('id','desc')
                    ->paginate(12);
            }
            else
            {
                $news = news::join('tbl_category', 'tbl_category.id', '=', 'tbl_news.cat_id')
                    ->select('tbl_news.*')
                    ->where('cat_id',$cat_id)->where('status','1')->orderBy('id','desc')->paginate(10);
            }
            return view('pages.news',['activemenu'=>$activemenu,'category'=>$category,'news'=>$news]);
        }

        if ($category["sort_by"]==3) {
            return view('pages.singlepage',['activemenu'=>$activemenu,'category'=>$category]);
        }
    }
	
	public function city($city)
    {
		$activemenu = $city;
		$city = city::where('slug',$city)->first();
		$product = product::join('tbl_district', 'tbl_district.id', '=', 'tbl_product.dis_id')
			->select('tbl_product.*')
			->where('city_id',$city['id'])
			->orderBy('id','desc')
			->paginate(12);
        return view('pages.product',['activemenu'=>$activemenu,'category'=>$city,'product'=>$product]);
    }
	public function district($city, $dis)
    {
		$activemenu = $dis;
		$district = district::where('slug',$dis)->first();
		$product = product::where('dis_id',$district['id'])->orderBy('id','desc')->paginate(12);
        return view('pages.product',['activemenu'=>$activemenu,'category'=>$district,'product'=>$product]);
    }

    public function singleproduct($curl,$purl,$id)
    {
		$activemenu = $curl;
        $singleproduct = product::findOrFail($id);
        $singleproduct->hits = $singleproduct->hits + 1;
        $singleproduct->save();
        $lienquan = product::where('cat_id',$singleproduct->cat_id)->whereNotin('id',[$id])->take(3)->get();
        return view('pages.singleproduct',['activemenu'=>$activemenu,'singleproduct'=>$singleproduct, 'lienquan'=>$lienquan]);
    }

    public function dangky(Request $Request)
    {
        $activemenu = '';
        //$order = new order;
        //if($Request->name){$order->name = $Request->name;}
        //if($Request->tel){$order->phone = $Request->tel;}
        //$order->email = $Request->email;
        //$order->link = $Request->link;
        //$order->view = 0;
        //$order->date = date('d/m/Y h:i:s');
        //$order->save();
        $name = $Request->name;
        $tel = $Request->tel;
        $email = $Request->email;
        $link = $Request->link;
        $title = $Request->title;
        $content = $Request->content;
        Mail::send('email_feedback', array('name'=>$name,'tel'=>$tel,'email'=>$email,'link'=>$link,'content'=>$content), function($message){
            $message->from('haithinhland@gmail.com', 'http://haithinhland.com/');
            $message->to('haithinhland@gmail.com', 'http://haithinhland.com/')->subject('Thông tin khách hàng');
			$message->from('hoangnn1.dxmb@gmail.com', 'http://haithinhland.com/');
            $message->to('hoangnn1.dxmb@gmail.com', 'http://haithinhland.com/')->subject('Thông tin khách hàng');
        });
        return view('pages.thanhcong',['activemenu'=>$activemenu,])->with('Alerts','Gửi thành công');
    }

    public function singlenews($nurl,$id)
    {
        $singlenews = news::find($id);
		$activemenu = $singlenews->category->slug;
        $singlenews->hits = $singlenews->hits + 1;
        $singlenews->save();
        $tinlienquan = news::where('cat_id',$singlenews->cat_id)->whereNotin('id',[$id])->take(10)->get();
        return view('pages.singlenews',['activemenu'=>$activemenu,'singlenews'=>$singlenews, 'tinlienquan'=>$tinlienquan]);
    }

    public function search(Request $Request)
    {
		$activemenu = '';
        $key = $Request->key;
        $product = product::where('name','like',"%$key%")->take(10)->paginate(10);
        $news = news::where('name','like',"%$key%")->take(10)->paginate(10);
        return view('pages.search',['activemenu'=>$activemenu,'product'=>$product,'news'=>$news,'key'=>$key]);
    }

}


