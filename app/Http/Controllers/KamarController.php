<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KamarController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $clinic = $user->clinic;
    
        $roomsWithBedCounts = collect(); // Inisialisasi variabel $roomsWithBedCounts dengan koleksi kosong
        $rooms = collect(); // Inisialisasi koleksi kamar kosong
    
        // Jika pengguna memiliki klinik, ambil kamar terkait dengan klinik
        if ($user->clinic) {
            $rooms = Room::where('clinic_id', $user->clinic->id)->paginate(10);
    
            // Ambil data tempat tidur berdasarkan setiap kamar
            foreach ($rooms as $room) {
                $bedCount = $room->beds()->count();
                $roomsWithBedCounts->push(['room' => $room, 'bedCount' => $bedCount]);
            }
        }
    
        // Jika tidak ada klinik atau tidak ada kamar terkait
        if (!$user->clinic || $rooms->isEmpty()) {
            $rooms = collect(); // Koleksi kamar kosong
        }
    
        return view('klinik.kamar.tableKamar', compact('roomsWithBedCounts', 'clinic', 'rooms'));
    }
    
    

    
    public function create(){
        $user = Auth::user();
        $clinic = $user->clinic;
        return view('klinik.kamar.tambahKamar',compact('clinic'));
    }
    public function edit($id){
        $user = Auth::user();
        $clinic = $user->clinic;
        
        $room = Room::findOrFail($id);
        return view('klinik.kamar.editKamar',['room' => $room],compact('clinic'));
    }
    public function update(Request $request, $roomId)
{
    $room = Room::findOrFail($roomId);

    $validatedData = $request->validate([
        'room_number' => 'required',
        'room_type' => 'required',
        'information' => 'required',
        'picture' => 'image|mimes:jpeg,png,jpg,gif|max:5120', // Batasan jenis dan ukuran gambar (misalnya, maksimum 5 MB)
    ]);

    $room->room_number = $validatedData['room_number'];
    $room->room_type = $validatedData['room_type'];
    $room->information = $validatedData['information'];

    // Memperbarui gambar jika ada gambar yang diunggah
    if ($request->hasFile('picture')) {
        $file = $request->file('picture');
        $timestamp = now()->timestamp;
        $extension = $file->getClientOriginalExtension();
        $fileName = $timestamp . '.' . $extension;

        // Simpan gambar ke direktori public/pictures
        $file->move(public_path('pictures'), $fileName);

        $imagePath = 'pictures/' . $fileName;
        $room->picture = $imagePath; // Simpan path relatif ke gambar
    }

    $room->save();

    return redirect()->route('tableKamar')->with('success', 'Kamar berhasil diperbarui.');
}


    public function store(Request $request){
        $user = Auth::user();
        

        if (!$user->clinic) {
            return "Anda tidak terkait dengan klinik"; // Gantilah dengan respons yang sesuai jika pengguna tidak terkait dengan klinik
        }
    
        $rooms = new Room();
        $rooms->room_number = $request->input('room_number');
        $rooms->room_type = $request->input('room_type');
        $rooms->information = $request->input('information');
        $rooms->clinic_id = $user->clinic->id; // Menggunakan ID klinik dari pengguna yang sedang login

         // Cek apakah ada gambar baru yang diunggah
    if ($request->hasFile('picture')) {
        // Hapus gambar lama jika ada
        if ($rooms->picture) {
            // Hapus gambar lama dari folder "pictures"
            $oldPicturePath = public_path($rooms->picture);
            if (file_exists($oldPicturePath)) {
                unlink($oldPicturePath);
            }
        }

        $file = $request->file('picture');
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $extension;
        $file->move(public_path('pictures'), $fileName);
        $rooms->picture = 'pictures/' . $fileName;
    }
 
        if ($rooms->save()) {
            return redirect()->route('tableKamar')->with('success', 'Kamar berhasil ditambahkan.');
        } else {
            return "Gagal menambahkan kamar"; // Gantilah dengan respons yang sesuai jika gagal
        }
    }
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
    
        // Periksa apakah pengguna terkait dengan klinik yang memiliki kamar ini
        if (Auth::user()->clinic && Auth::user()->clinic->id === $room->clinic_id) {
            // Hapus gambar terkait jika ada
            if ($room->picture) {
                // Hapus gambar dari folder "pictures"
                $picturePath = public_path($room->picture);
                if (file_exists($picturePath)) {
                    unlink($picturePath);
                }
            }
    
            if ($room->delete()) {
                return redirect()->route('tableKamar')->with('success', 'Kamar berhasil dihapus.');
            } else {
                return redirect()->route('tableKamar')->with('error', 'Terjadi kesalahan saat menghapus kamar.');
            }
        } else {
            return "Anda tidak memiliki izin untuk menghapus kamar ini"; // Gantilah dengan respons yang sesuai jika pengguna tidak memiliki izin
        }
    }
    
}