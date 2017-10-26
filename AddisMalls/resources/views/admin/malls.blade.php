@extends('admin.layouts.support_app')
@section('content')
    <div class="row">
        <style>
            .sup:hover{
                max-height: 500px !important;
            }
            th{
                text-transform: uppercase;
                font-size: 1.0em;
            }
            .sm{
                padding-left: 4px;
                padding-right: 4px;
            }
        </style>
        <div class="col l10 m10 s12 offset-l1 offset-m1">
            @if($mallsV->count() > 0)
                <div class="card" >
                    <div class="card-title blue lighten-1 white-text" style="padding: 2%; font-family: 'Fondamento',cursive; ">
                        List of malls needs to be verified before they join the system
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <table class="bordered stripped">
                            <thead>
                            <tr>
                                <th>no.</th>
                                <th class="center-align">name</th>
                                <th class="center-align">tin number</th>
                                <th class="center-align">name of the mall admin</th>
                                <th class="center-align">phone number</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                            @foreach($mallsV as $mv)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td class="center-align">{{$mv->name}}</td>
                                    <td class="center-align">{{$mv->tin_no}}</td>
                                    <td class="center-align">{{$mv->first_name}} {{$mv->last_name}}</td>
                                    <td>{{$mv->phone_number}}</td>
                                    <td><a href='{{url("/admin/mall_verify/{$mv->company_id}")}}' class="btn waves-effect waves-light blue white-text tooltipped "  data-position="bottom" data-delay="50" data-tooltip="verify request of this mall to join malladdis"><i class="fa fa-check"></i> &nbsp; </a></td>
                                    <td><a href='{{url("/admin/mall_reject/{$mv->company_id}")}}' class="btn waves-effect waves-light red white-text tooltipped"  data-position="bottom" data-delay="50" data-tooltip="reject request of this mall to join malladdis"><i class="fa fa-trash-o"></i> &nbsp; </a></td>
                                </tr>
                                <?php  $i++; ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            @if($malls->count() > 0)
                <div class="card" >
                    <div class="card-title blue lighten-1 white-text" style="padding: 2%; font-family: 'Fondamento',cursive; ">
                        List of malls in the system
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <table class="bordered stripped" style="padding-right: 0;">
                            <thead>
                            <tr>
                                <th>no.</th>
                                <th class="center-align">name</th>
                                <th class="center-align">tin number</th>
                                <th class="center-align">name of the mall admin</th>
                                <th class="center-align">phone number</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                            @foreach($malls as $mall)
                                <tr style="padding-right: 0;">
                                    <td>{{$i}}</td>
                                    <td class="center-align">{{$mall->name}}</td>
                                    <td class="center-align">{{$mall->tin_no}}</td>
                                    <td class="center-align">{{$mall->first_name}} {{$mall->last_name}}</td>
                                    <td>{{$mall->phone_number}}</td>
                                    <td style="text-align: right;">
                                        <a href='{{url("/admin/mall_edit/{$mall->id}")}}' class="btn sm waves-effect waves-light teal white-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="edit the details for the selected mall"><i class="fa fa-edit"></i></a>
                                        <a class="btn sm waves-effect waves-light orange white-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="deny a permission to use the system  for the selected mall"><i class="fa fa-ban"></i></a>
                                        <a href='{{url("/admin/mall_remove/{$mall->id}")}}' class="btn sm waves-effect waves-light red white-text tooltipped delete" data-position="bottom" data-delay="50" data-tooltip="remove this mall from the system totally. notice all retailers inside this mall and its activity will be erased.  "><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <?php  $i++; ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

        </div>
        <script>
            $(".delete").on("click", function(){
                return confirm("Do you really want to delete this Mall? \n notice all retailers inside this mall and its activity will be erased");
            });
        </script>
    </div>
@endsection