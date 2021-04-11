@extends('layouts.app')

@section('content')
    <section class="content-header">
        <img class="img-responsive center-block" src="http://via.placeholder.com/235x228" style="max-width: 500px;">

    </section>
    <div class="content">
        {{--@include('flash::message')--}}
        <h3 class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pulvinar elementum mauris. Duis ac dui nisi. In suscipit, velit tincidunt interdum lacinia, leo lacus consequat odio, laoreet placerat nisi nibh eget quam. Quisque id lectus ac dui ultricies pulvinar. Pellentesque porttitor mattis mi sit amet rutrum. Suspendisse lorem urna, gravida vitae lorem ac, porttitor vulputate nisl. Ut enim orci, dictum vitae eleifend sed, euismod a arcu. Sed aliquet neque nec odio accumsan malesuada. Nulla eleifend augue in arcu vestibulum eleifend. </h3>

        <br>
        <div class="row">
            <div class="col-sm-offset-5 col-sm-2 text-center">
                <a href="{{url('/general/pcu/test')}}" class="btn btn-success" style="font-size: 20px;">Do now</a>
            </div>
        </div>
    </div>
@endsection

