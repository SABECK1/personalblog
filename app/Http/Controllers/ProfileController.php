<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Http\Requests\ProfileUpdateRequest;
use DebugBar\DebugBar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $user_id = Auth::id();
        $validator = validator($request->all(), [
            'name' => ['required', 'string', 'max:255', Rule::unique('users', 'name')->ignore($user_id)],
            'email' => ['required', 'string', 'email', 'max:255', RUle::unique('users', 'email')->ignore($user_id)],
        ]);

        if ($validator->fails()) {

            if($request->ajax())
            {
                return response()->json(array(
                    'success' => false,
                    'message' => 'There are incorrect values in the form!',
                    'errors' => $validator->getMessageBag()->toArray()
                ), 422);
            }

            throw ValidationException::withMessages([$request, $validator]);
        }

        $user = Auth::user();
        $user->fill(['name' => $request->name,
                     'email'=> $request->email]);
//
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
//
        try{
            $user->update(); // returns false
        }
        catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Failure to save',
                'errors' => $e->getMessage(),
            ], 422);
        }

        // Since it's called via ajax we have to return the response as json
        return response()->json(['message' => 'Data updated successfully', 'data' => $request->all(),  200]);

//        return redirect(route('dashboard', ['tab' => 'profile']))->with('success', 'Profile updated successfully');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
