@extends('laracms.dashboard::layouts.app')

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
                <a class="navbar-brand" href="#">Dynamic Content</a>
            </div>
            @include('laracms.dashboard::partials.topnav')
        </div>
    </nav>

    <div class="content">
        <div class="container-fluid">
            <div class="form-group">
                <a class="btn btn-success" href="{{ route('laracms.content.dynamic.create') }}">Create</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Slug</th>
                        <th>Text</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contentDynamics as $content)
                        <tr>
                            <td>{{ $content->id }}</td>
                            <td>{{ $content->slug }}</td>
                            <td>{{ $content->value }}</td>
                            <td>
                                <a href="{{ route('laracms.content.dynamic.edit', $content->id) }}">Edit</a>
                                |
                                <a onclick="return confirm('Are you sure?')"
                                   href="{{ route('laracms.content.dynamic.destroy', $content->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $contentDynamics->links() }}
            </div>
        </div>
    </div>
@endsection
