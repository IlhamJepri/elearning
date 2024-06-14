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
          <a href="/admin/courses/create" class="btn btn-primary my-3">+ Courses</a>
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Desc</th>
                    <th>Action</th>
                </tr>
                @foreach($courses as $course)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->category }}</td>
                    <td>{{ $course->desc }}</td>
                    <td class="d-flex">
                      <a href="/admin/courses/edit/{{ $course->id }}" class="btn btn-warning">Edit</a>
                      <form action="/admin/courses/delete/{{ $course->id }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                      </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
  </section>
@endsection