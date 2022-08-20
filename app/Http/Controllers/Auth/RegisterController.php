<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Repository\RegisterRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public RegisterRepository $registerRepository;

    public function __construct(RegisterRepository $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }

    public function create()
    {
        $yearNow = Carbon::now()->year;

        return response()->view('auth.register', ['yearNow' => $yearNow]);
    }

    public function store(RegisterRequest $registerRequest)
    {
        $validateDataUser = $registerRequest->safe()->only(['username', 'email']);
        $validateDataPemilih = $registerRequest->safe()->only(['nama', 'nim', 'angkatan', 'kelas']);

        DB::beginTransaction();

        try {
            // nama foto
            $namaFoto = $this->registerRepository->upload($registerRequest->file('foto_pemilih'));
            // hash password
            $password = Hash::make($registerRequest->password);

            $validateDataUser['password'] = $password;
            $validateDataPemilih['foto_pemilih'] = $namaFoto;

            $user = User::create($validateDataUser);

            $user->pemilih()->create($validateDataPemilih);

            DB::commit();

            return redirect()->route('login.create')->with('success', 'Registrasi Berhasil');
        } catch (Exception $exception) {
            DB::rollBack();

            Storage::delete('public/pemilih/' . $namaFoto);

            dd($exception->getMessage());
        }
    }
}
