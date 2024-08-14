
<x-layout>
<body>
	<h1>this is hello blade</h1>
	<a href="home">home page</a>
	<table border="1">
		<thead>
			 <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Address</th>
                <th>Contact</th>
            </tr>
		</thead>
		<tbody>
		<tr>
	@foreach($all as $emp)
	<td>{{$emp->id}}</td>
	<td>{{$emp->first_name}}</td>
	<td>{{$emp->last_name}}</td>
	<td>{{$emp->username}}</td>
	<td>{{$emp->address}}</td>
	<td>{{$emp->contact}}</td>
	@endforeach
	</tr>
</tbody>
	</table>
</body>
</x-layout>