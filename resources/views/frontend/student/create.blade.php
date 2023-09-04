@include('frontend.include.header')

    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h3>Add New Student</h3>
            <form action="{{route('student.store')}}" method="post">
              @csrf
              <div class="mb-3">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control" required>
              </div>
              <div class="mb-3">
                <label>Phone Number</label>
                <input type="text" name="phone" class="form-control" required>
              </div>
              <div class="mb-3">
                <input type="submit" name="resigter"  value="Register" class="btn btn-outline-success btn-sm">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>


@include('frontend.include.footer')