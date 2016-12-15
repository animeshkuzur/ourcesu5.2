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

    public function test(){
    	return view('pages.account');
    }

    public function home(){
    	$id = 264;
    	$data = Content::where('page_id',$id)->get();
    	return view('pages.index',['data' => $data[0]]);
    }

}
