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

		<li class="nav-item">
			<a class="nav-link" href="{{ route('admin.users.index') }}">
				<svg class="nav-icon">
					<use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
				</svg>
				{{ __('Users') }}
			</a>
		</li>

		<li class="nav-title">{{ __('Checklist Groups') }}</li>

		<!-- checklist_groups is collection -->
		@foreach ( $checklist_groups as $checklist_group)
		<li class="nav-group show">
			<a class="nav-link" href="{{ route('admin.checklist-groups.edit', $checklist_group ) }}">
				<svg class="nav-icon">
					<use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-folder-open') }}"></use>
				</svg>
				{{ $checklist_group->name }}
			</a>
			<ul class="nav-group-items">
				@foreach ( $checklist_group->checklists as $checklist )

				<li class="nav-item">
					<a class="nav-link" style="padding:0.5rem 0.5rem 0.5rem 90px" href="{{ route('admin.checklist-groups.checklists.edit', [$checklist_group, $checklist] ) }}">
						<svg class="nav-icon">
							<use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-list') }}"></use>
						</svg>
						{{ $checklist->name }}
					</a>
				</li>
				@endforeach
				<li class="nav-item">
					<a class="nav-link" style="padding:0.5rem 0.5rem 0.5rem 90px" href="{{ route('admin.checklist-groups.checklists.create', $checklist_group) }}">
						<svg class="icon nav-icon ">
							<use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-library-add') }}"></use>
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

		<li class="nav-title">{{ __('Pages') }}</li>

		@foreach ( \App\Models\Admin\Page::all() as $page)

		<li class="nav-item">
			<a class="nav-link" href="{{ route('admin.pages.edit', $page) }}">
				<svg class="nav-icon">
					<use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-file') }}"></use>
				</svg>
				{{ $page->title }}
			</a>
		</li>
		@endforeach

		@else

		<!-- checklist_groups is array -->
		@foreach ( $checklist_groups as $checklist_group)
		<li class="nav-title">

			{{ __($checklist_group['name']) }}

			@if ($checklist_group['is_new'])
			<span class="badge badge-sm bg-primary ms-auto">{{ __('New') }}</span>
			@elseif($checklist_group['is_updated'])
			<span class="badge badge-sm bg-info ms-auto">{{ __('Updated') }}</span>
			@endif

		</li>

		@foreach ( $checklist_group['checklists'] as $checklist )

		<li class="nav-item">
			<a class="nav-link" href="{{ route('users.checklists.show', $checklist['id'] ) }}">
				<svg class="nav-icon">
					<use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-list') }}"></use>
				</svg>
				{{ $checklist['name'] }}
				@if ($checklist['is_new'])
				<span class="badge badge-sm bg-primary ms-auto">{{ __('New') }}</span>
				@elseif($checklist['is_updated'])
				<span class="badge badge-sm bg-info ms-auto">{{ __('Updated') }}</span>
				@endif
			</a>
		</li>
		@endforeach



		@endforeach


		@endif


	</ul>
	<button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>