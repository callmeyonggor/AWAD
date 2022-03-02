<h1>Add Customer Account</h1>

<form action="/user/add/customer" Method="POST">
    @csrf
    <div>
        <input type="text" name="email" placeholder="sample@email.com"><br>
        <input type="text" name="password" placeholder="Password"><br>
        <input type="text" name="first_name" placeholder="First Name"><br>
        <input type="text" name="last_name" placeholder="Last Name"><br>
        <input type="text" name="phone" placeholder="Phone Number"><br>
        <input type="submit" value="submit">
    </div>
</form>
