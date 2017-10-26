@extends('cafe.layouts.support_app')
@section('content')
            <div class="card">
                @if(\Illuminate\Support\Facades\Session::get('logo'))
                    <div class="card-title green lighten-1 white-text" style="padding: 2%;">
                        {{\Illuminate\Support\Facades\Session::get('logo')}}
                    </div>
                @else
                    <div class="card-title blue lighten-1 white-text" style="padding: 2%;">
                        Add your company's opening hours
                    </div>
                @endif
            </div>
            <div class="card" style="height: 400px;">
                <div class="card-content">
                    <form method="post" action="{{url('/cafe/addOpeningHour')}}" >
                        {{csrf_field()}}
                        <select id="brand" name="open" required>
                            <option value="" disabled selected>select opening hour</option>
                            <?php $count = 1; $am = " am"; $pm = " pm" ;?>
                            @for($i = 1; $i <= 12 ; $i++)
                                <option value='{{$i . $am}}'>{{$i . $am}}</option>
                            @endfor
                            @for($i = 1; $i <= 12 ; $i++)
                                <option value='{{$i . $pm}}'>{{$i . $pm}}</option>
                            @endfor
                        </select>
                        <select id="brand" name="close" required>
                            <option value="" disabled selected>select closing hour</option>
                            <?php $count = 1; $am = " am"; $pm = " pm" ;?>
                            @for($i = 1; $i <= 12 ; $i++)
                                <option value='{{$i . $am}}'>{{$i . $am}}</option>
                            @endfor
                            @for($i = 1; $i <= 12 ; $i++)
                                <option value='{{$i . $pm}}'>{{$i . $pm}}</option>
                            @endfor
                        </select>
                        <div class="row">
                            <div class="input-field col s12 m12" style="padding: 0; margin: 0;">
                                <input value="Save" type="submit" class="btn waves-effect waves-light blue lighten-1 right" style="color: #fff; margin-right: 2%;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection