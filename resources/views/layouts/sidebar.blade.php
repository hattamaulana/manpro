@php
$menus = \App\Menu::where('parent_id', '=', null)
    ->whereHas('map', function ($query) {
        return $query->where('role_id', Auth::user()->role_id);
    })
    ->get();

$submenus = function ($id) {
    return \App\Menu::where('parent_id', '=', $id)
        ->whereHas('map', function ($query) {
            return $query->where('role_id', Auth::user()->role_id);
        })
        ->get();
};

$subMenuActive = function ($url) {
    return Str::contains(Request::path(), $url);
};

$menuActive = function ($item) use ($submenus) {
    $result = false;
    $subs = $submenus($item->id);
    if ($subs->count() > 0) {
        $subs->each(function ($val, $i) use (&$result) {
            if (Str::contains(Request::path(), $val->url)) {
                $result = true;
            }
        });
    } else {
        if (Request::is($item->url)) {
            $result = true;
        }
    }

    return $result;
};
@endphp


<!-- Sidebar outter -->
<div class="main-sidebar">
    <!-- sidebar wrapper -->
    <aside id="sidebar-wrapper">
        <!-- sidebar brand -->
        <div class="sidebar-brand">
            MH APPS
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            MH APPS
        </div>
        <!-- sidebar menu -->
        <ul class="sidebar-menu">
            <!-- menu item -->
            @foreach ($menus as $item)
                <li class="dropdown @if ($menuActive($item)) active @endif">
                    <a href="{{ url($item->url) }}" class="nav-link @if ($submenus($item->id)->count() > 0) has-dropdown @endif">
                        <i class="fas {{ $item->icon }}"></i>
                        <span>{{ $item->name }}</span>
                    </a>
                    @if ($submenus($item->id)->count() > 0)
                        <ul class="dropdown-menu" style="">
                            @foreach ($submenus($item->id) as $subitem)
                                <li class="@if ($subMenuActive($subitem->url)) active @endif">
                                    <a class="nav-link" href="{{ url('' . $subitem->url) }}">
                                        {{ $subitem->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger btn-lg btn-icon-split" type="submit" style="width: 200px;">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </button>
            </form>
        </div>
    </aside>
</div>
