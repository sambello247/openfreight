@extends('vendor/multiauth/layouts.app')
@section('content')
<div class="container">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
          <div class="row g-2 align-items-center">
            <div class="col">
              <h2 class="page-title">
                Shipping Transactions
              </h2>
            </div>
          </div>
        </div>
      </div>
      
      <div class="page-body">
        <div class="container-xl">

          <div class="row">
            
            <div class="col-lg-8">
                All shipping transactions provided below.
            </div>

            <div class="col-lg-4 mb-3 d-flex flex-row-reverse">
              <a href="/admin/shipping/create" class="btn btn-primary d-none d-sm-inline-block">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                Add New Shipment
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

              @if (session()->has('error'))
                  <div class="alert alert-danger">
                      {{ session()->get('error') }}
                  </div>
              @endif

              @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
              @endif
            </div>
            
          </div>
          @if ($packages->count()==0)
          <div class="col-md-12"><h3>Sorry! No record found for Shipping transaction.</h3></div>
          @else

          <div class="card">
            <div class="card-body">
              <div id="table-default">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th><button class="table-sort" data-sort="sort-name">Shipping Code</button></th>
                        <th><button class="table-sort" data-sort="sort-name">Shipper Fullname</button></th>
                        <th><button class="table-sort" data-sort="sort-type">Shipper Company</button></th>
                        <th><button class="table-sort" data-sort="sort-name">Shipper Department</button></th>
                        <th><button class="table-sort" data-sort="sort-phone">Shipper Phone</button></th>
                        <th><button class="table-sort" data-sort="sort-email">Shipper Fax</button></th>
                        <th><button class="table-sort" data-sort="sort-address">Shipper Email Address</button></th>
                        <th><button class="table-sort" data-sort="sort-city">Shipper Address Line 1</button></th>
                        <th><button class="table-sort" data-sort="sort-state">Shipper Address Line 2</button></th>
                        <th><button class="table-sort" data-sort="sort-country">Shipper City</button></th>
                        <th><button class="table-sort" data-sort="sort-quantity">Shipper State</button></th>
                        <th><button class="table-sort" data-sort="sort-date">Shipper Postal Code</button></th>
                        <th><button class="table-sort" data-sort="sort-date">Shipper Country</button></th>
                        
                        <th><button class="table-sort" data-sort="sort-name">Receiver Fullname</button></th>
                        <th><button class="table-sort" data-sort="sort-type">Receiver Company</button></th>
                        <th><button class="table-sort" data-sort="sort-name">Receiver Department</button></th>
                        <th><button class="table-sort" data-sort="sort-phone">Receiver Phone</button></th>
                        <th><button class="table-sort" data-sort="sort-email">Receiver Fax</button></th>
                        <th><button class="table-sort" data-sort="sort-address">Receiver Email Address</button></th>
                        <th><button class="table-sort" data-sort="sort-city">Receiver Address Line 1</button></th>
                        <th><button class="table-sort" data-sort="sort-state">Receiver Address Line 2</button></th>
                        <th><button class="table-sort" data-sort="sort-country">Receiver City</button></th>
                        <th><button class="table-sort" data-sort="sort-quantity">Receiver State</button></th>
                        <th><button class="table-sort" data-sort="sort-date">Receiver Postal Code</button></th>
                        <th><button class="table-sort" data-sort="sort-date">Receiver Country</button></th>

                        <th><button class="table-sort" data-sort="sort-date">Ship Date</button></th>
                        <th><button class="table-sort" data-sort="sort-date">Schedule Delivery</button></th>

                        <th><button class="table-sort" data-sort="sort-dropoff">Drop off</button></th>
                        <th><button class="table-sort" data-sort="sort-destination">Destination</button></th>
                        <th><button class="table-sort" data-sort="sort-service">Service</button></th>
                        <th><button class="table-sort" data-sort="sort-signature">Signature Option</button></th>

                        <th><button class="table-sort" data-sort="sort-packaging">Packaging</button></th>
                        <th><button class="table-sort" data-sort="sort-value">Declared Value</button></th>
                        <th><button class="table-sort" data-sort="sort-qty">Qty</button></th>
                        <th><button class="table-sort" data-sort="sort-weight">Weight</button></th>
                        <th><button class="table-sort" data-sort="sort-type">Weight Type</button></th>
                        <th><button class="table-sort" data-sort="sort-measurement">Measurement In</button></th>
                        <th><button class="table-sort" data-sort="sort-length">Length</button></th>
                        <th><button class="table-sort" data-sort="sort-width">Width</button></th>
                        <th><button class="table-sort" data-sort="sort-height">Height</button></th>
                        <th><button class="table-sort" data-sort="sort-height">Cost</button></th>

                        <th></th>
                        <th></th>
                        
                      </tr>
                    </thead>


                    <tbody class="table-tbody">
                      @foreach ($packages as $package)
                      
                      <tr>
                        <td class="sort-number">{{$package->shipping_code}}</td>
                        <td class="sort-name">{{$package->shipper->fullname}}</td>
                        <td class="sort-company">{{$package->shipper->company_name}}</td>
                        <td class="sort-department">{{$package->shipper->department}}</td>
                        <td class="sort-phone">{{$package->shipper->phone}}</td>
                        <td class="sort-fax">{{$package->shipper->fax}}</td>
                        <td class="sort-email">{{$package->shipper->email}}</td>
                        <td class="sort-address">{{$package->shipper->address_line_1}}</td>
                        <td class="sort-address">{{$package->shipper->address_line_2}}</td>
                        <td class="sort-city">{{$package->shipper->city}}</td>
                        <td class="sort-state">{{$package->shipper->state}}</td>
                        <td class="sort-postal">{{$package->shipper->postal}}</td>
                        <td class="sort-country">{{$package->shipper->country}}</td>

                        <td class="sort-name">{{$package->receiver->fullname}}</td>
                        <td class="sort-company">{{$package->receiver->company_name}}</td>
                        <td class="sort-department">{{$package->receiver->department}}</td>
                        <td class="sort-phone">{{$package->receiver->phone}}</td>
                        <td class="sort-fax">{{$package->receiver->fax}}</td>
                        <td class="sort-email">{{$package->receiver->email}}</td>
                        <td class="sort-address">{{$package->receiver->address_line_1}}</td>
                        <td class="sort-address">{{$package->receiver->address_line_2}}</td>
                        <td class="sort-city">{{$package->receiver->city}}</td>
                        <td class="sort-state">{{$package->receiver->state}}</td>
                        <td class="sort-postal">{{$package->receiver->postal}}</td>
                        <td class="sort-country">{{$package->receiver->country}}</td>

                        <td class="sort-date">{{$package->shipper->ship_date}}</td>
                        <td class="sort-date">{{$package->receiver->scheduled_delivery}}</td>

                        <td class="sort-dropoff">{{$package->serviceoption->dropoff_type}}</td>
                        <td class="sort-destination">{{$package->serviceoption->destination_is}}</td>
                        <td class="sort-service">{{$package->serviceoption->service}}</td>
                        <td class="sort-signature">{{$package->serviceoption->signature_option}}</td>

                        <td class="sort-packaging">{{$package->packaging}}</td>
                        <td class="sort-value">{{$package->declared_value}}</td>
                        <td class="sort-qty">{{$package->qty}}</td>
                        <td class="sort-weight">{{$package->weight}}</td>
                        <td class="sort-type">{{$package->weight_type}}</td>
                        <td class="sort-measurement">{{$package->measurement_in}}</td>
                        <td class="sort-length">{{$package->length}}</td>
                        <td class="sort-width">{{$package->width}}</td>
                        <td class="sort-height">{{$package->height}}</td>
                        <td class="sort-cost">{{$package->shipping_cost}}</td>



                        <td> <a href="/admin/shipping/{{$package->id}}/edit" class="btn btn-white"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                          <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                      </svg></a>
                        </td>
                        <td>
                          <form action="{{route('shipping.delete', $package->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                           <button type="submit" class="btn btn-white"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <line x1="4" y1="7" x2="20" y2="7"></line>
                          <line x1="10" y1="11" x2="10" y2="17"></line>
                          <line x1="14" y1="11" x2="14" y2="17"></line>
                          <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                          <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                          </svg></button>
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

          <div class="mt-3">{{ $packages->links() }}</div>
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


<form action="{{ route('shipping.store') }}" method="post">
  @csrf
<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">New Shipping Transaction</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         
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

          <h5 class="modal-title">User Identification</h5>
          <div class="row">
            <div class="col-lg-12 mb-3">
              <label class="form-label">Email</label>
              <input type="text" class="form-control" name="user-email" placeholder="Email">
            </div>
          </div>
          
          <h5 class="modal-title">Origination</h5> 
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



          <h5 class="modal-title">Destination</h5> 
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
          

          <h5 class="modal-title">Service Option</h5>
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


          <h5 class="modal-title">Package</h5> 
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
              <select class="form-select" name="measurment" aria-label="Default select example">
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

          
        </div>
      
        <div class="modal-footer">
          <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
            Cancel
          </a>
          <button type="submit" class="btn btn-primary ms-auto"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            Create New Transaction</button>
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