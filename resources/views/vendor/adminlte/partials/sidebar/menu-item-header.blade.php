<li @if(isset($item['id'])) id="{{ $item['id'] }}" @endif class="nav-header {{ $item['class'] ?? '' }} \
{{ in_array(Auth::user()->role, $item['role']) ? '': 'd-none' }}">

    {{ is_string($item) ? $item : $item['header'] }}

</li>