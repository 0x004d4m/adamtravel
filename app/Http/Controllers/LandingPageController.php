<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Fqa;
use App\Models\Hero;
use App\Models\Member;
use App\Models\Post;
use App\Models\Section;
use App\Models\Service;
use App\Models\Site;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Backpack\LangFileManager\app\Models\Language;

class LandingPageController extends Controller
{
    public function setLanguage(Request $request, $locale)
    {
        if (in_array($locale, Language::where('active',1)->pluck('abbr')->toArray())) {
            Session::put('locale', $locale);
        }
        return redirect()->back();
    }

    public function welcome(Request $request){
        return view('welcome',[
            "Posts"=>Post::limit(4)->get(),
            "Services"=>Service::limit(4)->get(),
            "Destinations"=>Destination::get(),
            "Testimonials"=>Testimonial::get(),
            "Fqas"=>Fqa::get(),
            "Hero"=>Hero::where('id',1)->first(),
            "Section1"=>Section::where('id',1)->first(),
            "Section2"=>Section::where('id',2)->first(),
            "FQA"=>Section::where('id',4)->first(),
        ]);
    }

    public function about(Request $request){
        return view('about', [
            "Services"=>Service::limit(4)->get(),
            "Destinations"=>Destination::get(),
            "Members"=>Member::get(),
            "Hero"=>Hero::where('id',2)->first(),
            "Section3"=>Section::where('id',3)->first(),
        ]);
    }

    public function services(Request $request){
        return view('services');
    }

    public function sites(Request $request){
        return view('sites',[
            "Sites"=>Site::get()
        ]);
    }

    public function contact(Request $request){
        return view('contact');
    }

    public function blogs(Request $request){
        return view('blogs',[
            "Posts"=>Post::paginate(12)
        ]);
    }

    public function blog(Request $request){
        return view('blog');
    }
}
