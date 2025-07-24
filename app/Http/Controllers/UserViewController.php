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
