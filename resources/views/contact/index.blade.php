<h1>Here is List of Names</h1>
@foreach ($contacts as $contact )
  <li>{{$contact->name}}</li>
  <li>{{$contact->username}}</li>
@endforeach
