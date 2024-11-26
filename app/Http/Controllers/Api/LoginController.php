<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log; // Adiciona o facade Log

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        // Validação dos dados da requisição
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
            'device_name' => ['sometimes', 'required', 'string', 'max:255'],
        ]);

        // Busca o usuário
        $user = User::where('email', $request->email)->first();

        // Loga a tentativa de login
        Log::info('Tentativa de login', [
            'email' => $request->email,
            'device_name' => $request->device_name ?? 'não fornecido',
            'timestamp' => now(),
        ]);

        // Verifica se o usuário existe e se a senha está correta
        if (! $user || ! Hash::check($request->password, $user->password)) {
            // Registra a falha de login
            Log::warning('Falha de login', [
                'email' => $request->email,
                'timestamp' => now(),
            ]);

            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Loga o sucesso de login
        Log::info('Login bem-sucedido', [
            'user_id' => $user->id,
            'email' => $user->email,
            'device_name' => $request->device_name ?? 'não fornecido',
            'timestamp' => now(),
        ]);

        // Gera o token e retorna a resposta
        return response()->json([
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
            ],
            'token' => $user->createToken($request->get('device_name', 'device_name'))->plainTextToken
        ]);
    }
}
