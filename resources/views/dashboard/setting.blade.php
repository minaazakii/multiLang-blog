@extends('dashboard.layouts.layout')

@section('content')
    <form action="{{ route('dashboard.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container mt-3">
            <div class="card" style="margin-top: 25px;">
                <div class="card-header">
                    <strong>{{ __('words.settings') }}</strong>
                    <small> Data</small>
                </div>
                <div class="card-block">
                    <div class="form-group col-sm-6">
                        <label for="company">Favicon</label>
                        <input type="file" name="favicon" class="form-control" placeholder="Enter your company name">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="vat">Image</label>
                        <input type="file" name="image" class="form-control"  placeholder="PL1234567890">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="street">Facebook</label>
                        <input type="text" name="facebook" class="form-control"  placeholder="Enter street name">
                    </div>

                        <div class="form-group col-sm-6">
                            <label for="city">Instagram</label>
                            <input type="text" name="instagram" class="form-control"  placeholder="Enter your city">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="postal-code">Email</label>
                            <input type="text" name="email" class="form-control" id="postal-code" placeholder="Postal Code">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="postal-code">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Postal Code">
                        </div>

                    <!--/row-->


                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <strong>{{ __('words.translations') }}</strong>
            </div>
            <div class="card-block">
                <ul class="nav nav-tabs" id="myTab" role="tablist">

                    @foreach (config('app.languages') as $key => $lang)
                        <li class="nav-item">
                            <a class="nav-link @if ($loop->index == 0) active @endif"
                                id="home-tab" data-toggle="tab" href="#{{ $key }}" role="tab"
                                aria-controls="home" aria-selected="true">{{ $lang }}</a>
                        </li>
                    @endforeach

                </ul>
                <div class="tab-content" id="myTabContent">
                    @foreach (config('app.languages') as $key => $lang)
                        <div class="tab-pane mt-3 fade @if ($loop->index == 0) show active in @endif"
                            id="{{ $key }}" role="tabpanel" aria-labelledby="home-tab">
                            <br>
                            <div class="form-group mt-3 col-md-12">
                                <label>{{ __('words.title') }} - {{ $lang }}</label>
                                <input type="text" name="{{$key}}[title]" class="form-control"
                                    placeholder="{{ __('words.email') }}"   value="">
                            </div>

                            <div class="form-group col-md-12">
                                <label>{{ __('words.content') }}</label>
                                <textarea name="{{$key}}[content]" class="form-control" cols="30" rows="10"></textarea>
                            </div>


                            <div class="form-group col-md-12">
                                <label>{{ __('words.address') }}</label>
                                <input type="text"name="{{$key}}[address]" class="form-control"   value="">
                            </div>
                        </div>
                    @endforeach
                    <div class="btn btn-group">
                        <button class="btn btn-primary" type="submit" style="margin-left: 20px">Submit</button>
                        <button class="btn btn-danger" >Cancel</button>
                    </div>

        </div>
    </form>
@endsection
