<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

/**
 * Class ProviderRepository.
 */
class LoginRepository 
{
    /**
     * ProviderRepository constructor.
     *
     * @param  Providers  $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function login($request)
    {
      $user = $this->model->where('email', $request->email)->first();

      if (! $user || ! Hash::check($request->password, $user->password))
      {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
       }
       return response()->json([$user->createToken($request->device_name)->plainTextToken, $user->name]);
    }

}



    


