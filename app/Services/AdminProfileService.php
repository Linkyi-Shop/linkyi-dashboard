<?php

namespace App\Services;

use App\Models\Admin;
use App\Repositories\AdminProfileRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminProfileService
{


    public function updateProfileAdmin($request)
    {
        try {
            DB::beginTransaction();
            $data = [
                'name' => $request->name,
            ];
            Admin::where('id', Auth()->id())->update($data);

            DB::commit();
            return true;
        } catch (\Throwable $th) {
            Log::info("=== Error Update profile ===");
            Log::error($th->getMessage());
            Log::info("=== Error Update profile ===");
            DB::rollBack();
            return false;
        }
    }
    public function updatePasswordAdmin($request)
    {
        try {
            DB::beginTransaction();
            $user = Auth()->user();
            if (Hash::check($request['old_password'], $user->password)) {
                $data = [
                    'password' => bcrypt($request->password)
                ];
                Admin::where('id', Auth()->id())->update($data);
                DB::commit();
                return [
                    'success' => true,
                    "message" => 'Berhasil memperbaharui password'
                ];
            } else {
                return [
                    'success' => false,
                    "message" => 'Passwrd lama anda salah,silahkan coba lagi'
                ];
            }
        } catch (\Throwable $th) {
            Log::info("=== Error Update password ===");
            Log::error($th->getMessage());
            Log::info("=== Error Update password ===");
            DB::rollBack();
            return [
                'success' => true,
                "message" => 'Gagal memperbaharui password'
            ];
        }
    }
}
