@isset($menus)
    @foreach($menus as $menu)
        <li class="nav-item">
            @isset($menu['child'])
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-{{ $menu['icon'] }}"></i>
                    <p>
                        {{ $menu['name'] }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @foreach($menu['child'] as $child)
                        <li class="nav-item">
                            <a href="{{ route($child['link']) }}" class="nav-link">
                                {{ $menu['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <a href="{{ route($menu['link']) }}" class="nav-link">
                    <i class="nav-icon fas fa-{{ $menu['icon'] }}"></i>
                    <p>
                        {{ $menu['name'] }}
                    </p>
                </a>
            @endempty

        </li>
    @endforeach
@endisset
