<?php

namespace App\Http\Controllers\Front\Branches;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    public function freez_form($slug)
    {
        $branch = Branch::where('slug', $slug)->firstOrFail();
        return view('branches.freez_form', compact('branch'));
    }
}
