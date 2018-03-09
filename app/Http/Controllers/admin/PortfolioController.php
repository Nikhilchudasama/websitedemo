<?php

namespace App\Http\Controllers\admin;

use App\Portfolio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $portfolios = Portfolio::paginate(10);
      return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = request()->validate(Portfolio::validationRules());
      $image = "";
      if(Input::hasFile('image'))
      {
          $filename = str_replace(" ","_",strtolower(Input::get('image')));
          $fileInstance = Input::file('image');
          $extension = Input::file('image')->getClientOriginalExtension();
          $image = "portfolio".$filename."_".time().".".$extension;
          $file = $fileInstance->move('upload/images/portfolio/',$image);
          $validatedData['image'] = $image;


      }
      $portfolio = Portfolio::create($validatedData);
      return redirect()->route('portfolio.index')->with(['type' => 'success', 'message' => 'Portfolio added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $validatedData = request()->validate(Portfolio::validationRules($portfolio->id));

        if(Input::hasFile('image'))
        {
            if($portfolio->image != ''){
                $path = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['SCRIPT_NAME'])."/upload/images/portfolio/".$portfolio->image;
                unlink($path);
            }
            $filename = str_replace(" ","_",strtolower(Input::get('image')));
            $fileInstance = Input::file('image');
            $extension = Input::file('image')->getClientOriginalExtension();
            $image = "slider".$filename."_".time().".".$extension;
            $file = $fileInstance->move('upload/images/portfolio/',$image);
            $validatedData['image'] = $image;
        }

        $portfolio->update($validatedData);

        return redirect()->route('portfolio.index')->with(['type' => 'success', 'message' => 'Portfolio Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        if($portfolio->image != ''){
            $path = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['SCRIPT_NAME'])."/upload/images/portfolio/".$portfolio->image;
            unlink($path);
        }
        $portfolio->delete();
        return;
    }
}
