<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    // Menentukan schema form untuk pengguna baru
    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->label('Nama')
                ->required(),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->required()
                ->email()
                ->unique('users', 'email'), // Pastikan email unik

            Forms\Components\TextInput::make('password')
                ->label('Password')
                ->required()
                ->password()
                ->minLength(8),

            Forms\Components\TextInput::make('password_confirmation')
                ->label('Konfirmasi Password')
                ->required()
                ->password()
                ->same('password'),
        ];
    }

    // Menangani pembuatan pengguna baru
    public function handle(): void
    {
        $data = $this->form->getState();

        // Periksa apakah email sudah terdaftar
        if (\App\Models\User::where('email', $data['email'])->exists()) {
            $this->notify('danger', 'Email sudah terdaftar, silakan pilih email lain.');
            return; // Hentikan proses jika email duplikat
        }

        try {
            // Proses penyimpanan pengguna baru
            \App\Models\User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            // Notifikasi sukses setelah pengguna dibuat
            $this->notify('success', 'Akun pengguna baru telah berhasil dibuat!');
            
            // Redirect kembali ke halaman daftar pengguna
            $this->redirect($this->resource::getUrl('index'));

        } catch (QueryException $e) {
            // Tangani exception untuk duplikasi email atau kesalahan lain
            if ($e->getCode() == '23000') {
                $this->notify('danger', 'Terjadi kesalahan saat menyimpan pengguna. Kemungkinan email sudah terdaftar.');
            } else {
                $this->notify('danger', 'Terjadi kesalahan tidak terduga.');
            }
        }
    }
}
