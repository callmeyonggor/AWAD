<h1>Update Item</h1>
<form action="{{ $submit }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$data['id']}}">
    <input type="text" name="name" value="{{$data['name']}}"> <br> <br>
    <input type="text" name="remaining_quantity" value="{{$data['remaining_quantity']}}"> <br> <br>
    <label for="size">Choose a size:</label>
            <select id="size" name="size">
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
            </select> <br> <br>
    <input type="text" name="unit_price" value="{{$data['unit_price']}}"> <br> <br>
    <input type="text" name="description" value="{{$data['description']}}"> <br> <br>
    <label for="category">Choose a category:</label>
            <select id="category" name="category">
                <option value="Graphic T-shirts">Graphic T-shirt</option>
                <option value="Long Sleeve Shirts">Long Sleeve Shirts</option>
                <option value="Polos">Polos</option>
            </select> <br> <br>
    <label>Choose status:</label> <br>
    <div class="form-check">          
        <input class="form-check-input" type="radio" name="status" id="status1" value="1" checked>
            <label class="form-check-label" for="status1">
                Active
            </label>
        </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="status" id="status2" value="0">
            <label class="form-check-label" for="status2">
                Inactive
            </label> <br><br>
    </div>
    <button type="submit">Update</button>
</form>