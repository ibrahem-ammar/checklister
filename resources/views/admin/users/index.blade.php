@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                {{ __('Users') }}
            </div>

            <div class="card-body">
                <table class="table table-responsive-sm table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Website') }}</th>
                            <th>{{ __('Join Time') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $users as $user )
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->website ? $user->website : __('N /A') }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {!! $users->links() !!}
            </div>


        </div>


    </div>
</div>
@endsection