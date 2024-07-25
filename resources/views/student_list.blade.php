@section('internal-css') 
@endsection
@extends('layout.main')
@section('title') Student List  @endsection
  @section('main-section')
  <section class="page-section mt-5">
    <div class="container">
      <div class="card">
        <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Subject</th>
                  <th>Marks</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>  
                @foreach ($list as $k=>$v)                    
                <tr>
                  <td class="table-avatar">
                    <div class="avatar">{{ucwords(substr($v->name,0,1))}}</div>
                    {{ucwords($v->name)}}
                  </td>
                  <td>{{$v->subject}}</td>
                  <td>{{$v->marks}}</td>
                  <td>
                    <div class="dropdown">
                      <span class="dropdown-toggle bg-dark text-light ps-1 pe-1 rounded-circle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                      </span>                    
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Edit</a></li>
                        <li><a class="dropdown-item" href="#">Delete</a></li>
                      </ul>
                    </div>              
                  </td>
                </tr>
                @endforeach            
                
              </tbody>
            </table>
        </div>
      </div>
      <button type="button" class="btn btn-dark mt-5 col-md-2" data-bs-toggle="modal" data-bs-target="#addModal">Add</button>
  </div>  
<!-- Edit modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <form class="p-5" id="student-from">
                  <div class="mb-3">
                    <div id="errorMsg"></div>
                  </div>
                  <div class="mb-3">
                    @csrf
                    <label for="name" class="form-label">Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user text-sencondary" aria-hidden="true"></i></span>
                        <input type="text" name="student_name" id="student_name" class="form-control">
                      </div>
                      <span class="error-msg" id="student_nameError"></span>
                  </div>
                  <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-book text-secondary" aria-hidden="true"></i></span>
                        <input type="text" name="subject" id="subject" class="form-control">
                      </div>
                      <span class="error-msg" id="subjectError"></span>
                  </div>
                  <div class="mb-3">
                    <label for="marks" class="form-label">Marks</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-bookmark text-secondary" aria-hidden="true"></i></span>
                        <input type="text" name="marks" id="marks" class="form-control">
                      </div>
                      <span class="error-msg" id="marksError"></span>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-dark col-md-6">Add</button>
                  </div>
                  
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

</section>    
@endsection

