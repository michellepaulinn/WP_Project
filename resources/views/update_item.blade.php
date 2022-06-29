@extends('master')

@section('title', 'Update Item')

@section('auth-form')
    <div class="container-fluid py-3 d-flex justify-content-center h-100 col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card card-body bg-dark text-white p-5" style="border-radius: 1rem;">
            <form action="/admin/update_item/{{ $item->id }}" method="post" class="mb-md-5 px-5" enctype="multipart/form-data">
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                @csrf
                <h2 class="fw-bold mb-5 text-uppercase text-center">Update Item</h2>
                <div class="form-outline form-white mb-4">
                    
                    <label class="form-label" for="item_name">Item Name</label>
                    <input required value="{{ $item->item_name }}"  type="name" name="item_name" id="item_name" class="form-control form px-5-control-lg" required>
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="item_price">Item Price</label>
                    <input required value="{{ $item->item_price }}" type="number" name="item_price" id="item_price" class="form-control form px-5-control-lg" required>
                </div>
                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="description">Description</label>
                <input required value="{{ $item->description }}" type="text" name="description" id="description" class="form-control form px-5-control-lg" required>
                </div>
                
                <label for="category">Item Category</label>
               
                <select class="form-control" name="category" id="category">
                    Item Category
                    <option hidden>Category</option>
                    @foreach ($categories as $category)
                        @if ($item->category->id === $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endif
                    @endforeach
                </select>
                <div class="form-group mt-4">
                    <label for="image">Item Image</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex flex-row justify-content-between align-items-end mt-5">
                    <button class="btn btn-outline-light btn-lg px-3" type="submit">Add Item</button>
                </div>
            </form>
        </div>
    </div>
@endsection