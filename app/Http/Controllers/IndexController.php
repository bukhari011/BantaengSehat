<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Clinic;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $clinics = DB::table('clinics')->count();
        $rooms = DB::table('rooms')->count();
        $beds = DB::table('beds')->count();
        
        $keyword = $request->input('keyword');
    
        $cachedClinics = Cache::remember('cachedClinics', 60, function () {
            // Mengambil seluruh data klinik secara acak
            return Clinic::inRandomOrder()->take(3)->get();
        });
    
        // Query untuk mencari klinik berdasarkan nama jika ada kata kunci pencarian
        if ($keyword) {
            $clinics = Clinic::where('name_clinic', 'like', "%$keyword%")->count();
        }
    
        return view('home.index', compact('clinics', 'rooms', 'beds', 'cachedClinics'));
    }

    public function search(Request $request)
{
    $keyword = $request->input('keyword');

    // Query untuk mencari klinik berdasarkan nama
    $clinics = Clinic::when($keyword, function ($query) use ($keyword) {
        return $query->where('name_clinic', 'like', "%$keyword%");
    })->get();

    return view('home.search', ['clinics' => $clinics, 'keyword' => $keyword]);
}

    
public function klinik()
{
    $clinics = Clinic::all();

    return view('home.klinik', ['clinics' => $clinics]);
}
public function klinikDetile(Clinic $clinic)
{
    $rooms = Room::where('clinic_id', $clinic->id)->get();

    // Mengambil total jumlah tempat tidur (beds) untuk setiap kamar
    $roomBedCounts = [];
    foreach ($rooms as $room) {
        $bedCount = $room->beds->count();
        $roomBedCounts[$room->id] = $bedCount;
    }

    // Mengelompokkan kamar berdasarkan jenis kamarnya dan menghitung jumlahnya
    $roomsByType = $rooms->groupBy('room_type')->map->count();

    return view('home.klinikDetile', [
        'clinic' => $clinic,
        'rooms' => $rooms,
        'roomBedCounts' => $roomBedCounts,
        'roomsByType' => $roomsByType,
    ]);
}

public function kamarDetile(Clinic $clinic, Room $room)
{
    $beds = Bed::where('room_id', $room->id)->get();

    // Mengelompokkan tempat tidur berdasarkan statusnya dan menghitung jumlahnya
    $bedsByStatus = $beds->groupBy('information')->map->count();

    return view('home.kamarDetile', [
        'clinic' => $clinic,
        'room' => $room,
        'beds' => $beds,
        'bedsByStatus' => $bedsByStatus,
    ]);
}

}
