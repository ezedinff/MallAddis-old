@extends('mall.layouts.support_app')
@section('content')

    <div class="card">
        <div class="card-title blue lighten-1 white-text" style="padding: 2%;">
            List of previous posted amenities by your mall
        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <table>
                <thead>
                <tr>
                    <th>no</th>
                    <th>name</th>
                    <th>description</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($amenities as $amenity)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$amenity->name}}</td>
                        <td>{{$amenity->description}}</td>
                        <td style="width: 20%;">
                            <a class="btn teal lighten-1 white-text tooltipped" href='{{url("/mall/amenity_edit/{$amenity->id}")}}' data-position="bottom" data-delay="50" data-tooltip="edit this amenity" style="padding-left: 4px; padding-right: 4px;"><i class="fa fa-edit white-text"></i></a>
                            <a href='{{url("/mall/amenity_remove/{$amenity->id}")}}' class="btn sm waves-effect waves-light red white-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="remove this amenity" style="padding-left: 4px; padding-right: 4px;"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection