<?php

namespace App\Http\Controllers;

use App\Http\Resources\BranchCollection;
use App\Http\Resources\BranchResource;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index() : Collection|BranchCollection
    {
        return new BranchCollection(
            Branch::active()
            ->with(['groups']) //, 'groups.members'
            ->get());
    }

    public function show(int $branch) : BranchResource|Branch|null
    {
        return new BranchResource(
            Branch::active()
                ->with('groups')
                ->where('id', '=', $branch)
                ->first());
    }
}
