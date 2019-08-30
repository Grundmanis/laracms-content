@extends(view()->exists('laracms.dashboard.layouts.app') ? 'laracms.dashboard.layouts.app' : 'laracms.dashboard::layouts.app', ['page' => __('laracms::admin.menu.content')] )

@section('content')
    <form method="post">
        {{ csrf_field() }}

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('laracms::admin.menu.content') }}</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">{{ __('laracms::admin.key') }}</label>
                    <input value="{{ formValue($content ?? null, 'slug') }}" type="text"
                           class="form-control" name="slug">
                </div>
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul id="tabs" class="nav nav-tabs" role="tablist">
                            @foreach($locales as $key => $locale)
                                <li class="nav-item">
                                    <a class="nav-link @if(!$key) active @endif" data-toggle="tab" href="#{{ $locale }}"
                                       role="tab" aria-expanded="true">{{ $locale }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div id="my-tab-content" class="tab-content text-center">
                    @foreach($locales as $key => $locale)
                        <div class="tab-pane @if(!$key) active @endif" id="{{ $locale }}" role="tabpanel"
                             aria-expanded="true">
                            <div class="form-group">
                                <label for="">{{ __('laracms::admin.text') }}</label>
                                <textarea class="form-control" name="{{ $locale }}[value]">{{ formValue($content ?? null, 'value', $locale) }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('laracms::admin.save') }}</button>

    </form>
@endsection
