
<select class="form-control" id="category_id" name="category_id">
  @foreach($categories as $category)
  @if($category->id == $id)
  <option value="{{$category->id}}" selected>{{$category->name}}</option>
  @else
  <option value="{{$category->id}}">{{$category->name}}</option>
  @endif 
  @endforeach
</select>