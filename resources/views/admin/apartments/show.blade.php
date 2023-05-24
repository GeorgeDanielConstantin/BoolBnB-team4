@extends('layouts.app')

@section('title', $apartment->title)

@section('content')
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap"
    rel="stylesheet"
  />




  <section class="showcard card py-2 ">
    <div class="card-body">

        
        <div class="row">


            <div class="col-6">
                
                <div class="row">
                    <div class="col-md-5 text-end">
                        <p class="bold">Apartment name</p>
                    </div>
                    <div class="col-md-7">
                        <p class="text-muted">{{$apartment->title}}</p>
                    </div>
                    
                    <div class="col-md-5 text-end">
                        <p class="bold">Address</p>
                    </div>
                    <div class="col-md-7">
                        <p class="text-muted">{{$apartment->address}}</p>
                    </div>
                
                    <div class="col-md-5 text-end">
                        <p class="bold">Bedrooms</p>
                    </div>
                    <div class="col-md-7">
                        <p class="text-muted">{{$apartment->rooms}}</p>
                    </div>
               
                    <div class="col-md-5 text-end">
                        <p class="bold">Bedrooms </p>
                    </div>
                    <div class="col-md-7">
                        <p class="text-muted">{{$apartment->rooms}}</p>
                    </div>
                
                    <div class="col-md-5 text-end">
                        <p class="bold">Beds </p>
                    </div>
                    <div class="col-md-7">
                        <p class="text-muted">{{$apartment->beds}}</p>
                    </div>
                    
                    <div class="col-md-5 text-end">
                        <p class="bold">Bathrooms </p>
                    </div>
                    <div class="col-md-7">
                        <p class="text-muted">{{$apartment->bathrooms}}</p>
                    </div>
                    
            
                    <div class="col-md-5 text-end">
                        <p class="bold">Square meters</p>
                    </div>
                    <div class="col-md-7">
                        <p class="text-muted">{{$apartment->square_meters}}</p>
                    </div>
                
                    <div class="col-md-5 text-end">
                        <p class="bold">
                            Sponsered untill
                        </p>
                    </div>
                    <div class="col-md-7 d-flex">
                        <p class="text-muted">
                            @if ($apartment->apartmentsponsor->isNotEmpty())
                              @php
                                $endingDate = \Carbon\Carbon::parse($apartment->apartmentsponsor->last()->ending_date);
                                $now = \Carbon\Carbon::now();
                              @endphp
                              @if ($endingDate > $now)
                                {{ $endingDate->format('d-m-Y H:i') }}
                              @else
                                Sponsorship expired 
                              @endif
                            @else
                              Not sponsored
                            @endif
                          </p>
                          
                        </div>
                        
                        <div class="col-5 offset-5">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.apartments.sponsorship', $apartment) }}">
                                @if ($apartment->visibility)
                                    Extend sponsorship
                                @else 
                                    Add sponsorship
                                @endif
                            </a>
                            
                        </div>
                    
                        
                </div>
            </div>


            <div class="col-6">
                <figure class="">
                    <img src="{{ $apartment->getImageUri() }}" class="w-100 showimage max-20 fit-cover" alt="...">
                <figcaption>
                    <p class="text-secondary m-0"><strong></strong></p>
                </figcaption>
            </figure>
            </div>



        </div>

        <hr>

        <div class="d-flex flex-column col-12 mt-3">
            <div class="text-center mb-2">
                <span class="bold ">About this place</span>
            </div>
            <div class="col-12 text-center ">
                <p class="text-muted showdescription">{{$apartment->description}}</p>
            </div>
            
        </div>
        
         <hr>

      <div class="row">
        <div class="col-12">

          <div class="text-center mb-2">
            <span class="form-label">Amenities</span>
          </div>
          <div class="row">
            @forelse ($apartment->service as $service)
            <div class="col-md-3">
              <span class="me-2">
                {!!$service->icon!!}
              </span>
              <span>
               
                  <span class="text-muted">
                     {{$service->name}}
                    </span>
                </span>
            </div>

            @empty
            <div class="col-md-12">Nessun servizio</div>
            @endforelse
          </div>
        </div>
      </div>
        
    </div>
  </section>
  
@endsection