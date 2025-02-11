<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification; // Pastikan ini diimpor

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('tribun_id')
                    ->relationship('tribun', 'nama_tribun')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required(),
                Forms\Components\TextInput::make('quantity')
                    ->numeric()
                    ->default(1)
                    ->required(),
                Forms\Components\TextInput::make('amount')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('payment_method')
                    ->options([
                        'credit_card' => 'Credit Card',
                        'bank_transfer' => 'Bank Transfer',
                        'e_wallet' => 'E-Wallet',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('payment_details'),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'success' => 'Success',
                        'failed' => 'Failed',
                    ])
                    ->default('pending')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tribun.nama_tribun')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('amount')
                    ->money('idr'),
                Tables\Columns\TextColumn::make('payment_method'),
                Tables\Columns\TextColumn::make('status') // Ganti BadgeColumn dengan TextColumn atau kolom yang sesuai
                    ->badge() // Jika Anda ingin tetap menggunakan badge, gunakan metode badge()
                    ->colors([
                        'danger' => 'failed',
                        'warning' => 'pending',
                        'success' => 'success',
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'success' => 'Success',
                        'failed' => 'Failed',
                    ]),
            ])
            ->actions([
                Tables\Actions\Action::make('confirm')
                    ->action(function (Payment $record): void {
                        if ($record->status !== 'pending') {
                            Notification::make()
                                ->title('Invalid Status')
                                ->danger()
                                ->send();
                            return;
                        }

                        try {
                            $record->update(['status' => 'paid']);
                            
                            Notification::make()
                                ->title('Payment Confirmed Successfully')
                                ->success()
                                ->send();
                        } catch (\Exception $e) {
                            Notification::make()
                                ->title('Error Confirming Payment')
                                ->danger()
                                ->body($e->getMessage())
                                ->send();
                        }
                    })
                    ->requiresConfirmation()
                    ->visible(fn (Payment $record): bool => $record->status === 'pending')
                    ->color('success')
                    ->icon('heroicon-o-check')
                    ->label('Confirm Payment'),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}