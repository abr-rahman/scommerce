<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Http\Controllers\Controller;
use App\Utils\FileUploader;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        private FileUploader $uploader,
    ) {
    }
    public function supportStore(Request $request)
    {
        $request->validate([
            'subject' => 'required'
        ]);
        if (isset($request['attachment'])) {
            $attachment = $this->uploader->upload($request->file('attachment'), 'uploads/support/');
            $request['attachment'] = $attachment;
        }
        $support = new Support();       
        $support->user_id = $request->user_id;
        $support->subject = $request->subject;
        $support->description = $request->description;
        $support->attachment = $attachment ?? null;
        $support->save();
        return back()->with('success', 'Created successfully!');
    }

}
