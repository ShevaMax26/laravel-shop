<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Group $group)
    {
        $group->delete();

        return redirect()->route('group.index');
    }
}
