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

                <!-- <form action="{{ route('admin.tasks.upload-image') }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-danger">
                        upp
                    </button>

                </form> -->

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

                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}">
                        <label for="name">{{ __('Name') }}</label>
                    </div>

                    <label class="form-label" for="description">{{ __('Description') }}</label>
                    <textarea class="form-control" id="description" name="description" placeholder="{{ __('Description') }}" rows="20">{{ old('description') }}</textarea>
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
<script src="{{ asset('assets/js/livewire-sortable.js') }}"></script>
<!-- <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script> -->
<script src="{{ asset('ckeditor5-build-classic/ckeditor.js') }}"></script>


<script>
    // let uploadpath = ;
    class MyUploadAdapter {

        constructor(loader) {
            // The file loader instance to use during the upload.
            this.loader = loader;
        }

        // Starts the upload process.
        upload() {
            // Update the loader's progress.
            server.onUploadProgress(data => {
                loader.uploadTotal = data.total;
                loader.uploaded = data.uploaded;
            });

            // Return a promise that will be resolved when the file is uploaded.
            return loader.file
                .then(file => server.upload(file));
        }

        // Aborts the upload process.
        abort() {
            // Reject the promise returned from the upload() method.
            server.abortUpload();
        }

        // Initializes the XMLHttpRequest object using the URL passed to the constructor.
        _initRequest() {
            const xhr = this.xhr = new XMLHttpRequest();

            // Note that your request may look different. It is up to you and your editor
            // integration to choose the right communication channel. This example uses
            // a POST request with JSON as a data structure but your configuration
            // could be different.
            xhr.open('POST', '{{ route("admin.tasks.upload-image") }}', true);
            xhr.responseType = 'json';
        }

        // Initializes XMLHttpRequest listeners.
        _initListeners(resolve, reject, file) {
            const xhr = this.xhr;
            const loader = this.loader;
            const genericErrorText = `Couldn't upload file: ${file.name}.`;

            xhr.addEventListener('error', () => reject(genericErrorText));
            xhr.addEventListener('abort', () => reject());
            xhr.addEventListener('load', () => {
                const response = xhr.response;

                // This example assumes the XHR server's "response" object will come with
                // an "error" which has its own "message" that can be passed to reject()
                // in the upload promise.
                //
                // Your integration may handle upload errors in a different way so make sure
                // it is done properly. The reject() function must be called when the upload fails.
                if (!response || response.error) {
                    return reject(response && response.error ? response.error.message : genericErrorText);
                }

                // If the upload is successful, resolve the upload promise with an object containing
                // at least the "default" URL, pointing to the image on the server.
                // This URL will be used to display the image in the content. Learn more in the
                // UploadAdapter#upload documentation.
                resolve({
                    default: response.url
                });
            });

            // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
            // properties which are used e.g. to display the upload progress bar in the editor
            // user interface.
            if (xhr.upload) {
                xhr.upload.addEventListener('progress', evt => {
                    if (evt.lengthComputable) {
                        loader.uploadTotal = evt.total;
                        loader.uploaded = evt.loaded;
                    }
                });
            }
        }

        // Prepares the data and sends the request.
        _sendRequest(file) {
            // Prepare the form data.
            const data = new FormData();

            data.append('upload', file);

            // Important note: This is the right place to implement security mechanisms
            // like authentication and CSRF protection. For instance, you can use
            // XMLHttpRequest.setRequestHeader() to set the request headers containing
            // the CSRF token generated earlier by your application.

            // Send the request.
            this.xhr.send(data);
        }
    }




    function MyCustomUploadAdapterPlugin(editor) {
        editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
            // Configure the URL to the upload script in your back-end here!
            return new MyUploadAdapter(loader);
        };
    }
    // ...

    ClassicEditor
        .create(document.getElementById('description'), {
            extraPlugins: [MyCustomUploadAdapterPlugin],

            // ...
        })
        .catch(error => {
            console.log(error);
        });


    // ClassicEditor
    //     .create(document.getElementById('description'))
    //     .catch(error => {
    //         console.error(error);
    //     });
</script>
@endpush