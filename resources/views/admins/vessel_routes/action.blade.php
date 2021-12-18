<span style="overflow: visible; position: relative; width: 110px;">

	<a href="{{ route('admin-vessels.edit', $vessel->id)}}" title="Edit" class="btn btn-sm btn-clean btn-icon btn-icon-md">
		<i class="fa fa-paint-brush text-green"></i>
	</a>

    <form action="{{route('admin-vessels.destroy', $vessel->id)}}" method="post" onsubmit="return confirm('Are you sure want to delete ?');" style="display: inline;">
		{{ csrf_field()}}
		<input type="hidden" name="_method" value="delete">
		<button type="submit" title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md"><i class="fa fa-trash text-red"></i></button>
	</form>

    <a href="" title="List" class="btn btn-sm btn-clean btn-icon btn-icon-md">
		<i class="fa fa-list"></i>
	</a>
    <a href="" title="Details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
		<i class="fa fa-info-circle text-blue"></i>
	</a>
</span>