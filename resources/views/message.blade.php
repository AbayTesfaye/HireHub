@if (Session::has('successMessage'))
<div class="alert alert-success">{{Session::get('successMessage')}}</div>
@endif
