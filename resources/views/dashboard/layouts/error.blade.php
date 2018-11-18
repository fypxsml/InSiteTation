@if (count($errors))

<div class="form-group">
  <div class="alert" style="background-color: #f2dede; width: 60%;">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
</div>

@endif
