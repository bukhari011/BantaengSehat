<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Clinic;
use App\Models\Room;
use Illuminate\Http\Request;

class AdminKlinikController extends Controller
{
    public function index()
    {
        
        $user = auth()->user();
        $roomCount = 0;
        $bedCount = 0;
        $clinicExists = false; 
        $clinic = $user->clinic;
  

    
        if ($user->clinic) {
            $clinic = $user->clinic;
            $clinicExists = true; // Jika pengguna memiliki klinik, atur nilai menjadi true
    
            $roomCount = Room::where('clinic_id', $clinic->id)->count();
            $bedCount = Bed::whereIn('room_id', function ($query) use ($clinic) {
                $query->select('id')->from('rooms')->where('clinic_id', $clinic->id);
            })->count();
        }
    
        return view('klinik.index', ['roomCount' => $roomCount, 'bedCount' => $bedCount], compact('clinicExists','clinic'));
    }
    
    
    public function edit($id)
{
    $clinic = Clinic::findOrFail($id);
    return view('klinik.editKlinik',['clinic' => $clinic]);
}

public function update(Request $request, $id)
{
    $clinic = Clinic::findOrFail($id);

    $validatedData = $request->validate([
        'name_clinic' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $clinic->name_clinic = $validatedData['name_clinic'];
    $clinic->address = $validatedData['address'];
    $clinic->phone = $validatedData['phone'];

    // Cek apakah ada gambar baru yang diunggah
    if ($request->hasFile('picture')) {
        // Hapus gambar lama jika ada
        if ($clinic->picture) {
            // Hapus gambar lama dari folder "pictures"
            $oldPicturePath = public_path($clinic->picture);
            if (file_exists($oldPicturePath)) {
                unlink($oldPicturePath);
            }
        }

        $file = $request->file('picture');
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $extension;
        $file->move(public_path('pictures'), $fileName);
        $clinic->picture = 'pictures/' . $fileName;
    }

    $clinic->save();

    return redirect()->route('adminKlinik')->with('success', 'Data klinik berhasil diperbarui.');
}




    

}
