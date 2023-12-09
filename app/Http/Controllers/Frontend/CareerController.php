<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\CareerApplyStoreRequest;
use App\Models\Career;
use App\Models\CareerApply;
use App\Notifications\OrderConfirmation;
use App\Utils\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CareerController extends Controller
{
    public function __construct(
        private FileUploader $uploader,
    ) {
    }

    public function index()
    {
        $careers = Career::select('id', 'deadline', 'qualification', 'description', 'heading', 'image')->where('status', StatusEnum::Active->value)->get();
        return view('frontend.career.index', compact('careers'));
    }

    public function apply($id)
    {
        $career = Career::find($id);
        return view('frontend.career.apply', compact('career'));
    }

    public function applyStore(CareerApplyStoreRequest $request)
    {
        $apply = $request->validated();
        
        $photo = null;
        $cv = null;

        if ($request->hasFile('photo')) {
            $photo = $this->uploader->upload($request->file('photo'), 'uploads/career/');
            $apply['photo'] = $photo;
        }

        if ($request->hasFile('cv')) {
            $cv = $this->uploader->upload($request->file('cv'), 'uploads/career/');
            $apply['cv'] = $cv;
        }

        $apply = new CareerApply();
        $apply->name = $request->name;
        $apply->email = $request->email;
        $apply->phone = $request->phone;
        $apply->deparment = $request->deparment;
        $apply->photo = $photo;
        $apply->gender = $request->gender;
        $apply->age = $request->age;
        $apply->skills = $request->skills;
        $apply->reason_of_join = $request->reason_of_join;
        $apply->choos_reason = $request->choos_reason;
        $apply->cv = $cv;
        $apply->save();
        $notifyMessage = [
            'title' => 'Your Job Application Applied successfully!',
            'name' => 'Thank You'.' '.$request->name,
        ];
        Notification::route('mail', $request->email)
           ->notify(new OrderConfirmation($notifyMessage));
        return redirect()->route('frontend.career.index')->with('success','Applied successfully!');
    }
}

