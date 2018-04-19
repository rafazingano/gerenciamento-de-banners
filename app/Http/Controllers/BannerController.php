<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['banners'] = Banner::all();
        return view('banners.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:banners,title|max:255',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png',
        ]);
        $data = $request->all();
        $banner = $this->upload($request);
        if($banner){
            $data['banner'] = $banner;
        }
        $create = Banner::create($data);
        return redirect()->route('banners.edit', ['id' => $create->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['banner'] = Banner::find($id);
        return view('banners.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['banner'] = Banner::find($id);
        return view('banners.edit', $data);
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
        $request->validate([
            'title' => 'required|unique:banners,title,'.$id.'|max:255',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png',
        ]);
        $data = $request->all();
        $banner = $this->upload($request);
        if($banner){
            $data['banner'] = $banner;
        }
        $update = Banner::find($id);
        $update->update($data);
        return redirect()->route('banners.edit', ['id' => $update->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::destroy($id);
        return redirect()->route('banners.index');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function upload(Request $request)
   {
        $nameFile = null;
        $path = storage_path('app/public/banners/');
        if (!is_dir($path)) {
            mkdir($path, 777, true);
        }
        if (
            $request->hasFile('image') && 
            $request->file('image')->isValid()
        ) {
            $nameFile   = time().'.'.$request->image->getClientOriginalExtension();
            $upload     = $request->image->storeAs('public/banners', $nameFile);
            if ( !$upload ){
                $nameFile = null;
            }
       }
       return $nameFile;
   }
}
