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

    <script> $(function () {
            $('textarea').froalaEditor({
                enter: $.FroalaEditor.ENTER_BR
            })
        }); </script>
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
                <a class="navbar-brand" href="#">Content</a>
            </div>
            @include('laracms.dashboard::partials.topnav')
        </div>
    </nav>

    <div class="content">
        <div class="container-fluid">
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