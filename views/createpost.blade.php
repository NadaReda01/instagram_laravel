<html>
    <body>
<form action="{{ url('/r')}}" method="post">
 
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">caption</label>
    <input type="text" name="caption" class="form-control" id="exampleInputPassword1">
  </div>


<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">uploadimage</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="image">
 
  </div>
  
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>