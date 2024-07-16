<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 *
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $category_id
 * @property string|null $image_path
 * @property string $date
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $categories
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\PostFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    use HasFactory;
    //BelongsTo -> Gehört zu bestimmten Wert in anderer Tabelle. Diese Tabelle hat Fremdschlüssel, Fremdtabelle nicht
    //HasOne -> Gehört zu bestimmten Wert in anderer Tabelle. Die andere Tabelle besitzt einen Fremdschlüssel.
    //HasOne -> Andere Tabelle hat Fremdschlüssel, BelongsTo -> Diese Tabelle hat Fremdschlüssel
    public function user() : BelongsTo {
        return $this->BelongsTo(User::class);
    }

    public function comments() : HasMany {
        return $this->hasMany(Comment::class);
    }

    public function tags() : belongsToMany {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function category() : BelongsTo {
        return $this->BelongsTo(Category::class);
    }

    public function html(): Attribute {
        return Attribute::get(fn () => str($this->content)->markdown());
    }
}
