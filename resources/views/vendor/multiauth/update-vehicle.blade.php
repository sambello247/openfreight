@extends('vendor/multiauth/layouts.app')
@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            Vehicle
          </h2>
        </div>
      </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
      <div class="row row-cards">
        <div class="col-12">
          <form action="{{ route('vehicle.update', $vehicle->id)  }}" method="post" class="card">
            @csrf
            @method("PUT")
            <div class="card-header">
              <h4 class="card-title">Add New Vehicle</h4>
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
                          <label class="form-label">Owner Name</label>
                          <input type="text" class="form-control" name="owner-name" value="{{$vehicle->owner_name}}" placeholder="Owner's Full Name">
                        </div>
            
                        <div class="col-lg-6">
                          <label class="form-label">Vehicle Brand</label>
                          <input type="text" class="form-control" name="vehicle-brand" value="{{$vehicle->vehicle_brand}}" placeholder="Vehicle Brand">
                        </div>
                        
                      </div>
              
                      <div class="row mb-3">
              
                        <div class="col-lg-6">
                          <label class="form-label">Vehicle Model</label>
                          <input type="text" class="form-control" name="vehicle-model"  value="{{$vehicle->vehicle_model}}" placeholder="Vehicle Model">
                        </div>
            
                        <div class="col-lg-6">
                            <label class="form-label">Vehicle Image</label>
                            <input type="file" class="form-control" name="vehicle-image">
                          </div>
              
                      </div>
              
                      <div class="row mb-3">
                        <div class="col-lg-6">
                          <label class="form-label">Fuel Type</label>
                          <input type="text" class="form-control" name="fuel-type" value="{{$vehicle->fuel_type}}" placeholder="Fuel Type">
                        </div>
              
                        <div class="col-lg-6">
                          <label class="form-label">Plate Number</label>
                          <input type="text" class="form-control" name="plate-number" value="{{$vehicle->plate_number}}" placeholder="Plate Number">
                        </div>
                        
                      </div>
              
                      <div class="row mb-3">
              
                        <div class="col-lg-6">
                          <label class="form-label">Plate Expiry</label>
                          <input type="date" class="form-control" name="plate-expiry" value="{{$vehicle->plate_expiry}}">
                        </div>
              
                        <div class="col-lg-6">
                          <label class="form-label">Weight</label>
                          <input type="phone" class="form-control" name="weight" value="{{$vehicle->weight}}" placeholder="Weight">
                        </div>
              
                      </div>
              
                      <div class="row mb-3">
                      
                        <div class="col-lg-6">
                          <label class="form-label">Mileage</label>
                          <input type="text" class="form-control" name="mileage" value="{{$vehicle->mileage}}" placeholder="Mileage">
                        </div>
              
                        <div class="col-lg-6">
                          <label class="form-label">Last Inspection</label>
                          <input type="date" class="form-control" name="last-inspection" value="{{$vehicle->last_inspectio}}">
                        </div>
            
                      </div>
              

                    <div class="d-flex">
                    <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-rotate-clockwise" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M4.05 11a8 8 0 1 1 .5 4m-.5 5v-5h5"></path>
                   </svg>Update Vehicle</button>
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