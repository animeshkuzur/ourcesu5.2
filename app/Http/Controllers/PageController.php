<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Content;
use App\Page;
use App\Subcategory;
use App\Category;

class PageController extends Controller
{
    public function index($id){
    	$data = Content::where('page_id',$id)->get();
    	$page = Page::where('id',$id)->get();
    	$subcat = Subcategory::where('id',$page[0]->subcategory_id)->get();
    	$cat = Category::where('id',$subcat[0]->category_id)->get();
    	if(!$data){
    		return view('pages.page',['data'=>'No Content','title'=>$page[0]]);
    	}
    	return view('pages.page',['data'=>$data[0],'title'=>$page[0],'subcat'=>$subcat[0],'cat'=>$cat[0]]);
    }

    public function home(){
        
        /*Redirection*/
        $v= new VaultController;
        return $v->index(); 
    	$id = 266;
    	$data = Content::where('page_id',$id)->get();
    	return view('pages.index',['data' => $data[0]]);
    }
    public function show_new_subcat()
    {
        return "

            <form action='' method='POST'>
                <input type='text' name='cat_id'> <br>
                <input name='title'> <br>".csrf_field()."
                <input type='submit'>
            </form>


        ";
    }
    public function save_new_subcat(Request $r)
    {
        $page= new Subcategory;
        $page->name=$r->title;
        $page->category_id=$r->cat_id;
        $page->save();
    }
    public function show_new_page()
    {
        return "

            <form action='' method='POST'>
                <input type='text' name='subcat_id'>".csrf_field()." <br>
                <input name='title'> <br>
                <input type='submit'>
            </form>


        ";
    }
    public function save_new_page(Request $r)
    {
        $page= new Page;
        $page->name=$r->title;
        $page->subcategory_id=$r->subcat_id;
        $page->save();
        $co=new Content;
        $co->page_id=$page->id;
        $co->content="No Content";
        $co->save();
    }

}
