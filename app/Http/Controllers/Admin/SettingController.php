<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Option;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function generalSettings(Request $request)
    {
        $data['options'] = Option::get();

        if($request->isMethod('POST'))
        {
            // dd($request->all());

            $option = Option::where('key', '=', 'app.name')->first();
            $option->value = $request->site_title ?: $option->value;
            $option->save();

            $option = Option::where('key', '=', 'app.url')->first();
            $option->value = $request->site_url ?: $option->value;
            $option->save();

            $option = Option::where('key', '=', 'app.email')->first();
            $option->value = $request->email ?: $option->value;
            $option->save();

            $option = Option::where('key', '=', 'app.phone')->first();
            $option->value = $request->phone ?: $option->value;
            $option->save();

            $option = Option::where('key', '=', 'app.timezone')->first();
            $option->value = $request->site_timezone ?: $option->value;
            $option->save();

            $option = Option::where('key', '=', 'app.timezone')->first();
            $option->value = $request->site_timezone ?: $option->value;
            $option->save();

            $option = Option::where('key', '=', 'app.date_format')->first();
            $option->value = $request->date_format ?: $option->value;
            $option->save();

            $option = Option::where('key', '=', 'app.time_format')->first();
            $option->value = $request->time_format ?: $option->value;
            $option->save();

            $option = Option::where('key', '=', 'app.week_start')->first();
            $option->value = $request->start_of_week ?: $option->value;
            $option->save();

            if (isset($request->site_logo)) {
                if ($request->hasFile('site_logo')) {
                    $image_array = $request->file('site_logo');
                    $extension = $image_array->getClientOriginalExtension();
                    $filename = 'logo_'.uniqid().'.' . $extension;
                    $large_image_path = public_path('/admin/img/common/' . $filename);
                    // Resize image
                    Image::make($image_array)->save($large_image_path);
                }
                $option = Option::where('key', '=', 'app.logo')->first();
                $option->value = $filename ?: $option->value;
                $option->save();
            }

            if (isset($request->site_icon)) {
                if ($request->hasFile('site_icon')) {
                    $image_array = $request->file('site_icon');
                    $extension = $image_array->getClientOriginalExtension();
                    $filename = 'favicon_'.uniqid().'.' . $extension;
                    $large_image_path = public_path('/admin/img/common/' . $filename);
                    // Resize image
                    Image::make($image_array)->save($large_image_path);
                }
                $option = Option::where('key', '=', 'app.favicon')->first();
                $option->value = $filename ?: $option->value;
                $option->save();
            }

            if (isset($request->site_logo_icon)) {
                if ($request->hasFile('site_logo_icon')) {
                    $image_array = $request->file('site_logo_icon');
                    $extension = $image_array->getClientOriginalExtension();
                    $filename = 'logoicon_'.uniqid().'.' . $extension;
                    $large_image_path = public_path('/admin/img/common/' . $filename);
                    // Resize image
                    Image::make($image_array)->save($large_image_path);
                }
                $option = Option::where('key', '=', 'app.logo_icon')->first();
                $option->value = $filename ?: $option->value;
                $option->save();
            }

            $notification = array(
                'message' => 'Settings Updated!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }

        $metaTitle = "General Settings | ".config('app.name');

        return view('admin.settings.general_settings', compact('metaTitle','data'));
    }


    public function headerSettings()
    {
        $metaTitle = "Header Settings | ".config('app.name');

        return view('admin.settings.header_settings', compact('metaTitle'));
    }

    public function footerSettings()
    {
        $metaTitle = "Footer Settings | ".config('app.name');

        return view('admin.settings.footer_settings', compact('metaTitle'));
    }
}
