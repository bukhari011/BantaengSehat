<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TempatTidurController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $clinic = null;
        $rooms = collect();
    
        // Periksa apakah pengguna terkait dengan klinik
        if ($user->clinic) {
            // Mengambil klinik terkait dengan pengguna
            $clinic = $user->clinic;
    
            // Mengambil semua kamar (rooms) yang terkait dengan klinik menggunakan pagination
            $rooms = $clinic->rooms()->whereIn('id', function ($query) {
                $query->select('room_id')->from('beds');
            })->paginate(10); // Menggunakan pagination dengan batasan 10 data per halaman
        }
    
        return view('klinik.tempatTidur.tableTempatTidur', compact('rooms', 'clinic'));
    }
    
    


    public function create($roomId){
        $user = Auth::user();
        $clinic = $user->clinic;
            
        $room = Room::findOrFail($roomId);
        return view('klinik.tempatTidur.tambahTempatTidur', ['room' => $room],compact('clinic'));
    
       
    }
    public function store(Request $request, $roomId)
{
    // dd($request->all());
    $user = Auth::user();
    $clinic = $user->clinic;
    $room = Room::findOrFail($roomId);

    $validatedData = $request->validate([
        'bed_number' => 'required',
        'information' => 'required',
        'picture' => 'image|mimes:jpeg,png,jpg,gif|max:5120', // Batasan jenis dan ukuran gambar
    ]);

    $bed = new Bed();
    $bed->bed_number = $request->input('bed_number');
    $bed->information = $request->input('information');
    $bed->room_id = $roomId;

    // Mengunggah gambar dengan nama file berdasarkan timestamp saat ini
    if ($request->hasFile('picture')) {
        $file = $request->file('picture');
        $timestamp = now()->timestamp;
        $extension = $file->getClientOriginalExtension();
        $fileName = $timestamp . '.' . $extension;
        $file->move(public_path('pictures'), $fileName);
        $imagePath = 'pictures/' . $fileName;
        $bed->picture = $imagePath; // Simpan path relatif ke gambar
    }

    // Menghubungkan tempat tidur ke ruangan yang sesuai
    $room->beds()->save($bed);

    return redirect()->back()->with('success', 'Tempat Tidur berhasil ditambahkan.');
    
}



public function edit($id)
{
    $user = Auth::user();
    $clinic = $user->clinic;
    
    $bed = Bed::findOrFail($id);
    return view('klinik.tempatTidur.editTempatTidur', compact('bed','clinic'));
}


public function update(Request $request, $id)
{
    
    $bed = Bed::findOrFail($id);

    $validatedData = $request->validate([
        'bed_number' => 'required',
        'information' => 'required',
        'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Batasan jenis dan ukuran gambar
    ]);

    $bed->bed_number = $validatedData['bed_number'];
    $bed->information = $validatedData['information'];

    // Cek apakah ada gambar baru yang diunggah
    if ($request->hasFile('picture')) {
        // Hapus gambar lama jika ada
        if ($bed->picture) {
            // Hapus gambar lama dari folder "pictures"
            $oldPicturePath = public_path($bed->picture);
            if (file_exists($oldPicturePath)) {
                unlink($oldPicturePath);
            }
        }

        $file = $request->file('picture');
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $extension;
        $file->move(public_path('pictures'), $fileName);
        $bed->picture = 'pictures/' . $fileName;
    }

    $bed->save();

    return redirect()->route('tableTempatTidur')->with('success', 'Data Tempat Tidur berhasil diperbarui.');
}



public function destroy($id)
{
    $bed = Bed::findOrFail($id);

    // Hapus gambar terkait jika ada
    if ($bed->picture) {
        // Hapus gambar dari folder "pictures"
        $picturePath = public_path($bed->picture);
        if (file_exists($picturePath)) {
            unlink($picturePath);
        }
    }

    $bed->delete();

    return redirect()->route('tableTempatTidur')->with('success', 'Data Tempat Tidur berhasil dihapus.');
}

}
