<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
	<div class="sidebar-brand d-none d-md-flex">
		<svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
			<use xlink:href="{{ asset('coreui/assets/brand/coreui.svg#full') }}"></use>
		</svg>
		<svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
			<use xlink:href="{{ asset('coreui/assets/brand/coreui.svg#signet') }}"></use>
		</svg>
	</div>
	<ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
		<li class="nav-item">
			<a class="nav-link" href="{{ route('dashboard') }}">
				<svg class="nav-icon">
					<use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
				</svg>
				{{ __('Dashboard') }}
			</a>
		</li>

		@if (auth()->user()->is_admin)


		<li class="nav-title">{{ __('Admin') }}</li>

		<li class="nav-item">
			<a class="nav-link" href="{{ route('admin.pages.index') }}">
				<svg class="nav-icon">
					<use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-file') }}"></use>
				</svg>
				{{ __('Pages') }}
			</a>
		</li>

		<li class="nav-title">{{ __('Checklist Groups') }}</li>

		@foreach ( \App\Models\Admin\ChecklistGroup::with('checklists')->get() as $checklist_group)
		<li class="nav-group show">
			<a class="nav-link" href="{{ route('admin.checklist-groups.edit', $checklist_group ) }}">
				<svg class="nav-icon">
					<use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-task') }}"></use>
				</svg>
				{{ $checklist_group->name }}
			</a>
			<ul class="nav-group-items">
				@foreach ( $checklist_group->checklists as $checklist )

				<li class="nav-item">
					<a class="nav-link" href="{{ route('admin.checklist-groups.checklists.edit', [$checklist_group, $checklist] ) }}">
						<span class="nav-icon"></span>
						{{ $checklist->name }}
					</a>
				</li>
				@endforeach
				<li class="nav-item">
					<a class="nav-link" href="{{ route('admin.checklist-groups.checklists.create', $checklist_group) }}">
						<svg class="icon nav-icon ">
							<use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-plus') }}"></use>
						</svg>
						{{ __('Create Checklist') }}
					</a>
				</li>
			</ul>
		</li>

		@endforeach

		<li class="nav-item">
			<a class="nav-link" href="{{ route('admin.checklist-groups.create') }}">
				<svg class="nav-icon">
					<use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-plus') }}"></use>
				</svg>
				{{ __('Create Checklist Group') }}
			</a>
		</li>
		@endif


	</ul>
	<button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>