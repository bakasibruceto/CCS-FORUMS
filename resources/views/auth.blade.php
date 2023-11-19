@auth
    @if (auth()->user()->role === 'user')
        <script>window.location.href = "{{ route('user.index') }}";</script>
    @elseif (auth()->user()->role === 'admin')
        <script>window.location.href = "{{ route('admin.index') }}";</script>
    @endif
@else
    <script>window.location.href = "{{ route('login') }}";</script>
@endauth


