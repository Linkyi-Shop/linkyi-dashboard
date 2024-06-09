<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\UpdatePasswordValidationRequest;
use App\Http\Requests\Profile\UpdateProfileValidationRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Store;
use App\Models\StoreView;
use App\Models\User;
use App\Services\AdminProfileService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(): View
    {

        $data = [
            'product' => Product::where('is_active', 1)->count(),
            'category' => StoreView::sum('total'),
            'store' => Store::count(),
            'member' => User::count()
        ];
        return view("backoffice.index", $data);
    }

    public function profile()
    {
        $user =  Auth()->user();
        return view('backoffice.profile.index', compact('user'));
    }

    public function updateProfile(UpdateProfileValidationRequest $request)
    {
        $data = (new AdminProfileService())->updateProfileAdmin($request);
        if (!$data) {
            return redirect()->back()->with('error', 'Gagal memperbaharui profil');
        }
        return redirect()->back()->with('msg', 'Berhasil memperbaharui profil');
    }
    public function changePassword()
    {
        return view('backoffice.profile.update-password');
    }

    public function updatePassword(UpdatePasswordValidationRequest $request)
    {
        $data = (new AdminProfileService())->updatePasswordAdmin($request);

        if (!$data['success']) {
            return redirect()->back()->with('error', $data['message']);
        }

        return redirect()->back()->with('msg', $data['message']);
    }
}
