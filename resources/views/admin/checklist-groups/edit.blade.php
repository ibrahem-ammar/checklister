@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                {{ __('Edit Checklist Group') }}

                <form action="{{ route('admin.checklist-groups.destroy', $checklist_group) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-danger">
                        <svg class="icon icon-lg" style="color: whitesmoke;">
                            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-trash') }}"></use>
                        </svg>
                    </button>

                </form>
            </div>
            <form class="" method="POST" action="{{ route('admin.checklist-groups.update', $checklist_group) }}">
                @csrf
                @method('PUT')

                <div class="card-body">

                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Name') }}" value="{{ old('name', $checklist_group->name) }}">
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