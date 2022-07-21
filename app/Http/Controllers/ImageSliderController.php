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
        $request->validate([
            'sliderImage'=>'required|mimes:jpg,png,svg,jpeg',
        ]); 
    
        $sliderImage = $request->file('sliderImage');
        $sliderName = $sliderImage->getClientOriginalName();

        $sliderAll = ImageSlider::all();
        foreach($sliderAll as $slider){
            if($slider->slider_image == $sliderName){
                return redirect()->back()->with(['warning' => 'Image has already exist!']);
            }
        }

        $newSlider = new ImageSlider();
        $newSlider->slider_image = $sliderName;
        $newSlider->save();

        $request->sliderImage->move(public_path('sliders'), $sliderName);
        return redirect()->back()->with(['alert' => 'Success Add Image']);
    }

    public function removeSlider(Request $request){

        $slider = ImageSlider::where('id', $request->id)->first();
        $destination = 'sliders/'.$slider->slider_image;
        print($destination);
        
        if(File::exists($destination)){
            File::delete($destination);
        }

        $slider->delete();

        return redirect()->back()->with(['alert' => 'Success Delete Image']);
    }
}
