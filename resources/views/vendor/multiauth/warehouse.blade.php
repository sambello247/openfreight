@extends('vendor/multiauth/layouts.app')
@section('content')
<div class="container">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
          <div class="row g-2 align-items-center">
            <div class="col">
              <h2 class="page-title">
                Warehouse Information
              </h2>
            </div>
          </div>
        </div>
    </div>
      
    <div class="page-body">
      <div class="container-xl">

        <div class="row">
          <div class="col-lg-8">
              All warehouse information are provided below
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

         
        </div>

        @if ($warehousing->count()==0)
        <div class="col-md-12"><h3>Sorry! No record found in Warehouse.</h3></div>
        @else
        
          <div class="card">
            <div class="card-body">
              <div id="table-default">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th><button class="table-sort" data-sort="sort-name">Shipping Code</button></th>
                        <th><button class="table-sort" data-sort="sort-type">Packaging</button></th>
                        <th><button class="table-sort" data-sort="sort-name">Declared Value</button></th>
                        <th><button class="table-sort" data-sort="sort-phone">Quantity</button></th>
                        <th><button class="table-sort" data-sort="sort-email">Weight</button></th>
                        <th><button class="table-sort" data-sort="sort-address">Weight Type</button></th>
                        <th><button class="table-sort" data-sort="sort-city">Masurement</button></th>
                        <th><button class="table-sort" data-sort="sort-state">Length</button></th>
                        <th><button class="table-sort" data-sort="sort-country">Width</button></th>
                        <th><button class="table-sort" data-sort="sort-quantity">Height</button></th>
                        <th><button class="table-sort" data-sort="sort-date">Shipping Cost</button></th>
                        <th></th>
                        <th></th>
                        
                      </tr>
                    </thead>
                    <tbody class="table-tbody">

                      @foreach ($warehousing as $warehouse)
                      <tr>
                        <td class="sort-image">{{$warehouse->shipping_code}}</td>
                        <td class="sort-type">{{$warehouse->packaging}}</td>
                        <td class="sort-name">{{$warehouse->declared_value}}</td>
                        <td class="sort-phone">{{$warehouse->qty}}</td>
                        <td class="sort-email">{{$warehouse->weight}}</td>
                        <td class="sort-address">{{$warehouse->weight_type}}</td>
                        <td class="sort-city">{{$warehouse->measurement_in}}</td>
                        <td class="sort-state">{{$warehouse->length}}</td>
                        <td class="sort-country">{{$warehouse->width}}</td>
                        <td class="sort-zip">{{$warehouse->height}}</td>
                        <td class="sort-date">{{$warehouse->shipping_cost}}</td>
                        
                      </tr>

                      @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        <div class="mt-3">{{ $warehousing->links() }}</div>
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