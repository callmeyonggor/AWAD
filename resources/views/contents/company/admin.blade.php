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
    @foreach($customers as $customer)
    <tr>
        <td>{{$customer['id']}}</td>
        <td>{{$customer['email']}}</td>
        <td>{{$customer['first_name']}}</td>
        <td>{{$customer['last_name']}}</td>
        <td><a href={{"/customer/edit/customer/".$customer['id']}}>Edit</a></td>
        <td><a href={{"/customer/delete/".$customer['id']}}>Delete</a></td>
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
        <td><a href={{"/user/edit/employee/".$employee['id']}}>Edit</a></td>
        <td><a href={{"/user/delete/".$employee['id']}}>Delete</a></td>
    </tr>
    @endforeach
</table>
<form action="/user/add/employee">
    <input type="submit" value="Add Employee Account" />
</form>
