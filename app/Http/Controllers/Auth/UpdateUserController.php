<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdateDataRequest;
use App\Http\Requests\Auth\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateUserController extends Controller
{
    /**
     * Display the update form
     *
     * @return \Illuminate\View\View
     */
    public function edit(): \Illuminate\View\View
    {
        return view('auth.update');
    }

    /**
     * Handle an incoming update request.
     *
     * @param UpdateDataRequest $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(UpdateDataRequest $request): \Illuminate\Http\RedirectResponse
    {
        auth()->user()->update($request->validated());
        return redirect(route('user.update'))->with('success' , 'Updated successfully');
    }

    /**
     * Display the update password form
     *
     * @return \Illuminate\View\View
     */
    public function editPassword(): \Illuminate\View\View
    {
        return view('auth.update-password');
    }

    /**
     * Handle an incoming update request.
     *
     * @param UpdatePasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updatePassword(UpdatePasswordRequest $request): \Illuminate\Http\RedirectResponse
    {
        auth()->user()->update([
            'password' => Hash::make($request->validated()['password']),
        ]);
        return redirect(route('user.update'))->with('success' , 'Password updated successfully');
    }
}
