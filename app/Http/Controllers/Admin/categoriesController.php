<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\SaveLog;
use App\Models\Category;
use App\Models\Logging;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use DB;

class categoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate = Category::all();
        $user = Auth::user();
//        dd($cate);
        return view('admin.Categories.Categories',['user' => $user, 'cate' => $cate] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('admin.Categories.CategoriesInsert',['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'anh' => 'required',
            'anh.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        if($request->hasfile('anh'))
        {

            foreach($request->file('anh') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);
            }
        }
//        dd($request->all());\DB::enableQueryLog();
        $category = new Category();
        $category->CategoryImage = $name;
        $category->CategoryName = request('CategoryName');
        $category->status = request('status');
        \DB::enableQueryLog();
        $category->save();
//        $query_infor = \DB::getQueryLog();
//        dd($query_infor);
//        dd(1);
        return redirect()->route('admin.category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoryUpdate = Category::where('CategoryID',$id)->first();
//        dd($categoryUpdate);

        $user = Auth::user();

        return view('admin.Categories.CategoriesUpdate',['user' => $user, 'categoryUpdate' => $categoryUpdate]);
    }
    public function updateProcess(Request $request, $id){
        \DB::enableQueryLog();
        Category::where('CategoryID', $id)
            ->update(['CategoryName' => request('CategoryName')]);

        return redirect()->route('admin.category');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::enableQueryLog();
        Category::where('CategoryID',$id)->delete();
//        $query_infor = \DB::getQueryLog();
//        $class = get_class($this);
//        dd($class);
//        SaveLog::dispatch(new SaveLog($destroy));
        return redirect()->route('admin.category');
    }
}


