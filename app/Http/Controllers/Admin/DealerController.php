<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DealerApproveDataTable;
use App\DataTables\DealerPendingDataTable;
use App\DataTables\DealersDataTable;
use App\Models\Dealership;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDealershipRequest;
use App\Http\Requests\UpdateDealershipRequest;
use App\Services\Interfaces\DealerServiceInterface;
use App\Models\User;
use App\Utils\FileUploader;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DealerController extends Controller
{
    protected $dealerService;

    public function __construct(DealerServiceInterface $dealerService, private FileUploader $uploader)
    {
        $this->dealerService = $dealerService;
    }

    public function index(DealersDataTable $dataTable)
    {
        return $dataTable->render('common.dealership.index');
    }

    public function approveIndex(DealerApproveDataTable $dataTable)
    {
        return $dataTable->render('common.dealership.approved');
    }

    public function pendingIndex(DealerPendingDataTable $dataTable)
    {
        return $dataTable->render('common.dealership.pending');
    }

    public function create()
    {
        return view('common.dealership.create');
    }

    public function register()
    {
        return view('auth.dealership.register');
    }

    public function storeRegister(StoreDealershipRequest $request)
    {
        // $this->dealerService->store($request->validated());

        $userValidate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed'],
            'phone' => 'required',
        ]);
        // dd($userValidate);
        // $userValidate = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'role' => 'user',
        // ]);
        if ($request->hasFile('profile_photo')) {
            $profile_photo = $this->uploader->upload($request->file('profile_photo'), 'uploads/profile/');
            $product['profile_photo'] = $profile_photo;
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


        if ($request->hasFile('attachment')) {
            $attachment = $this->uploader->uploadMultiple($request->file('attachment'), 'uploads/dealership/');
            $product['attachment'] = $attachment;
        }

        $dealer = new Dealership();
        $dealer->user_id = $userValidate->id;
        $dealer->business_name = $request->business_name;
        $dealer->business_address = $request->business_address;
        $dealer->trade_license_number = $request->trade_license_number;
        $dealer->attachment = $attachment ?? '["default-product-image.png"]';
        $dealer->save();

        return redirect()->route('user.dashboard')->with('success', 'Created successfully & wating for approve!');
    }

    // public function store(StoreDealershipRequest $request)
    // {
    //     $this->dealerService->store($request->validated());

    //     $userValidate = $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed'],

    //     ]);
    //     $userValidate = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'role' => 'user',
    //     ]);
    //     event(new Registered($userValidate));

    //     Auth::login($userValidate);

    //     return redirect()->route('user.dashboard')->with('success', 'Created successfully & wating for approve!');
    // }

    public function show(Dealership $dealership)
    {
        $user = User::where('id', $dealership->user_id)->first();
        return view('common.dealership.show', compact('dealership', 'user'));
    }

    public function edit(Dealership $dealership)
    {
        $user = User::where('email', $dealership->email)->first();
        return view('common.dealership.edit', compact('dealership', 'user'));
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

        if (!$request['attachment']) {
            $dealership->attachment = $dealership->attachment;
            $dealership->save();
        } else {
            if (isset($request['attachment'])) {
                $oldFile = \public_path('uploads/dealership/' .$dealership->attachment);
                if (isset($dealership->attachment)) {
                    if (file_exists($oldFile)) {
                        unlink($oldFile);
                    }
                }
                $attachment = $this->uploader->upload($request->file('attachment'), 'uploads/dealership/');
                $request['attachment'] = $attachment;
               $dealership->attachment = $attachment;
               $dealership->save();
            }
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

    public function destroy($id)
    {
        $this->dealerService->delete($id);
        return response()->json('Deleted successfully!');
    }

    public function active($id)
    {
        $this->dealerService->statusInactive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function inActive($id)
    {
        $this->dealerService->statusActive($id);
        return response()->json(['Status changed successfully!']);
    }

    public function dillerApprove($id)
    {
        $this->dealerService->dillerApprove($id);
        return back()->with('success', 'Approved successfully!');
    }

}
