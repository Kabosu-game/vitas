<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function home()
    {
        return view('frontend::home.index');
    }

    public function subscribeNow(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:subscriptions'],
        ]);

        if ($validator->fails()) {
            notify()->error($validator->errors()->first(), 'Error');

            return redirect()->back();
        }

        Subscription::create([
            'email' => $request->email,
        ]);

        notify()->success(__('Subscribed Successfully'));

        return redirect()->back();
    }

    public function themeMode()
    {

        $oldTheme = session()->get('site-color-mode', setting('default_mode'));

        if ($oldTheme == 'dark') {
            session()->put('site-color-mode', 'light');
        } else {
            session()->put('site-color-mode', 'dark');
        }

    }

    public function languageUpdate(Request $request)
    {
        session()->put('locale', $request->name);

        return redirect()->back();
    }

    public function session(Request $request)
    {
        $key = $request->input('key');

        $value = $request->input('value');

        session([$key => $value]);

        return response()->json(['success' => true]);
    }
}
