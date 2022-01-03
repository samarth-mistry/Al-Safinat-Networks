<span style="overflow: visible; position: relative; width: 110px;">
	<!-- <a href="{{ route('admin-trackings.edit', $tracking->id)}}" title="Edit" class="btn btn-sm btn-clean btn-icon btn-icon-md">
		<i class="fa fa-paint-brush text-green"></i>
	</a> -->
	<a href="" title="Details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
		<i class="fa fa-info-circle text-blue"></i>
	</a>
	@if($tracking->status != 'deported')
		@if($table_type == '0')
		<a id="status_ported" href="{{ route('status-ported', ['id' => $tracking->id, 'is_global' => '0'])}}" title="Mark as Ported" class="btn btn-sm btn-success btn-icon btn-icon-md">
			<i class="fas fa-check-square"></i>&nbsp;&nbsp;Ported
		</a>
		@else
		<a href="{{ route('status-deported', ['id' => $tracking->id, 'is_global' => '0'])}}" title="Mark as Deported" class="btn btn-sm btn-danger btn-icon btn-icon-md">
			<i class="fas fa-check-square"></i>&nbsp;&nbsp;Deported
		</a>
		@endif
	@endif
</span>