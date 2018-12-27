<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\contact;
use App\Item;
use App\Reservation;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $categorycount = Category::count();
        $itemcount = Item::count();
        $slidercount = Slider::count();
        $reservations = Reservation::where('status',false)->get();
        $contactcount = Contact::count();

        return view('admin.dashboard' ,compact('categorycount','itemcount','slidercount','reservations','contactcount'));
    }
}
