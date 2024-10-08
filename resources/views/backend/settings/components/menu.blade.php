<div class="col-12 mb-3">
    <a href="{{ route('backend.settings.index') }}"
        class="btn {{ Str::contains(Route::currentRouteName(), 'settings.index') ? 'btn-primary' : '' }}"><i
            class="bi bi-sliders"></i>
        General</a>
    <a href="{{ route('backend.settings.theme') }}" type="button"
        class="btn {{ Str::contains(Route::currentRouteName(), 'settings.theme') ? 'btn-primary' : '' }}"><i
            class="bi bi-palette"></i> Theme</a>
    <a href="{{ route('backend.settings.seo') }}" type="button"
        class="btn {{ Str::contains(Route::currentRouteName(), 'settings.seo') ? 'btn-primary' : '' }}"><i
            class="bi bi-graph-up-arrow"></i> Seo</a>
</div>
