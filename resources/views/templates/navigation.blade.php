<div class="navigation">
    <a class="logo" href="/">
        <img src="/images/logo.png" height="50">
    </a>

    <a class="user-icon" href="{{ route('users.account.page') }}">
        <img src="{{ Auth::user()->avatar }}" height="40">
    </a>
</div>