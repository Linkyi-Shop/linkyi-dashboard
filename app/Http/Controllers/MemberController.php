<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MemberController extends Controller
{
    public function index()
    {
        $data = User::latest()->get();
        return view('backoffice.member.index', compact('data'));
    }

    public function show($id)
    {
        $data = User::whereId($id)->firstOrFail();
        return view('backoffice.member.show', compact('data'));
    }
    public function destroy($id)
    {
        return "Feature belum tersedia";
    }
    // public function destroy($id)
    // {
    //     try {
    //         DB::beginTransaction();
    //         $data = User::whereId($id)->firstOrFail();
    //         Product::where('user_id', $id)->delete();
    //         ProductCategory::where('user_id', $id)->delete();
    //         if ($data?->store?->id) {
    //             SocialMedia::where('store_id', $data->store->id)->delete();
    //             StoreTheme::where('store_id', $data->store->id)->delete();
    //             Store::where('user_id', $id)->delete();
    //         }
    //         $data->delete();
    //         DB::commit();
    //         return redirect()->back()->with("msg", "Berhasil menghapus user");
    //     } catch (\Throwable $th) {
    //         //throw $th;
    //         DB::rollback();
    //         Log::error("Error : " . $th->getMessage());
    //         return redirect()->back()->with("error", "Gagal menghapus user");
    //     }
    // }
}
