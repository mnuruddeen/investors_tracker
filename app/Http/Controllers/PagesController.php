<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\News;
use App\Models\Slider;
use App\Models\Partner;
use App\Models\Team;

class PagesController extends Controller
{
    //INDEX
    public function index(){
        $sliders = Slider::where('status',1)->orderBy('id','desc')->limit(3)->get();
        $about = About::where('name','about')->first();
        $mission = About::where('name','mission')->first();
        $vision = About::where('name','vision')->first();
        $concept = About::where('name','concept')->first();
        $news = News::orderBy('id','desc')->limit(3)->get();
        $partners = Partner::where('status',1)->get();
        $teams = Team::where('status',1)->get();
        return view('index',compact('news','sliders','about','mission','vision','concept','partners','teams'));
    }

    //ABOUT US
    public function about(){
        $title = "About Us";
        return view('pages.about')->with('title', $title);
    }

    //MISSION
    public function mission_vision(){
        $title = "Mission & Vision";
        $mission = About::where('name','mission')->first();
        $vision = About::where('name','vision')->first();
        return view('pages.mission',compact('title','mission','vision'));
    }

    //Management team
    public function management(){
        $title = "Team Members";
        $teams = Team::where('status',1)->get();
        return view('pages.team',compact('title','teams'));
    }

    //MANDATE
    public function mandate(){
        $title = "Our Mandate";
        return view('pages.mandate')->with('title', $title);
    }

    //CONTACT
    public function contact(){
        $title = "Contact Us";
        return view('pages.contact')->with('title', $title);
    }

    //NEWS
    public function news(){
        $title = "News Updates";
        $news = News::orderBy('id','desc')->limit(3)->get();
        return view('pages.news',compact('title','news'));
    }

    //NEWS DETAILS
    public function news_detail($id){
        $recent_news = News::orderBy('id','desc')->get();
        $news = News::findOrFail(decrypt($id));
        $title = $news->title;
        return view('pages.news_detail',compact('title','news','recent_news'));
    }

}
