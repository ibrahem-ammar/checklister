@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header"><strong>{{ $checklist->name }}</strong></div>
            <div class="card-body">
                <div class="accordion" id="tasks">

                    @foreach ( $checklist->tasks as $task )

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="{{ 'task-' . $task->id }}">
                            <button class="accordion-button collapsed" type="button" data-coreui-toggle="collapse" data-coreui-target="#{{ 'content-' . $task->id }}" aria-expanded="false" aria-controls="{{ 'content-' . $task->id }}">{{ $task->name }}</button>
                        </h2>
                        <div class="accordion-collapse collapse" id="{{ 'content-' . $task->id }}" aria-labelledby="{{ 'task-' . $task->id }}" data-coreui-parent="#tasks">
                            <div class="accordion-body">
                                {{ $task->description }}
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection