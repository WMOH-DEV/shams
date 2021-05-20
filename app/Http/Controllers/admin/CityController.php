<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::latest('id')->get();
        return view('admin.cities.index', compact('cities'));

    }// end index

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'desc' => ['required', 'string', 'max:150'],
            'image' => ['required', 'image', 'max:1024']
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = Storage::put("cities",$request->file('image'));
        }

        City::create($data);

        notify()->info('إضافة مدينة جديدة إلى الموقع', 'تم بنجاح');
        return back();

    } // End store

    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));

    } // End update

    public function update(Request $request,City $city)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'desc' => ['required', 'string', 'max:150'],
            'image' => ['nullable', 'image', 'max:1024']
        ]);

        if ($request->hasFile('image')) {
            if ($city->image !== 'no-image.jpg'){Storage::delete($city->image);}
            $data['image'] = Storage::put("cities",$request->file('image'));
        }

        $city->update($data);

        notify()->info('تم تعديل المدينة وحفظ البيانات', 'تم بنجاح');

        return back();

    } // End update

    public function destroy(City $city)
    {
        if ($city->image !== 'no-image.jpg'){
            Storage::delete($city->image);
        }
        $city->delete();
        notify()->success('تم حذف المدينة من قاعدة البيانات', 'تم بنجاح');

        return back();
    } // End delete

} // End Controller
