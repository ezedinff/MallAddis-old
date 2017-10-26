@extends('mall.layouts.support_app')
@section('content')

            <div class="card">
                <div class="card-title blue lighten-1 white-text" style="padding: 2%;">
                    List of Tenants registered inside your mall
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <table>
                        <thead>
                        <tr>
                            <th>no</th>
                            <th>name</th>
                            <th>tin no</th>
                            <th>category</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach($retailers as $retailer)
                            @if($retailer->name != "unknown")
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$retailer->name}}</td>
                                    <td>{{$retailer->tin_no}}</td>
                                    <?php $category = \App\Category::find($retailer->category_id); ?>
                                    <?php $detail= \App\TenantDetail::where('company_id',$retailer->company_id)->get();?>
                                    @if($category->count() > 0)
                                        <td>{{$category->name}}</td>
                                    @endif
                                    <td>
                                        @if($detail->count() > 0)
                                            <a style="padding-right: 4px; padding-left: 4px;" class="btn teal lighten-1 white-text tooltipped" href='{{url("/mall/tenantDetailShow/{$detail[0]->id}")}}' data-position="bottom" data-delay="50" data-tooltip="view detail of  this retailer"><i class="fa fa-eye white-text"></i></a>
                                            <a style="padding-right: 4px; padding-left: 4px;" href='{{url("/mall/sp_remove/{$retailer->id}")}}' class="btn sm waves-effect waves-light red white-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="remove this retailer from the system entirely."><i class="fa fa-trash-o"></i></a>
                                        @else
                                            <a style="padding-right: 4px; padding-left: 4px;" class="btn blue lighten-1 white-text tooltipped" href='{{url("/mall/tenantDetail/{$retailer->id}")}}' data-position="bottom" data-delay="50" data-tooltip="add detail of  this retailer"><i class="fa fa-plus white-text"></i></a>
                                            <a style="padding-right: 4px; padding-left: 4px;" href='{{url("/mall/sp_remove/{$retailer->id}")}}' class="btn sm waves-effect waves-light red white-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="remove this retailer from the system entirely."><i class="fa fa-trash-o"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                            <?php $i++; ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@endsection