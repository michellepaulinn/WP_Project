<?php

namespace App\Http\Controllers;

use App\Models\ImageSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ImageSliderController extends Controller
{
    public function viewSliderRemove(){
        $sliders = ImageSlider::all();
        return view('remove-slider', ['sliders'=>$sliders]);
    }

    public function viewSliderAdd(){
        return view('add-slider');
    }

    public function addSlider(Request $request){
        $validation = Validator::make($request->all(),
        [
            'slider' => 'required',
            'slider.*'=>'mimes:jpg,png,svg,jpeg'
        ],[
            'required' => 'attribute must be filled',
            'mimes'   => 'file type is not supported'       
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation);
        }

        $sliderImage = $request->file('sliderImage');
        $sliderName = $sliderImage->getClientOriginalName();
        $newSlider = new ImageSlider();
        $newSlider->slider_image = $sliderName;
        $newSlider->save();

        $request->sliderImage->move(public_path('sliders'), $sliderName);
        return redirect('/');
    }

    public function removeSlider(Request $request){

        $deleteSlider = ImageSlider::where('id', $request->id)->delete();
        $slider = ImageSlider::where('id', $request->id);
        $destination = 'sliders'.$slider->slider_image;
        // print($destination);
        
        if(File::exists($destination)){
            File::delete($destination);
        }

        return $this->viewSliderRemove();
    }
}
