@if (session('success'))
<div class="alert-pers alert alert-success alert-dismissible" role="alert">
    <strong>Holy guacamole!</strong> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif