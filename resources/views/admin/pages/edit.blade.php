@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">


        <div class="card">
            <div class="card-header">
                {{ __('Edit Page') }}
            </div>
            <form class="" method="POST" action="{{ route('admin.pages.update', [$page]) }}">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <div class="form-floating">
                        <input type="text" class="form-control" id="title" name="title" placeholder="{{ __('Title') }}" value="{{ old('title', $page->title) }}">
                        <label for="title">{{ __('Title') }}</label>
                    </div>

                    <div class="mt-4">
                        <label for="content">{{ __('Contetn') }}</label>
                        <textarea class="form-control" id="content" name="content" placeholder="{{ __('Content') }}" rows="20">{{ old('content', $page->content) }}</textarea>
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
<script src="{{ asset('ckeditor5-build-classic/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create(document.getElementById('content'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush