@extends('dashboard.layouts.layout')

@section('content')

<div class="card">
    <div class="card-header">
        <strong>Category</strong>Form
    </div>
    <div class="card-block">
        <form action="{{ route('dashboard.categories.store') }}" method="post" class="form-horizontal ">
            @csrf
            <div class="form-group col-sm-12 ">
                <label class="form-control-label" for="hf-email">Image</label>
                <div >
                    <input type="file" id="hf-email" name="name" class="form-control" placeholder="Enter Name..">
                </div>
            </div>

            <div class="col-md-9">
                <select id="select" name="parent" class="form-control input-lg" size="1">
                    <option value="0">Main Category</option>
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @if($cat->id == $category->id) selected @endif>{{ $cat->title }}</option>
                    @endforeach
                </select>
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
                                      value="{{ $category->translate($key)->title }}">
                            </div>

                            <div class="form-group col-md-12">
                                <label>{{ __('words.content') }}</label>
                                <textarea name="{{$key}}[content]" class="form-control" cols="30" rows="10">
                                    {{ $category->translate($key)->content }}
                                </textarea>
                            </div>


                            <div class="form-group col-md-12">
                                <label>{{ __('words.address') }}</label>
                                <input type="text"name="{{$key}}[address]" class="form-control" value="">
                            </div>
                        </div>
                    @endforeach
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
                        <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                    </div>
        </div>
        </form>
</div>

@endsection
