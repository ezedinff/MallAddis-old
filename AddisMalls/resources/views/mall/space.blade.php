@extends('mall.layouts.support_app')
@section('content')
    <div class="card">
        <div class="card-title blue lighten-1 white-text" style="padding: 2%;">
           List of lease spaces you have posted so far
        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <table>
                <thead>
                <tr>
                    <th>no</th>
                    <th>Floor no</th>
                    <th>area in m<sup>2</sup></th>
                    <th>purpose</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($spaces as $space)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$space->floor_no}}</td>
                        <td>{{$space->area}}</td>
                        <td>{{$space->purpose}}</td>
                        <td>{{$space->description}}</td>
                        <td>
                            <a href='{{url("/mall/space_edit/{$space->id}")}}' class="btn sm waves-effect waves-light teal white-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="edit the details this post"><i class="fa fa-edit"></i></a>
                            <a href='{{url("/mall/space_remove/{$space->id}")}}' class="btn sm waves-effect waves-light red white-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="remove this post"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection