@foreach ($categories as $item)
    <option value="{{ $item->id }}" @selected(old('category_id') == $item->id) @if ($category && $item->id == $category->parent_id)
        selected
@endif
>
@php
    $name = $text . $item->name;
@endphp
{{ $name }}
@if ($item->children->count() > 0)
    @include('layouts.inc.sub', [
        'categories' => $item->children,
        'text' => ($text .= '--'),
        'category' => $category,
    ])
@endif
</option>
@endforeach
