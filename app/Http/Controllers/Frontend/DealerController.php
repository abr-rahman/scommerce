<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Dealership;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDealershipRequest;
use App\Http\Requests\UpdateDealershipRequest;
use App\Models\User;
use App\Notifications\OrderConfirmation;
use App\Utils\FileUploader;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class DealerController extends Controller
{
    public function __construct(
        private FileUploader $uploader,
    ) {
    }
    public function register()
    {
        return view('auth.dealership.register');
    }

    public function storeRegister(StoreDealershipRequest $request)
    {
        if ($request->hasFile('attachment')) {
            $attachment = $this->uploader->uploadMultiple($request->file('attachment'), 'uploads/dealership/');
            $product['attachment'] = $attachment;
        }

        $userValidate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed'],
            'phone' => 'required',
        ]);

        if ($request->hasFile('profile_photo')) {
            $profile_photo = $this->uploader->upload($request->file('profile_photo'), 'uploads/profile/');
            $image['profile_photo'] = $profile_photo;
        }

        $userValidate = new User();
        $userValidate->name = $request->name;
        $userValidate->email = $request->email;
        $userValidate->password = Hash::make($request->password);
        $userValidate->phone = $request->phone;
        $userValidate->profile_photo = $profile_photo ?? 'default-profile-image.png';
        $userValidate->role = 'user';
        $userValidate->save();

        event(new Registered($userValidate));

        Auth::login($userValidate);

        $dealer = new Dealership();
        $dealer->user_id = $userValidate->id;
        $dealer->business_name = $request->business_name;
        $dealer->business_address = $request->business_address;
        $dealer->trade_license_number = $request->trade_license_number;
        $dealer->attachment = $attachment ?? '["default-product-image.png"]';
        $dealer->save();

        $notifyMessage = [
            'title' => 'Thank you Applying for Dealership. Please wait for approval!',
            'name' => 'Thank You'.' '.$request->name,
        ];  
        Notification::route('mail', $request->email)
           ->notify(new OrderConfirmation($notifyMessage));
        return redirect()->route('user.dashboard')->with('success', 'Created successfully & wating for approve!');
    }

    public function updateDealer(UpdateDealershipRequest $request, $id)
    {
        $dealership = Dealership::find($id);
        $user = User::where('id', $dealership->user_id)->first();

        if (!$request['profile_photo']) {
            $user->profile_photo = $user->profile_photo;
            $user->save();
        } else {
            if (isset($request['profile_photo'])) {
                $oldFile = \public_path('uploads/profile/' . $user->profile_photo);
                if (isset($user->profile_photo)) {
                    if (file_exists($oldFile)) {
                        if($user->profile_photo != 'default-profile-image.png') {
                            unlink($oldFile);
                        }
                    }
                }
                $profile_photo = $this->uploader->upload($request->file('profile_photo'), 'uploads/profile/');
                $request['profile_photo'] = $profile_photo;
                $user->profile_photo = $profile_photo;
                $user->save();
            }
        }

        if ($user->id === $dealership->user_id) {
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email_verified_at = null;
            $user->save();
        }

        // if (!$request['attachment']) {
        //     $dealership->attachment = $dealership->attachment;
        //     $dealership->save();
        // } else {
        //     if (isset($request['attachment'])) {
        //         $oldFile = \public_path('uploads/dealership/' .$dealership->attachment);
        //         if (isset($dealership->attachment)) {
        //             if (file_exists($oldFile)) {
        //                 unlink($oldFile);
        //             }
        //         }
        //         $attachment = $this->uploader->upload($request->file('attachment'), 'uploads/dealership/');
        //         $request['attachment'] = $attachment;
        //        $dealership->attachment = $attachment;
        //        $dealership->save();
        //     }
        // }

        if (isset($request['attachment'])) {
            $newJson = $this->uploader->uploadMultiple($request['attachment'], 'uploads/dealership/');            
            $newArr = json_decode($newJson, true);
            $oldArr = json_decode($dealership->attachment, true);
            $updatedJson = json_encode(array_merge($oldArr, $newArr));
            $request['attachment'] = $updatedJson;
            $dealership->attachment = $updatedJson ?? null;
            $dealership->save();
        }
        $dealership->user_id = $dealership->user_id;
        $dealership->trade_license_number = $request->trade_license_number;
        $dealership->business_name = $request->business_name;
        $dealership->business_address = $request->business_address;
        $dealership->bin_number = $request->bin_number;
        $dealership->tin_number = $request->tin_number;
        $dealership->nid_number = $request->nid_number;
        $dealership->p_address = $request->p_address;
        $dealership->others = $request->others;
        $dealership->save();

        // $this->dealerService->update($request->validated(), $dealership->id);
        return back()->with('success', 'Updated successfully!');
    }
}
