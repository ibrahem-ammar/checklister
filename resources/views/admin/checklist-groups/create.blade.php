@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <form class="" method="POST" action="{{ route('admin.checklist-groups.store') }}">
            @csrf
            <div class="card">
                <div class="card-header">{{ __('New Checklist Group') }}</div>

                <div class="card-body">

                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}">
                        <label for="name">{{ __('Name') }}</label>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection