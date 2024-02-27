<ol class="breadcrumb float-sm-right">
    <li>
        <i class="fa fa-home"></i>
        <a href="{{route('admin.dashboard')}}">Dashboard</a>
        <i class="fa fa-angle-right"></i>
    </li>
    @for($i = 0; $i <= count(Request::segments()); $i++)
        @if($i > 1 && Request::segment($i) !== 'dashboard')
            <li class="breadcrumb-item @if(count(Request::segments()) !== $i) active @endif">
                {{Request::segment($i)}}
            </li>
        @endif
    @endfor
</ol>
