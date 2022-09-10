@extends('vendor/multiauth/layouts.app')
@section('content')
<div class="container">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
          <div class="row g-2 align-items-center">
            <div class="col">
              <h2 class="page-title">
                Users Information
              </h2>
            </div>
          </div>
        </div>
      </div>
      <div class="page-body">
        <div class="container-xl">

          <div class="row">
            <div class="col-md-8">
                All users Information provided below.
            </div>

            <div class="col-md-4 mb-3 d-flex flex-row-reverse">
              <a href="/admin/user/create" class="btn btn-primary d-none d-sm-inline-block">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                Add New User
              </a>
              <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
              </a>
            </div>

            <div class="col-lg-12">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
  
              @if (session()->has('success'))
                  <div class="alert alert-success">
                      {{ session()->get('success') }}
                  </div>
              @endif
        
            </div>

          </div>
          
          @if ($users->count()==0)
          <div class="col-md-12"><h3>Sorry! No record found for User.</h3></div>
          @else

          <div class="card">
            <div class="card-body">
              <div id="table-default">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        
                        <th><button class="table-sort" data-sort="sort-name">First Name</button></th>
                        <th><button class="table-sort" data-sort="sort-name">Last Name</button></th>
                        <th><button class="table-sort" data-sort="sort-email">Email</button></th>
                        <th><button class="table-sort" data-sort="sort-account">Account type </button></th>
                        <th><button class="table-sort" data-sort="sort-account">Account Status </button></th>
                        <th><button class="table-sort" data-sort="sort-name">Image</button></th>
                        <th><button class="table-sort" data-sort="sort-name">Business Name</button></th>
                        <th><button class="table-sort" data-sort="sort-address">Address</button></th> 
                        <th><button class="table-sort" data-sort="sort-city">City</button></th>
                        <th><button class="table-sort" data-sort="sort-state">State</button></th>
                        <th><button class="table-sort" data-sort="sort-country">Country</button></th>
                        <th><button class="table-sort" data-sort="sort-quantity">Postal Code</button></th>
                        <th><button class="table-sort" data-sort="sort-date">DOB</button></th>
                        <th><button class="table-sort" data-sort="sort-phone">Phone</button></th>
                        <th><button class="table-sort" data-sort="sort-quantity">Facebook</button></th>
                        <th><button class="table-sort" data-sort="sort-quantity">Linkedin</button></th>
                        <th><button class="table-sort" data-sort="sort-quantity">Twittter</button></th>
                        <th><button class="table-sort" data-sort="sort-quantity">Instagram</button></th>
                        <th><button class="table-sort" data-sort="sort-quantity">Website</button></th>

                        <th></th>
                        <th></th>
                        
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      @foreach ($users as $user)
                      <tr>
                        <td class="sort-image">{{$user->first_name}}</td>
                        <td class="sort-name">{{$user->last_name}}</td>
                        <td class="sort-name">{{$user->email}}</td>
                        <td class="sort-name">{{$user->account_type}}</td>
                        <td class="sort-name">{{$user->account_status}}</td>
                        <td class="sort-phone">{{$user->profile->image}}</td>
                        <td class="sort-email">{{$user->profile->business_name}}</td>
                        <td class="sort-address">{{$user->profile->address}}</td>
                        <td class="sort-city">{{$user->profile->city}}</td>
                        <td class="sort-state">{{$user->profile->state}}</td>
                        <td class="sort-country">{{$user->profile->country}}</td>
                        <td class="sort-zip">{{$user->profile->postal}}</td>
                        <td class="sort-date" data-date="1628071164">{{$user->profile->dob}}</td>
                        <td class="sort-phone">{{$user->profile->phone}}</td>
                        <td class="sort-name">{{$user->profile->facebook}}</td>
                        <td class="sort-name">{{$user->profile->linkedin}}</td>
                        <td class="sort-name">{{$user->profile->twitter}}</td>
                        <td class="sort-name">{{$user->profile->instagram}}</td>
                        <td class="sort-name">{{$user->profile->website}}</td>
                        <td> <a href="/admin/user/{{$user->id}}/edit" class="btn btn-white"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                          <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                      </svg></a>
                      </td>
                      <td> 
                        <form action="{{route('user.delete', $user->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                        <button type="submit" class="btn btn-white">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <line x1="4" y1="7" x2="20" y2="7"></line>
                          <line x1="10" y1="11" x2="10" y2="17"></line>
                          <line x1="14" y1="11" x2="14" y2="17"></line>
                          <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                          <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                          </svg>
                        </button>
                        </form>
                      </td>
                        
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="mt-3">{{ $users->links() }}</div>

          @endif
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
</div>

<form action="{{route('user.store')}}" method="post">
  @csrf
<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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


     
      <div class="modal-footer">
        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
          Cancel
        </a>
        <button type="submit" class="btn btn-primary ms-auto"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
          Create new user</button>
      </div>
    </div>
  </div>
</div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const list = new List('table-default', {
        sortClass: 'table-sort',
        listClass: 'table-tbody',
        valueNames: [ 'sort-name', 'sort-type', 'sort-city', 'sort-score',
            { attr: 'data-date', name: 'sort-date' },
            { attr: 'data-progress', name: 'sort-progress' },
            'sort-quantity'
        ]
    });
    })
</script>

@endsection