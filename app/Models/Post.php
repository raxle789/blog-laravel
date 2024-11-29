<?php 

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model {
  use HasFactory;

  protected $fillable = ['title', 'slug', 'author', 'body'];
  protected $with = ['author', 'category'];

  public function author(): BelongsTo {
    return $this->belongsTo(User::class);
  }

  public function category(): BelongsTo {
    return $this->belongsTo(Category::class);
  }

  public function scopeFilter(Builder $query, array $filters): void {
    $query->when($filters['search'] ?? false, fn ($query, $search) => 
      $query->where('title', 'like', '%'.$search.'%')
    );

    $query->when($filters['category'] ?? false, fn ($query, $category) => 
      $query->whereHas('category', fn ($query) => $query->where('slug', $category))
    );

    $query->when($filters['author'] ?? false, fn ($query, $author) => 
      $query->whereHas('author', fn ($query) => $query->where('slug', $author))
    );
  }
  // public static function all() {
  //   return [
  //     [
  //       'id' => 1,
  //       'slug' => 'judul-artikel-1',
  //       'title' => 'Judul Artikel 1',
  //       'author' => 'Abdullah Al Fatih',
  //       'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae et eligendi obcaecati eos exercitationem repellat, maxime quis nam placeat maiores impedit alias ut ab quo officiis voluptatem provident optio fugiat possimus facilis ipsum repellendus ad! Inventore rerum dolor placeat sint aliquid quos nihil pariatur vero nesciunt corporis provident cumque est ullam culpa deleniti quas, sapiente, similique iure! Aliquam iste recusandae alias nemo delectus possimus asperiores sit. Sunt, ipsa numquam architecto aliquid eum maxime hic similique quis, autem impedit at fugiat repudiandae delectus unde iste, tempore tenetur quos sequi veniam iusto. Doloremque quia voluptatibus ab optio, aperiam explicabo et non dignissimos nihil libero eum necessitatibus voluptatum at aut possimus nemo beatae harum suscipit repudiandae sed facere ipsum cum voluptatem doloribus. Asperiores, facere unde nam accusantium vel id! Veniam quos vel totam alias soluta optio temporibus, nobis quas nihil, sed laudantium ut doloremque sint fugiat, exercitationem voluptate consequuntur beatae recusandae voluptatibus magni animi! Eaque sunt voluptates inventore officiis fugit voluptate iusto voluptatum tempore laudantium neque vel illo veniam impedit architecto harum corrupti, ipsum adipisci quod, nobis facere, tenetur totam. Aspernatur modi debitis repellendus temporibus! Quo delectus in ducimus eius magnam illo quidem obcaecati similique? Dolore sit similique sed eaque praesentium a atque!'
  //     ],
  //     [
  //       'id' => 2,
  //       'slug' => 'judul-artikel-2',
  //       'title' => 'Judul Artikel 2',
  //       'author' => 'Abdullah Al Fatih',
  //       'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae et eligendi obcaecati eos exercitationem repellat, maxime quis nam placeat maiores impedit alias ut ab quo officiis voluptatem provident optio fugiat possimus facilis ipsum repellendus ad! Inventore rerum dolor placeat sint aliquid quos nihil pariatur vero nesciunt corporis provident cumque est ullam culpa deleniti quas, sapiente, similique iure! Aliquam iste recusandae alias nemo delectus possimus asperiores sit. Sunt, ipsa numquam architecto aliquid eum maxime hic similique quis, autem impedit at fugiat repudiandae delectus unde iste, tempore tenetur quos sequi veniam iusto. Doloremque quia voluptatibus ab optio, aperiam explicabo et non dignissimos nihil libero eum necessitatibus voluptatum at aut possimus nemo beatae harum suscipit repudiandae sed facere ipsum cum voluptatem doloribus. Asperiores, facere unde nam accusantium vel id! Veniam quos vel totam alias soluta optio temporibus, nobis quas nihil, sed laudantium ut doloremque sint fugiat, exercitationem voluptate consequuntur beatae recusandae voluptatibus magni animi! Eaque sunt voluptates inventore officiis fugit voluptate iusto voluptatum tempore laudantium neque vel illo veniam impedit architecto harum corrupti, ipsum adipisci quod, nobis facere, tenetur totam. Aspernatur modi debitis repellendus temporibus! Quo delectus in ducimus eius magnam illo quidem obcaecati similique? Dolore sit similique sed eaque praesentium a atque!'
  //     ],
  //     [
  //       'id' => 3,
  //       'slug' => 'judul-artikel-3',
  //       'title' => 'Judul Artikel 3',
  //       'author' => 'Abdullah Al Fatih',
  //       'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae et eligendi obcaecati eos exercitationem repellat, maxime quis nam placeat maiores impedit alias ut ab quo officiis voluptatem provident optio fugiat possimus facilis ipsum repellendus ad! Inventore rerum dolor placeat sint aliquid quos nihil pariatur vero nesciunt corporis provident cumque est ullam culpa deleniti quas, sapiente, similique iure! Aliquam iste recusandae alias nemo delectus possimus asperiores sit. Sunt, ipsa numquam architecto aliquid eum maxime hic similique quis, autem impedit at fugiat repudiandae delectus unde iste, tempore tenetur quos sequi veniam iusto. Doloremque quia voluptatibus ab optio, aperiam explicabo et non dignissimos nihil libero eum necessitatibus voluptatum at aut possimus nemo beatae harum suscipit repudiandae sed facere ipsum cum voluptatem doloribus. Asperiores, facere unde nam accusantium vel id! Veniam quos vel totam alias soluta optio temporibus, nobis quas nihil, sed laudantium ut doloremque sint fugiat, exercitationem voluptate consequuntur beatae recusandae voluptatibus magni animi! Eaque sunt voluptates inventore officiis fugit voluptate iusto voluptatum tempore laudantium neque vel illo veniam impedit architecto harum corrupti, ipsum adipisci quod, nobis facere, tenetur totam. Aspernatur modi debitis repellendus temporibus! Quo delectus in ducimus eius magnam illo quidem obcaecati similique? Dolore sit similique sed eaque praesentium a atque!'
  //     ],
  //   ];
  // }

  // public static function find($slug): array {
  //   $post = Arr::first(static::all(), fn($post) => $post['slug'] === $slug);
  //   if (!$post) {
  //     abort(404);
  //   }

  //   return $post;
  // }
}

?>