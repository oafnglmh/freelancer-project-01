<?php
namespace App\Http\Service;
use App\Http\Controllers\Controller;
use App\Models\LoginUser;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class SliderService
{
public function show()
    {
        return Slider::where('active',1)->get();
    }
}