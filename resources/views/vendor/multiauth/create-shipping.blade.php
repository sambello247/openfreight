@extends('vendor/multiauth/layouts.app')
@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            Shipping
          </h2>
        </div>
      </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
      <div class="row row-cards">
        <div class="col-12">
          <form action="{{ route('shipping.store') }}" method="post" class="card">
            @csrf
            <div class="card-header">
              <h4 class="card-title">Add New Shipping</h4>
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

                    <h5 class="modal-title mb-3">User Identification</h5>
                    <div class="row">
                      <div class="col-lg-12 mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="user-email" placeholder="Email">
                      </div>
                    </div>

                    <h5 class="modal-title mb-3">Origination</h5> 
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="shipper-fullname" placeholder="Full Name">
                        </div>
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Company Name</label>
                        <input type="text" class="form-control" name="shipper-company-name" placeholder="Company Name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                          <label class="form-label">Department</label>
                          <input type="text" class="form-control" name="shipper-department" placeholder="Department">
                        </div>
                        <div class="col-lg-6 mb-3">
                          <label class="form-label">Phone</label>
                          <input type="text" class="form-control" name="shipper-phone" placeholder="Phone">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                          <label class="form-label">Fax</label>
                          <input type="text" class="form-control" name="shipper-fax" placeholder="Fax">
                        </div>
                        <div class="col-lg-6 mb-3">
                          <label class="form-label">Email</label>
                          <input type="text" class="form-control" name="shipper-email" placeholder="Email">
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                          <label class="form-label">Address Line 1</label>
                          <input type="text" class="form-control" name="shipper-address-line-1" placeholder="Address Line 1">
                        </div>
                        <div class="col-lg-6 mb-3">
                          <label class="form-label">Address Line 2</label>
                          <input type="text" class="form-control" name="shipper-address-line-2" placeholder="Address Line 2">
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                          <label class="form-label">City</label>
                          <input type="text" class="form-control" name="shipper-city" placeholder="City">
                        </div>
                        <div class="col-lg-6 mb-3">
                          <label class="form-label">State</label>
                          <input type="text" class="form-control" name="shipper-state" placeholder="State">
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                          <label class="form-label">Postal</label>
                          <input type="text" class="form-control" name="shipper-postal" placeholder="Postal">
                        </div>
                        <div class="col-lg-6 mb-3">
                          <label class="form-label">Country</label>
                          <input type="text" class="form-control" name="shipper-country" placeholder="Country">
                        </div>
                    </div>


                    <h5 class="modal-title mb-3">Destination</h5> 
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="receiver-fullname" placeholder="Full Name">
                        </div>
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Company Name</label>
                        <input type="text" class="form-control" name="receiver-company-name" placeholder="Company Name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Department</label>
                        <input type="text" class="form-control" name="receiver-department" placeholder="Department">
                        </div>
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" name="receiver-phone" placeholder="Phone">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Fax</label>
                        <input type="text" class="form-control" name="receiver-fax" placeholder="Fax">
                        </div>
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="receiver-email" placeholder="Email">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Address Line 1</label>
                        <input type="text" class="form-control" name="receiver-address-line-1" placeholder="Address Line 1">
                        </div>
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Address Line 2</label>
                        <input type="text" class="form-control" name="receiver-address-line-2" placeholder="Address Line 2">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" name="receiver-city" placeholder="City">
                        </div>
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">State</label>
                        <input type="text" class="form-control" name="receiver-state" placeholder="State">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Postal</label>
                        <input type="text" class="form-control" name="receiver-postal" placeholder="Postal">
                        </div>
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Country</label>
                        <input type="text" class="form-control" name="receiver-country" placeholder="Country">
                        </div>
                    </div>

                    <h5 class="modal-title mb-3">Service Option</h5>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Dropoff Type </label>
                        <select class="form-select" name="dropoff-type" aria-label="Default select example">
                            <option value="Regular Pickup">Regular Pickup</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Destination Is</label>
                        <select class="form-select" name="destination" aria-label="Default select example">
                            <option value="Business">Business</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Service</label>
                        <select class="form-select" name="service" aria-label="Default select example">
                            <option value="Priority Overnight">Priority Overnight</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Signature Option</label>
                        <select class="form-select" name="signature-option" aria-label="Default select example">
                            <option value="Deliver without signature">Deliver without signature</option>
                            <option value="Deliver with signature">Deliver with signature</option>
                            <option value="3">Three</option>
                        </select>
                        </div>
                    </div>


                    <h5 class="modal-title mb-3">Package</h5> 
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Shipping Code</label>
                        <input type="text" class="form-control" name="shipping-code" placeholder="Shipping Code">
                        </div>
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Packaging</label>
                        <select class="form-select" name="packaging" aria-label="Default select example">
                            <option value="Box - Small">Box - Small</option>
                            <option value="Box - Medium">Box - Medium</option>
                            <option value="Box - Large">Box - Large</option>
                            <option value="Envelope">Envelope</option>
                            <option value="Pak">Pak</option>
                            <option value="Tube">Tube</option>
                        </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Decleared Value</label>
                        <input type="text" class="form-control" name="declared-value" placeholder="Decleared Value">
                        </div>
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Qty</label>
                        <input type="text" class="form-control" name="quantity" placeholder="Quantity">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Weight</label>
                        <input type="text" class="form-control" name="weight" placeholder="Weight">
                        </div>
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Weight type</label>
                        <select class="form-select" name="weight-type" aria-label="Default select example">
                            <option value="LBS">LBS</option>
                            <option value="KG">KG</option>
                            <option value="Gram">Gram</option>
                    
                        </select>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-3 mb-3">
                        <label class="form-label">Measurement in</label>
                        <select class="form-select" name="measurement" aria-label="Default select example">
                            <option value="Inches">Inches</option>
                            <option value="Meters">Meters</option>
                            <option value="Feet">Feet</option>
                        </select>
                        </div>
                        <div class="col-lg-3 mb-3">
                        <label class="form-label">length</label>
                        <input type="text" class="form-control" name="length" placeholder="length">
                        </div>

                        <div class="col-lg-3 mb-3">
                        <label class="form-label">width</label>
                        <input type="text" class="form-control" name="width" placeholder="width">
                        </div>

                        <div class="col-lg-3 mb-3">
                        <label class="form-label">height</label>
                        <input type="text" class="form-control" name="height" placeholder="height">
                        </div>
                    
                    </div>

                    <div class="row">
                        <div class="col-lg-3 mb-3">
                        <label class="form-label">Ship date</label>
                        <input type="date" class="form-control" name="ship-date">
                        </div>
                        <div class="col-lg-3 mb-3">
                        <label class="form-label">Schedule delivery</label>
                        <input type="date" class="form-control" name="schedule-delivery">
                        </div>
                        <div class="col-lg-6 mb-3">
                        <label class="form-label">Shipping Cost</label>
                        <input type="text" class="form-control" name="shipping-cost" placeholder="Cost">
                        </div>
                    </div>



                    <div class="d-flex">
                    <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>Create New Driver</button>
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