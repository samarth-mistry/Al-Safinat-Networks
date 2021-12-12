@push('style')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
@endpush
<span style="overflow: visible; position: relative; width: 110px;">
	<a href="{{ route('client-booking.edit', $booking->id)}}" title="Edit" class="btn btn-sm btn-clean btn-icon btn-icon-md">
		<i class="bi bi-pencil text-green"></i>
	</a>
    <form action="{{route('client-booking.destroy', $booking->id)}}" method="post" onsubmit="return confirm('Are you sure want to delete ?');" style="display: inline;">
		{{ csrf_field()}}
		<input type="hidden" name="_method" value="delete">
		<button type="submit" title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md">
            <i class="bi bi-trash text-red"></i>
        </button>
	</form>
    <a href="" title="List" class="btn btn-sm btn-clean btn-icon btn-icon-md">
		<i class="bi bi-list"></i>
	</a>
    <a href="" title="Details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
		<i class="bi bi-info-circle text-blue"></i>
	</a>
</span>