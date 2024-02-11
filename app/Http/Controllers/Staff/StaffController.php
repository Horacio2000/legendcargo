<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\Models\User;
use App\Models\ShipmentMode;
use Intervention\Image\Facades\Image;
use App\Models\Branch;
use App\Models\CourierInfo;
use Carbon\Carbon;
use App\Models\GeneralSetting;
use App\Models\CourierType;
use Illuminate\Support\Facades\Validator;


class StaffController extends Controller {

    public function dashboard() {
        $totalCourierInfo = CourierInfo::where([['receiver_branch_id', Auth::user()->branch_id], ['status','!=', 'Non reçu']])->count();
        $totalUpcomingCourierInfo = CourierInfo::where([['receiver_branch_id', Auth::user()->branch_id], ['status', 'Non reçu']])->whereNotNull('status')->count();

        $gs = GeneralSetting::first();
        $total_chart = $this->chartData();

        return view('staff/dashboard', compact('totalCourierInfo', 'totalUpcomingCourierInfo', 'gs', 'total_chart'));
    }

    public function chartData() {

        $companyIncomeStatistics = CourierInfo::whereYear('created_at', '=', date('Y'))->where([['status', 'Retiré'], ['payment_branch_id', Auth::user()->branch_id]])->get()->groupBy(function($d) {
            return $d->created_at->format('F');
        });

        $monthly_chart = collect([]);

        foreach (month_arr() as $key => $value) {

            $monthly_chart->push([
                'month' => Carbon::parse(date('Y') . '-' . $key)->format('Y-m'),
                'income' => $companyIncomeStatistics->has($value) ? $companyIncomeStatistics[$value]->sum('payment_balance') : 0,
            ]);
        }

        return response()->json($monthly_chart->toArray())->content();
    }

    public function addCourier() {

    }

    public function profileView() {

        return view('staff/profile');

    }

    public function updateProfile(Request $request) {
        $request->validate([
            'name' => 'required|max:50',
            'email' => ['required',
                Rule::unique('users')->ignore(Auth::user()->id), 'email'
            ],
            'phone' => ['required',
                Rule::unique('users')->ignore(Auth::user()->id), 'numeric'
            ],
            'image' => 'image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $profile = Auth::user();

        if ($request->hasFile('image')) {
            if (Auth::user()->image) {
                unlink('assets/staff/img/profile/' . Auth::user()->image);
            }
            $image = $request->image;
            $imageObj = Image::make($image);
            $imageObj->save('assets/staff/img/profile/' . $image->hashname());
            $profile->image = $image->hashname();
        }

        $profile->name = $request->get('name');
        $profile->email = $request->get('email');
        $profile->phone = $request->get('phone');

        $profile->save();

        return back()->withSuccess('Mise à jour du profil réussie');
    }

    public function changePassword() {
        return view('staff/changePassword');
    }



public function updatePassword(Request $request)
{
    $niceName = [
        'oldword' => 'Mot de passe courant',
        'newword' => 'Nouveau Mot de passe',
        'newword_confirmation' => 'Confirmer le Mot de passe',
    ];
    $rules = [
        'oldword' => 'required',
        'newword' => 'required|min:4|confirmed',
        'newword_confirmation' => 'required',
    ];
    $customMessages = [
        'required' => 'Le champ :attribute est obligatoire.',
        'min' => 'Le mot de passe doit comporter au moins 4 caractères.',
    ];

    $validator = Validator::make($request->all(), $rules, $customMessages, $niceName);

    if ($validator->fails()) {
        return redirect()->back()->withInput()->withErrors($validator)->withError('errorArray', 'Erreur de tableau est survenue');
    }

    $errors = [];
    // checking current password incorrect or correct
    $profile = Auth::user();
    if (!Hash::check($request->oldword, $profile->password)) {
        $errors['oldword'] = "Mot de passe courant incorrect";
    }
    // checking new password is same as old password
    if (Hash::check($request->newword, $profile->password)) {
        $errors['newword'] = "Ce mot de passe est déjà utilisé auparavant. Essayez avec un autre.";
    }
    // find errors & redirect back with error message
    if (count($errors) > 0) {
        return redirect()->back()->withInput()->withErrors($errors)->withError('errorArray', 'Erreur de tableau est survenue');
    } else {
        // bcrypt password
        $profile->password = bcrypt($request->newword);
        $profile->save();
        return back()->withSuccess('Mot de passe mis à jour avec succès');
    }
}


    public function branchList() {
        $branchList = Branch::all()->where('status', 'Active');
        return view('staff.allbranch', compact('branchList'));
    }

}
