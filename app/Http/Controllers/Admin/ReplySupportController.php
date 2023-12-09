<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SupportDataTable;
use App\Enums\StatusEnum;
use App\Models\ReplySupport;
use App\Http\Controllers\Controller;
use App\Models\Support;
use App\Utils\FileUploader;
use Illuminate\Http\Request;

class ReplySupportController extends Controller
{
    public function __construct(
        private FileUploader $uploader,
    ) {
    }

    public function index(Request $request, SupportDataTable $dataTable)
    {
        return $dataTable->render('admin.support.index');
    }

    public function create()
    {
        return view('admin.support.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required'
        ]);
        $support = new ReplySupport();

        if (!$request['attachment']) {
            $support->attachment = $support->attachment;
        } else {
            if (isset($request['attachment'])) {
                $attachment = $this->uploader->upload($request->file('attachment'), 'uploads/support/');
                $request['attachment'] = $attachment;
                $support->attachment = $attachment;
            }
        }
        $support->support_id = $request->support_id;
        $support->subject = $request->subject;
        $support->description = $request->description;
        $support->save();

        $userSupport = Support::where('id', $request->support_id)->first();
        $userSupport->status = StatusEnum::Replied->value;
        $userSupport->save();
        return redirect()->route('reply-supports.index')->with('success', 'Replied successfully!');
    }

    public function edit(ReplySupport $replySupport)
    {
        return view('admin.support.edit', compact('replySupport'));
    }

    public function supportShow($id)
    {
        $details = Support::find($id);
        return view('admin.support.details', compact('details'));
    }

    public function supportCreate($id)
    {
        $support_id = Support::find($id);
        return view('admin.support.create', compact('support_id'));
    }

}
