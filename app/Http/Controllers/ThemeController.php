<?php

namespace App\Http\Controllers;

use App\Helpers\CurrencyHelper;
use App\Helpers\LinkyiStorage;
use App\Http\Requests\Theme\CreateThemeRequest;
use App\Http\Requests\Theme\UpdateThemeRequest;
use App\Models\Theme;
use App\Services\ThemeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ThemeController extends Controller
{
    public function index()
    {
        $data = Theme::latest()->get();
        return view('backoffice.theme.index', compact('data'));
    }
    public function create()
    {
        return view('backoffice.theme.create');
    }
    public function store(CreateThemeRequest $request)
    {

        try {
            DB::beginTransaction();
            $thumbnail = LinkyiStorage::uploadThemeStore($request->thumbnail);
            $data = [
                'name' => $request->name,
                'path' => $request->path,
                'price' => CurrencyHelper::IDRToNum($request->price),
                'is_premium' => $request->is_premium,
                'link' => $request->link,
                'thumbnail' => $thumbnail,
                'is_active' => 1,
            ];
            Theme::create($data);
            DB::commit();
            return redirect()->route('theme.index')->with("msg", "Berhasil menambahkan tema");
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th->getMessage());
            return back()->with('error', 'Terjadi kesalahan');
        }
    }
    public function edit($id)
    {
        $data = Theme::findOrFail($id);
        return view('backoffice.theme.edit', compact('data'));
    }
    public function update(UpdateThemeRequest $request, $id)
    {

        try {
            DB::beginTransaction();
            $theme = Theme::findOrFail($id);
            $data = [
                'name' => $request->name,
                'path' => $request->path,
                'price' => CurrencyHelper::IDRToNum($request->price),
                'is_premium' => $request->is_premium,
                'link' => $request->link,

            ];
            if ($request->thumbnail) {
                LinkyiStorage::deleteThemeStoreThumbnail($request->thumbnail);
                $data['thumbnail'] = LinkyiStorage::uploadThemeStore($request->thumbnail);
            }
            $theme->update($data);
            DB::commit();
            return redirect()->route('theme.index')->with("msg", "Berhasil memperbaharui tema");
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th->getMessage());
            return back()->with('error', 'Terjadi kesalahan');
        }
    }
    public function show($id)
    {
        $data = Theme::findOrFail($id);
        return view('backoffice.theme.show', compact('data'));
    }

    public function setStatus($id)
    {
        $status = (new ThemeService())->updateStatus($id);

        if ($status) {
            return back()->with('msg', $status);
        }
        return back()->with('error', 'Status gagal diperbaharui');
    }
}
