<?php

namespace App\Http\Controllers;

use App\Models\{Placetype, Place, Package,Guide , District, Booking, About, Banner, Favorite};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $destinations = Place::with('district')->latest()->get();
        $packages = Package::all()->take(3);
        $districts = District::latest()->get();
        $tourGuides = Guide::with('guideLanguages')->get();
        $banner = Banner::latest()->first();
        $places = Place::all();
        $placeTypes = Placetype::all();
    return view('website.home', compact('banner','tourGuides', 'destinations','places','placeTypes','districts'));
    }

    public function districtWisePlace($id){
        $places = Place::where('district_id', $id)->get();
        $district = District::find($id);
        return view('showDistrictWise', compact('places', 'district'));
    }

    public function placetypeWisePlace($id){
        $places = Place::where('placetype_id', $id)->get();
        $placetype = Placetype::find($id);
        return view('showPlacetypetWise', compact('places', 'placetype'));
    }

    public function about()
    {
        if(About::all()->count() > 0){
            $about = About::all()->first();
            return view('website.about', compact('about'));
        }else{
            $about = new About();
            return view('website.about', compact('about'));
        }
    }

    public function favourites()
    {
        $favourites = collect();
        $favorite = Favorite::where('user_id', Auth::id())->get();
        
        if ($favorite->count() > 0) {
            $favourites = $favorite; 
        }
        
        return view('website.favourites', compact('favourites'));
    }

    

    public function placeDdetails($id)
    {
        $place = Place::find($id);
        return view('placeDetails', compact('place'));
    }

    public function packageDetails($id)
    {
        $package = Package::find($id);
        return view('packageDetails', compact('package'));
    }

    public function allPlace(){
        $places = Place::latest()->paginate(12);
        return view('allPlaces', compact('places'));
    }


    public function allPackage(){
        $packages = Package::latest()->paginate(12);
        return view('allPackages', compact('packages'));
    }

    public function search(Request $request){
        $query = $request->input('query');
        $places = Place::where('name','LIKE',"%$query%")->get();
        return view('searchResult', compact('places'));
    }

    public function packageBooking($id){

       
        $guides = Guide::where('status', 1)->get();
        $package = Package::where('id', $id)->first();
        return view('bookingForm', compact('guides', 'package'));
    }

    public function storeBookingRequest(Request $request){
       
        $this->validate($request, [
            'guide' => 'required',
            'date' => 'required',
        ]);

        $book = new Booking();
        $book->place_id = $request->place_id;
        $book->price = $request->price;
        $book->date = $request->date;
        $book->guide_id = $request->guide;
        $book->day = $request->day ?? 1;
        $book->no_of_adults = $request->no_of_adults;
        $book->tourist_id = Auth::id();
        $book->save();

        $guide = Guide::find($request->guide);
        $guide->status = 0;
        $guide->save();
    
        session()->flash('success', 'Your Booking Request Send Successfully, Please wait for admin approval');
        return redirect()->back();
    }

    public function toggleFavorite($placeId)
    {
        $user = Auth::user();
        $favorite = Favorite::where('user_id', $user->id)->where('place_id', $placeId)->first();
        if ($favorite) {
            $favorite->delete();
            return response()->json(['message' => 'Place removed from favorites']);
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'place_id' => $placeId
            ]);
            return response()->json(['message' => 'Place added to favorites']);
        }
    }
}
