<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Select;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class Dashboard extends BaseDashboard
{
    use HasFiltersForm;

    public function getWidgets(): array
    {
        return [
            \App\Filament\Widgets\FillerWidget::class,
            \App\Filament\Widgets\TestChart::class,
        ];
    }

    public function filtersForm(Schema $schema): Schema
    {
        return $schema
            ->statePath('filters')
            ->components([
                Grid::make(3)->schema([
                    Select::make('period')
                        ->label('Period')
                        ->options([
                            'week' => 'Week',
                            'month' => 'Month',
                            'quarter' => 'Quarter',
                        ])
                        ->default('month')
                        ->live()
                        ->columnSpanFull()
                        ->selectablePlaceholder(false),
                ]),
            ]);
    }
}
