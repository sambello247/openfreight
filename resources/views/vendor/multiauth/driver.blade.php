@extends('vendor/multiauth/layouts.app')
@section('content')
<div class="container">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
          <div class="row g-2 align-items-center">
            <div class="col">
              <h2 class="page-title">
                Driver Information
              </h2>
            </div>
          </div>
        </div>
    </div>
      
    <div class="page-body">
      <div class="container-xl">

        <div class="row">
          <div class="col-lg-8">
              All drivers information provided below.
          </div>

          <div class="col-lg-4 mb-3 d-flex flex-row-reverse">
            <a href="/admin/driver/create" class="btn btn-primary d-none d-sm-inline-block">
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
              Add New Driver
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

        @if ($drivers->count()==0)
        <div class="col-md-12"><h3>Sorry! No record found for Driver.</h3></div>
        @else
        
        <div class="card">
          <div class="card-body">
            <div id="table-default">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th><button class="table-sort" data-sort="sort-name">Image</button></th>
                      <th><button class="table-sort" data-sort="sort-type">Type</button></th>
                      <th><button class="table-sort" data-sort="sort-name">Full Name</button></th>
                      <th><button class="table-sort" data-sort="sort-phone">Phone</button></th>
                      <th><button class="table-sort" data-sort="sort-email">Email</button></th>
                      <th><button class="table-sort" data-sort="sort-address">Address</button></th>
                      <th><button class="table-sort" data-sort="sort-city">City</button></th>
                      <th><button class="table-sort" data-sort="sort-state">State</button></th>
                      <th><button class="table-sort" data-sort="sort-country">Country</button></th>
                      <th><button class="table-sort" data-sort="sort-quantity">Zip Code</button></th>
                      <th><button class="table-sort" data-sort="sort-date">DOB</button></th>
                      <th></th>
                      <th></th>
                      
                    </tr>
                  </thead>
                  <tbody class="table-tbody">

                    @foreach ($drivers as $driver)
                    <tr>
                      <td class="sort-image">{{$driver->image}}</td>
                      <td class="sort-type">{{$driver->type}}</td>
                      <td class="sort-name">{{$driver->name}}</td>
                      <td class="sort-phone">{{$driver->phone}}</td>
                      <td class="sort-email">{{$driver->email}}</td>
                      <td class="sort-address">{{$driver->address}}</td>
                      <td class="sort-city">{{$driver->city}}</td>
                      <td class="sort-state">{{$driver->state}}</td>
                      <td class="sort-country">{{$driver->country}}</td>
                      <td class="sort-zip">{{$driver->postal}}</td>
                      <td class="sort-date" data-date="1628071164">{{$driver->dob}}</td>
                      <td> 
                        <a href="/admin/driver/{{$driver->id}}/edit" class="btn btn-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                            <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line></svg>
                        </a>
                      </td>
                      <td>
                        <form action="{{ route('driver.delete', $driver->id) }}" method="post">
                          @csrf
                          @method("DELETE")
                            <button type="submit" class="btn btn-white"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="4" y1="7" x2="20" y2="7"></line>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path> </svg>
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

        <div class="mt-3">{{ $drivers->links() }}</div>
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