<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class FillerWidget extends Widget
{
    protected string $view = 'filament.widgets.filler-widget';
    protected int|string|array $columnSpan = 'full';
    protected static bool $isLazy = true;
}
