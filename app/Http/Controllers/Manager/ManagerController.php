<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Auth;
use App\Models\User;
use Intervention\Image\Facades\Image;
use App\Models\Branch;
use Illuminate\Support\Facades\Hash;


class ManagerController extends Controller {

    public function profileView() {
        return view('manager/profile');
    }


public function updateProfile(Request $request)
{
    $request->validate([
        'name' => 'required|max:50',
        'email' => [
            'required',
            Rule::unique('users')->ignore(Auth::user()->id),
            'email'
        ],
        'phone' => [
            'required',
            Rule::unique('users')->ignore(Auth::user()->id),
            'numeric'
        ],
        'image' => 'image|mimes:jpeg,png,jpg|max:5120',
    ]);

    $profile = Auth::user();

    if ($request->hasFile('image')) {
        if ($profile->image) {
            unlink('assets/manager/img/profile/' . $profile->image);
        }
        $image = $request->file('image');
        $imageObj = Image::make($image);
        $imageObj->save('assets/manager/img/profile/' . $image->hashName());
        $profile->image = $image->hashName();
    }

    $profile->name = $request->input('name');
    $profile->email = $request->input('email');
    $profile->phone = $request->input('phone');

    $profile->save();

    return back()->withSuccess('Mise à jour du profil réussie');
}

    public function changePassword() {
        return view('manager/changePassword');
    }


public function updatePassword(Request $request)
{
    $niceName = [
        'oldword' => 'Mot de passe courant',
        'newword' => 'Nouveau Mot de passe',
        'newword_confirmation' => 'Confirmer le mot de passe',
    ];
    $rules = [
        'oldword' => 'required',
        'newword' => 'required|min:4|confirmed',
        'newword_confirmation' => 'required',
    ];
    $customMessages = [
        'required' => 'The :attribute field is required.',
        'min' => 'Le mot de passe doit comporter au moins 4 caractères.',
        'confirmed' => 'Le nouveau mot de passe et la confirmation ne correspondent pas.',
    ];

    $this->validate($request, $rules, $customMessages, $niceName);

    $errors = [];

    // Checking if the current password is correct
    $profile = Auth::user();
    if (!Hash::check($request->input('oldword'), $profile->password)) {
        $errors['oldword'] = "Mot de passe courant incorrect";
    }

    // Checking if the new password is the same as the old password
    if (Hash::check($request->input('newword'), $profile->password)) {
        $errors['newword'] = "Ce mot de passe est déjà utilisé auparavant. Essayez avec un autre";
    }

    // Find errors & redirect back with error message
    if (count($errors) > 0) {
        return redirect()->back()->withInput()->withErrors($errors)->with('errorArray', 'Array Error Occurred');
    } else {
        // Bcrypt the new password
        $profile->password = bcrypt($request->input('newword'));
        $profile->save();

        return back()->withSuccess('Mot de passe mis à jour avec succès');
    }
}


    public function branchList(Request $request) {

        $searchtext = $request->search;
        if (!empty($searchtext)) {
            $branchList = Branch::where('status', 'Active')
                    ->where(function($q) use($searchtext) {
                        $q->orWhere('name', 'LIKE', "%$searchtext%")
                        ->orWhere('email', 'LIKE', "%$searchtext%")
                        ->orWhere('phone', 'LIKE', "%$searchtext%");
                    })
                    ->paginate(20);
        } else {
            $branchList = Branch::where('status', 'Active')->paginate(20);
        }
        return view('manager.allbranch', compact('branchList'));
    }

}
