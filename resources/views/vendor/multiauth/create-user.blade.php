@extends('vendor/multiauth/layouts.app')
@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            User
          </h2>
        </div>
      </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
      <div class="row row-cards">
        <div class="col-12">
          <form action="{{ route('user.store')  }}" method="post" class="card">
            @csrf
            <div class="card-header">
              <h4 class="card-title">Add New User</h4>
            </div>
            <div class="card-body">
              <div class="row">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif

                <div class="col-xl-7">

                    <div class="row mb-3">
                        <div class="col-lg-6">
                          <label class="form-label">First Name</label>
                          <input type="text" class="form-control" name="first-name" placeholder="First Name">
                        </div>
              
                        <div class="col-lg-6">
                          <label class="form-label">Last Name</label>
                          <input type="text" class="form-control" name="last-name" placeholder="Last Name">
                        </div>
                        
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6">
                          <label class="form-label">Email</label>
                          <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
              
                        <div class="col-lg-6">
                          <label class="form-label">Password</label>
                          <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
              
                       
                    </div>
                    
                    <div class="row mb-3">

                        <div class="col-lg-6">
                          <label class="form-label">Image</label>
                          <input type="file" class="form-control" name="image">
                        </div>
              
              
                        <div class="col-lg-3">
                          <label class="form-label">Account type</label>
                          <select class="form-select" name="account-type" aria-label="Default select example">
                            <option selected disabled>Select</option>
                            <option value="Business">Business</option>
                            <option value="Shipping">Shipping</option>
                            <option value="Delivery">Delivery</option>
                          </select>
                        </div>
              
                        <div class="col-lg-3">
                          <label class="form-label">Account status</label>
                          <select class="form-select" name="account-status" aria-label="Default select example">
                            <option selected disabled>Select</option>
                            <option value="Business">Pending Aproval</option>
                            <option value="Shipping">Approved</option>
                            <option value="Delivery">Decline</option>
                          </select>
                        </div>
              
                      
                        
                    </div>

                    <div class="row mb-3">

                        <div class="col-lg-6">
                          <label class="form-label">Business Name</label>
                          <input type="text" class="form-control" name="business-name" placeholder="Business Name">
                        </div>
                        
              
                        <div class="col-lg-6">
                          <label class="form-label">Address</label>
                          <input type="text" class="form-control" name="address" placeholder="Address">
                        </div>

                    </div>


                    <div class="row mb-3">
                        <div class="col-lg-6">
                          <label class="form-label">City</label>
                          <input type="text" class="form-control" name="city" placeholder="City">
                        </div>
              
                        <div class="col-lg-6">
                          <label class="form-label">State</label>
                          <input type="text" class="form-control" name="state" placeholder="State">
                        </div>
                        
                    </div>

                    <div class="row mb-3">

                        <div class="col-lg-6">
                          <label class="form-label">Country</label>
                          <input type="text" class="form-control" name="country" placeholder="Country">
                        </div>
              
                        <div class="col-lg-6">
                          <label class="form-label">Phone</label>
                          <input type="phone" class="form-control" name="phone" placeholder="Phone Number">
                        </div>
              
                    </div>

                    <div class="row mb-3">

                        <div class="col-lg-3">
                          <label class="form-label">Postal Code</label>
                          <input type="text" class="form-control" name="postal" placeholder="Postal Code">
                        </div>
              
                        <div class="col-lg-3">
                          <label class="form-label">DOB</label>
                          <input type="date" class="form-control" name="dob">
                        </div>
              
                        <div class="col-lg-6">
                          <label class="form-label">Website</label>
                          <input type="text" class="form-control" name="website" placeholder="Website">
                        </div>
                        
                    </div>

                    <div class="row mb-3">

                        <div class="col-lg-6">
                          <label class="form-label">Facebook</label>
                          <input type="text" class="form-control" name="facebook" placeholder="Facebook">
                        </div>
              
                        <div class="col-lg-6">
                          <label class="form-label">Linkedin</label>
                          <input type="text" class="form-control" name="linkedin" placeholder="Linkedin">
                        </div>
                        
                    </div>

                    <div class="row mb-3">

                        <div class="col-lg-6">
                          <label class="form-label">Twitter</label>
                          <input type="text" class="form-control" name="twitter" placeholder="Twitter">
                        </div>
              
                        <div class="col-lg-6">
                          <label class="form-label">Instagram</label>
                          <input type="text" class="form-control" name="instagram" placeholder="Instagram">
                        </div>
                        
                    </div>
                    

                    <div class="d-flex mt-4">
                    <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>Create New User</button>
                    </div>

                </div>
               
                <div class="col-xl-5">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae consectetur corporis labore aliquid explicabo veniam, maiores nesciunt inventore veritatis eligendi. Quia iure qui perferendis pariatur assumenda praesentium laboriosam voluptatum fugiat.
                </div>
                
              </div>
              
            </div>
          </div>
          
        </form>
        </div>
    </div>
   </div>
</div>
<footer class="footer footer-transparent d-print-none">
  <div class="container-xl">
    <div class="row text-center align-items-center flex-row-reverse">
      <div class="col-lg-auto ms-lg-auto">
        <ul class="list-inline list-inline-dots mb-0">
          <li class="list-inline-item"><a href="./docs/index.html" class="link-secondary">Documentation</a></li>
          <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
          <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
          <li class="list-inline-item">
            <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
              <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
              Sponsor
            </a>
          </li>
        </ul>
      </div>
      <div class="col-12 col-lg-auto mt-3 mt-lg-0">
        <ul class="list-inline list-inline-dots mb-0">
          <li class="list-inline-item">
            Copyright &copy; 2022
            <a href="." class="link-secondary">Tabler</a>.
            All rights reserved.
          </li>
          <li class="list-inline-item">
            <a href="./changelog.html" class="link-secondary" rel="noopener">
              v1.0.0-beta10
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>

@endsection