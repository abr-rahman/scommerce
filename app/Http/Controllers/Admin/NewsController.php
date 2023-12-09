<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\NewsDataTable;
use App\Models\News;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStoreRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Services\Interfaces\NewsServiceInterface;
use App\Utils\FileUploader;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(NewsServiceInterface $newsService, private FileUploader $uploader)
    {
        $this->newsService = $newsService;
    }

    public function index(NewsDataTable $dataTable)
    {
        return $dataTable->render('admin.news.index');
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(NewsStoreRequest $request)
    {
        $this->newsService->store($request->validated());
        return redirect()->route('news.index')->with('success', 'Created successfully!');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(NewsUpdateRequest $request, $id)
    {
        $this->newsService->update($request->validated(), $id);
        return redirect()->route('news.index')->with('success', 'Updated successfully!');
    }

    public function destroy($id)
    {
        $this->newsService->delete($id);
        return response()->json('Deleted successfully!');
    }

    public function active($id)
    {
        $this->newsService->statusInactive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function inActive($id)
    {
        $this->newsService->statusActive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function show(News $news)
    {
        //
    }

}
