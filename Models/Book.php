<?php

namespace CodeEduBook\Models;

use Bootstrapper\Interfaces\TableInterface;
use CodeEduBook\Models\Category;
use CodEditora\Models\User;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Traits\TransformableTrait;

class Book extends Model implements TableInterface
{
    use TransformableTrait;
    use FormAccessible;
    use SoftDeletes;

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'title',
        'subtitle',
        'price',
        'author_id',
        'category_id'
    ];

    public function author(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class)->withTrashed();
    }

    public function formCategoriesAttribute(){
        return $this->categories->pluck('id')->all();
    }

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['#', 'Título','Subtitulo','Preço', 'Autor', 'Categoria'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header){
            case '#':
                return $this->id;
            case 'Título':
                return $this->title;
            case 'Subtitulo':
                return $this->subtitle;
            case 'Preço':
                return $this->price;
            case 'Autor':
                return $this->author->name;
            case 'Categoria':
                return $this->categories->implode('name', ', ');
        }
    }
}
