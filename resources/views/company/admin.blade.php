<h1>Admin Panel</h1>

<h2>Customer Account</h2>
<table border="1">
    <tr>
        <th>No.</th>
        <th>Email</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Options</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{$user['id']}}</td>
        <td>{{$user['email']}}</td>
        <td>{{$user['first_name']}}</td>
        <td>{{$user['last_name']}}</td>
        <td><a href={{"deleteuser/".$user['id']}}>Edit</a>
            <a href={{"showupdate/".$user['id']}}>Remove</a>
        </td>
    </tr>
    @endforeach
</table>
<form action="/user/add/customer">
    <input type="submit" value="Add Customer Account" />
</form>

<h2>Employee Account</h2>
<table border="1">
    <tr>
        <th>No.</th>
        <th>Email</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Department</th>
        <th>Permission</th>
    </tr>
    @foreach($employees as $employee)
    <tr>
        <td>{{$employee['id']}}</td>
        <td>{{$employee['email']}}</td>
        <td>{{$employee['first_name']}}</td>
        <td>{{$employee['last_name']}}</td>
        <td>{{$employee -> employee -> department}}</td>
        <td>{{$employee -> employee -> permission}}</td>
        <td><a href={{"deleteuser/".$user['id']}}>Delete</a></td>
        <td><a href={{"showupdate/".$user['id']}}>Update</a></td>
    </tr>
    @endforeach
</table>
<form action="/user/add/employee">
    <input type="submit" value="Add Employee Account" />
</form>
