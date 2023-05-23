
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap"
    rel="stylesheet"
  />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    @extends('layouts.app')



    @section('title', 'Apartments list')
        


@section('content')
<a class="btn btn-primary my-3 "  href="{{ route('admin.apartments.create') }}" role="button" >Add apartment</a>
<div class="">
<div data-aos="flip-up"  class="d-flex flex-row gap-3 flex-wrap">
    @foreach ($apartments as $apartment)
      <div class="cardindex z-index-0">
           <div class="imgBx">
             <img src="{{ $apartment->getImageUri() }}" alt="house">
             <input type="checkbox">
             <div class="heart">
             <i class="fas fa-heart"></i>
           </div>
        </div>
        <div class="price-section">
         <h2>{{ $apartment->title }}</h2>
         <h3>{{ $apartment->address }}</h3>
        </div>
        <div class="info-section">
         <div class="beds">
         <h5><i class="fas fa-bed"></i> <span>{{ $apartment->beds }}</span> Bed</h5>
        </div>
       <div class="baths">
        <h5><i class="fas fa-bath"></i> <span>{{ $apartment->bathrooms }}</span> Bathrooms</h5>
       </div>
      </div>
      <div class="contact">
       <a href="{{ route('admin.apartments.show', $apartment) }}" class="btn btn-primary">Details</a>
                        <a href="{{ route('admin.apartments.edit', $apartment) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('admin.apartments.edit', $apartment) }}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-apartment-modal-{{ $apartment->id }}">Delete</a>
      </div>
      </div>
    @endforeach
  </div>
    <div class="col-12 mt-5">
        {{ $apartments->links() }}
    </div>
</div>
</div>



{{-- <table class="table">
  
    <div class="">
    <tbody class="indexcard d-flex flex-row flex-wrap align-items-center gap-5 text-center">
        @foreach ($apartments as $apartment)
        <tr class="card p-5 text-center bg-info">
            <th class="text-light" scope="row">{{ $apartment->id }}</th>
            <td class="text-secondary">{{ $apartment->title }}</td>
            <td><img src="{{$apartment->image}}" alt="" width="400px" height="300px" ></td>
            <!--<td class="descriptionindex">{{ $apartment->description }}</td>-->
            <td class="text-light">{{ $apartment->address }}</td>
            <!--<td class="text-secondary">{{ $apartment->latitude }}</td>
            <td class="text-secondary">{{ $apartment->longitude }}</td>-->
            <!--<td class="text-light">Stanze:{{ $apartment->rooms }}</td>
            <td class="text-light">Bagni:{{ $apartment->bathrooms }}</td>
            <td class="text-light">Letti{{ $apartment->beds }}</td>-->
            <td class="text-light">Metri quadri:{{ $apartment->square_meters }}</td>
            <td class="text-light">Visibilità:{{ $apartment->visibility }}</td>
             <td class="d-flex flex-row gap-3 align-items-center justify-content-center">
                <a href="{{ route('admin.apartments.show', $apartment) }}"> <i class="fa-solid fa-circle-info"></i> </a>
                <a href="{{ route('admin.apartments.create') }}" role="button" ><i class="fa-solid fa-square-plus"></i></a>
                <a href="{{ route('admin.apartments.edit', $apartment) }}"><i class="fa-solid fa-pen-to-square"></i></a>
            </td>
        </tr>
        
        @endforeach
    </tbody>
    </div>
    
</table> --}}

@endsection

{{ $apartments->links() }}



{{-- bottone per la modale --}}


{{-- modale --}}
@section('modals')
    @foreach ($apartments as $apartment)
        <div class="modal fade" id="delete-apartment-modal-{{ $apartment->id }}" tabindex="-1" aria-labelledby="delete-apartment-modal-{{ $apartment->id }}-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="delete-apartment-modal-{{ $apartment->id }}-label">Elimina l'appartamento n°{{ $apartment->id }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    L'appartamento <strong>{{ $apartment->title }}</strong> sarà eliminato. Sei sicuro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, annulla</button>
                    <form method="POST" action="{{ route('admin.apartments.destroy', $apartment)}}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-primary">Sì, elimina</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<!-- RISOLUZIONE INDEX -->
</body>
</html>