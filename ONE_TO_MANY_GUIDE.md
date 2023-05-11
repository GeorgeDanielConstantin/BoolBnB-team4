# ONE TO MANY

## Migrations

Realizziamo una relazione fra l'entità category (una per post) e l'entità post (molti per categoria).

### Prima migration (posts)

possiamo creare il file di migrazione con il comando

```
php artisan make:migration create_posts_table
```

nel quale andremo poi a specificare i campi, gli indici ed i vincoli della tabella

```php
// xxxx_xx_xx_xxxxxx_create_posts_table

/**
 * Run the migrations.
 *
 * @return void
 */
public function up()
{
  Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->string('title', 100);
    // altre colonne ...
    $table->timestamps();
  });
}
```

### Seconda migration (categories)

creeremo poi la migration per la tabella categories

```
php artisan make:migration create_categories_table
```

al cui interno aggiungeremo i campi

```php
// xxxx_xx_xx_xxxxxx_create_categories_table

/**
 * Run the migrations.
 *
 * @return void
 */
public function up()
{
  Schema::create('categories', function (Blueprint $table) {
    $table->id();
    $table->string('label', 20);
    // altre colonne ...
    $table->timestamps();
  });
}
```

### Terza migration (FK & vincolo)

Infine abbiamo bisogno di realizzare il vincolo fra le due tabelle. Per farlo, nel nostro caso, abbiamo bisogno di una terza migration:

```
php artisan make:migration add_category_id_to_posts_table
```

Il nostro caso prevede che la relazione fra posts e categories possa essere nulla, pertanto aggiungeremo i modificatori `->nullable()` e `->nullOnDelete()` (quest ultimo va sempre dopo `->constrained()`).

Nel caso la relazione non possa essere "null" basta omettere i modificatori.

```php
// xxxx_xx_xx_xxxxxx_add_category_id_to_posts_table

/**
 * Run the migrations.
 *
 * @return void
 */
public function up()
{
  Schema::table('posts', function (Blueprint $table) {
    $table->foreignId('category_id')
      ->after('id')
      ->nullable()
      ->constrained()
      ->nullOnDelete();
  });
}
```

nel metodo down prima dropperemo il vincolo e poi la colonna category_id

```php
// xxxx_xx_xx_xxxxxx_add_category_id_to_posts_table

/**
 * Reverse the migrations.
 *
 * @return void
 */
public function down()
{
  Schema::table('posts', function (Blueprint $table) {
    $table->dropForeign('posts_category_id_foreign');
    $table->dropColumn('category_id');
  });
}
```

## Models

Nei modelli aggiungiamo la relazione così che l'ORM possa mapparli correttamente.

### Primo model (category)

Dal momento che è una relazione "uno a molti" l'entità "forte" `Category` sarà relazionata a 0, 1 o più `Post`.

Nel suo model andremo a scrivere:

```php
// Category

class Category extends Model {

  // ...

  public function posts() {
    return $this->hasMany(Post::class);
  }
}
```

### Secondo model (post)

L'entità `Post` potrà essere relazionata a 0 o 1 entità `Category`. Nel suo model scriveremo:

```php
// Post

class Post extends Model {

  // ...

  public function category() {
    return $this->belongsTo(Category::class);
  }
}
```

Ora abbiamo accesso alla sintassi del tipo `$post->category` oppure `$category->posts`

## Seeders

Per prima cosa va lanciato il seeder per le categorie, così che esistano già nel momento della generazione dei posts. Proseguiamo a creare i file nello stesso ordine.

#### Primo seeder (categories)

```
php artisan make:seeder CategorySeeder
```

In questo caso usiamo un array di categorie predefinite, ma possono essere generare anche con `Faker`.

```php
// CategorySeeder

/**
* Run the database seeds.
*
* @return void
*/
public function run(Faker $faker)
{
  $labels = ["Bootstrap", "Tailwind", "Vue", "Laravel", "PHPMyAdmin"];

  foreach($labels as $label) {
    $category = new Category();
    $category->label = $label;
    // ...
    $category->save();
  }
}
```

Nel caso si usi Faker va sempre importato con:

```php
use Faker\Generator as Faker;
```

