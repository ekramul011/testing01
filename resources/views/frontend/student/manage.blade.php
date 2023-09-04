@include('frontend.include.header')
    
    <section class="py-5">
      <div class="container">
        <h4>Hello, Student Manage Page!</h4>
        <div class="row">
          <div class="col-lg-12">

            @if($students->count()==0)
              <div class="alert bg-info">Sorry No Students Data Found</div>
            @else
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#sl</th>
                  <th scope="col">Name</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Handle</th>
                </tr>
              </thead>
              <tbody>
                @foreach($students as $student)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$student->name}}</td>
                  <td>{{$student->phone}}</td>
                  <td>
                    <a href="{{route('student.edit', $student->id)}}" class="btn btn-outline-info btn-sm">Edit</a>
                    <a href="" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#student{{$student->id}}">Delete</a>
                  </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="student{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header mx-auto">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Are Your Sure To Remove This Data?</h1>
                      </div>
                      <div class="modal-body mx-auto">
                        <form action="{{route('student.destroy', $student->id)}}" method="post">
                          @csrf
                          <button type="submit" class="btn btn-warning me-5" data-bs-target="#student{{$student->id}}">YES</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </tbody>
            </table>
            @endif

          </div>
        </div>
      </div>
    </section>

@include('frontend.include.footer')