<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Utils;
use Illuminate\Http\Request;

class UtilsController extends Controller
{
    public function privacy()
    {
        $utils = Utils::where('status', StatusEnum::Active->value)->first();;
        return view('admin.utils.privacy', compact('utils'));
    }

    public function privacyUpdate(Request $request, $id)
    {
        $utils = Utils::find($id);
        $utils->privacy = $request->privacy;
        $utils->terms = $request->terms;
        $utils->warranty_policy = $request->warranty_policy;
        $utils->refund_policy = $request->refund_policy;
        $utils->save();
        return back()->with('success', 'Updated successfully!');
    }
}
