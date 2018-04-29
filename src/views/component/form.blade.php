@extends('laracms.dashboard::layouts.app')

@section('styles')

    <!-- Include external CSS. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/css/froala_editor.pkgd.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/css/froala_style.min.css" rel="stylesheet"
          type="text/css"/>

@endsection

@section('scripts')
    <!-- Include external JS libs. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

    <!-- Include Editor JS files. -->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/js/froala_editor.pkgd.min.js"></script>

    <script>
        $(function () {
            $('textarea').froalaEditor({
                enter: $.FroalaEditor.ENTER_BR
            })
        });
    </script>
@endsection

@section('content')

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="#">Component</a>
            </div>
            @include('laracms.dashboard::partials.topnav')
        </div>
    </nav>

    <div class="content">
        <div class="container-fluid">
            <form method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name<span>*</span></label>
                    <input value="{{ formValue($content ?? null, 'name') }}" name="name" class="form-control" id="name"
                           placeholder="Name">
                    <small id="name" class="form-text text-muted">Create a new component, or use existing below</small>
                </div>

                <div class="form-group">
                    <label for="name">Name from existing<span>*</span></label>
                    <select class="form-control" name="name" id="name">
                        <option value=""></option>
                        @foreach($components as $component)
                            <option value="{{ $component->name }}">{{ $component->name }}</option>
                        @endforeach
                    </select>
                    <small id="name" class="form-text text-muted">If existing is chosen, then name from input will be ignored</small>
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
                                <textarea name="{{ $locale }}[value]">
                                    {{ formValue($content ?? null, 'value', $locale) }}
                                </textarea>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
