## Description

Lazy `ChartWidget` with `HasFiltersSchema` + `InteractsWithPageFilters` throws Livewire Entangle errors when dashboard filters change before the widget is scrolled into view.

Any non-native Select (`->multiple()`, `->searchable()`, or `->native(false)`) triggers the bug. Native Select works fine.

## Steps to reproduce

1. Dashboard with `HasFiltersForm` + any live filter
2. Lazy `ChartWidget` with `HasFiltersSchema` containing a `multiple()` Select + `InteractsWithPageFilters`
3. Widget must be below viewport (not yet loaded)
4. Change a dashboard filter → console errors, filters become unresponsive

## Errors

```
Livewire Entangle Error: Livewire property ['filters.status'] cannot be found on component
Uncaught TypeError: Cannot read properties of undefined (reading 'findCommitByComponent')
```

## Root cause

Non-native Select uses `$wire.entangle('filters.status')`. On lazy dehydrate `$filters = []` — key doesn't exist → entangle fails.
