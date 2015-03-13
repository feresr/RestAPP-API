
<select class="form-control" id="category_id" name="category_id">
  @foreach($categories as $category)
  <option value="{{$category->id}}">{{$category->name}}</option> 
  @endforeach
</select>