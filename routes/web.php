<?php




Route::get('admin_login','usercontroller@getlogin');
Route::post('admin/login','usercontroller@postlogin');
Route::get('admin/logout','usercontroller@getlogout');

Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function(){
	
	Route::get('dashboard','dashboardcontroller@dashboard');
	
	Route::group(['prefix'=>'category'],function(){
		Route::get('list','categorycontroller@getlist');

		Route::get('edit/{id}','categorycontroller@getedit');
		Route::post('edit/{id}','categorycontroller@postedit');

		Route::get('add/{id}','categorycontroller@getadd');
		Route::post('add/{id}','categorycontroller@postadd');

		Route::get('delete/{id}','categorycontroller@getdelete');
	});

	Route::group(['prefix'=>'news'],function(){
		Route::get('list','newscontroller@getlist');

		Route::get('edit/{id}','newscontroller@getedit');
		Route::post('edit/{id}','newscontroller@postedit');

		Route::get('add','newscontroller@getadd');
		Route::post('add','newscontroller@postadd');

		Route::get('delete/{id}','newscontroller@getdelete');
	});

	Route::group(['prefix'=>'theme'],function(){
		Route::get('list','themecontroller@getlist');

		Route::get('add','themecontroller@getadd');
		Route::post('add','themecontroller@postadd');

		Route::get('edit/{id}','themecontroller@getedit');
		Route::post('edit/{id}','themecontroller@postedit');

		Route::get('delete/{id}','themecontroller@getdelete');
	});

	Route::group(['prefix'=>'user'],function(){
		Route::get('list','usercontroller@getlist');

		Route::get('edit/{id}','usercontroller@getedit');
		Route::post('edit/{id}','usercontroller@postedit');

		Route::get('add','usercontroller@getadd');
		Route::post('add','usercontroller@postadd');

		Route::get('delete/{id}','usercontroller@getdelete');
	});

	Route::group(['prefix'=>'location'],function(){
		Route::get('list','locationcontroller@getlist');

		Route::get('addcity','locationcontroller@getaddcity');
		Route::post('addcity','locationcontroller@postaddcity');

		Route::get('editcity/{id}','locationcontroller@geteditcity');
		Route::post('editcity/{id}','locationcontroller@posteditcity');

		Route::get('adddistrict','locationcontroller@getadddistrict');
		Route::post('adddistrict','locationcontroller@postadddistrict');

		Route::get('editdistrict/{id}','locationcontroller@geteditdistrict');
		Route::post('editdistrict/{id}','locationcontroller@posteditdistrict');

		Route::get('deletecity/{id}','locationcontroller@getdeletecity');
		Route::get('deletedistrict/{id}','locationcontroller@getdeletedistrict');
	});

	Route::group(['prefix'=>'nav'],function(){
		Route::get('list','navcontroller@getlist');

		Route::post('add','navcontroller@postadd');

		Route::get('delete/{id}','navcontroller@getdelete');
	});

	Route::group(['prefix'=>'product'],function(){
		Route::get('list','productcontroller@getlist');

		Route::get('edit/{id}','productcontroller@getedit');
		Route::post('edit/{id}','productcontroller@postedit');

		Route::get('add','productcontroller@getadd');
		Route::post('add','productcontroller@postadd');

		Route::get('delete/{id}','productcontroller@getdelete');
	});

	Route::group(['prefix'=>'image'],function(){
		Route::get('list/{id}','imagecontroller@getlist');

		Route::get('edit/{id}/{pid}','imagecontroller@getedit');
		Route::post('edit/{id}/{pid}','imagecontroller@postedit');

		Route::post('add/{id}','imagecontroller@postadd');

		Route::get('delete/{id}/{pid}','imagecontroller@getdelete');
	});

	Route::group(['prefix'=>'contact'],function(){
		Route::get('list','c_contact@getlist');

		Route::post('edit/{id}','c_contact@postedit');
	});

	Route::group(['prefix'=>'setting'],function(){
		Route::get('list','c_setting@getlist');

		Route::post('edit/{id}','c_setting@postedit');
	});

	Route::group(['prefix'=>'order'],function(){
		Route::get('list','c_order@getlist');

		Route::get('check/{id}','c_order@check');

		Route::get('delete/{id}','c_order@getdelete');
	});

	Route::group(['prefix'=>'matbang'],function(){
		Route::get('list/{id}','c_matbang@getlist');

		Route::get('edit/{id}/{pid}','c_matbang@getedit');
		Route::post('edit/{id}/{pid}','c_matbang@postedit');

		Route::get('edit2/{id}/{pid}','c_matbang@getedit2');
		Route::post('edit2/{id}/{pid}','c_matbang@postedit2');

		Route::post('add/{id}','c_matbang@postadd');
		Route::post('add2/{id}','c_matbang@postadd2');

		Route::get('delete/{id}/{pid}','c_matbang@getdelete');
		Route::get('delete2/{id}/{pid}','c_matbang@getdelete2');
	});	

	Route::group(['prefix'=>'ajax'],function(){
		Route::get('location/{mid}','ajaxcontroller@getlocation');
		Route::get('page/{id}','ajaxcontroller@page');
		Route::get('menu/{id}','ajaxcontroller@menu');
		Route::get('category/{id}','ajaxcontroller@category');
	});
});



Route::get('/','fontendcontroller@home');
Route::get('lien-he','fontendcontroller@contact');
Route::get('sitemap.xml','fontendcontroller@sitemap');
Route::get('{curl}','fontendcontroller@category');
Route::get('{curl}/{purl}/{id}.html','fontendcontroller@singleproduct');
Route::get('{nurl}/{id}.html','fontendcontroller@singlenews');
Route::get('location/{city}/{dis}','fontendcontroller@district');
Route::get('location/{city}','fontendcontroller@city');
Route::POST('dang-ky','fontendcontroller@dangky');
Route::POST('tim-kiem','fontendcontroller@search');