<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clinics = DB::table('clinics')->count();
        $rooms = DB::table('rooms')->count();
        $beds = DB::table('beds')->count();
        $cachedClinics = Cache::remember('cachedClinics', 60, function () {
            // Mengambil seluruh data klinik secara acak
            return Clinic::inRandomOrder()->take(3)->get();
        });
        return view('home.index', compact('clinics', 'rooms', 'beds', 'cachedClinics'));
    }
}
