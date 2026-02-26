<?php

namespace App\Filament\Widgets;

use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\ChartWidget\Concerns\HasFiltersSchema;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class TestChart extends ChartWidget
{
    use HasFiltersSchema;
    use InteractsWithPageFilters;

    protected ?string $heading = 'Test Chart';
    protected static bool $isLazy = true;

    public function filtersSchema(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('status')
                ->label('Status')
                ->multiple()
                ->options([
                    'new' => 'New',
                    'processing' => 'Processing',
                    'completed' => 'Completed',
                ]),
        ]);
    }

    protected function getData(): array
    {
        return [
            'datasets' => [
                ['label' => 'Test', 'data' => [10, 20, 30, 40]],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
