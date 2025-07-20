<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserViewController extends Controller
{
     public function index()
    {
        $user_view = UserModel::all();
        return view('user', compact('user_view'));
    }

    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);
        $user->update($request->only('nama', 'email','nim',  'hak_akses', 'foto'));

        return redirect()->route('user.index')->with('success', 'Data pengguna berhasil diupdate');
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
                
        if ($user->foto) {
            
            $fotoPath = str_replace('/storage/', '', $user->foto); 
            Storage::delete($fotoPath);  
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'Data pengguna berhasil dihapus');
    }

}
