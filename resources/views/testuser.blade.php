<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<h1>User Test</h1>

<h2>Get User</h2>
<form action="/get" Method="POST">
    @csrf
    <input type="text" name="id" placeholder="id">
    <input type="submit" value="submit">
</form>

<h2>Add User</h2>
<form action="/add" Method="POST">
    @csrf
    <div>
        <input type="text" name="email" placeholder="sample@email.com"><br>
        <input type="text" name="password" placeholder="Password"><br>
        <input type="text" name="first_name" placeholder="First Name"><br>
        <input type="text" name="last_name" placeholder="Last Name"><br>
        <input type="text" name="phone" placeholder="Phone Number"><br>
        <select id="emplyOption" name="is_emply">
            <option value="0">Customer</option>
            <option value="1">Employee</option>
        </select>
        <div id="isEmply" style="display:none">
            <input type="text" name="department" placeholder="Department"><br>
            <select id="permissionOption" name="permission">
                <option value="0">Employee</option>
                <option value="1">Admin</option>
            </select>
        </div>
        <input type="submit" value="submit">
    </div>
</form>

<h2>Update User</h2>
<form action="/update" Method="POST">
    @csrf
    <div>
        <input type="text" name="id" placeholder="id"><br>
        <input type="text" name="email" placeholder="sample@email.com"><br>
        <input type="text" name="password" placeholder="Password"><br>
        <input type="text" name="first_name" placeholder="First Name"><br>
        <input type="text" name="last_name" placeholder="Last Name"><br>
        <input type="text" name="phone" placeholder="Phone Number"><br>
        <select id="emplyOption2" name="is_emply">
            <option value="0">Customer</option>
            <option value="1">Employee</option>
        </select>
        <div id="isEmply2" style="display:none">
            <input type="text" name="department" placeholder="Department"><br>
            <select id="permissionOption" name="permission">
                <option value="0">Employee</option>
                <option value="1">Admin</option>
            </select>
        </div>
        <input type="submit" value="submit">
    </div>
</form>

<h2>Delete User</h2>
<form action="/delete" Method="POST">
    @csrf
    <input type="text" name="id" placeholder="id">
    <input type="submit" value="submit">
</form>

<script>
    $(function () {
        $('#isEmply').hide();
        $('#emplyOption').change(function () {
            if ($('#emplyOption').val() == '1') {
                $('#isEmply').show();
            } else {
                $('#isEmply').hide();
            }
        });
    });
    $(function () {
        $('#isEmply2').hide();
        $('#emplyOption2').change(function () {
            if ($('#emplyOption2').val() == '1') {
                $('#isEmply2').show();
            } else {
                $('#isEmply2').hide();
            }
        });
    });
</script>
