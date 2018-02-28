<?php

namespace App\Http\Controllers\admin;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sliders = Slider::paginate(10);
      return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = request()->validate(Slider::validationRules());
        $image = "";
        if(Input::hasFile('image'))
        {
            $filename = str_replace(" ","_",strtolower(Input::get('image')));
            $fileInstance = Input::file('image');
            $extension = Input::file('image')->getClientOriginalExtension();
            $image = "slider".$filename."_".time().".".$extension;
            $file = $fileInstance->move('upload/images/slider/',$image);
            $validatedData['image'] = $image;


        }
        $slider = Slider::create($validatedData);
        return redirect()->route('sliders.index')->with(['type' => 'success', 'message' => 'Slider added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $validatedData = request()->validate(Slider::validationRules($slider->id));

        if(Input::hasFile('image'))
        {
            if($slider->image != ''){
                $path = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['SCRIPT_NAME'])."/upload/images/slider/".$slider->image;
                unlink($path);
            }
            $filename = str_replace(" ","_",strtolower(Input::get('image')));
            $fileInstance = Input::file('image');
            $extension = Input::file('image')->getClientOriginalExtension();
            $image = "slider".$filename."_".time().".".$extension;
            $file = $fileInstance->move('upload/images/slider/',$image);
            $validatedData['image'] = $image;


        }
        $slider->update($validatedData);
        return redirect()->route('sliders.index')->with(['type' => 'success', 'message' => 'Slider Updated']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {

        if($slider->image != ''){
            $path = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['SCRIPT_NAME'])."/upload/images/slider/".$slider->image;
            unlink($path);
        }
        $slider->delete();
        return;
    }
}
