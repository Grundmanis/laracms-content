@extends(view()->exists('laracms.dashboard.layouts.app') ? 'laracms.dashboard.layouts.app' : 'laracms.dashboard::layouts.app', ['page' => __('laracms::admin.menu.content')] )

@section('content')
    <div class="form-group">
        <a class="btn btn-success" href="{{ route('laracms.content.create') }}">{{ __('laracms::admin.create') }}</a>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('laracms::admin.laracms_users') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('laracms::admin.key') }}</th>
                                        <th>{{ __('laracms::admin.text') }}</th>
                                        <th class="text-right">{{ __('laracms::admin.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($contents as $content)
                                    <tr>
                                        <td>{{ $content->id }}</td>
                                        <td>{{ $content->slug }}</td>
                                        <td>{{ $content->value }}</td>
                                        <td class="text-right">

                                            <a title="{{ __('laracms::admin.edit') }}"
                                               href="{{ route('laracms.content.edit', $content->id) }}" type="button"
                                               rel="tooltip" class="btn btn-success btn-icon btn-sm ">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a title="{{ __('laracms::admin.delete') }}"
                                               onclick="return confirm('{{ __('laracms::admin.sure_to_delete') }}')"
                                               href="{{ route('laracms.content.destroy', $content->id) }}" type="button"
                                               rel="tooltip" class="btn btn-danger btn-icon btn-sm ">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $contents->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
