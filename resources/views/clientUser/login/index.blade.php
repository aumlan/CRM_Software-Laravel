@include('clientUser.header')

<main id="main">
    <section id="login-box">
        <div align="center">
            <form method="post">
                @csrf
                <fieldset>
                    <legend>
                        <h2>LOGIN</h2>
                    </legend>
                    <table>

                        @if(Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        <tr>
                            <td>Username</td>
                            <td>
                                <input class="form-control" type="text" name="username" value="{{ old('username') }}" />
                            </td>
                            <td>
                                @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <input class="form-control" type="password" name="password" value="{{ old('password') }}" />
                            </td>
                            <td>
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" class="btn btn-primary" name="submit" value="Login" />
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </form>
        </div>
    </section>
</main>

@include('clientUser.footer')