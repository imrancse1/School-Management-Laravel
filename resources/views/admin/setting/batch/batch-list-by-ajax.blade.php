<thead>
	<tr>
		<th>SL.</th>
		<th>Batch Name</th>
		<th>Student Capacity</th>
		<th>Action</th>
	</tr>
</thead>
<tbody>
	@php($i=1)
	@foreach($batches as $batch)
	<tr>
		<td>{{$i++}}</td>
		<td>{{$batch->batch_name}}</td>
		<td>{{$batch->student_capacity}}</td>
         <td>
                  @if($batch-> status == 1)
                     <button onclick='unpublished("{{ $batch->id}}","{{$batch->class_id}}")' title="unpublished" class="btn btn-sm btn-success fa fa-arrow-alt-circle-up" id="unpublished"></button>
                   @else
                      <button  onclick='published("{{$batch->id}}","{{$batch->class_id}}")' title="published" class="btn btn-sm btn-warning fa fa-arrow-alt-circle-down" id="published"></button>
                   @endif
                      <a href="{{route('batch-edit',['id'=>$batch->id])}}" class="btn btn-sm btn-info" title="Edit" target="_blank"><span class="fa fa-edit"></span></a>

                      <button onclick='batchDelete("{{$batch->id}}","{{$batch->class_id}}")' onclick="return confirm('If you want to delete this item Press OK')" class="btn btn-sm btn-danger fa fa-trash-alt"></button>
          </td>	
	</tr>
	@endforeach
</tbody>

<script>
	function unpublished(batchId,classId) {
		var check = confirm('If you want to unpublished this item, Press ok');
		if(check){
			$.get("{{route('batch-unpublished')}}", {batch_id:batchId, class_id:classId }, function(data){
				console.log(data);
                    $("#batchList").html(data);
			})
		}
	}

	function published(batchId,classId) {
		var check = confirm('If you want to published this item, Press ok');
		if(check){
			$.get("{{route('batch-published')}}", {batch_id:batchId, class_id:classId }, function(data){
				console.log(data);
                    $("#batchList").html(data);
			})
		}
	}
	function batchDelete(batchId,classId) {
		var check = confirm('If you want to delete this item, Press ok');
		if(check){
			$.get("{{route('batch-delete')}}", {batch_id:batchId, class_id:classId }, function(data){
				console.log(data);
                    $("#batchList").html(data);
			})
		}
	}

</script>