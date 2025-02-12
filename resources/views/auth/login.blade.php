<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <div class="login">LOGIN</div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach

    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <label for="eamail">email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" value="{{ old('password') }}">
        <button type="submit">Login</button>
    </form>
</div>
