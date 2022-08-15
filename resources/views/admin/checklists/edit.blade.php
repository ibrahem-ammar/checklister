@extends('layouts.app')

@push('styles')
@livewireStyles

@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                {{ __('Edit Checklist') }}

                <form action="{{ route('admin.checklist-groups.checklists.destroy', [$checklist_group, $checklist]) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-danger">
                        <svg class="icon icon-lg" style="color: whitesmoke;">
                            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-trash') }}"></use>
                        </svg>
                    </button>

                </form>
            </div>
            <form class="" method="POST" action="{{ route('admin.checklist-groups.checklists.update', [$checklist_group, $checklist]) }}">
                @csrf
                @method('PUT')

                <div class="card-body">

                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Name') }}" value="{{ old('name', $checklist->name) }}">
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

        <hr>

        <div class="card">
            <div class="card-header">
                {{ __('Tasks') }}
            </div>

            <div class="card-body">

                @livewire('tasks-table', ['checklist' => $checklist])
            </div>


        </div>

        <hr>


        <div class="card">
            <div class="card-header">
                {{ __('New Task') }}
            </div>
            <form class="" method="POST" action="{{ route('admin.checklists.tasks.store', $checklist) }}">
                @csrf

                <div class="card-body">

                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}">
                        <label for="name">{{ __('Name') }}</label>
                    </div>

                    <div class="form-floating mt-4">
                        <textarea class="form-control" id="description" name="description" placeholder="{{ __('Description') }}" rows="20">{{ old('description') }}</textarea>
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

@push('scripts')
@livewireScripts
<!-- <script src="{{ asset('assets/js/livewire-sortable.js') }}"></script> -->
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>

@endpush