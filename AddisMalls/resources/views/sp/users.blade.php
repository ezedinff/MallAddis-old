@extends('sp.layouts.support_app')
@section('content')
            <div class="card">
                <div class="card-title blue lighten-1 white-text" style="padding: 2%;">
                    users registered to administrate this admin panel
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <table class="striped bordered">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>phone number</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td style="max-width: 130px;">
                                        <a href='{{url("/sp/editUser/{$user->id}")}}' data-position="bottom" data-delay="50" data-tooltip="edit the details of this user "   class="waves-effect waves-light btn tooltipped"><i class="material-icons">mode_edit</i></a>
                                        <a href='{{url("/sp/denyUser/{$user->id}")}}' data-position="bottom" data-delay="50" data-tooltip="deny the permission to manage this admin panel for this user " class="waves-effect waves-light btn orange lighten-1 tooltipped"><i class="fa fa-ban "></i></a>
                                        <a href='{{url("/sp/deleteUser/{$user->id}")}}' data-position="bottom" data-delay="50" data-tooltip="Remove this user "  class="waves-effect waves-light btn red lighten-1 tooltipped"><i class="fa fa-trash-o "></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    <script>
        $(document).ready(function () {

        });
    </script>
@endsection