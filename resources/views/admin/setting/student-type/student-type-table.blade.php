@if(count($studentTypes)>0)

                    	@php($i=1)
                    	@foreach($studentTypes as $studentType)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$studentType -> class_name}}</td>
                        <td>{{$studentType -> student_type}}</td>
                        <td>{{$studentType -> status == 1 ? 'Active' : 'Inactive' }}</td>
                        
                        <td>
                            @if($studentType-> status == 1)
                            <a href="{{route('schoolList-unpublished',['id'=>$studentType->id])}}" title="Deactivte" class="btn btn-sm btn-success"><span class="fa fa-arrow-alt-circle-up"></span></a>
                            @else
                            <a href="{{route('schoolList-published',['id'=>$studentType->id])}}" title="Active" class="btn btn-sm btn-warning"><span class="fa fa-arrow-alt-circle-down"></span></a>
                            @endif
                            <a href="{{route('schoolList-edit',['id'=>$studentType->id])}}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>

                             <a href="{{route('schoolList-delete',['id'=>$studentType->id])}}" onclick="return confirm('If you want to delete this item Press OK')" class="btn btn-sm btn-danger"><span class="fa fa-trash-alt"></span></a>
                        </td>
                    </tr>
                    @endforeach
@else
     <tr class="text-danger">
     <td colspan="5">Student Type not found !!!</td>
     </tr>
 @endif