@include('clientUser.header')

<main id="main">
    <section id="login-box">
        <div align="center">
            <form method="post">
                @csrf
                <fieldset>
                    <legend>
                        <h2>REGISTRATION</h2>
                    </legend>
                    <table>

                        @if(Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        <tr>
                            <td>Username:</td>
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
                            <td>Password:</td>
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
                            <td>Name:</td>
                            <td>
                                <input class="form-control" type="text" name="full_name" value="{{ old('full_name') }}" />
                            </td>
                            <td>
                                @error('full_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Contact No:</td>
                            <td>
                                <input class="form-control" type="text" name="contact_no" value="{{ old('contact_no') }}" />
                            </td>
                            <td>
                                @error('contact_no')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>
                                <input class="form-control" type="text" name="email" value="{{ old('email') }}" />
                            </td>
                            <td>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td>
                                <input class="form-control" type="text" name="address" value="{{ old('address') }}" />
                            </td>
                            <td>
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Country:</td>
                            <td>
                                <input class="form-control" type="text" name="country" value="{{ old('country') }}" />
                            </td>
                            <td>
                                @error('country')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Gender:</td>
                            <td>
                                <input class="form-control" type="text" name="gender" value="{{ old('gender') }}" />
                            </td>
                            <td>
                                @error('gender')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Date of Birth:</td>
                            <td>
                                <input class="form-control" type="date" name="dob" value="{{ old('dob') }}" />
                            </td>
                            <td>
                                @error('dob')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <!-- <tr>
                <td>Role:</td>
                <td>
                  <select class="form-control" required name="type">
                    <option value="user">User</option>
                    <option value="scout">Scout</option>
                  </select>
                </td>
              </tr> -->
                        <tr>
                            <td></td>
                            <td>
                                <input class="btn btn-primary" type="submit" name="submit" value="Submit" />
                                <a class="btn btn-primary" href="{{route('login.index')}}">Login</a>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </form>
        </div>
    </section>
</main>

@include('clientUser.footer')