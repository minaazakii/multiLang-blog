@extends('dashboard.layouts.layout')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('dashboard.settings.update',$setting) }}" method="POST" enctype="multipart/form-data">
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
                        <input type="file" name="favicon" class="form-control">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="vat">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="street">Facebook</label>
                        <input type="text" name="facebook" class="form-control" value="{{ $setting->facebook }}"  placeholder="Facebook">
                    </div>

                        <div class="form-group col-sm-6">
                            <label for="city">Instagram</label>
                            <input type="text" name="instagram" class="form-control" value="{{ $setting->instagram }}"  placeholder="Instagram">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="postal-code">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $setting->email }}" id="postal-code" placeholder="Email">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="postal-code">Phone</label>
                            <input type="text" name="phone" value="{{ $setting->phone }}" class="form-control" placeholder="Phone">
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
                                <label>{{ $lang }}</label>
                                <input type="text" name="{{$key}}[title]" class="form-control"
                                      value="{{ $setting->translate($key)->title }}">
                            </div>

                            <div class="form-group col-md-12">
                                <label>{{ __('words.content') }}</label>
                                <textarea name="{{$key}}[content]" class="form-control" cols="30" rows="10">
                                    {{ $setting->translate($key)->content }}
                                </textarea>
                            </div>


                            <div class="form-group col-md-12">
                                <label>{{ __('words.address') }}</label>
                                <input type="text"name="{{$key}}[address]" class="form-control" value="{{ $setting->translate($key)->address }}">
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
