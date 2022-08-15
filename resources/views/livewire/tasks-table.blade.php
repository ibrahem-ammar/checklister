<table class="table table-responsive-sm table-hover" wire:sortable="updateTaskOrder">
    <thead>
        <tr>
            <th>{{ __('Name') }}</th>
            <th class="d-flex justify-content-end align-content-end">{{ __('Edit / Delete') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $tasks as $task )
        <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
            <td wire:sortable.handle>{{ $task->name }}</td>
            <td class="d-flex justify-content-end align-content-end">
                <a class="btn btn-sm btn-primary mx-2" href="{{ route('admin.checklists.tasks.edit', [$checklist, $task]) }}">
                    <svg class="icon icon-lg" style="color: whitesmoke;">
                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-pencil') }}"></use>
                    </svg>
                </a>
                <form class="" action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task]) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-danger">
                        <svg class="icon icon-lg" style="color: whitesmoke;">
                            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-trash') }}"></use>
                        </svg>
                    </button>

                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>