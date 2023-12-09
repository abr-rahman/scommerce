<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TagDataTable;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Services\Interfaces\TagServiceInterface;

class TagController extends Controller
{
    protected $tagService;

    public function __construct(TagServiceInterface $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index(TagDataTable $dataTable)
    {
        return $dataTable->render('admin.tag.index');
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(StoreTagRequest $request)
    {
        $this->tagService->store($request->validated());
        return back()->with('success', 'Created successfully!');
    }

    public function show(Tag $tag)
    {
        //
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(UpdateTagRequest $request, $id)
    {
        $this->tagService->update($request->validated(), $id);
        return back()->with('success', 'Updated successfully!');
    }

    public function destroy($id)
    {
        $this->tagService->delete($id);
        return response()->json('Deleted successfully!');
    }

    public function active($id)
    {
        $this->tagService->statusInactive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function inActive($id)
    {
        $this->tagService->statusActive($id);
        return response()->json(['Status changed successfully!']);
    }


}
