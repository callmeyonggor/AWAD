<h1>Add Employee Account</h1>

<form action="/user/add/employee" Method="POST">
    @csrf
    <div>
        <input type="text" name="email" placeholder="sample@email.com"><br>
        <input type="text" name="password" placeholder="Password"><br>
        <input type="text" name="first_name" placeholder="First Name"><br>
        <input type="text" name="last_name" placeholder="Last Name"><br>
        <input type="text" name="phone" placeholder="Phone Number"><br>
        <input type="text" name="department" placeholder="Department"><br>
        <select name="permission">
            <option value="0">User</option>
            <option value="1">Administrator</option>
        </select>
        <input type="submit" value="submit">
    </div>
</form>