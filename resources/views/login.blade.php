<form method="post" action="UserLoginSubmit">
	{{csrf_field()}}
	name:<input type="text" name="username"/>
	email:<input type="email" name="email"/>

	   @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

	<input type="submit" value="submit">
	
	
</form>