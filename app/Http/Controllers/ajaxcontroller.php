<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\city;
use App\district;
use App\nav;

class ajaxcontroller extends Controller
{
    public function getlocation($city_id)
    {
        $district = district::where('city_id',$city_id)->get();
        foreach($district as $val)
        {
            echo "<option value='". $val->id ."'>". $val->name ."</option>";
        }
    }

    public function category($id)
    {
        $nav = new nav;
        $nav->category_id = $id;
        $nav->save();
        $nav = nav::all();
        ?>
        <tbody>
            <tr>
                <th class='span1'>STT</th>
                <th>Name</th>
                <th class='span2'>Actions</th>
            </tr>
            <?php $t=0; foreach ($nav as $val) { $t++ ?>
            <tr>
                <td><?php echo $t; ?></td>
                <td>
                    <?php if(isset($val['category_id'])){echo $val->category['name'];} ?>
                    <?php if(isset($val['menu_id'])){echo $val->menu['menu_name'];} ?>
                    <?php if(isset($val['page_id'])){echo $val->page['name'];} ?>
                </td>
                <td class='center'>
                    <?php if(isset($val['category_id'])){ ?>
                    <a class="btn btn-info" href="admin/category/edit/<?php echo $val['id'] ?>">
                        <i class="halflings-icon white edit"></i>  
                    </a>
                    <?php } ?>
                    <?php if(isset($val['menu_id'])){ ?>
                    <a class="btn btn-info" href="admin/menu/edit/<?php echo $val['id'] ?>">
                        <i class="halflings-icon white edit"></i>  
                    </a>
                    <?php } ?>
                    <?php if(isset($val['page_id'])){ ?>
                    <a class="btn btn-info" href="admin/page/edit/<?php echo $val['id'] ?>">
                        <i class="halflings-icon white edit"></i>  
                    </a>
                    <?php } ?>

                    <a class="btn btn-danger" href="admin/nav/delete/<?php echo $val['id']; ?>">
                        <i class="halflings-icon white trash"></i> 
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    <?php }

    public function page($id)
    {
        $nav = new nav;
        $nav->page_id = $id;
        $nav->save();
        $nav = nav::all();
        ?>
        <tbody>
            <tr>
                <th class='span1'>STT</th>
                <th>Name</th>
                <th class='span2'>Actions</th>
            </tr>
            <?php $t=0; foreach ($nav as $val) { $t++ ?>
            <tr>
                <td><?php echo $t; ?></td>
                <td>
                    <?php if(isset($val['category_id'])){echo $val->category['name'];} ?>
                    <?php if(isset($val['menu_id'])){echo $val->menu['menu_name'];} ?>
                    <?php if(isset($val['page_id'])){echo $val->page['name'];} ?>
                </td>
                <td class='center'>
                    <?php if(isset($val['category_id'])){ ?>
                    <a class="btn btn-info" href="admin/category/edit/<?php echo $val['id'] ?>">
                        <i class="halflings-icon white edit"></i>  
                    </a>
                    <?php } ?>
                    <?php if(isset($val['menu_id'])){ ?>
                    <a class="btn btn-info" href="admin/menu/edit/<?php echo $val['id'] ?>">
                        <i class="halflings-icon white edit"></i>  
                    </a>
                    <?php } ?>
                    <?php if(isset($val['page_id'])){ ?>
                    <a class="btn btn-info" href="admin/page/edit/<?php echo $val['id'] ?>">
                        <i class="halflings-icon white edit"></i>  
                    </a>
                    <?php } ?>

                    <a class="btn btn-danger" href="admin/nav/delete/<?php echo $val['id']; ?>">
                        <i class="halflings-icon white trash"></i> 
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    <?php }

    public function menu($id)
    {
        $nav = new nav;
        $nav->menu_id = $id;
        $nav->save();
        $nav = nav::all();
        ?>
        <tbody>
            <tr>
                <th class='span1'>STT</th>
                <th>Name</th>
                <th class='span2'>Actions</th>
            </tr>
            <?php $t=0; foreach ($nav as $val) { $t++ ?>
            <tr>
                <td><?php echo $t; ?></td>
                <td>
                    <?php if(isset($val['category_id'])){echo $val->category['name'];} ?>
                    <?php if(isset($val['menu_id'])){echo $val->menu['menu_name'];} ?>
                    <?php if(isset($val['page_id'])){echo $val->page['name'];} ?>
                </td>
                <td class='center'>
                    <?php if(isset($val['category_id'])){ ?>
                    <a class="btn btn-info" href="admin/category/edit/<?php echo $val['id'] ?>">
                        <i class="halflings-icon white edit"></i>  
                    </a>
                    <?php } ?>
                    <?php if(isset($val['menu_id'])){ ?>
                    <a class="btn btn-info" href="admin/menu/edit/<?php echo $val['id'] ?>">
                        <i class="halflings-icon white edit"></i>  
                    </a>
                    <?php } ?>
                    <?php if(isset($val['page_id'])){ ?>
                    <a class="btn btn-info" href="admin/page/edit/<?php echo $val['id'] ?>">
                        <i class="halflings-icon white edit"></i>  
                    </a>
                    <?php } ?>

                    <a class="btn btn-danger" href="admin/nav/delete/<?php echo $val['id']; ?>">
                        <i class="halflings-icon white trash"></i> 
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    <?php }

    
   
    
}
