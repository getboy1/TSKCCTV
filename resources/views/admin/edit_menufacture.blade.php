@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">Home</a>
    <i class="icon-angle-right"></i>
  </li>
  <li>
    <i class="icon-edit"></i>
    <a href="#">Update Menufacture</a>
  </li>
</ul>

<div class="row-fluid sortable">
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Menufacture</h2>
    </div>

    <div class="box-content">
      <form class="form-horizontal" action="{{url('update-menufacture',$menufacture_info->menufacture_id)}}" method="post">
        {{ csrf_field() }}
        <fieldset>
        <div class="control-group">
          <label class="control-label" for="date01">Menufacture Name</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="menufacture_name" value="{{$menufacture_info->menufacture_name}}" >
          </div>
        </div>


        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2">menufacture description </label>
          <div class="controls">
          <textarea class="cleditor" name="menufacture_description" rows="3">
              {{$menufacture_info->menufacture_description}}
          </textarea>
          </div>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">save</button>
          <button type="reset" class="btn">Cancel</button>
        </div>
        </fieldset>
      </form>

    </div>
  </div><!--/span-->

</div><!--/row-->
@endsection
