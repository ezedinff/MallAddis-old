@extends('mall.layouts.support_app')
@section('content')
            <div class="card">
                <div class="card-title blue lighten-1 white-text" style="padding: 2%;">
                    details of {{$sp[0]->name}}
                </div>
            </div>
            <div class="card">
                <div class="card-content p">
                   <div class="right-align" >
                       <a href='{{url("/mall/updateTenantDetail/{$sp[0]->id}")}}' class="btn-flat sm waves-effect waves-light  tooltipped no-padding" data-position="bottom" data-delay="50" data-tooltip="edit the details of this retailer"><i class="fa fa-edit fa-2x blue-text"></i></a>
                       &nbsp; &nbsp;
                       <a onclick="PrintElem('.p')" class="btn-flat sm waves-effect waves-light  tooltipped no-padding" data-position="bottom" data-delay="50" data-tooltip="print" class="tooltipped"><i class="fa fa-print blue-text fa-2x"></i></a>
                   </div>
                    <hr>
                    <p> <label style="font-size: 1.2em;">Tenant's name: </label> <span style="font-size: 1.2em;">{{$sp[0]->name}}</span> </p>
                    <p> <label style="font-size: 1.2em;">Tenant's TIN: </label> <span style="font-size: 1.2em;">{{$sp[0]->tin_no}}</span> </p>
                    <p> <label style="font-size: 1.2em;">Tenant's category: </label> <span style="font-size: 1.2em;">{{$category->name}}</span> </p>
                    <p> <label style="font-size: 1.2em;">since: </label> <span style="font-size: 1.2em;">{{$tenantDetail->staring_date}}</span> </p>
                    <p> <label style="font-size: 1.2em;">Ending date: </label> <span style="font-size: 1.2em;">{{$tenantDetail->ending_date}}</span> </p>
                    <p> <label style="font-size: 1.2em;">phone number: </label> <span style="font-size: 1.2em;">{{$phone[0]->phone_no}}</span> </p>
                </div>
            </div>
            <script type="text/javascript">

                function PrintElem(elem)
                {
                    Popup($(elem).html());
                }

                function Popup(data)
                {
                    var mywindow = window.open('', 'new div', 'height=400,width=600');
                    mywindow.document.write('<html><head><title>Retailers detail</title>');
                    /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
                    mywindow.document.write('</head><body >');
                    mywindow.document.write(data);
                    mywindow.document.write('</body></html>');

                    mywindow.print();
                    mywindow.close();

                    return true;
                }

            </script>
@endsection