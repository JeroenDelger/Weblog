<p id="footer">
    <a href="/overview" id="FooterOverview">Terug naar overview</a>

    @auth
    @if (Auth()->user()->roles === "ROLE_WRITER")
    <a href="/interface" id="FooterBlog">Writer interface</a>

    @elseif (Auth()->user()->roles === "ROLE_MEMBER")
    <a href="/register" id="FooterPremium">Go premium!</a>
    @endif

    <a id='FooterLogout' class="dropdown-item" onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
@endauth

@if(!Auth()->user())
<a href="/register" id="FooterPremium">Register</a>
<a href="/login" id="FooterLogin">Login</a>
@endif
</p>