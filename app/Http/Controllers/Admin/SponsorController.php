<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function index()
    {
        $sponsor=Sponsor::where('status', '=', 'pending')->get();
        return view('admin.sponsor-mgmt',compact('sponsor'));
    }
    public function approved()
    {
        $sponsor=Sponsor::where('status', '=', 'approved')->get();
        return view('admin.sponsor-mgmt',compact('sponsor'));
    }
    public function declined()
    {
        $sponsor=Sponsor::where('status', '=', 'declined')->get();
        return view('admin.sponsor-mgmt',compact('sponsor'));
    }
    public function status(Request $request, $id)
    {
        $sponsor = Sponsor::find($id);
        $sponsor->status = $request->input('status');
        $sponsor->update();
        return redirect()->back()->with('status','Updated successfully.');
    }
}
