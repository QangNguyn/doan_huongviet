<div class="sub-category">
    <div class="sub-category__list">
        @foreach ($subCategory as $category)
            <div class="category__item">
                <a href="{{ route('categories.detail', $category->slug) }}" class="d-block">
                    <h3 class="category__item--heading">{{ $category->name }}</h3>
                </a>
                <ul>
                    @if ($category->children->count() > 0)
                        @foreach ($category->children as $category)
                            <li>
                                <a href="{{ route('categories.detail', $category->slug) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        @endforeach
    </div>
</div>
