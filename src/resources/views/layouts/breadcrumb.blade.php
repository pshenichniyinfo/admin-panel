<ol class="breadcrumb mb-3">
    <li>
        <i class="fa fa-home"></i>
        <a href="{{route(config('admin-panel-app.homepage_redirect'))}}">
            {{ config('admin-panel-app.homepage_name') }}
        </a>
        <span class="mr-1"> / </span>
    </li>

    @for($i = 0; $i <= count(Request::segments()); $i++)
        @if($i > 1 && Request::segment($i) !== \Illuminate\Support\Str::lower(config('admin-panel-app.homepage_name')))
            <li class="breadcrumb-item @if(count(Request::segments()) !== $i) active @endif">
                @if($i === count(Request::segments()))
                    {{ Request::segment($i) }}
                @else
                    <a href="{{ url()->to(implode('/', array_slice(explode('/', \Illuminate\Support\Facades\URL::current()), 0, -1))) }}">
                        {{ Request::segment($i) }}
                    </a>
                @endif
            </li>
        @endif
    @endfor
</ol>
