<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\Slide\CreateSlideRequest;
use App\Http\Requests\Backend\Slide\UpdateSlideRequest;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::paginate();
        return view('backend.slides.index')->with(['slides' => $slides]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSlideRequest $request)
    {
        $filename = $request->img->getClientOriginalName();
        $request->img->storeAs('uploads/slide', $filename);
        Slide::Create([
            'link' => $request->link,
            'img' => $filename,
        ]);
        return redirect(route('slide.index'));
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
         $slide = Slide::find($id);
        return view('backend.slides.edit')->with(
            ['slide' => $slide]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSlideRequest $request, $id)
    {
        $slide = Slide::find($id);
        $filename = $request->img->getClientOriginalName();
        $request->img->storeAs('uploads', $filename);
        $slide->update([
            'link' => $request->link,
            'img' => $filename,
        ]);
        return redirect(route('slide.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slide::destroy($id);
        return redirect(route('slide.index'));
    }
}
