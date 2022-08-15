@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                {{ __('New Checklist') }}
            </div>
            <form class="" method="POST" action="{{ route('admin.checklist-groups.checklists.store', $checklist_group) }}">
                @csrf

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
            </form>
        </div>
    </div>
</div>
@endsection