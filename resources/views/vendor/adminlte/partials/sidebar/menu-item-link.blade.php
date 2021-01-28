<li @if(isset($item['id'])) id="{{ $item['id'] }}" @endif class="nav-item {{ in_array(Auth::user()->role, $item['role']) ? '' : 'd-none' }}">

    <a class="nav-link {{ $item['class'] }} @if(isset($item['shift'])) {{ $item['shift'] }} @endif"
       href="{{ $item['href'] }}" @if(isset($item['target'])) target="{{ $item['target'] }}" @endif
       {!! $item['data-compiled'] ?? '' !!}>

        <i class="{{ $item['icon'] ?? '' }} {{
            isset($item['icon_color']) ? 'text-'.$item['icon_color'] : ''
        }} mr-2" style="font-style: normal;">{{ $item['logo'] ?? '' }} </i>

        <p>
            {{ $item['text'] }}

            @if(isset($item['label']))
                <span class="badge badge-{{ $item['label_color'] ?? 'primary' }} right">
                    {{ $item['label'] }}
                </span>
            @endif
        </p>

    </a>

</li>