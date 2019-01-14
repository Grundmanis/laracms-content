@extends('laracms.dashboard::layouts.app', ['page' => 'Content Management'])

@include('laracms.dashboard::partials.summernote')

@section('content')
    <form method="post">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="slug">Slug<span>*</span></label>
            <input value="{{ formValue($content ?? null, 'slug') }}" name="slug" class="form-control" id="slug"
                   placeholder="Slug">
            <small id="slug" class="form-text text-muted">This slug will be used manually in templates</small>
        </div>

        <!-- Nav tabs -->
        <div class="form-group">
            <ul class="nav nav-tabs" role="tablist">
                @foreach($locales as $key => $locale)
                    <li role="presentation" @if(!$key) class="active" @endif>
                        <a href="#{{ $locale }}" data-toggle="tab">
                            {{ $locale }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- Tab panes -->
        <div class="tab-content">
            <label title="value">Value</label>
            @foreach($locales as $key => $locale)
                <div class="tab-pane @if(!$key) active @endif" id="{{ $locale }}">
                    <div class="form-group">
                        <textarea class="summernote" name="{{ $locale }}[value]">
                            {{ formValue($content ?? null, 'value', $locale) }}
                        </textarea>
                    </div>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
