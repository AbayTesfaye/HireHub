<h1>Here is the list of names</h1>
@foreach ($contacts as $contact )
    <li>{{$contact->name}}  {{$contact->username}}</li>
@endforeach
