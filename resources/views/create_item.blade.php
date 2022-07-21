@extends('master')

@section('title', 'Add Item')

@section('auth-form')
    <div class="container-fluid py-3 d-flex justify-content-center h-100 col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card card-body text-white p-5" style="border-radius: 0.5rem;background-color:#ede6db;">
            <form action="/admin/create_item" method="post" class="mb-md-5 px-5" enctype="multipart/form-data" style="color: #396854;font-weight:500;">
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                @csrf
                <h2 class="fw-bold mb-5 text-uppercase text-center">Add Item</h2>
                <div class="form-outline form-white mb-4">
                    
                    <label class="form-label" for="item_name">Item Name</label>
                    <input type="name" name="item_name" id="item_name" class="form-control form px-5-control-lg" required>
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="item_price">Item Price</label>
                    <input type="number" name="item_price" id="item_price" class="form-control form px-5-control-lg" required>
                </div>
                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="description">Description</label>
                    <input type="text" name="description" id="description" class="form-control form px-5-control-lg" required>
                </div>
                
                <label for="category">Item Category</label>
               
                <select class="form-control" name="category" id="category">
                    Item Category
                    <option hidden>Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                <div class="form-group mt-4">
                    <label for="image">Item Image</label>
                    <input type="file" name="image[]" multiple id="image" class="form-control-file">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex flex-column justify-content-between mt-4 ">
                    <button class="btn btn-prim btn-outline-light btn-lg px-3" type="submit">Add Item</button>
                </div>
            </form>
        </div>
    </div>
@endsection