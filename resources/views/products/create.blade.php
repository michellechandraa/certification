@extends('layouts.app')
@section('content')
<main class="container">
    <section>
        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="titlebar">
                <h1>Add Product</h1>
                <button>Save</button>
            </div>
            @if ($errors->any)
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
            <div>
                    <label>Name</label>
                    <input name="name" type="text" >
                    <label>Description (optional)</label>
                    <textarea name="description" cols="10" rows="5" ></textarea>
                    <label>Add Image</label>
                    <img src="" alt="" class="img-product" id="file-preview" />
                    <input name="image" type="file" accept="image/*" onchange="showFile(event)">
                </div>
            <div>
                    <label>Category</label>
                    <select  name="category">
                        @foreach (json_decode('{"Smartphone":"Smartphone", "Smart TV":"Smart TV", "Computer":"Computer"}', true) as $optionKey => $optionValue)
                            <option value="{{$optionKey}}" >{{$optionValue}}</option>
                        @endforeach
                        
                    </select>
                    <hr>
                    <label>Inventory</label>
                    <input name="quantity" type="text" >
                    <hr>
                    <label>Price</label>
                    <input name="price" type="text" >
            </div>
            </div>
            <div class="titlebar">
                <h1></h1>
                <button>Save</button>
            </div>
        </form>
    </section>
</main>
<script>
    function showFile(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var dataURL = reader.result;
            var output = document.getElementById('file-preview');
            output.src = dataURL;
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
@endsection