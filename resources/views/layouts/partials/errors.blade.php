@if ($errors->any())
  <div class="alert alert-danger">
    <h3>
      Risolvi i seguenti problemi per proseguire:
    </h3>

    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
