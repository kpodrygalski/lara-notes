<?php

namespace App\Http\Controllers\API\V1;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\AuthRequest;
use Symfony\Component\HttpFoundation\Response;

class APIAuthController extends Controller
{
    public function login(AuthRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Unauthenticated! Your email or password is incorrect!'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $token = $user->createToken('api_access_token')->plainTextToken;

        return response()->json([
            'token' => $token
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'API :: Logged out'
        ]);
    }
}