Possiamo quindi aggiungere il CategorySeeder nel metodo `run` del file `DatabaseSeeder`

```php
// DatabaseSeeder

/**
 * Seed the application's database.
 *
 * @return void
 */
public function run()
{
  $this->call([
    CategorySeeder::class,
    // ...
  ]);
}
```

#### Secondo seeder (posts)

Nella generazione dei posts dovremo aggiungere l'id della categoria associata. Per farlo useremo il metodo `->pluck('id')->toArray()` sulla collection delle categorie al fine di ottenere un array di id di tutte le categorie esistenti.

Dal momento che la category_id è nullable, con la condizione `(random_int(0, 1) === 1)` assegnamo null a (circa) metà dei posts, mentre l'altra metà avrà un category_id selezionato randomicamente.

```php
// PostSeeder
/**
 * Run the database seeds.
 *
 * @return void
 */
public function run(Faker $faker)
{
  $categories = Category::all()->pluck('id')->toArray(); // [1, 2, ...]

  for($i = 0; $i < 40; $i++) {
      $category_id = (random_int(0, 1) === 1) ? $faker->randomElement($categories) : null;

      $post = new Post;
      $post->category_id = $category_id;
      $post->title = $faker->catchPhrase();
      // ...
      $post->save();
  }
}
```

Possiamo quindi aggiungere il PostSeeder nel metodo `run` del file `DatabaseSeeder`

```php
// DatabaseSeeder

/**
 * Seed the application's database.
 *
 * @return void
 */
public function run()
{
  $this->call([
    CategorySeeder::class,
    PostSeeder::class,
    // ...
  ]);
}
```

## Controller + Views

Le CRUD per l'entità `Category` possono essere realizzate seguendo la guida per le CRUD, pertanto ci concentreremo sulla parte relativa alla relazione, in particolare su `PostController` (in quanto l'entità `Post` contiene la FK) e le relative views.

### Lettura: index

Nel controller non c'è bisogno di apportare modifiche. E' opportuno però visualizzare il nome della categoria nella lista

```blade
// views/posts/index.blade.php

<table class="table">
    <thead>
        <tr>
            ...
            <th scope="col">Categoria</th>
            ...
        </tr>
    </thead>
    <tbody>
        @forelse($posts as $post)
        <tr>
            ...
            <td>{{ $post->category?->label }}</td>
            ...
        </tr>
        @empty
        <tr>
            <td colspan="n">Nessun risultato</td>
        </tr>
        @endforelse
    </tbody>
</table>
```

### Lettura: show

Nel controller non c'è bisogno di apportare modifiche. E' opportuno però visualizzare il nome della categoria nel dettaglio

```blade
  <strong>Categoria: </strong>
  @if($post->category)
    {{ $post->category->label }}
  @else
    Nessuna categoria
  @endif
```

### Creazione: create

Nel controller dobbiamo prendere tutte possibili le categorie da passare alla vista

```php
public function create()
{
  $post = new Post;
  $categories = Category::orderBy('label')->get();
  return view('admin.posts.form', compact('post', 'categories'));
}
```

e nel form dovremo stampare la select

```blade
<label for="category_id" class="form-label">Categoria</label>

<select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
  <option value="">Non categorizzato</option>
  @foreach ($categories as $category)
    <option
    @if (old('category_id', $post->category_id) == $category->id) selected @endif
    value="{{ $category->id }}">
      {{ $category->label }}
    </option>
  @endforeach
</select>
@error('category_id')
  <div class="invalid-feedback">
    {{ $message }}
  </div>
@enderror
```

### Creazione: store

Nel controller dovremo poi validare la richiesta controllando che l'id ricevuto esista nella tabella delle categorie

```php
$request->validate([
  // ...
  'category_id' => 'nullable|exists:categories,id',
],
[
// ...
  'category_id.exists' => 'L\'id della categoria non è valido',
]);
```

### Modifica: edit

Sia nel controller che nel form valgono le modifiche specificate precedentemente nella sezione "create"

### Modifica: update

Se la validazione non è centralizzata (metodo privato di validazione nella guida delle CRUD) va riportato quanto scritto nella sezione "store" all'interno del metodo "update"

### Cancellazione: destroy

Nessuna modifica necessaria
