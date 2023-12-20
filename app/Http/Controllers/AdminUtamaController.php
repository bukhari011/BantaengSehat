<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Klinik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUtamaController extends Controller
{
    public function index(){
        $users = DB::table('users')->count();
        $clinics = DB::table('clinics')->count();
        $rooms = DB::table('rooms')->count();
        $beds = DB::table('beds')->count();
        $kliniks = Clinic::all();
        
        return view('admin.index', compact('users','clinics','rooms', 'beds', 'kliniks'));
    }
    public function User(){
        
        $userClinics = User::with('clinic')->get();

        return view('admin.tableUser', compact('userClinics'));
    }

    public function klinik(){
        $kliniks = Clinic::all();
        
        return view('admin.tableKlinik',compact('kliniks'));
    }
    public function kliniks(){
        $kliniks = Clinic::all();
        
        return view('admin.indexTable',compact('kliniks'));
    }
    public function create(){
        
        return view('admin.createAdmin');
    }

    
    public function addClinic($id){
        $user = User::findOrFail($id);
        return view('admin.createClinic', compact('user'));
    }

    public function editUser($id){
        $user = User::find($id);
        return view('admin.editUser', compact('user'));
    }
    
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            // 'role' => 'required',
        ]);

        // Simpan perubahan data pengguna
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // $user->role = $request->input('role');
        $user->save();

        // Redirect kembali ke halaman daftar pengguna dengan pesan sukses
        return redirect()->route('user')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function deleteUser($id)
{
    $user = User::find($id);

    if ($user) {
        // Hapus data pengguna
        $user->delete();

        // Redirect kembali ke halaman daftar pengguna dengan pesan sukses
        return redirect()->route('user')->with('success', 'Data pengguna berhasil dihapus.');
    }

    // Jika pengguna tidak ditemukan, Anda dapat menangani respons yang sesuai, misalnya, menampilkan pesan error atau mengarahkan ke halaman lain.
    return redirect()->route('User')->with('error', 'Data pengguna tidak ditemukan.');
}




    public function store(Request $request)
{
    // dd($request->all());

    Clinic::create([
        'user_id' => $request->user_id,
        'name_clinic' => $request->name_clinic,
        'address' => $request->address,
        'phone' => $request->phone,
    ]);

    return redirect()->route('user')->with('success', 'Klinik berhasil ditambahkan.');
}
    
}
