@extends('admin')



@section('content')

<div class="row">

<div class="col-md-12">

                        <div class="title table-responsive">
                        @if(Session::has('errors'))

<div class="alert alert-danger" role="alert">

  Something wrong! {{ Session::get('errors') }}

</div>

@endif

@if(Session::has('success'))

<div class="alert alert-success" role="alert">

  Success! {{ Session::get('success') }}

</div>

@endif

                            <h3 class="title-text">Profile:</h3>
                        <form action="{{route('update.profile')}}" method="post">
                        @csrf
                            <table class="table table-striped f-border-none">
                                <tbody>
                                    <tr>
                                        <td width="200">Name:</td>
                                        <td>
                                            <input type="text" value="{{$user->name}}" name="name" class="form-control">
                                                @error('name')
                                                    <div class="text-danger">* {{ $message }}</div>
                                                @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td>
                                            <input type="email" value="{{$user->email}}" name="email" class="form-control">
                                                @error('email')
                                                    <div class="text-danger">* {{ $message }}</div>
                                                @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                            </form>
                            <form action="{{route('update.password')}}" method="post">
                                @csrf
                            <table class="table table-striped f-border-none">
                                <tbody>
                                    <tr>
                                        <td colspan="2"><h5>Change Password</h5></td>
                                    </tr>
                                    <tr>
                                        <td>New Password:</td>
                                        <td>
                                            <input type="password" name="password" class="form-control">
                                                @error('password')
                                                    <div class="text-danger">* {{ $message }}</div>
                                                @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Confirm Password:</td>
                                        <td>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </form>
                            
                        </div>

                    </div>

</div>

@endsection