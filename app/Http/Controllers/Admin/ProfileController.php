<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profiles;

use App\ProfileHistory;

use Carbon\Carbon;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Profiles::$rules);
        
        $profiles = new Profiles;
        $form = $request->all();
        
        unset($form['_token']);
        
        $profiles->fill($form);
        $profiles->save();
        
        return redirect('admin/profile/create');
    }
    
    public function edit(Request $request)
    {
        $profiles = Profiles::find($request->id);
        if(empty($profiles)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profiles_form' => $profiles]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Profiles::$rules);
        $profiles = Profiles::find($request->id);
        $profiles_form = $request->all();
        unset($profiles_form['_token']);
        
        $profiles->fill($profiles_form)->save();
        
        $profile_history = new ProfileHistory;
        $profile_history->profiles_id = $profiles->id;
        $profile_history->edited_at = Carbon::now();
        $profile_history->save();
        
        return redirect('admin/profile/edit');
    }
}
