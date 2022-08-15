@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">


        <div class="card">
            <div class="card-header">
                {{ __('Edit Task') }}
            </div>
            <form class="" method="POST" action="{{ route('admin.checklists.tasks.update', [$checklist, $task]) }}">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Name') }}" value="{{ old('name', $task->name) }}">
                        <label for="name">{{ __('Name') }}</label>
                    </div>

                    <div class="form-floating mt-4">
                        <textarea class="form-control" id="description" name="description" placeholder="{{ __('Description') }}" rows="20">{{ old('description', $task->description) }}</textarea>
                        <label for="description">{{ __('Description') }}</label>
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