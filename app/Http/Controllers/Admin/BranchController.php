<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;


class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branchList = Branch::all();
        return view('admin.branch.list', compact('branchList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.branch.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'nullable|max:50|email',
            'phone' => 'max:50',
            'image' => 'image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'assets/admin/img/branch/';
            $imageName = $image->hashName();
            $image->move($imagePath, $imageName);
            $data['image'] = $imageName;
        }

        $data['status'] = $request->has('status') ? 'Active' : 'Inactive';

        Branch::create($data);

        return back()->withSuccess('Succursale créée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        return view('admin.branch.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        // Form validation
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'nullable|max:50|email',
            'phone' => 'max:50',
            'image' => 'image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $data = $request->all();

        $data['status'] = $request->has('status') ? 'Active' : 'Inactive';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'assets/admin/img/branch/';
            $imageName = $image->hashName();
            $image->move($imagePath, $imageName);
            $data['image'] = $imageName;

            if ($branch->image) {
                unlink($imagePath . $branch->image);
            }
        }

        $branch->update($data);

        return back()->withSuccess('Succursale modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy($branch)
    {
        // Remove the branch from storage
        Branch::destroy($branch);

        return back()->withSuccess('Succursale supprimée avec succès');
    }
}
