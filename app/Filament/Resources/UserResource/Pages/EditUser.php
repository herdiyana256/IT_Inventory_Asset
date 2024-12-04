<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Aksi untuk menghapus record
            Actions\DeleteAction::make(),

            // Aksi lainnya bisa ditambahkan di sini
            Actions\Action::make('save')
                ->label('Save')
                ->icon('heroicon-o-save')
                ->color('success')
                ->action(function () {
                    // Simpan data perubahan ke dalam database jika diperlukan
                    $this->record->save();
                    $this->success('Data telah berhasil disimpan!');
                }),

            Actions\Action::make('cancel')
                ->label('Cancel')
                ->icon('heroicon-o-x')
                ->color('secondary')
                ->action(function () {
                    // Mengarahkan kembali ke halaman daftar atau melakukan aksi lainnya
                    return redirect()->route('filament.resources.users.index');
                }),
        ];
    }
}
