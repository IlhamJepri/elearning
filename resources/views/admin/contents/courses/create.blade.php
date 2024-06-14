@extends('admin.main')
@section('content')
<div class="pagetitle">
    <h1>Courses</h1>
    <nav>
      <ol class="breadcrumb">
      
        <li class="breadcrumb-item"></li>
        <li class="breadcrumb-item active">Courses</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="card">
        <div class="card-body">
            <form action="/admin/courses/update" method="post" class="mt-3">
                @csrf
                <div class="mb-2">
                    <label for="id" class="form-label">Id</label>
                    <input type="text" name="id" id="id" class="form-control">
                </div>

                <div class="mb-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="mb-2">
                    <label for="category" class="form-label">Category</label>
                    <select name="major" id="major" class="form-select">
                        <option value="">Pilih Category</option>
                        <option value="Historical">Historical</option>
                        <option value="Probabilitas">Probabilitas</option>
                        <option value="Laravel">Laravel</option>
                    </select>
                </div>

                <div class="mb-2">
                    <label for="desc" class="form-label">Desc</label>
                    <input type="text" name="desc" id="desc" class="form-control">
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </section>
@endsection